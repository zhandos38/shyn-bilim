<?php


namespace frontend\controllers;


use common\models\Answer;
use common\models\Marathon;
use common\models\Olympiad;
use common\models\Question;
use common\models\Subject;
use common\models\Test;
use common\models\TestAssignment;
use common\models\TestOption;
use common\models\TestSubject;
use common\models\WhiteList;
use frontend\models\CheckAssignmentForm;
use kartik\mpdf\Pdf;
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex($type = Olympiad::TYPE_STUDENT)
    {
        $olympiads = Olympiad::find()->andWhere(['type' => $type])->orderBy(['order' => SORT_ASC])->all();

        return $this->render('index', [
            'olympiads' => $olympiads
        ]);
    }

    public function actionChoose()
    {
        return $this->render('choose');
    }

    public function actionView($id)
    {
        $olympiad = Olympiad::findOne(['id' => $id]);
        if ($olympiad === null) {
            throw new Exception("Olympiad not found");
        }

//        if ($olympiad->id === 6 || $olympiad->id === 7) {
//            Yii::$app->session->setFlash('error', Yii::t('app', 'ОЛИМПИАДА 12 мамыр басталады'));
//            return $this->redirect(['site/index']);
//        }

        if ($olympiad->status === Olympiad::STATUS_FINISHED) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада завершилась'));
            return $this->redirect(['site/index']);
        }

        if ($olympiad->status === Olympiad::STATUS_NEW) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада еще не началась'));
            return $this->redirect(['site/index']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Test::find()->andWhere(['olympiad_id' => $olympiad->id]),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('view', [
            'olympiad' => $olympiad,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionAssignment($id)
    {
        $model = new TestAssignment();
        $olympiad = Olympiad::findOne(['id' => $id]);

        if ($olympiad->status === Olympiad::STATUS_FINISHED) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада завершилась'));
            return $this->redirect(['site/index']);
        }

        if ($olympiad->status === Olympiad::STATUS_NEW) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада еще не началась'));
            return $this->redirect(['site/index']);
        }

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            // Check olympiad status
            /** @var Olympiad $olympiad */
            if ($olympiad->status === Olympiad::STATUS_FINISHED) {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада завершилась'));
                return $this->redirect(['site/index']);
            }

            if ($olympiad->status === Olympiad::STATUS_NEW) {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада еще не началась'));
                return $this->redirect(['site/index']);
            }

            // Check test assignment
            $testAssignment = TestAssignment::find()->andWhere(['iin' => $model->iin, 'status' => TestAssignment::STATUS_FINISHED, 'subject_id' => $model->subject_id])->one();
            if ($testAssignment) {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Тест уже пройден'));

                return $this->render('assignment', [
                    'model' => $model,
                    'olympiad' => $olympiad,
                ]);
            }

            // Get Test
            /** @var Test $test */
            $tests = $this->getTestsByAssignment($model);

            if (!$tests) {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Тест не найден'));

                return $this->render('assignment', [
                    'model' => $model,
                    'olympiad' => $olympiad,
                ]);
            }

            $model->created_at = time();

            // Check whitelist
            $whiteList = WhiteList::findOne(['iin' => $model->iin, 'subject_id' => $model->subject_id]);
            if ($whiteList !== null) {
                $model->status = TestAssignment::STATUS_ACTIVE;
            }

            if (!$model->save()) {
                throw new Exception('Assignment is not saved');
            }

            if ($whiteList === null) {
                $salt = $this->getSalt(8);
                $request = [
                    'pg_merchant_id' => Yii::$app->params['payboxId'],
                    'pg_amount' => $olympiad->price,
                    'pg_salt' => $salt,
                    'pg_order_id' => $model->id,
                    'pg_description' => 'Оплата за участие в олимпиаде',
                    'pg_success_url' => Url::base('https') . '/olympiad/success',
                    'pg_result_url' => Yii::$app->params['apiDomain'] . '/olympiad/result',
                    'pg_result_url_method' => 'POST',
                ];

                $request = $this->getSignByData($request, 'payment.php', $salt);

                $query = http_build_query($request);

                return $this->redirect('https://api.paybox.money/payment.php?' . $query);
            }

            return $this->redirect(['test', 'assignment' => $model->id]);
        }

        return $this->render('assignment', [
            'model' => $model,
            'olympiad' => $olympiad,
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

        return $this->redirect(['test', 'assignment' => $model->id]);
    }

    public function getTestsByAssignment(TestAssignment $model)
    {
        $query = Test::find()
            ->andWhere(['olympiad_id' => $model->olympiad_id])
            ->andWhere([
                'and',
                ['<=', 'grade_from', $model->grade],
                ['>=', 'grade_to', $model->grade]
            ])
            ->andWhere(['lang' => $model->lang]);

        if (!empty($model->subject_id)) {
            $query->andWhere(['subject_id' => $model->subject_id]);
        }

        return $query->all();
    }

    public function actionTest($assignment)
    {
        $testAssignment = TestAssignment::findOne(['id' => $assignment]);
        if (empty($testAssignment)) {
            throw new Exception('Произашла ошибка');
        }

        if ($testAssignment->status === TestAssignment::STATUS_FINISHED) {
            Yii::$app->session->setFlash('success', 'Тест уже пройден!');
            return $this->redirect('/');
        }

        return $this->render('test', [
            'assignment_id' => $testAssignment->id,
            'olympiad_name' => $testAssignment->olympiad->name
        ]);
    }

    /**
     * @param $id
     * @return array
     * @throws Exception
     */
    public function actionGetTest($id)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $testAssignment = TestAssignment::findOne(['id' => $id]);
            if ($testAssignment === null) {
                throw new Exception('Test assignment option is not found');
            }

            $tests = $this->getTestsByAssignment($testAssignment);
            if (!$tests) {
                throw new Exception('Tests is not found');
            }

            $data = [
                'questions' => [],
                'timeLimit' => 0,
            ];

            /** @var Test $test */
            foreach ($tests as $test) {
                $questions = Question::find()->andWhere(['test_id' => $test->id])->limit($test->question_limit)->all();

                /** @var Question $question */
                foreach ($questions as $question) {
                    $answers = [];

                    /** @var Answer $answer */
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

                $data['timeLimit'] += $test->time_limit;
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

        if ($data['hash'] !== md5('zohan'.(string)$data['assignmentId'])) {
            return 'nope bitch!';
        }

        $testAssignment = TestAssignment::findOne(['id' => (int)$data['assignmentId']]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        if ($testAssignment->status === TestAssignment::STATUS_FINISHED) {
            throw new Exception('Тест уже пройден');
        }

        $testAssignment->point = (int)$data['point'];
        $testAssignment->status = TestAssignment::STATUS_FINISHED;
        $testAssignment->finished_at = time();
        if (!$testAssignment->save()) {
            return VarDumper::dump($testAssignment);
//            throw new Exception('Test result is not saved: ');
        }

        return true;
    }

    public function actionGetCert($id)
    {
        $testAssignment = TestAssignment::findOne(['id' => $id]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        if ($testAssignment->status !== TestAssignment::STATUS_FINISHED) {
            Yii::$app->session->setFlash('success', 'Тест аяқталмаған немесе төленбеген');
            return $this->redirect(['olympiad/index']);
        }

        if ($testAssignment->point >= 15) {
            $place = 'III ОРЫН';
            if ($testAssignment->point >= 29 && $testAssignment->point <= 30) {
                $place = 'БАС ЖҮЛДЕ';
            }

            if ($testAssignment->point >= 25 && $testAssignment->point <= 28) {
                $place = 'I ОРЫН';
            }


            if ($testAssignment->point >= 20 && $testAssignment->point <= 24) {
                $place = 'II ОРЫН';
            }

            $content = $this->renderPartial('_diploma', [
                'testAssignment' => $testAssignment,
                'place' => $place,
            ]);

            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_UTF8,
                // A4 paper format
                'format' => Pdf::FORMAT_A4,
                'marginTop' => 0,
                'marginLeft' => 0,
                'marginRight' => 0,
                'marginBottom' => 0,
                // portrait orientation
                'orientation' => Pdf::ORIENT_LANDSCAPE,
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER,
                'filename' => 'Диплом.pdf',
                // your html content input
                'content' => $content,
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting
                'cssFile' => 'css/custom.css'
            ]);
        } else {
            $content = $this->renderPartial('_cert', [
                'testAssignment' => $testAssignment,
            ]);

            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_UTF8,
                'marginTop' => 0,
                'marginLeft' => 0,
                'marginRight' => 0,
                'marginBottom' => 0,
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
                'cssFile' => 'css/custom.css'
            ]);
        }

        return $pdf->render();
    }

    public function actionCheckCert()
    {
        $model = new CheckAssignmentForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($testAssignmentId = $model->check(true)) {
                return $this->redirect(['olympiad/get-cert', 'id' => $testAssignmentId]);
            }

            Yii::$app->session->setFlash('error', Yii::t('app', 'Данный ИИН не участвовал в олимпиаде'));
        }

        return $this->render('check-cert', [
            'model' => $model
        ]);
    }

    public function actionGetCertThank($id)
    {
        $testAssignment = TestAssignment::findOne(['id' => $id]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        if ($testAssignment->status !== TestAssignment::STATUS_FINISHED) {
            Yii::$app->session->setFlash('success', 'Тест аяқталмаған немесе төленбеген');
            return $this->redirect(['olympiad/view']);
        }

        $content = $this->renderPartial('_cert-thank', [
            'testAssignment' => $testAssignment
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Алғыс хат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css'
        ]);

        return $pdf->render();
    }

    public function actionGetCertThankParent($id)
    {
        $testAssignment = TestAssignment::findOne(['id' => $id]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        if ($testAssignment->status !== TestAssignment::STATUS_FINISHED) {
            Yii::$app->session->setFlash('success', 'Тест аяқталмаған немесе төленбеген');
            return $this->redirect(['olympiad/view']);
        }

        $content = $this->renderPartial('_cert-thank-parent', [
            'testAssignment' => $testAssignment
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Алғыс хат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css'
        ]);

        return $pdf->render();
    }

    public function actionGetCertThankLeader($id)
    {
        $testAssignment = TestAssignment::findOne(['id' => $id]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        if ($testAssignment->status !== TestAssignment::STATUS_FINISHED) {
            Yii::$app->session->setFlash('success', 'Тест аяқталмаған немесе төленбеген');
            return $this->redirect(['olympiad/view']);
        }

        $content = $this->renderPartial('_cert-thank-leader', [
            'testAssignment' => $testAssignment
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Алғыс хат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css'
        ]);

        return $pdf->render();
    }

    public function actionCheckCertThankParent()
    {
        $model = new CheckAssignmentForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($testAssignmentId = $model->check(true)) {
                return $this->redirect(['olympiad/get-cert-thank-parent', 'id' => $testAssignmentId]);
            }

            Yii::$app->session->setFlash('error', Yii::t('app', 'Данный ИИН не участвовал в олимпиаде'));
        }

        return $this->render('check-cert-thank-parent', [
            'model' => $model
        ]);
    }

    public function actionCheckCertThankLeader()
    {
        $model = new CheckAssignmentForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($testAssignmentId = $model->check(true)) {
                return $this->redirect(['olympiad/get-cert-thank-leader', 'id' => $testAssignmentId]);
            }

            Yii::$app->session->setFlash('error', Yii::t('app', 'Данный ИИН не участвовал в олимпиаде'));
        }

        return $this->render('check-cert-thank-leader', [
            'model' => $model
        ]);
    }

    public function actionCheckCertThank()
    {
        $model = new CheckAssignmentForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($testAssignmentId = $model->check(true)) {
                return $this->redirect(['olympiad/get-cert-thank', 'id' => $testAssignmentId]);
            }

            Yii::$app->session->setFlash('error', Yii::t('app', 'Данный ИИН не участвовал в олимпиаде'));
        }

        return $this->render('check-cert-thank', [
            'model' => $model
        ]);
    }

    public function actionCheckTest()
    {
        $model = new CheckAssignmentForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($testAssignmentId = $model->check()) {
                return $this->redirect(['olympiad/test', 'assignment' => $testAssignmentId]);
            }

            Yii::$app->session->setFlash('error', Yii::t('app', 'Данный ИИН не участвовал в олимпиаде'));
        }

        return $this->render('check-test', [
            'model' => $model
        ]);
    }

//    public function actionExportQuestions($test_subject_id)
//    {
//        $text = "";
//        $questions = Question::findAll(['test_subject_id' => $test_subject_id]);
//        foreach ($questions as $question) {
//            $text .= "" . $question->text . "\n";
//            $answers = $question->getAnswers();
//            /** @var Answer $answer */
//            foreach ($answers as $answer) {
//                $text .= $answer->text . "\n";
//            }
//        }
//    }

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
