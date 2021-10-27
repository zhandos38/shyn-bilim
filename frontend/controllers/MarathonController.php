<?php


namespace frontend\controllers;


use common\models\Marathon;
use frontend\models\CheckAssignmentForm;
use Yii;
use yii\web\Controller;

class MarathonController extends Controller
{
    public function actionAssignment()
    {
       /* Yii::$app->session->setFlash('error', Yii::t('app', 'МАРАФОН НАЧИНАЕТСЯ 1 НОЯБРЯ'));
        return $this->redirect(['site/index']);*/

        $model = new Marathon();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['marathon/book', 'grade' => $model->grade]);
        }

        $checkAssignmentForm = new CheckAssignmentForm();
        return $this->render('assignment', [
            'model' => $model,
            'checkAssignmentForm' => $checkAssignmentForm
        ]);
    }

    public function actionBook($grade)
    {
        return $this->render('book', [
            'grade' => (int)$grade
        ]);
    }

    public function actionCheckAssignment()
    {
        $model = new CheckAssignmentForm();
        if ($model->load(Yii::$app->request->post())) {
            $marathon = Marathon::findOne(['iin' => $model->iin]);

            if ($marathon === null) {
                Yii::$app->session->setFlash('error', 'Вашу анкету не удалось найти');
                return $this->redirect(['marathon/assignment']);
            }

            return $this->redirect(['marathon/book', 'grade' => $marathon->grade]);
        }

        return false;
    }
}