<?php
namespace frontend\controllers;

use common\models\City;
use common\models\Mark;
use common\models\News;
use common\models\Post;
use common\models\School;
use common\models\Subscribe;
use common\models\User;
use Exception;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\SubscribeForm;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
        $this->layout = 'home';
        $news = News::find()->orderBy(['id' => SORT_DESC])->limit(3)->all();

        return $this->render('index', [
            'news' => $news
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
            Yii::$app->session->setFlash('success', 'Спасибо за регистрацию');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionQuestions()
    {
        return $this->render('questions');
    }

    public function actionInfo()
    {
        phpinfo();
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
        $model = new SubscribeForm();
        if ($model->load(Yii::$app->request->post()) && $orderId = $model->save()) {
            $salt = $this->getSalt(8);
            $request = [
                'pg_merchant_id' => Yii::$app->params['payboxId'],
                'pg_amount' => 3000,
                'pg_salt' => $salt,
                'pg_order_id' => $orderId,
                'pg_description' => 'Оплата за подписку',
                'pg_success_url' => Url::base('https') . '/site/subscribe-success',
                'pg_result_url' => Yii::$app->params['apiDomain'] . '/subscribe/result',
                'pg_result_url_method' => 'POST',
            ];

            $request = $this->getSignByData($request, 'payment.php', $salt);

            $query = http_build_query($request);

            return $this->redirect('https://api.paybox.money/payment.php?' . $query);
        }
        /** @var User $user */
        $user = Yii::$app->user->identity;
        $model->school_id = $user->school_id;
        $model->post = $user->post;
        $model->address = $user->address;

        return $this->render('subscribe', [
            'model' => $model,
        ]);
    }

    public function actionSubscribeSuccess()
    {
        $request = Yii::$app->request->queryParams;

        if (!$this->checkSign($request, 'success')) {
            throw new Exception('Sig is not correct');
        }

        $model = Subscribe::find()
            ->andWhere(['id' => $request[$this->toProperty('order_id')]])
            ->andWhere(['status' => Subscribe::STATUS_ACTIVE])
            ->one();

        if (empty($model)) {
            throw new Exception('Ошибка платежа, платеж не был совершен, попытайтесь снова или свяжитесь с администрацией сайта');
        }

        return $this->redirect(['site/subscribe']);
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
