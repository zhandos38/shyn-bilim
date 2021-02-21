<?php


namespace backend\forms;


use common\models\Answer;
use common\models\Question;
use common\models\Subject;
use common\models\Test;
use common\models\TestSubject;
use Yii;
use yii\base\Model;
use yii\db\Exception;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\imagine\Image;

class ImportForm extends Model
{
    public $document;
    public $tempFile;
    public $test_subject;

    public function rules()
    {
        return [
            ['document', 'safe'],
            ['test_subject', 'integer'],

            [['tempFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'xml'],
        ];
    }

    public function importTest()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $testSubject = TestSubject::findOne(['id' => $this->test_subject]);
            if ($testSubject === null) {
                throw new Exception('Test subject is not found');
            }

            $subjectFolderPath = Yii::getAlias('@static') . '/test/' . $testSubject->id;

            if (!file_exists($subjectFolderPath)) {
                mkdir($subjectFolderPath, 0777, true);
            }

            $xml = simplexml_load_string(file_get_contents(Yii::getAlias('@static') . '/olympiad/' . $this->tempFile));
            $json = json_encode($xml);
            $array = json_decode($json, true);

            foreach ($array['question'] as $item) {
                $question = new Question();
                $question->test_subject_id = $testSubject->id;
                $question->created_at = time();
                if (!$question->save()) {
                    throw new Exception('Question is not saved');
                }

                $imgDomainPath = Yii::$app->params['staticDomain'] . '/test/' . $testSubject->id . '/' . $question->id;
                $text = str_replace('@@PLUGINFILE@@', $imgDomainPath, trim($item['questiontext']['text']));
                $text = str_replace('.jpg', '.png', $text);
                $question->text = $text;
                if (!$question->save()) {
                    throw new Exception('Question is not saved');
                }

                // Creating images from base64
                if (!empty($item['questiontext']['file'])) {

                    $imgPath = $subjectFolderPath . '/' . $question->id;

                    $this->convertImage($item['questiontext']['file'], $imgPath);
                }

                // Answers
                foreach ($item['answer'] as $item) {
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->is_right = (int)$item['@attributes']['fraction'] > 0;
                    $answer->created_at = time();
                    if (!$answer->save()) {
                        throw new Exception('Answer is not saved');
                    }

                    $text = str_replace('@@PLUGINFILE@@', $imgDomainPath . '/' . $answer->id, trim($item['text']));
                    $text = str_replace('.jpg', '.png', $text);
                    $answer->text = $text;
                    if (!$answer->save()) {
                        throw new Exception('Answer is not saved');
                    }

                    if (!empty($item['file'])) {
                        $imgPath = $subjectFolderPath . '/' . $question->id . '/' . $answer->id;
                        $this->convertImage($item['file'], $imgPath);
                    }
                }
            }

            $transaction->commit();
        } catch (Exception $exception) {
            $transaction->rollBack();
            throw new Exception($exception->getMessage());
        }
    }

    private function convertImage($file, $imgPath)
    {
        if (!file_exists($imgPath)) {
            mkdir($imgPath, 0777, true);
        }

        $questionFileCounter = 1;
        if (is_array($file)) {
            foreach ($file as $item) {
                $this->generatePngFromBase64($item, $imgPath . '/image' . str_pad($questionFileCounter, 3, '0', STR_PAD_LEFT) . '.png');
                $questionFileCounter++;
            }

            return true;
        }

        return $this->generatePngFromBase64($file, $imgPath . '/image' . str_pad($questionFileCounter, 3, '0', STR_PAD_LEFT) . '.png');
    }

    private function generatePngFromBase64($file, $imgFile)
    {
        $bin = base64_decode($file);

        return file_put_contents($imgFile, $bin);
    }

    public function upload()
    {
        if ($this->tempFile === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/olympiad';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $filePath = $folderPath . '/' . $this->tempFile->baseName . '.' . $this->tempFile->extension;

        if ($this->tempFile) {
            return $this->tempFile->saveAs($filePath);
        }

        return false;
    }
}