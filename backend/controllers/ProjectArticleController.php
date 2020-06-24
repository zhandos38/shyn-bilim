<?php

namespace backend\controllers;

use Yii;
use common\models\ProjectArticle;
use backend\models\ProjectArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProjectArticleController implements the CRUD actions for ProjectArticle model.
 */
class ProjectArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProjectArticle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectArticle model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProjectArticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new ProjectArticle();

        if ($model->load(Yii::$app->request->post())) {
            $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');
            $model->created_at = time();

            if ($model->fileTemp) {
                $model->file = $model->fileTemp->baseName . '.' . $model->fileTemp->extension;
            }

            if ($model->save() && $model->upload()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectArticle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException|\yii\db\Exception if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');
            $model->created_at = time();

            if ($model->fileTemp) {
                $model->file = $model->fileTemp->baseName . '.' . $model->fileTemp->extension;
            }

            if ($model->save() && $model->upload()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectArticle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionInfo()
    {
        echo phpinfo();
    }

    /**
     * Finds the ProjectArticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectArticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectArticle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
