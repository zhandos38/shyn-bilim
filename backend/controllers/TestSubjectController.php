<?php

namespace backend\controllers;

use backend\forms\ImportForm;
use backend\forms\QuestionForm;
use common\models\Question;
use Yii;
use common\models\TestSubject;
use backend\models\TestSubjectSearch;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TestSubjectController implements the CRUD actions for TestSubject model.
 */
class TestSubjectController extends Controller
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
     * Lists all TestSubject models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestSubjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TestSubject model.
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
     * Creates a new TestSubject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new TestSubject();
        $model->test_option_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['test-option/update', 'id' => $model->test_option_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TestSubject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \yii\db\Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['test-option/update', 'id' => $model->test_option_id]);
        }

        $importForm = new ImportForm();

        return $this->render('update', [
            'model' => $model,
            'importForm' => $importForm
        ]);
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

            return $this->redirect(['test-subject/update', 'id' => $importForm->test_subject]);
        }

        return $this->redirect(['test-subject/update', 'id' => $importForm->test_subject]);
    }

    public function actionClearQuestions($id)
    {
        $questions = Question::findAll(['test_subject_id' => $id]);
        foreach ($questions as $question) {
            $question->delete();
        }

        return $this->redirect(['test-subject/update', 'id' => $id]);
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

    /**
     * Deletes an existing TestSubject model.
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
     * Finds the TestSubject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TestSubject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TestSubject::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
