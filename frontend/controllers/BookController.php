<?php


namespace frontend\controllers;


use common\models\Article;
use common\models\Book;
use common\models\BookCategory;
use common\models\User;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;

class BookController extends Controller
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

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find(),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 8
            ]
        ]);

        $bookCategories = BookCategory::find()->all();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'bookCategories' => $bookCategories,
        ]);
    }

    public function actionCert()
    {
        $model = Yii::$app->user->identity;
        if ($model->role === User::ROLE_STUDENT) {
            if (!$model->grade) {
                Yii::$app->session->setFlash('warning', 'Сыныбынызды таңдап, қайта жүктеңіз');
                return $this->redirect(['cabinet/index']);
            }

            return $this->redirect(['book/cert-kitap-oku']);
        } else {
            if (!$model->teacher_title) {
                Yii::$app->session->setFlash('warning', 'Мұғалімдің қызмет атауын таңдаңызда, қайта жүктеңіз');
                return $this->redirect(['cabinet/index']);
            }
            return $this->redirect(['book/cert-okuga-kushtar-ustaz']);
        }
    }

    public function actionCertKitapOku()
    {
        $model = User::findOne(['id' => Yii::$app->user->identity->id]);
        if (empty($model)) {
            throw new Exception('User not found!');
        }

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_cert_kitap-oku', [
            'model' => $model,
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
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Сертификат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.bordered { border: 1px solid red }'
        ]);

        return $pdf->render();
    }

    public function actionCertOkugaKushtarUstaz()
    {
        $model = User::findOne(['id' => Yii::$app->user->identity->id]);
        if (empty($model)) {
            throw new Exception('User not found!');
        }

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_cert_okuga-kushtar-ustaz', [
            'model' => $model,
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
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Сертификат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.bordered { border: 1px solid red }'
        ]);

        return $pdf->render();
    }
}
