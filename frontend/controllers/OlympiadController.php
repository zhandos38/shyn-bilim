<?php


namespace frontend\controllers;


use common\models\Answer;
use common\models\Question;
use common\models\Subject;
use common\models\Test;
use common\models\TestAssignment;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
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
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList($type)
    {
//        Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада еще не началась. Олимпиада "ЕҢ БІЛІМДІ ПЕДАГОГ-2020" пройдет между 05-15 октября'));
//        return $this->redirect(['site/index']);

        $dataProvider = new ActiveDataProvider([
            'query' => Subject::find()->andWhere(['type' => $type])->orderBy(['order' => SORT_ASC]),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'type' => $type
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
                Yii::$app->session->setFlash('error', Yii::t('app', 'Тест не найден!'));

                return $this->render('assignment', [
                    'model' => $model,
                    'subject' => $subject
                ]);
            }

            $model->test_id = $test->id;
            $model->created_at = time();
            if (!$model->save()) {
                throw new Exception('Assignment is not saved');
            }

            $salt = $this->getSalt(8);
            $request = [
                'pg_merchant_id' => Yii::$app->params['payboxId'],
                'pg_amount' => 2000,
                'pg_salt' => $salt,
                'pg_order_id' => $model->id,
                'pg_description' => 'Оплата за публикацию материала',
                'pg_success_url' => Url::base('https') . '/olympiad/success',
                'pg_result_url' => Yii::$app->params['apiDomain'] . '/olympiad/result',
                'pg_result_url_method' => 'POST',
            ];

            $request = $this->getSignByData($request, 'payment.php', $salt);

            $query = http_build_query($request);

            return $this->redirect('https://api.paybox.money/payment.php?' . $query);
//            return $this->redirect(['test', 'assignment' => $model->id, 'id' => $model->test->id]);
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

        $model = TestAssignment::find()
                ->andWhere(['id' => $request[$this->toProperty('order_id')]])
                ->andWhere(['status' => TestAssignment::STATUS_ACTIVE])
                ->one();

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

        $testAssignment = TestAssignment::findOne(['id' => $assignment]);
        if ($testAssignment->status === TestAssignment::STATUS_FINISHED) {
            Yii::$app->session->setFlash('success', 'Тест уже пройден!');
            return $this->redirect(['olympiad/list', 'type' => $test->subject->type]);
        }

        return $this->render('test', [
            'assignment_id' => $testAssignment->id,
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
        $testAssignment->status = TestAssignment::STATUS_FINISHED;
        $testAssignment->finished_at = time();
        if (!$testAssignment->save()) {
            throw new Exception('Test result is not saved');
        }

        return true;
    }

    public function actionGetCert($id)
    {
        $testAssignment = TestAssignment::findOne(['id' => $id]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        if ($testAssignment->point >= 17) {
            $place = 'III';

            if ($testAssignment->point >= 28 && $testAssignment->point <= 30) {
                $place = 'Бас жүлде';
            }

            if ($testAssignment->point >= 23 && $testAssignment->point <= 27) {
                $place = 'I';
            }

            if ($testAssignment->point >= 20 && $testAssignment->point <= 22) {
                $place = 'II';
            }

            $content = $this->renderPartial('_diploma', [
                'testAssignment' => $testAssignment,
                'place' => $place
            ]);

            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_UTF8,
                // A4 paper format
                'format' => Pdf::FORMAT_A4,
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT,
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER,
                'filename' => 'Сертификат.pdf',
                // your html content input
                'content' => $content,
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css'
            ]);

        } else {
            $content = $this->renderPartial('_cert', [
                'testAssignment' => $testAssignment
            ]);

            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_UTF8,
                // A4 paper format
                'format' => Pdf::FORMAT_A3,
                // portrait orientation
                'orientation' => Pdf::ORIENT_LANDSCAPE,
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER,
                'filename' => 'Сертификат.pdf',
                // your html content input
                'content' => $content,
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css'
            ]);
        }

        return $pdf->render();
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