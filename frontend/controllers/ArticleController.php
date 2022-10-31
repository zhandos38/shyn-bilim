<?php


namespace frontend\controllers;


use common\models\Article;
use common\models\Subject;
use frontend\models\ArticleSearch;
use frontend\models\MyArticleSearch;
use frontend\models\PayboxForm;
use kartik\mpdf\Pdf;
use Paybox\Pay\Facade as Paybox;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Yii;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\UploadedFile;
use common\models\ArticleWhiteList;

class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['my-list'],
                'rules' => [
                    [
                        'actions' => ['my-list'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        Yii::$app->session->setFlash('error', Yii::t('app', 'Страница в разработке'));
        return $this->redirect(['site/index']);
        //$subjects = Subject::find()->andWhere(['type' => Subject::TYPE_ARTICLE])->orderBy(['order' => SORT_ASC])->all();

        //return $this->render('index', [
        //    'subjects' => $subjects
        //]);
    }

    public function actionSuccess()
    {
        $request = Yii::$app->request->queryParams;

        if (!$this->checkSign($request, 'success')) {
            throw new Exception('Sig is not correct');
        }

        $order = Article::findOne(['id' => (int)$request[$this->toProperty('order_id')], 'status' => Article::STATUS_ACTIVE]);
        if (empty($order)) {
            throw new Exception('Order is not found');
        }

        return $this->render('success', [
            'id' => $order->id
        ]);
    }

    public function actionCert($id)
    {
        $model = Article::findOne(['id' => $id, 'status' => Article::STATUS_ACTIVE]);
        if (empty($model)) {
            throw new Exception('Article not found!');
        }

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_cert', [
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

        return $pdf->render();
    }

    public function actionList($id)
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('list', [
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionMyList()
    {
        return $this->redirect('/');
        /*$searchModel = new MyArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('my-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);*/
    }

    public function actionOrder($id = null)
    {
        $model = new Article();
        if ($id) {
            $model->subject_id = $id;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');
            $model->created_at = time();

            $model->status = Article::STATUS_ACTIVE;

            $modelExist = Article::find()->where(['iin' => $model->iin])->one();
            if ($modelExist) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Ваш материал уже опубликован'));
                return $this->redirect('/');
            }

            if ($model->fileTemp) {
                $model->file = $model->fileTemp->baseName . '.' . $model->fileTemp->extension;
            } else {
                Yii::$app->session->setFlash('error', 'Файлды жүктеу қажет');

                return $this->render('order', [
                    'model' => $model,
                ]);
            }

            if ($model->save() && $model->upload()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Ваш материал успешно опубликован!'));
                return $this->redirect(['article/cert', 'id' => $model->id]);
            }
        }

        return $this->render('order', [
            'model' => $model,
        ]);
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
