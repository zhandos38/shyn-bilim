<?php


namespace frontend\controllers;


use common\models\Answer;
use common\models\Question;
use common\models\Subject;
use common\models\Test;
use common\models\TestAssignment;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\HttpException;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\Response;

class OlympiadController extends Controller
{
    public function actionIndex()
    {
//        Yii::$app->session->setFlash('error', 'Страница находится в разработке');
//        return $this->redirect(['site/index']);
        
        return $this->render('index');
    }

    public function actionList($type)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Subject::find()->andWhere(['type' => $type]),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionAssignment($subject)
    {
        $model = new TestAssignment();
        $model->subject_id = $subject;

        $subject = Subject::findOne(['id' => $model->subject_id]);

//        $model->load(\Yii::$app->request->post());
//        VarDumper::dump($model, 10, 1); die;

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $test = Test::findOne(['subject_id' => $model->subject_id, 'grade' => $model->grade, 'lang' => $model->lang]);
            if (!$test) {
                throw new Exception('Тест не найден!');
            }

            $model->test_id = $test->id;
            $model->created_at = time();
            if (!$model->save()) {
                throw new Exception('Assignment is not saved');
            }

            $salt = $this->getSalt(8);
            $request = [
                'pg_merchant_id' => Yii::$app->params['payboxId'],
                'pg_amount' => 500,
                'pg_salt' => $salt,
                'pg_order_id' => $model->id,
                'pg_description' => 'Оплата за публикацию материала',
                'pg_success_url' => Url::base('https') . '/olympiad/success',
                'pg_result_url' => Yii::$app->params['apiDomain'] . '/olympiad-result',
                'pg_result_url_method' => 'POST',
            ];

            $request = $this->getSignByData($request, 'payment.php', $salt);

            $query = http_build_query($request);

            return $this->redirect('https://api.paybox.money/payment.php?' . $query);
        }

        return $this->render('assignment', [
            'model' => $model,
            'subject' => $subject
        ]);
    }

    public function actionSuccess()
    {
        $request = Yii::$app->request->queryParams;

        if (!$this->checkSign($request, 'success')) {
            throw new Exception('Sig is not correct');
        }

        $model = TestAssignment::findOne(['id' => $request[$this->toProperty('order_id')], 'status' => TestAssignment::STATUS_ACTIVE]);
        if (empty($model)) {
            throw new Exception('Ошибка платежа, платеж не был совершен, попытайтесь снова или свяжитесь с администрацией сайта');
        }

        return $this->redirect(['test', 'assignment' => $model->id, 'id' => $model->test->id]);
    }

    public function actionTest($assignment, $id)
    {
        $test = Test::findOne(['id' => $id]);
        if (!$test) {
            throw new Exception('Тест не найден!');
        }

        return $this->render('test', [
            'assignment_id' => $assignment,
            'subject_name' => $test->subject->name,
            'id' => $id
        ]);
    }

    /**
     * @param $id
     * @return array
     */
    public function actionGetTest($id)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $test = Test::find()->where(['id' => $id])->one();

            $data = [
                'id' => $test->id,
                'questions' => [],
                'timeLimit' => $test->time_limit
            ];

            /** @var Question $question */
            /** @var Answer $answer */
            foreach ($test->questions as $question) {
                $answers = [];
                foreach ($question->answers as $answer) {
                    $answers[] = [
                        'id' => $answer->id,
                        'text' => $answer->text,
                        'isRight' => $answer->is_right
                    ];
                }

                shuffle($answers);
                $data['questions'][] = [
                    'id' => $question->id,
                    'text' => $question->text,
                    'selectedAnswerId' => null,
                    'answers' => $answers
                ];
            }
            return $data;
        }
    }

    public function actionSetResult()
    {
        if (!Yii::$app->request->isAjax) {
            throw new HttpException(404, 'Страница не найдена');
        }

        $data = Yii::$app->request->post();

        $testAssignment = TestAssignment::findOne(['id' => (int)$data['assignmentId']]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        $testAssignment->lang = 'kz';
        $testAssignment->point = (int)$data['point'];
        $testAssignment->finished_at = time();
        if (!$testAssignment->save()) {
            throw new Exception('Test result is not saved');
        }

        return true;
    }

    public function checkSign($data, $url):bool
    {
        $array = $data;
        $salt = $array[$this->toProperty('salt')];

        unset($array[$this->toProperty('sig')], $array[$this->toProperty('salt')]);

        $sign = $this->sign($array, $salt, $url);

//        VarDumper::dump($sign . ' - ' . $data[$this->toProperty('sig')]); die;

        return ($sign == $data[$this->toProperty('sig')]);
    }

    private function sign($data, $salt, $url)
    {
        $arr = $data;
        $key = Yii::$app->params['payboxKey'];

        $arr[$this->toProperty('salt')] = $salt;
        ksort($arr);
        array_unshift($arr, $url);
        array_push($arr, $key);
        $arr[$this->toProperty('sig')] = md5(implode(';', $arr));

        return $arr[$this->toProperty('sig')];
    }

    public function getSignByData($data, $url, $salt = null)
    {
        $array = $data;
        $salt = $salt ? $salt : $this->getSalt(8);
        $array[$this->toProperty('salt')] = $salt;
        unset($array[$this->toProperty('sig')]);

        ksort($array);
        array_unshift($array, $url);
        array_push($array,Yii::$app->params['payboxKey']);
        $sign = md5(implode(';', $array));

        $data[$this->toProperty('salt')] = $salt;
        $data[$this->toProperty('sig')] = $sign;

        return $data;
    }

    private function getSalt($length) {
        return bin2hex(random_bytes($length));
    }

    private function toProperty($property)
    {
        return 'pg_' . $property;
    }
}