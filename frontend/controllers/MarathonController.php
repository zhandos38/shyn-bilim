<?php


namespace frontend\controllers;


use common\models\Marathon;
use common\models\Olympiad;
use common\models\TestAssignment;
use frontend\models\CheckAssignmentForm;
use frontend\models\ExtraAssignmentForm;
use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;
use kartik\mpdf\Pdf;

class MarathonController extends Controller
{
    public function actionAssignment()
    {
        $model = new Marathon();
        if ($model->load(Yii::$app->request->post())) {
            if (!$model->save()) {
                throw new Exception('Marathon save error!');
            }
            return $this->redirect(['marathon/book', 'marathonId' => $model->id]);
        }

        $checkAssignmentForm = new CheckAssignmentForm();
        return $this->render('assignment', [
            'model' => $model,
            'checkAssignmentForm' => $checkAssignmentForm
        ]);
    }

    public function actionBook($marathonId)
    {
        $model = Marathon::findOne(['id' => $marathonId]);

        return $this->render('book', [
            'grade' => $model->grade,
            'marathonId' => $marathonId,
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

            return $this->redirect(['marathon/book', 'marathonId' => $marathon->id]);
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

            return $this->redirect(['marathon/extra-assignment', 'assignmentId' => $marathon->id]);
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

            return $this->redirect(['olympiad/extra-assignment', 'assignmentId' => $marathon->id]);
        }

        return $this->render('extra-assignment', [
            'model' => $model
        ]);
    }

    public function actionGetCert($id)
    {
        $marathon = Marathon::find()->andWhere(['id' => $id])->orderBy(['id' => SORT_DESC])->one();
        if (!$marathon) {
            throw new Exception('Marathon is not found');
        }

        $content = $this->renderPartial('_cert', [
            'marathon' => $marathon
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Сертификат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => 'css/custom.css',
        ]);

        return $pdf->render();
    }
    
    public function actionGetCertThank($id)
    {
        $marathon = Marathon::findOne(['id' => $id]);
        if (!$marathon) {
            throw new Exception('Marathon is not found');
        }
        
        $content = $this->renderPartial('_cert-thank', [
            'marathon' => $marathon
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Алғыс хат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => 'css/custom.css',
        ]);

        return $pdf->render();
    }

    public function actionGetCertThankParent($id)
    {
        $marathon = Marathon::findOne(['id' => $id]);
        if (!$marathon) {
            throw new Exception('Marathon is not found');
        }

        $content = $this->renderPartial('_cert-thank-parent', [
            'marathon' => $marathon
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Алғыс хат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => 'css/custom.css',
        ]);

        return $pdf->render();
    }

    public function actionInfo()
    {
        return $this->render('info');
    }
}
