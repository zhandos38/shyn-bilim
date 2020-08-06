<?php


namespace frontend\controllers;


use common\models\Answer;
use common\models\Question;
use common\models\Subject;
use common\models\Test;
use common\models\TestAssignment;
use yii\web\HttpException;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\Response;

class OlympiadController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->session->setFlash('error', 'Страница находится в разработке');
        return $this->redirect(['site/index']);
        
        return $this->render('index');
    }

    public function actionList($type)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Subject::find()->andWhere(['type' => $type]),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionAssignment($subject)
    {
        $model = new TestAssignment();
        $model->subject_id = $subject;

        $subject = Subject::findOne(['id' => $model->subject_id]);

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $test = Test::findOne(['subject_id' => $model->subject_id, 'grade' => $model->grade, 'lang' => $model->lang]);
            if (!$test) {
                throw new Exception('Тест не найден!');
            }

            $model->created_at = time();
            if (!$model->save()) {
                throw new Exception('Assignment is not saved');
            }

            return $this->redirect(['olympiad/test', 'assignment' => $model->id, 'id' => $test->id]);
        }

        return $this->render('assignment', [
            'model' => $model,
            'subject' => $subject
        ]);
    }

    public function actionTest($assignment, $id)
    {
        $test = Test::findOne(['id' => $id]);
        if (!$test) {
            throw new Exception('Тест не найден!');
        }

        return $this->render('test', [
            'assignment_id' => $assignment,
            'subject_name' => $test->subject->name,
            'id' => $id
        ]);
    }

    /**
     * @param $id
     * @return array
     */
    public function actionGetTest($id)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $test = Test::find()->where(['id' => $id])->one();

            $data = [
                'id' => $test->id,
                'questions' => [],
                'timeLimit' => $test->time_limit
            ];

            /** @var Question $question */
            /** @var Answer $answer */
            foreach ($test->questions as $question) {
                $answers = [];
                foreach ($question->answers as $answer) {
                    $answers[] = [
                        'id' => $answer->id,
                        'text' => $answer->text,
                        'isRight' => $answer->is_right
                    ];
                }

                shuffle($answers);
                $data['questions'][] = [
                    'id' => $question->id,
                    'text' => $question->text,
                    'selectedAnswerId' => null,
                    'answers' => $answers
                ];
            }
            return $data;
        }
    }

    public function actionSetResult()
    {
        if (!Yii::$app->request->isAjax) {
            throw new HttpException(404, 'Страница не найдена');
        }

        $data = Yii::$app->request->post();

        $testAssignment = TestAssignment::findOne(['id' => (int)$data['assignmentId']]);
        if (!$testAssignment) {
            throw new Exception('Test Assignment is not found');
        }

        $testAssignment->lang = 'kz';
        $testAssignment->point = (int)$data['point'];
        $testAssignment->finished_at = time();
        if (!$testAssignment->save()) {
            throw new Exception('Test result is not saved');
        }

        return true;
    }
}