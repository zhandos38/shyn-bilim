<?php

namespace backend\controllers;

use common\models\City;
use common\models\School;
use Yii;
use common\models\BookAssignment;
use backend\models\BookAssignmentSearch;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookAssignmentController implements the CRUD actions for BookAssignment model.
 */
class BookAssignmentController extends Controller
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
     * Lists all BookAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();

        $searchModel = new BookAssignmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BookAssignment model.
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
     * Creates a new BookAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new BookAssignment();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            if (!$model->save()) {
//                VarDumper::dump($model->errors); die;
                throw new Exception('Assignment is not saved');
            }

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BookAssignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::previous());
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BookAssignment model.
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
     * Finds the BookAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookAssignment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetCities($id)
    {
        if (Yii::$app->request->isAjax) {
            $cities = City::findAll(['region_id' => $id]);
            return Json::encode($cities);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function actionGetSchools($id)
    {
        if (Yii::$app->request->isAjax) {
            $cities = School::findAll(['city_id' => $id]);
            return Json::encode($cities);
        }

        throw new HttpException('404', 'Page is not found!');
    }
}
