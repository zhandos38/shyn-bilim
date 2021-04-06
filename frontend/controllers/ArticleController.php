<?php


namespace frontend\controllers;


use common\models\Article;
use common\models\Subject;
use frontend\models\ArticleSearch;
use frontend\models\PayboxForm;
use kartik\mpdf\Pdf;
use Paybox\Pay\Facade as Paybox;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Yii;
use yii\db\Exception;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\UploadedFile;

class ArticleController extends Controller
{
    public function actionIndex($status = null)
    {
//        Yii::$app->session->setFlash('error', Yii::t('app', 'Страница в разработке'));
//        return $this->redirect(['site/index']);
        $subjects = Subject::find()->andWhere(['type' => Subject::TYPE_ARTICLE])->all();

        return $this->render('index', [
            'subjects' => $subjects
        ]);
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

    public function actionOrder($id)
    {
        $model = new Article();
        $model->subject_id = $id;

        if ($model->load(Yii::$app->request->post())) {
            $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');
            $model->created_at = time();

            if ($model->fileTemp) {
                $model->file = $model->fileTemp->baseName . '.' . $model->fileTemp->extension;
            }

            if ($model->save() && $model->upload()) {

                $salt = $this->getSalt(8);
                $request = [
                    'pg_merchant_id' => Yii::$app->params['payboxId'],
                    'pg_amount' => 1000,
                    'pg_salt' => $salt,
                    'pg_order_id' => $model->id,
                    'pg_success_url_method' => 'GET',
                    'pg_description' => 'Оплата за публикацию материала',
                    'pg_result_url' => Yii::$app->params['apiDomain'] . '/result',
                    'pg_result_url_method' => 'POST',
                ];

                $request = $this->getSignByData($request, 'payment.php', $salt);

                $query = http_build_query($request);

                return $this->redirect('https://api.paybox.money/payment.php?' . $query);
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