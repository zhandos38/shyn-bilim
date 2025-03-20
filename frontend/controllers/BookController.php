<?php
namespace frontend\controllers;

use common\models\Book;
use common\models\BookCategory;
use common\models\User;
use common\models\BookAssignment;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;

class BookController extends Controller
{
    public function actionAssignment()
    {
        $model = new BookAssignment();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['book/index', 'assignment' => $model->id]);
        }

        return $this->render('assignment', [
            'model' => $model,
        ]);
    }

    public function actionIndex($assignment)
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
            'assignment' => $assignment
        ]);
    }

    public function actionCert($assignment)
    {
        $model = BookAssignment::findOne(['id' => $assignment]);
        if (empty($model)) {
            throw new Exception('User not found!');
        }

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_cert', [
            'model' => $model,
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Сертификат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.bordered { border: 1px solid red }'
        ]);

        return $pdf->render();
    }

    public function actionCertThank($assignment)
    {
        $model = BookAssignment::findOne(['id' => $assignment]);
        if (empty($model)) {
            throw new Exception('User not found!');
        }

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_cert_thank', [
            'model' => $model,
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Сертификат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.bordered { border: 1px solid red }'
        ]);

        return $pdf->render();
    }
}
