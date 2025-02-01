<?php


namespace frontend\controllers;


use common\models\Magazine;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class MagazineController extends Controller
{
     public function actionIndex()
     {
         $dataProvider = new ActiveDataProvider([
             'query' => Magazine::find(),
             'sort' => [
                 'defaultOrder' => [
                     'order' => SORT_ASC
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
}
