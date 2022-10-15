<?php


namespace backend\forms;


use common\models\Answer;
use common\models\Question;
use yii\base\ErrorException;
use yii\base\Model;

class QuestionForm extends Model
{
    public $test_subject_id;
    public $question_text;
    public $answer_1;
    public $answer_1_is_right;
    public $answer_2;
    public $answer_2_is_right;
    public $answer_3;
    public $answer_3_is_right;
    public $answer_4;
    public $answer_4_is_right;
    public $answer_5;
    public $answer_5_is_right;

    public function rules()
    {
        return [
            [['question_text', 'answer_1', 'answer_1_is_right', 'answer_2', 'answer_2_is_right', 'answer_3', 'answer_3_is_right', 'answer_4', 'answer_4_is_right', 'answer_5', 'answer_5_is_right'], 'safe'],
            ['test_subject_id', 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'question_text' => 'Вопрос',
            'answer_1' => 'Ответ 1',
            'answer_1_is_right' => 'Ответ 1 правильный',
            'answer_2' => 'Ответ 2',
            'answer_2_is_right' => 'Ответ 2 правильный',
            'answer_3' => 'Ответ 3',
            'answer_3_is_right' => 'Ответ 3 правильный',
            'answer_4' => 'Ответ 4',
            'answer_4_is_right' => 'Ответ 4 правильный',
            'answer_5' => 'Ответ 5',
            'answer_5_is_right' => 'Ответ 5 правильный',
        ];
    }

    public function save()
    {
        try {
            $question = new Question();
            $question->test_subject_id = $this->test_subject_id;
            $question->text = $this->question_text;
            $question->save();

            $answer1 = new Answer();
            $answer1->question_id = $question->id;
            $answer1->text = $this->answer_1;
            $answer1->is_right = $this->answer_1_is_right;
            $answer1->save();

            $answer2 = new Answer();
            $answer2->question_id = $question->id;
            $answer2->text = $this->answer_2;
            $answer2->is_right = $this->answer_2_is_right;
            $answer2->save();

            $answer3 = new Answer();
            $answer3->question_id = $question->id;
            $answer3->text = $this->answer_3;
            $answer3->is_right = $this->answer_3_is_right;
            $answer3->save();

            $answer4 = new Answer();
            $answer4->question_id = $question->id;
            $answer4->text = $this->answer_4;
            $answer4->is_right = $this->answer_4_is_right;
            $answer4->save();

            $answer5 = new Answer();
            $answer5->question_id = $question->id;
            $answer5->text = $this->answer_5;
            $answer5->is_right = $this->answer_5_is_right;
            $answer5->save();
        } catch (\ErrorException $e) {
            throw new ErrorException($e);
        }

        return true;
    }
}