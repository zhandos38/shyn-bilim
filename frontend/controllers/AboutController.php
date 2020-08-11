<?php


namespace frontend\controllers;


use yii\web\Controller;

class AboutController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEducationCenter()
    {
        $this->layout = 'full';
        return $this->render('education-center');
    }

    public function actionPrinting()
    {
        return $this->render('printing');
    }

    public function actionPhotoStudio()
    {
        return $this->render('photo-studio');
    }
}