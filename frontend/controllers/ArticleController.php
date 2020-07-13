<?php


namespace frontend\controllers;


use common\models\Article;
use common\models\Subject;
use frontend\models\ArticleSearch;
use Paybox\Pay\Facade as Paybox;
use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        VarDumper::dump(Yii::$app->request->post(),10,1); die;
        $subjects = Subject::find()->all();

        return $this->render('index', [
            'subjects' => $subjects
        ]);
    }

    public function actionList($id)
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionOrder()
    {
        $model = new Article();

        $paybox = new Paybox();

        $paybox->merchant->id = 530827;
        $paybox->merchant->secretKey = 'oqyhxvX5lnzTFZTd';
        $paybox->order->id = $model->id;
        $paybox->order->amount = 100;
        $paybox->order->description = 'test order';

        if($paybox->init()) {
            return $this->redirect($paybox->redirectUrl);
        }

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');
                $model->created_at = time();

                if ($model->fileTemp) {
                    $model->file = $model->fileTemp->baseName . '.' . $model->fileTemp->extension;
                }

                if ($model->save() && $model->upload()) {

                    $transaction->commit();

                    Yii::$app->session->setFlash('success', Yii::t('app', 'Ваш материал успешно опубликован'));
                    return $this->redirect(['index']);
                }
            } catch (Exception $e) {
                $transaction->rollBack();
                throw new Exception($e->getMessage());
            }
        }

        return $this->render('order', [
            'model' => $model,
        ]);
    }
}