<?php


namespace frontend\controllers;


use common\models\Article;
use common\models\Subject;
use frontend\models\ArticleSearch;
use frontend\models\PayboxForm;
use Paybox\Pay\Facade as Paybox;
use Yii;
use yii\db\Exception;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;

class ArticleController extends Controller
{
    public function actionIndex($status = null)
    {
        $subjects = Subject::find()->all();

        $request = Yii::$app->request->queryParams;

        if (!$this->checkSign($request, 'index')) {
            throw new Exception('Sig is not correct');
        }

        if ($status === 'success') {
            Yii::$app->session->setFlash('success', 'Ваш материал успешно опубликоован');
        } else if ($status === 'fail') {
            Yii::$app->session->setFlash('error', 'Произошла какая-то ошибка, попробуйте еще раз');
        }

        return $this->render('index', [
            'subjects' => $subjects
        ]);
    }

    public function actionList($id)
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionOrder()
    {
        $model = new Article();

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
                    'pg_amount' => 25,
                    'pg_salt' => $salt,
                    'pg_order_id' => $model->id,
                    'pg_description' => 'Оплата за публикацию материала'
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

    public function actionResult()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_XML;

        $request = Yii::$app->request->queryParams;

        VarDumper::dump($request); die;

        try {
            if (!$this->checkSign($request, 'result')) {
                throw new Exception('Sig is not correct');
            }

            $data = [
                'pg_status' => 'ok'
            ];

            $order = Article::findOne(['id' => (int)$request[$this->toProperty('order_id')]]);
            if ($order === null) {
                throw new Exception('Order is not found');
            }

            $order->status = Article::STATUS_ACTIVE;
            if (!$order->save()) {
                throw new Exception('Article is not saved');
            }

            return $this->getSignByData($data, 'result');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());

            $data = [
                'pg_status' => 'error',
                'pg_error_description' => $e->getMessage(),
            ];

            return $this->getSignByData($data, 'result');
        }
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