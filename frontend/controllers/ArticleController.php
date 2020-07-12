<?php


namespace frontend\controllers;


use common\models\Article;
use common\models\Subject;
use frontend\models\ArticleSearch;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;

class ArticleController extends Controller
{
    public function actionIndex()
    {
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

        if ($model->load(Yii::$app->request->post())) {
            $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');
            $model->created_at = time();

            if ($model->fileTemp) {
                $model->file = $model->fileTemp->baseName . '.' . $model->fileTemp->extension;
            }

            if ($model->save() && $model->upload()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Ваш материал успешно опубликован'));
                return $this->redirect(['index']);
            }
        }

        return $this->render('order', [
            'model' => $model,
        ]);
    }
}