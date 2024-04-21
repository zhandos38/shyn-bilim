<?php
namespace app\controllers;


use common\models\Article;
use common\models\Subscribe;
use common\models\Test;
use common\models\TestAssignment;
use common\models\User;
use common\models\WhiteList;
use Yii;
use yii\db\Exception;
use yii\filters\auth\AuthInterface;
use yii\filters\auth\AuthMethod;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\rest\Controller;

/**
 * Class SiteController
 * @package api\controllers
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        return [
            'version' => '1.0.0',
        ];
    }

    public function actionResult()
    {
        $request = Yii::$app->request->bodyParams;

        try {
            if (!$this->checkSign($request, 'result')) {
                throw new Exception('Sig is not correct');
            }

            $data = [
                'pg_status' => 'ok'
            ];

            $order = Article::findOne(['id' => (int)$request[$this->toProperty('order_id')]]);
            if (empty($order)) {
                throw new Exception('Order is not found');
            }

            $order->status = Article::STATUS_ACTIVE;
            if (!$order->save()) {
                throw new Exception(Json::encode($order->getErrors()));
            }

            return $this->getSignByData($data, 'result');
        } catch (Exception $e) {

            $data = [
                'pg_status' => 'error',
                'pg_error_description' => $e->getMessage(),
            ];

            return $this->getSignByData($data, 'result');
        }
    }

    public function actionOlympiadResult()
    {
        $request = Yii::$app->request->bodyParams;

        try {
            if (!$this->checkSign($request, 'result')) {
                throw new Exception('Sig is not correct');
            }

            $data = [
                'pg_status' => 'ok'
            ];

            $order = TestAssignment::findOne(['id' => (int)$request[$this->toProperty('order_id')]]);
            if (empty($order)) {
                throw new Exception('Order is not found');
            }

            if ((int)$request[$this->toProperty('result')]) {
                $whiteList = new WhiteList();
                $whiteList->iin = $order->iin;
                if (!$whiteList->save()) {
                    throw new Exception(Json::encode($order->getErrors()));
                }

//                $order->status = TestAssignment::STATUS_ACTIVE;
//                if (!$order->save()) {
//                    throw new Exception(Json::encode($order->getErrors()));
//                }
            }

            return $this->getSignByData($data, 'result');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function actionSubscribeResult()
    {
        $request = Yii::$app->request->bodyParams;

        try {
            if (!$this->checkSign($request, 'result')) {
                throw new Exception('Sig is not correct');
            }

            $data = [
                'pg_status' => 'ok'
            ];

            $order = Subscribe::findOne(['id' => (int)$request[$this->toProperty('order_id')]]);
            if (empty($order)) {
                throw new Exception('Order subscribe is not found');
            }

            if ((int)$request[$this->toProperty('result')]) {
                $order->status = Subscribe::STATUS_ACTIVE;
                if (!$order->save()) {
                    throw new Exception(Json::encode($order->getErrors()));
                }

                $user = User::findOne(['id' => $order->user_id]);
                $currentDate = date('Y-m-d');
                $newDate = date('Y-m-d', (strtotime($currentDate) + 60 * 60 * 60 * 24));
                $user->subscribe_until = $newDate;
                $user->article_count = $user->role === User::ROLE_TEACHER ? 3 : 1;

                if (!$user->save()) {
                    throw new Exception(Json::encode($order->getErrors()));
                }
            }

            return $this->getSignByData($data, 'result');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
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
