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

        if ($model->load(Yii::$app->request->post())) {

            $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');
            $model->created_at = time();

            if ($model->fileTemp) {
                $model->file = $model->fileTemp->baseName . '.' . $model->fileTemp->extension;
            }

            if ($model->save() && $model->upload()) {

                $request = [
                    'pg_merchant_id' => Yii::$app->params['payboxId'],
                    'pg_amount' => 25,
                    'pg_salt' => 'bilim_test',
                    'pg_order_id' => $model->id,
                    'pg_description' => 'Оплата за публикацию материала',
                ];

                //generate a signature and add it to the array
                ksort($request); //sort alphabetically
                array_unshift($request, 'payment.php');
                array_push($request, Yii::$app->params['payboxKey']); //add your secret key (you can take it in your personal cabinet on paybox system)

                $request['pg_sig'] = md5(implode(';', $request));

                unset($request[0], $request[1]);

                $query = http_build_query($request);

                return $this->redirect('https://api.paybox.money/payment.php?' . $query);
            }
        }

        return $this->render('order', [
            'model' => $model,
        ]);
    }

    public function actionResult()
    {

    }
}