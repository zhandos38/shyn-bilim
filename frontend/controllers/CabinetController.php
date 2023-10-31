<?php


namespace frontend\controllers;


use common\models\User;
use frontend\models\ProfileForm;
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
        $user = Yii::$app->user->identity;

        $model = new ProfileForm();
        $model->name = $user->name;
        $model->surname = $user->surname;
        $model->patronymic = $user->patronymic;
        $model->address = $user->address;
        $model->school_id = $user->school_id;
        $model->grade = $user->grade;
        $model->teacher_title = $user->teacher_title;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('index', [
                'model' => $model
            ]);
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }
}