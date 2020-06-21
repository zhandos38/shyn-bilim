<?php


namespace frontend\controllers;


use yii\web\Controller;

class ProjectController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}