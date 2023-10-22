<?php
namespace frontend\controllers;

use common\models\City;
use common\models\Marathon;
use common\models\Mark;
use common\models\News;
use common\models\Olympiad;
use common\models\Post;
use common\models\School;
use common\models\SmsLog;
use common\models\Subject;
use common\models\Subscribe;
use common\models\User;
use Exception;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\SubscribeForm;
use frontend\models\VerificationForm;
use frontend\models\VerifyEmailForm;
use kartik\mpdf\Pdf;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\VarDumper;
use yii\web\HttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'subscribe'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'subscribe'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $olympiad = Olympiad::findOne(['is_actual' => true]);

        return $this->render('index', [
            'olympiad' => $olympiad
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
         if (!Yii::$app->user->isGuest) {
             return $this->goHome();
         }

         $model = new LoginForm();
         if ($model->load(Yii::$app->request->post()) && $model->login()) {
             return $this->goBack();
         } else {
             $model->password = '';

             return $this->render('login', [
                 'model' => $model,
             ]);
         }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['site/verification']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionVerification()
    {
        $model = new VerificationForm();
        $model->phone = Yii::$app->session->get('phone');

        if ($model->load(Yii::$app->request->post()) && $model->verify()) {
            Yii::$app->session->setFlash('success', 'Тіркелу сәтті аяқталды, бізбен болғаныңыз үшін рахмет!');

            return $this->redirect(['site/login']);
        }

        return $this->render('verification', [
            'model' => $model
        ]);
    }

    public function actionResendVerificationCode()
    {
        if (Yii::$app->request->isAjax) {
            try {
                $user = User::findOne(['phone' => Yii::$app->session->get('phone')]);
                if (!$user) {
                    throw new Exception('Пользователь не найден');
                }

                if ((time() - $user->lastSMS->created_at) <= 60) {
                    return 'Подаждите пока наступить ваше время ;)';
                }

                SmsLog::sendSms($user->phone, $user->verification_code . ' - Bilimshini', $user->id);
                return true;
            } catch (Exception $exception) {
                throw new Exception($exception->getMessage());
            }
        }

        return false;
    }

    public function actionQuestions()
    {
        return $this->render('questions');
    }

    public function actionGetCities($id)
    {
        if (Yii::$app->request->isAjax) {
            $cities = City::findAll(['region_id' => $id]);
            return Json::encode($cities);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function actionGetSchools($id)
    {
        if (Yii::$app->request->isAjax) {
            $cities = School::findAll(['city_id' => $id]);
            return Json::encode($cities);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function actionGetSubjects($grade)
    {
        if (Yii::$app->request->isAjax) {
            $subjects = Subject::find()->andWhere(['like', 'grades', $grade])->all();
            return Json::encode($subjects);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function actionCert()
    {
//        $results = Result::find()
//            ->alias('t1')
//            ->joinWith('test t2')
//            ->andWhere(['>=', 't1.point', 0])
//            ->andWhere(['<=', 't1.point', 20])
//            ->andWhere(['t2.lang' => 'ru'])
////            ->limit(1)
//            ->all();

        $results = Yii::$app->db->createCommand("select * from diploma")->queryAll();

//        $number = 38;
        foreach ($results as $result) {
            // get your HTML raw content without any layouts or scripts
            $content = $this->renderPartial('_cert', ['user' => $result]);

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
                'marginTop' => 0,
                'marginLeft' => 0,
                'marginRight' => 0,
                'marginBottom' => 0,
                // your html content input
                'content' => $content,
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
                'filename' =>  'C:/diploma/' . $result['protocol_number'] . ' - ' . $result['full_name_kz'] . '.pdf'
            ]);

            // return the pdf output as per the destination settin
            return $pdf->render();
//            $number++;
        }
    }

    public function actionSubscribe()
    {
        $user = Yii::$app->user->identity;

        $subscribe = new Subscribe();
        $subscribe->user_id = $user->id;
        $subscribe->created_at = time();
        if (!$subscribe->save()) {
            throw new \yii\db\Exception('Subscribe error!');
        }
        $subscribeId = $subscribe->id;

        $salt = $this->getSalt(8);
        $request = [
            'pg_merchant_id' => Yii::$app->params['payboxId'],
            'pg_amount' => Yii::$app->user->identity->role === User::ROLE_TEACHER ? Yii::$app->params['teacherSubscribeCost'] : Yii::$app->params['studentSubscribeCost'],
            'pg_salt' => $salt,
            'pg_order_id' => $subscribeId,
            'pg_description' => 'Оплата за подписку',
            'pg_success_url' => Url::base('https') . '/site/subscribe-success',
            'pg_result_url' => Yii::$app->params['apiDomain'] . '/subscribe/result',
            'pg_result_url_method' => 'POST',
        ];

        $request = $this->getSignByData($request, 'payment.php', $salt);

        $query = http_build_query($request);

        return $this->redirect('https://api.paybox.money/payment.php?' . $query);
    }

    public function actionSubscribeSuccess()
    {
        $request = Yii::$app->request->queryParams;

        if (!$this->checkSign($request, 'subscribe-success')) {
            throw new Exception('Sig is not correct');
        }

        $model = Subscribe::find()
            ->andWhere(['id' => $request[$this->toProperty('order_id')]])
            ->andWhere(['status' => Subscribe::STATUS_ACTIVE])
            ->one();

        if (empty($model)) {
            throw new Exception('Ошибка платежа, платеж не был совершен, попытайтесь снова или свяжитесь с администрацией сайта');
        }

        Yii::$app->session->setFlash('success', 'Сіз сәтті жазылдыңыз. Рахмет!');
        return $this->redirect(['cabinet/index']);
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
