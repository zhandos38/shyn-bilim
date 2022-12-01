<?php

namespace backend\controllers;

use backend\forms\ImportForm;
use backend\forms\QuestionForm;
use common\models\Question;
use Yii;
use common\models\Test;
use backend\models\TestSearch;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TestController implements the CRUD actions for Test model.
 */
class TestController extends Controller
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
                    'delete' => ['POST', 'GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Test models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Test model.
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
     * Creates a new Test model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Test();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Test model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $importForm = new ImportForm();
        $questionForm = new QuestionForm();

        return $this->render('update', [
            'model' => $model,
            'importForm' => $importForm,
            'questionForm' => $questionForm,
        ]);
    }

    public function actionAddQuestion()
    {
        $questionForm = new QuestionForm();

        if ($questionForm->load(Yii::$app->request->post()) && $questionForm->save()) {
            return $this->redirect(['test/update', 'id' => $questionForm->test_id]);
        }

        return $this->redirect(['test/update', 'id' => $questionForm->test_id]);
    }

    public function actionDeleteQuestion()
    {
        $question_id = Yii::$app->request->post('id');

        $question = Question::findOne(['id' => $question_id]);
        if ($question && $question->delete()) {
            return true;
        }

        throw new HttpException('401');
    }

    public function actionImportTest()
    {
        $importForm = new ImportForm();

        if ($importForm->load(Yii::$app->request->post())) {
            $importForm->tempFile = UploadedFile::getInstance($importForm, 'tempFile');
            if ($importForm->tempFile) {
                $importForm->document = $importForm->tempFile->baseName . '.' . $importForm->tempFile->extension;
            }

            $importForm->upload();

            $importForm->importTest();

            return $this->redirect(['test/update', 'id' => $importForm->test_id]);
        }

        return $this->redirect(['test/update', 'id' => $importForm->test_id]);
    }

    public function actionClearQuestions($id)
    {
        $questions = Question::findAll(['test_id' => $id]);
        foreach ($questions as $question) {
            $question->delete();
        }

        return $this->redirect(['test/update', 'id' => $id]);
    }

    /**
     * Deletes an existing Test model.
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
     * Finds the Test model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Test the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Test::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
