<?php


namespace frontend\controllers;


use common\models\Article;
use common\models\ArticleMagazine;
use common\models\ArticleMagazineRelease;
use common\models\Subject;
use DateTime;
use frontend\models\ArticleSearch;
use frontend\models\MyArticleSearch;
use frontend\models\PayboxForm;
use frontend\models\CheckArticleForm;
use kartik\mpdf\Pdf;
use Paybox\Pay\Facade as Paybox;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Yii;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\UploadedFile;
use common\models\ArticleWhiteList;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        $magazines = ArticleMagazine::find()->orderBy(['order' => SORT_ASC])->all();

        return $this->render('index', [
            'magazines' => $magazines
        ]);
    }

    public function actionView($articleMagazineId)
    {
        $magazine = ArticleMagazine::findOne(['id' => $articleMagazineId]);
        $subjectIds = ArrayHelper::getColumn($magazine->getArticleMagazineSubjects()->all(), 'subject_id');
        $subjects = Subject::find()->andWhere(['in', 'id', $subjectIds])->orderBy(['order' => SORT_ASC])->all();
        $releases = ArticleMagazineRelease::find()->where(['article_magazine_id' => $articleMagazineId])->all();

        return $this->render('view', [
            'magazine' => $magazine,
            'subjects' => $subjects,
            'releases' => $releases,
        ]);
    }
    
    public function actionSuccessOffline($id)
    {
        $order = Article::findOne(['id' => $id, 'status' => Article::STATUS_ACTIVE]);
        if (empty($order)) {
            throw new Exception('Order is not found');
        }

        return $this->render('success', [
            'id' => $order->id
        ]);
    }

    public function actionSuccess()
    {
        $request = Yii::$app->request->queryParams;

        if (!$this->checkSign($request, 'success')) {
            throw new Exception('Sig is not correct');
        }

        $order = Article::findOne(['id' => (int)$request[$this->toProperty('order_id')], 'status' => Article::STATUS_ACTIVE]);
        if (empty($order)) {
            throw new Exception('Order is not found');
        }

        return $this->render('success', [
            'id' => $order->id
        ]);
    }

    public function actionList($articleMagazineId, $subjectId)
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $articleMagazineId, $subjectId);

        return $this->render('list', [
            'subjectId' => $subjectId,
            'articleMagazineId' => $articleMagazineId,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionMyList()
    {
        return $this->redirect('/');
        /*$searchModel = new MyArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('my-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);*/
    }

    public function actionOrder($articleMagazineId, $subjectId = null)
    {
        $model = new Article();
        $model->article_magazine_id = $articleMagazineId;

        $articleMagazine = ArticleMagazine::findOne(['id' => $articleMagazineId]);
        if ($subjectId) {
            $model->subject_id = $subjectId;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->fileTemp = UploadedFile::getInstance($model, 'fileTemp');
            $model->created_at = time();

            if ($model->fileTemp) {
                $model->file = $model->fileTemp->baseName . '.' . $model->fileTemp->extension;
            } else {
                Yii::$app->session->setFlash('error', 'Файлды жүктеу қажет');

                return $this->render('order', [
                    'model' => $model,
                    'articleMagazine' => $articleMagazine,
                ]);
            }

            $whiteList = ArticleWhiteList::find()->andWhere(['iin' => $model->iin])->andWhere(['>', 'limit', 0])->one();
            if ($whiteList !== null) {
                $model->status = Article::STATUS_ACTIVE;
            }

            if ($model->save() && $model->upload()) {
                if ($whiteList !== null) {
                    $whiteList->limit = $whiteList->limit - 1;
                    $whiteList->save();

                    return $this->redirect(['article/success-offline', 'id' => $model->id]);
                }

                $salt = $this->getSalt(8);
                $request = [
                    'pg_merchant_id' => Yii::$app->params['payboxId'],
                    'pg_amount' => 3000,
                    'pg_salt' => $salt,
                    'pg_order_id' => $model->id,
                    'pg_success_url_method' => 'GET',
                    'pg_description' => 'Оплата за публикацию материала',
                    'pg_result_url' => Yii::$app->params['apiDomain'] . '/result',
                    'pg_result_url_method' => 'POST',
                ];

                $request = $this->getSignByData($request, 'payment.php', $salt);

                $query = http_build_query($request);

                return $this->redirect('https://api.freedompay.kz/payment.php?' . $query);
            }
        }

        return $this->render('order', [
            'model' => $model,
            'articleMagazine' => $articleMagazine,
        ]);
    }

    public function actionCert($id)
    {
        $model = Article::findOne(['id' => $id, 'status' => Article::STATUS_ACTIVE]);
        if (empty($model)) {
            throw new Exception('Article not found!');
        }

        if ($model->subject_id === 17) {
            return $this->redirect(['article/cert-tarbie-sagati', 'id' => $id]);
        }

        $articleMagazine = $model->getArticleMagazine()->one();
        $year = date('Y', $model->created_at);
        $content = $this->renderPartial($articleMagazine->getFolderPath("$year/_cert"), [
            'model' => $model,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            'orientation' => $articleMagazine->is_cert_landscape ? Pdf::ORIENT_LANDSCAPE : Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Сертификат.pdf',
            'content' => $content,
            'cssFile' => 'css/cert.css'
        ]);

        return $pdf->render();
    }

    public function actionCertTarbieSagati($id)
    {
        $model = Article::findOne(['id' => $id, 'status' => Article::STATUS_ACTIVE]);
        if (empty($model)) {
            throw new Exception('Article not found!');
        }

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_cert_tarbie-sagati', [
            'model' => $model,
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Сертификат.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => 'css/custom.css',
            'cssInline' => '.bordered { border: 1px solid red }'
        ]);

        return $pdf->render();
    }

    public function actionCharter($id)
    {
        $model = Article::findOne(['id' => $id, 'status' => Article::STATUS_ACTIVE]);
        if (empty($model)) {
            throw new Exception('Article not found!');
        }

        $articleMagazine = $model->getArticleMagazine()->one();
        $year = date('Y', $model->created_at);
        $content = $this->renderPartial($articleMagazine->getFolderPath("$year/_charter"), [
            'model' => $model,
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            'marginTop' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => 0,
            // portrait orientation
            'orientation' => $articleMagazine->is_charter_landscape ? Pdf::ORIENT_LANDSCAPE : Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'filename' => 'Грамота.pdf',
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => 'css/custom.css'
        ]);

        return $pdf->render();
    }

    public function actionCheckCert()
    {
        $model = new CheckArticleForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($articleId = $model->check()) {
                return $this->redirect(['article/cert', 'id' => $articleId]);
            }

            Yii::$app->session->setFlash('error', Yii::t('app', 'По данному ИИН не найдено материалов'));
        }

        return $this->render('check-cert', [
            'model' => $model
        ]);
    }

    public function actionCheckCharter()
    {
        $model = new CheckArticleForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($articleId = $model->check()) {
                return $this->redirect(['article/charter', 'id' => $articleId]);
            }

            Yii::$app->session->setFlash('error', Yii::t('app', 'По данному ИИН не найдено материалов'));
        }

        return $this->render('check-cert', [
            'model' => $model
        ]);
    }

    public function checkSign($data, $url):bool
    {
        $array = $data;
        $salt = $array[$this->toProperty('salt')];

        unset($array[$this->toProperty('sig')], $array[$this->toProperty('salt')]);

        $sign = $this->sign($array, $salt, $url);

//        VarDumper::dump($sign . ' - ' . $data[$this->toProperty('sig')]); die;

        return ($sign == $data[$this->toProperty('sig')]);
    }

    private function sign($data, $salt, $url)
    {
        $arr = $data;
        $key = Yii::$app->params['payboxKey'];

        $arr[$this->toProperty('salt')] = $salt;
        ksort($arr);
        array_unshift($arr, $url);
        array_push($arr, $key);
        $arr[$this->toProperty('sig')] = md5(implode(';', $arr));

        return $arr[$this->toProperty('sig')];
    }

    public function getSignByData($data, $url, $salt = null)
    {
        $array = $data;
        $salt = $salt ? $salt : $this->getSalt(8);
        $array[$this->toProperty('salt')] = $salt;
        unset($array[$this->toProperty('sig')]);

        ksort($array);
        array_unshift($array, $url);
        array_push($array,Yii::$app->params['payboxKey']);
        $sign = md5(implode(';', $array));

        $data[$this->toProperty('salt')] = $salt;
        $data[$this->toProperty('sig')] = $sign;

        return $data;
    }

    private function getSalt($length) {
        return bin2hex(random_bytes($length));
    }

    private function toProperty($property)
    {
        return 'pg_' . $property;
    }
}
