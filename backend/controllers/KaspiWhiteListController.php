<?php

namespace backend\controllers;

use backend\forms\ImportExcelWhiteList;
use backend\models\KaspiWhiteListSearch;
use common\models\KaspiWhiteList;
use common\models\Olympiad;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use yii\web\UploadedFile;

/**
 * WhiteListController implements the CRUD actions for WhiteList model.
 */
class KaspiWhiteListController extends Controller
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
     * Lists all WhiteList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KaspiWhiteListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing WhiteList model.
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
     * Finds the WhiteList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KaspiWhiteList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KaspiWhiteList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImport()
    {
        $model = new ImportExcelWhiteList();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->olympiad_id = (integer)Yii::$app->request->post('ImportExcelWhiteList')['olympiad_id'];

            if ($model->validate()) {
                $dir = Yii::getAlias('@runtime/uploads');
                FileHelper::createDirectory($dir);
                $path = $dir . '/' . uniqid('xls_', true) . '.' . $model->file->extension;
                $model->file->saveAs($path, false);

                // Определяем ридер по типу файла
                $reader = IOFactory::createReaderForFile($path);
                $reader->setReadDataOnly(true);

                // Если CSV — можно указать разделитель (при необходимости)
                if ($reader instanceof \PhpOffice\PhpSpreadsheet\Reader\Csv) {
                    $reader->setDelimiter(';');           // или ','
                    $reader->setEnclosure('"');
                    $reader->setSheetIndex(0);
                    $reader->setInputEncoding('UTF-8');   // если нужна перекодировка
                }

                $spreadsheet = $reader->load($path);
                $sheet = $spreadsheet->getActiveSheet();

                // Получаем все строки как массив (ключи — A,B,C...)
                $rows = $sheet->toArray(null, true, true, true);

                $olympiad = Olympiad::findOne(['id' => $model->olympiad_id]);

                // Пример: пропустить заголовок и превратить данные в структуру
                $data = [];
                $first = true;
                $second = true;
                foreach ($rows as $row) {
                    if ($first) { $first = false; continue; } // пропустить заголовок
                    if ($second) { $second = false; continue; } // пропустить заголовок

                    $params  = (string)$row['B'];               // Наименование
                    $price = (float)$row['D'];
                    if ((float)$olympiad->price !== $price) {
                        continue;
                    }

                    // Дата может быть числом Excel — конвертируем
                    $rawDate = $row['E'] ?? null;
                    $date = is_numeric($rawDate)
                        ? Date::excelToDateTimeObject($rawDate)->format('Y-m-d')
                        : (string)$rawDate;

                    $iin = ImportExcelWhiteList::getIINFromParams($params);

                    $data[] = [$iin, $price, $date];
                }

                // Пример массовой вставки в таблицу `product`
                if (!empty($data)) {
                    Yii::$app->db->createCommand()->batchInsert(
                        'kaspi_white_list',                   // таблица
                        ['iin', 'amount', 'date'], // колонки
                        $data
                    )->execute();
                }

                Yii::$app->session->setFlash('success', "Импортировано строк: " . count($data));
                return $this->redirect(['import']);
            }
        }

        return $this->render('import', ['model' => $model]);
    }
}
