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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function() {
                            if (!Yii::$app->user->identity->checkSubscription()) {
                                Yii::$app->session->setFlash('error', 'Сіз жазылмағансыз немесе жазылым уақыты өтіп кеткен');
                                return false;
                            }

                            return true;
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionIndex($type = Olympiad::TYPE_STUDENT)
    {
        $teacherOlympiads = Olympiad::find()->andWhere(['type' => Olympiad::TYPE_TEACHER])->andWhere(['is_actual' => true])->orderBy(['order' => SORT_ASC])->all();
        $studentOlympiads = Olympiad::find()->andWhere(['type' => Olympiad::TYPE_STUDENT])->andWhere(['is_actual' => true])->orderBy(['order' => SORT_ASC])->all();

        return $this->render('index', [
            'teacherOlympiads' => $teacherOlympiads,
            'studentOlympiads' => $studentOlympiads,
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
        $user = Yii::$app->user->identity;

        $model->olympiad_id = $id;
        $model->name = $user->name;
        $model->surname = $user->surname;
        $model->patronymic = $user->patronymic;
        $model->school_id = $user->school_id;
        $model->phone = $user->phone;

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
            // check for finish
            $testAssignment = TestAssignment::find()
                ->andWhere(['olympiad_id' => $model->olympiad_id, 'phone' => $model->phone, 'status' => TestAssignment::STATUS_FINISHED])
                ->andFilterWhere(['subject_id' => $model->subject_id])
                ->one();
            if ($testAssignment) {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Тест өтіліп қойылған, егерде өтпеген болсаңыз бізге хабарласыңыз, Рахмет!'));

                return $this->render('assignment', [
                    'model' => $model,
                    'olympiad' => $olympiad,
                ]);
            }

            // check for test existance
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
            $model->status = TestAssignment::STATUS_ACTIVE;
            if (!$model->save()) {
                throw new Exception('Assignment is not saved');
            }

            return $this->redirect(['test', 'assignment' => $model->id]);
        }
//        VarDumper::dump($model->errors); die;

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
            ->andWhere(['lang' => $model->lang])
            ->andFilterWhere([
                'and',
                ['<=', 'grade_from', $model->grade],
                ['>=', 'grade_to', $model->grade]
            ]);


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
        
        if ($testAssignment->status === TestAssignment::STATUS_OFF) {
            Yii::$app->session->setFlash('success', 'Тест төленбеген!');
            return $this->redirect('/');
        }

        if ($testAssignment->status === TestAssignment::STATUS_FINISHED) {
            Yii::$app->session->setFlash('success', 'Тест уже пройден!');
            return $this->redirect('/');
        }

        return $this->render('test', [
            'assignment_id' => $testAssignment->id,
            'olympiad_name' => $testAssignment->olympiad->name,
            'grade' => $testAssignment->grade,
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
                $questions = Question::find()->andWhere(['test_id' => $test->id])->orderBy("RAND()")->limit($test->question_limit)->all();

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

        $olympiad = Olympiad::findOne(['id' => $testAssignment->olympiad_id]);
        if ($olympiad === null) {
            Yii::$app->session->setFlash('error', 'Олимпиала не началась');
            return $this->redirect(['site/index']);
        }

        $place = null;
        if ($testAssignment->point >= $olympiad->third_place_start) {
            $place = 'III ОРЫН';
        }

        if ($testAssignment->point >= $olympiad->second_place_start && $testAssignment->point <= $olympiad->second_place_end) {
            $place = 'II ОРЫН';
        }

        if ($testAssignment->point >= $olympiad->first_place_start && $testAssignment->point <= $olympiad->first_place_end) {
            $place = 'I ОРЫН';
        }

        if ($testAssignment->point >= $olympiad->grand_place_start && $testAssignment->point <= $olympiad->grand_place_end) {
            $place = 'Бас жүлде';
        }

        if ($testAssignment->point >= $olympiad->third_place_start) {
            $content = $this->renderPartial($testAssignment->olympiad->getFolderPath('_diploma'), [
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
                'orientation' =>  $testAssignment->olympiad->is_landscape_diploma_orientation ? Pdf::ORIENT_LANDSCAPE : Pdf::ORIENT_PORTRAIT,
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
            $content = $this->renderPartial($testAssignment->olympiad->getFolderPath('_cert'), [
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
                'orientation' =>  $testAssignment->olympiad->is_landscape_cert_orientation ? Pdf::ORIENT_LANDSCAPE : Pdf::ORIENT_PORTRAIT,
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

        $content = $this->renderPartial($testAssignment->olympiad->getFolderPath('_cert-thank'), [
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
            'orientation' =>  $testAssignment->olympiad->is_landscape_cert_thank_leader_orientation ? Pdf::ORIENT_LANDSCAPE : Pdf::ORIENT_PORTRAIT,
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

        $content = $this->renderPartial($testAssignment->olympiad->getFolderPath('_cert-thank-parent'), [
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
            'orientation' =>  $testAssignment->olympiad->is_landscape_cert_thank_parent_orientation ? Pdf::ORIENT_LANDSCAPE : Pdf::ORIENT_PORTRAIT,
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
            return $this->redirect('/');
        }

        if ($testAssignment->point <= 6) {
            Yii::$app->session->setFlash('success', 'Орын алмағансыз, балыңыз жетпейді');
            return $this->redirect('/');
        }

        $content = $this->renderPartial($testAssignment->olympiad->getFolderPath('_cert-thank-leader'), [
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
            'orientation' =>  $testAssignment->olympiad->is_landscape_cert_thank_leader_orientation ? Pdf::ORIENT_LANDSCAPE : Pdf::ORIENT_PORTRAIT,
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

    public function actionCheckTestAlt()
    {
        $olympiad = Olympiad::findOne(['is_actual' => true]);
        if ($olympiad->status === Olympiad::STATUS_FINISHED) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада завершилась'));
            return $this->redirect(['site/index']);
        }

        if ($olympiad->status === Olympiad::STATUS_NEW) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада еще не началась'));
            return $this->redirect(['site/index']);
        }

        $model = new CheckAssignmentForm();
        $model->olympiad_id = $olympiad->id;

        if ($model->load(Yii::$app->request->post())) {
            // Check test assignment
            $testAssignment = TestAssignment::find()->andWhere(['olympiad_id' => $model->olympiad_id, 'iin' => $model->iin, 'status' => TestAssignment::STATUS_FINISHED])->one();
            if ($testAssignment) {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Тест уже пройден'));

                return $this->render('/');
            }


            if ($testAssignmentId = $model->check()) {
                return $this->redirect(['olympiad/test', 'assignment' => $testAssignmentId]);
            }

            Yii::$app->session->setFlash('error', Yii::t('app', 'Данный ИИН не участвовал в олимпиаде'));
        }

        return $this->render('check-test-alt', [
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
