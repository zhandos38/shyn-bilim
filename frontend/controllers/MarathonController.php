<?php


namespace frontend\controllers;


use common\models\Marathon;
use Yii;
use yii\web\Controller;

class MarathonController extends Controller
{
    public function actionAssignment()
    {
        $model = new Marathon();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['marathon/book', 'grade' => $model->grade]);
        }

        return $this->render('assignment', [
            'model' => $model
        ]);
    }

    public function actionBook($grade)
    {
        return $this->render('book', [
            'grade' => (int)$grade
        ]);
    }
}