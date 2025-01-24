<?php


namespace frontend\controllers;


use common\models\Answer;
use common\models\Olympiad;
use common\models\Question;
use common\models\Test;
use common\models\TestAssignment;
use common\models\WhiteList;
use frontend\models\CheckAssignmentForm;
use frontend\models\TestAssignmentStudentForm;
use frontend\models\TestAssignmentTeacherForm;
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
            Yii::$app->session->setFlash('error', '«Altyn Qyran 2024» басталу уақыты 14 қазан');
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

    public function actionAssignment($id, $test = null)
    {
        $olympiad = Olympiad::findOne(['id' => $id]);

        // Проверка на неактивность
        if ($olympiad->status === Olympiad::STATUS_FINISHED) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада завершилась'));
            return $this->redirect(['site/index']);
        }

        // Проверка на неактивность
        if ($olympiad->status === Olympiad::STATUS_NEW && $test !== 'admin') {
            Yii::$app->session->setFlash('error', 'Олимпиада 10 ақпанда басталады. Тіркелу бойынша осы нөмірдің біріне жазыңыз 📞+7(775)424-37-27, 📞+7(775)403-72-84');
            return $this->redirect(['site/index']);
        }

        $model = $olympiad->type === Olympiad::TYPE_STUDENT ? new TestAssignmentStudentForm() : new TestAssignmentTeacherForm();
        $model->status = TestAssignment::STATUS_OFF;
        $model->olympiad_id = $id;
        $model->lang = 'KZ';

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            // Проверка на математику
//            if ($model->subject_id == 1) {
//                Yii::$app->session->setFlash('warning', 'Техникалық қателікке байланысты жабық! 19:00-де ашылады');
//                return $this->render('assignment', [
//                    'model' => $model,
//                    'olympiad' => $olympiad,
//                ]);
//            }

            // Проверка на завершенность теста
            $testAssignment = TestAssignment::find()
                ->andWhere(['olympiad_id' => $model->olympiad_id, 'iin' => $model->iin, 'subject_id' => $model->subject_id, 'grade' => $model->grade])
                ->andWhere(['or', ['status' => TestAssignment::STATUS_FINISHED], ['status' => TestAssignment::STATUS_CERT_PAID]])
                ->one();

            if ($testAssignment) {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Тест өтіліп қойылған, егерде өтпеген болсаңыз бізге хабарласыңыз, Рахмет!'));

                return $this->render('assignment', [
                    'model' => $model,
                    'olympiad' => $olympiad,
                ]);
            }

            // Проверка на есть ли тест или нет
            /** @var Test $test */
//            VarDumper::dump($model,10 ,1); die;
            $tests = $this->getTestsByAssignment($model);
            if (!$tests) {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Тест не найден'));

                return $this->render('assignment', [
                    'model' => $model,
                    'olympiad' => $olympiad,
                ]);
            }

            $model->created_at = time();

            // Проверка если сертификат платный то пропустить на тест
            if ($model->olympiad->is_cert_paid) {
                $model->status = TestAssignment::STATUS_ACTIVE;

                if (!$model->save()) {
                    throw new Exception('Assignment is not saved');
                }

                return $this->redirect(['test', 'assignment' => $model->id]);
            }

            // Проверка на белый список
            $whiteList = WhiteList::findOne(['iin' => $model->iin, 'olympiad_id' => $model->olympiad_id]);
            if ($whiteList !== null) {
                $model->status = TestAssignment::STATUS_ACTIVE;
            }

            $model->iin = trim($model->iin);
            if (!$model->save()) {
                throw new Exception(VarDumper::dumpAsString($model->errors));
            }

            if ($whiteList === null) {
//                Yii::$app->session->setFlash('error', 'Техникалық ақаулықтарға байланысты уақытша тек Каспий арқылы төлем жасауға болады. Ыңғайсыздық үшін кешірім сұраймыз');
//
//                return $this->render('assignment', [
//                    'model' => $model,
//                    'olympiad' => $olympiad,
//                ]);
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
            return $this->render('success', [
                'orderId' => $request[$this->toProperty('order_id')]
            ]);
        }

        return $this->redirect(['test', 'assignment' => $model->id]);
    }

    public function actionCheckPayment($id)
    {
        $model = TestAssignment::find()
            ->andWhere(['id' => $id])
            ->andWhere(['status' => TestAssignment::STATUS_ACTIVE])
            ->one();

        return empty($model);
    }

    public function actionCertPaySuccess()
    {
        $request = Yii::$app->request->queryParams;

        if (!$this->checkSign($request, 'cert-pay-success')) {
            throw new Exception('Sig is not correct');
        }

        $model = TestAssignment::findOne(['id' => $request[$this->toProperty('order_id')], 'status' => TestAssignment::STATUS_CERT_PAID]);

        if (empty($model)) {
            $this->redirect('check-cert');
        }

        return $this->redirect(['cert', 'assignment' => $model->id]);
    }

    public function actionCert($assignment)
    {
        $testAssignment = TestAssignment::findOne(['id' => $assignment]);

        // Проверка на наличие место
//        if ($testAssignment->olympiad->type === Olympiad::TYPE_STUDENT && $testAssignment->point < $testAssignment->olympiad->third_place_start) {
//            Yii::$app->session->setFlash('success', 'Нәтиже балы жеткіліксіз');
//            return $this->redirect(['olympiad/index']);
//        }

        if ($testAssignment->olympiad->is_cert_paid) {
            if ($testAssignment->status === TestAssignment::STATUS_CERT_PAID) {
                return $this->render('cert', ['testAssignment' => $testAssignment]);
            }

            $whiteList = WhiteList::find()->andWhere(['iin' => $testAssignment->iin, 'olympiad_id' => $testAssignment->olympiad_id])->one();
            if (!$whiteList) {
                $salt = $this->getSalt(8);
                $request = [
                    'pg_merchant_id' => Yii::$app->params['payboxId'],
                    'pg_amount' => $testAssignment->olympiad->price,
                    'pg_salt' => $salt,
                    'pg_order_id' => $testAssignment->id,
                    'pg_description' => 'Оплата за диплом/сертификат',
                    'pg_success_url' => Url::base('https') . '/olympiad/cert-pay-success',
                    'pg_result_url' => Yii::$app->params['apiDomain'] . '/olympiad/result',
                    'pg_result_url_method' => 'POST',
                ];

                $request = $this->getSignByData($request, 'payment.php', $salt);

                $query = http_build_query($request);

                return $this->redirect('https://api.paybox.money/payment.php?' . $query);
            }
            $testAssignment->status = TestAssignment::STATUS_CERT_PAID;
            if (!$testAssignment->save()) {
                throw new Exception('Test Assignment save error');
            }
        }

        return $this->render('cert', ['testAssignment' => $testAssignment]);
    }

    public function getTestsByAssignment(TestAssignment $model)
    {
        $query = Test::find()
            ->andWhere(['olympiad_id' => $model->olympiad_id])
            ->andWhere(['subject_id' => $model->subject_id])
            ->andWhere(['lang' => $model->lang])
            ->andFilterWhere([
                'and',
                ['<=', 'grade_from', $model->grade],
                ['>=', 'grade_to', $model->grade]
            ]);


//        if (!empty($model->subject_id)) {
//            $query->andWhere(['subject_id' => $model->subject_id]);
//        }

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
            'testAssignment' => $testAssignment,
            'olympiad' => $testAssignment->olympiad,
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

        if ($testAssignment->status !== TestAssignment::STATUS_FINISHED && $testAssignment->status !== TestAssignment::STATUS_CERT_PAID) {
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
            $template = "_diploma";
            $cityId = $regionId = $testAssignment->school->city_id;
            $regionId = $testAssignment->school->city->region_id;
            if ($olympiad->id === 23 && $cityId === 3) {
                $template = "shymkent/_diploma";
                if ($testAssignment->point === 29 || $testAssignment->point === 30) {
                    $template = "shymkent/_diploma_grand";
                }
            } else if ($olympiad->id === 23 && $regionId === 14) {
                $template = "turkestan/_diploma";
                if ($testAssignment->point === 29 || $testAssignment->point === 30) {
                    $template = "turkestan/_diploma_grand";
                }
            }

            $content = $this->renderPartial($testAssignment->olympiad->getFolderPath($template), [
                'testAssignment' => $testAssignment,
                'place' => $place,
            ]);

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8,
                'format' => Pdf::FORMAT_A4,
                'marginTop' => 0,
                'marginLeft' => 0,
                'marginRight' => 0,
                'marginBottom' => 0,
                'orientation' =>  $testAssignment->olympiad->is_landscape_diploma_orientation ? Pdf::ORIENT_LANDSCAPE : Pdf::ORIENT_PORTRAIT,
                'destination' => Pdf::DEST_BROWSER,
                'filename' => 'Диплом.pdf',
                'content' => $content,
                'cssFile' => 'css/cert.css'
            ]);
        } else {
            $content = $this->renderPartial($testAssignment->olympiad->getFolderPath('_cert'), [
                'testAssignment' => $testAssignment,
            ]);

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8,
                'marginTop' => 0,
                'marginLeft' => 0,
                'marginRight' => 0,
                'marginBottom' => 0,
                'format' => Pdf::FORMAT_A4,
                'orientation' =>  $testAssignment->olympiad->is_landscape_cert_orientation ? Pdf::ORIENT_LANDSCAPE : Pdf::ORIENT_PORTRAIT,
                'destination' => Pdf::DEST_BROWSER,
                'filename' => 'Сертификат.pdf',
                'content' => $content,
                'cssFile' => 'css/cert.css'
            ]);
        }

        return $pdf->render();
    }

    public function actionCheckCert()
    {
        $model = new CheckAssignmentForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($testAssignmentId = $model->check(true)) {
                return $this->redirect(['olympiad/cert', 'assignment' => $testAssignmentId]);
            }

            Yii::$app->session->setFlash('error', Yii::t('app', 'Данный ИИН не участвовал в олимпиаде'));
        }

        return $this->render('check-cert', [
            'model' => $model
        ]);
    }

    public function actionGetCertThankParent($id)
    {
        $testAssignment = TestAssignment::findOne(['id' => $id]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        if ($testAssignment->status !== TestAssignment::STATUS_FINISHED && $testAssignment->status !== TestAssignment::STATUS_CERT_PAID) {
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
            'cssFile' => 'css/custom.css'
        ]);

        return $pdf->render();
    }

    public function actionGetCertThankLeader($id)
    {
        $testAssignment = TestAssignment::findOne(['id' => $id]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        if ($testAssignment->status !== TestAssignment::STATUS_FINISHED && $testAssignment->status !== TestAssignment::STATUS_CERT_PAID) {
            Yii::$app->session->setFlash('success', 'Тест аяқталмаған немесе төленбеген');
            return $this->redirect('/');
        }

        if ($testAssignment->point < $testAssignment->olympiad->third_place_start) {
            Yii::$app->session->setFlash('success', 'Орын алмағансыз, балыңыз жетпейді');
            return $this->redirect('/');
        }

        $olympiad = $testAssignment->olympiad;
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
        $content = $this->renderPartial($testAssignment->olympiad->getFolderPath('_cert-thank-leader'), [
            'testAssignment' => $testAssignment,
            'place' => $place,
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
            'cssFile' => 'css/custom.css'
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

            Yii::$app->session->setFlash('error', 'Бұл ЖСН олипиадаға қатысып, аяқтап қойылған немесе мүлдем қатыспаған');
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
