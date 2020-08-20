<?php
/**
 * Created by PhpStorm.
 * User: Zhandos
 * Date: 08.04.2020
 * Time: 19:49
 */

namespace console\controllers;


use common\models\Answer;
use common\models\Question;
use common\models\Subject;
use common\models\Test;
use Yii;
use yii\console\Controller;
use yii\db\Exception;
use yii\helpers\Json;
use yii\helpers\VarDumper;

class TestController extends Controller
{
    public function actionImport()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $fileName = readline('Enter name of file: ');
            foreach (Subject::find()->all() as $subject){
                printf($subject->id . ': ' . $subject->name . " - " . $subject->type . "\n");
            }
            $subjectId = readline('Enter id of subject: ');
            $grade = readline('Enter class: ');

            $selectedSubject = Subject::findOne(['id' => $subjectId]);
            if ($selectedSubject === null) {
                printf('Subject is not found');
            }

            $lang = readline('Enter language: ');

            $test = Test::findOne(['subject_id' => $selectedSubject->id, 'grade' => $grade, 'lang' => $lang]);
            if ($test === null) {
                $test = new Test();
                $test->subject_id = $selectedSubject->id;
                $test->grade = $grade;
                $test->lang = $lang;
                $test->created_at = time();
                if (!$test->save()) {
                    printf(Json::encode($test->errors));
                }
            }

            $subjectFolderPath = Yii::getAlias('@static') . '/test/' . $selectedSubject->id;

            if (!file_exists($subjectFolderPath)) {
                mkdir($subjectFolderPath, 0777, true);
            }

            $xml = simplexml_load_string(file_get_contents(Yii::getAlias('@static') . '/' . $fileName));
            $json = json_encode($xml);
            $array = json_decode($json, true);

            $myfile = fopen(Yii::getAlias('@static') . '/test.txt', 'wb') or die('Unable to open file!');
            fwrite($myfile, VarDumper::dumpAsString($array,10));
            fclose($myfile);

            foreach ($array['question'] as $item) {
                $question = new Question();
                $question->test_id = $test->id;
                $question->created_at = time();
                if (!$question->save()) {
                    print_r($question->errors);
                }

                $imgDomainPath = Yii::$app->params['staticDomain'] . '/test/' . $selectedSubject->id . '/' . $question->id;
                $question->text = str_replace('@@PLUGINFILE@@', $imgDomainPath, trim($item['questiontext']['text']));
                if (!$question->save()) {
                    print_r($question->errors);
                }

                // Creating images from base64
                if (!empty($item['questiontext']['file'])) {

                    $imgPath = $subjectFolderPath . '/' . $question->id;

                    VarDumper::dumpAsString($item['questiontext'],10,1);

                    $this->convertImage($item['questiontext']['file'], $imgPath);
                }

                // Answers
                foreach ($item['answer'] as $item) {
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->is_right = (int)$item['@attributes']['fraction'] > 0;
                    $answer->created_at = time();
                    if (!$answer->save()) {
                        print_r($answer->errors);
                    }

                    $answer->text = str_replace('@@PLUGINFILE@@', $imgDomainPath . '/' . $answer->id, trim($item['text']));
                    if (!$answer->save()) {
                        print_r($answer->errors);
                    }

                    if (!empty($item['file'])) {
                        $imgPath = $subjectFolderPath . '/' . $question->id . '/' . $answer->id;
                        $this->convertImage($item['file'], $imgPath);
                    }
                }
            }

            $transaction->commit();
            printf('Data imported successfully');
        } catch (Exception $exception) {
            $transaction->rollBack();
            print_r($exception->getMessage());
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
}