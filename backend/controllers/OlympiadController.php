<?php

namespace backend\controllers;

use backend\models\TestSearch;
use Yii;
use common\models\Olympiad;
use backend\models\OlympiadSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * OlympiadController implements the CRUD actions for Olympiad model.
 */
class OlympiadController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Olympiad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OlympiadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Olympiad model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if ($model->status === Olympiad::STATUS_FINISHED) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Олимпиада не проводится'));
            return $this->redirect(['olympiad/index']);
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Olympiad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Olympiad();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->fileTempKz = UploadedFile::getInstance($model, 'fileTempKz');
            $model->fileTempRu = UploadedFile::getInstance($model, 'fileTempRu');

            if ($model->imageFile) {
                $model->img = $model->imageFile->baseName . '.' . $model->imageFile->extension;
            }

            if ($model->fileTempKz) {
                $model->file_kz = $model->fileTempKz->baseName . '.' . $model->fileTempKz->extension;
            }

            if ($model->fileTempRu) {
                $model->file_ru = $model->fileTempRu->baseName . '.' . $model->fileTempRu->extension;
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
     * Updates an existing Olympiad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->fileTempKz = UploadedFile::getInstance($model, 'fileTempKz');
            $model->fileTempRu = UploadedFile::getInstance($model, 'fileTempRu');

            if ($model->imageFile) {
                $model->img = $model->imageFile->baseName . '.' . $model->imageFile->extension;
            }

            if ($model->fileTempKz) {
                $model->file_kz = $model->fileTempKz->baseName . '.' . $model->fileTempKz->extension;
            }

            if ($model->fileTempRu) {
                $model->file_ru = $model->fileTempRu->baseName . '.' . $model->fileTempRu->extension;
            }

            if ($model->save() && $model->upload()) {
                return $this->redirect(['index']);
            }
        }

        $searchModel = new TestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $model->id);

        return $this->render('update', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Olympiad model.
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

    /**
     * Finds the Olympiad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Olympiad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Olympiad::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
