<?php


namespace frontend\controllers;


use common\models\Marathon;
use common\models\Olympiad;
use common\models\TestAssignment;
use frontend\models\CheckAssignmentForm;
use frontend\models\ExtraAssignmentForm;
use Yii;
use yii\db\Exception;
use yii\web\Controller;

class MarathonController extends Controller
{
    public function actionAssignment()
    {
//        Yii::$app->session->setFlash('error', Yii::t('app', 'МАРАФОН НАЧИНАЕТСЯ 1 НОЯБРЯ'));
//        return $this->redirect(['site/index']);

        $model = new Marathon();
        if ($model->load(Yii::$app->request->post())) {
            $marathon = Marathon::findOne(['iin' => $model->iin]);

            if ($marathon !== null) {
                Yii::$app->session->setFlash('error', 'Данный ИИН уже зарегистрирован');
                return $this->redirect(['marathon/assignment']);
            }

            if (!$model->save()) {
                throw new Exception('Marathon save error!');
            }
            return $this->redirect(['marathon/book', 'assignment_id' => $model->id]);
        }

        $checkAssignmentForm = new CheckAssignmentForm();
        return $this->render('assignment', [
            'model' => $model,
            'checkAssignmentForm' => $checkAssignmentForm
        ]);
    }

    public function actionBook($assignment_id)
    {
        $assignment = Marathon::findOne(['id' => $assignment_id]);
        if ($assignment === null) {
            throw new Exception('Assignment is not found!');
        }

        return $this->render('book', [
            'grade' => (int)$assignment->grade
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

            return $this->redirect(['marathon/book', 'assignment_id' => $marathon->id]);
        }

        return false;
    }

    public function actionFindAssignment()
    {
        $model = new CheckAssignmentForm();
        if ($model->load(Yii::$app->request->post())) {
            $marathon = Marathon::findOne(['iin' => $model->iin]);

            if ($marathon === null) {
                Yii::$app->session->setFlash('error', 'Вашу анкету не удалось найти');
                return $this->redirect(['olympiad/index']);
            }

            return $this->redirect(['marathon/extra-assignment', 'assignment_id' => $marathon->id]);
        }

        return $this->render('find-assignment');
    }

    public function actionExtraAssignment($assignment_id)
    {
        $model = new ExtraAssignmentForm();
        if ($model->load(Yii::$app->request->post())) {
            $marathonAssignment = Marathon::findOne(['id' => $assignment_id]);

            if (!empty($marathonAssignment)) {
                throw new Exception('Marathon Assignment is not found');
            }

            $testAssignment = new TestAssignment();
            $testAssignment->name = $marathonAssignment->name;
            $testAssignment->surname = $marathonAssignment->surname;
            $testAssignment->patronymic = $marathonAssignment->patronymic;
            $testAssignment->iin = $marathonAssignment->iin;
            $testAssignment->school_id = $marathonAssignment->school_id;
            $testAssignment->grade = $marathonAssignment->grade;
            $testAssignment->leader_name = $model->leader_name;
            $testAssignment->parent_name = $model->parent_name;
            if ($testAssignment->save()) {
                throw new Exception('Test Assignment is not found!');
            }

            return $this->redirect(['olympiad/extra-assignment', 'assignment_id' => $marathon->id]);
        }

        return $this->render('extra-assignment', [
            'model' => $model
        ]);
    }
}
