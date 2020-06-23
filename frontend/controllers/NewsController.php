<?php


namespace frontend\controllers;


use common\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find(),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 8
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $model = News::findOne(['id' => $id]);

        return $this->render('view', [
            'model' => $model
        ]);
    }
}