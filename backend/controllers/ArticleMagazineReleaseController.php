<?php

namespace backend\controllers;

use Yii;
use common\models\ArticleMagazineRelease;
use backend\models\ArticleMagazineReleaseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticleMagazineReleaseController implements the CRUD actions for ArticleMagazineRelease model.
 */
class ArticleMagazineReleaseController extends Controller
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
     * Lists all ArticleMagazineRelease models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleMagazineReleaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleMagazineRelease model.
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
     * Creates a new ArticleMagazineRelease model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleMagazineRelease();

        if ($model->load(Yii::$app->request->post())) {
            $model->imgFile = UploadedFile::getInstance($model, 'imgFile');
            $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');

            if ($model->imgFile) {
                $model->img = $model->imgFile->baseName . '.' . $model->imgFile->extension;
            }

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
     * Updates an existing ArticleMagazineRelease model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->imgFile = UploadedFile::getInstance($model, 'imgFile');
            $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');

            if ($model->imgFile) {
                $model->img = $model->imgFile->baseName . '.' . $model->imgFile->extension;
            }

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
     * Deletes an existing ArticleMagazineRelease model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleMagazineRelease model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArticleMagazineRelease the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleMagazineRelease::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
