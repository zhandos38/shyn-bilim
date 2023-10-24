<?php


namespace frontend\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class CabinetController extends Controller
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
                    ],
                ],
//                'denyCallback' => function() {
//                    Yii::$app->session->setFlash('error', 'Сіздің аккаунтыңыз расталмаған, смс арқылы растау қажет');
//                    return Yii::$app->response->redirect(['site/login']);
//                },
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}