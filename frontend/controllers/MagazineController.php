<?php


namespace frontend\controllers;


use yii\web\Controller;

class MagazineController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}