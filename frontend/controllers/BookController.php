<?php


namespace frontend\controllers;


use common\models\Book;
use common\models\BookCategory;
use Yii;
use yii\data\ActiveDataProvider;
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
}