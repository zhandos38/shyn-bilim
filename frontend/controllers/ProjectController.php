<?php


namespace frontend\controllers;


use common\models\News;
use common\models\Project;
use common\models\ProjectArticle;
use frontend\models\ProjectArticleSearch;
use Yii;
use yii\web\Controller;

class ProjectController extends Controller
{
    public function actionIndex($type = 0)
    {
        $models = Project::findAll(['type' => $type]);

        return $this->render('index', [
            'models' => $models,
        ]);
    }

    public function actionList($id = null)
    {
        $searchModel = new ProjectArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
}