<?php


namespace backend\forms;

use yii\base\Model;


class ImportExcelWhiteList extends Model
{
    /** @var \yii\web\UploadedFile */
    public $file;
    public $olympiad_id;

    public function rules()
    {
        return [
            [['file'], 'file',
                'skipOnEmpty' => false,
                'extensions' => ['xlsx', 'xls', 'csv'],
                'checkExtensionByMimeType' => false,           // <-- ВАЖНО
                'wrongExtension' => 'Загрузите .xlsx, .xls или .csv',
                'maxSize' => 20 * 1024 * 1024,
            ],
            ['olympiad_id', 'integer'],
            [['olympiad_id', 'file'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            ['file' => 'Excel файл'],
            ['olympiad_id' => 'Олимпиада'],
        ];
    }

    public static function getIINFromParams(string $s)
    {
        // Разбиваем по ";"/"," и пробелам, без усложнений
        $parts = preg_split('/[;,]+/u', $s);
        $iin = null;


        foreach ($parts as $p) {
            $p = trim($p);
            if ($p === '') continue;

            // чистые цифры
            $digits = preg_replace('/\D+/', '', $p);

            // ИИН: 12 цифр
            if (preg_match_all('/(?<!\d)\d{12}(?!\d)/u', $s, $mm) && !empty($mm[0])) {
                $arr = array_values($mm[0]);
            }
        }


        return $arr[1];
    }
}