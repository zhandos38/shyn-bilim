<?php


namespace backend\forms;


use common\models\Answer;
use common\models\Question;
use common\models\WhiteList;
use yii\base\ErrorException;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * Class QuestionForm
 * @package backend\forms
 *
 *
 * @property int|null $subject_id
 * @property int|null $olympiad_id
 * @property string|null $iin_list
 */

class WhiteListForm extends Model
{
    public $subject_id;
    public $olympiad_id;
    public $iin_list;

    public function rules()
    {
        return [
            [['subject_id', 'olympiad_id'], 'integer'],
            ['iin_list', 'string'],
            [['subject_id', 'olympiad_id', 'iin_list'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'subject_id' => 'Предмет',
            'olympiad_id' => 'Олимпиада',
            'iin_list' => 'Список ИИН',
        ];
    }

    public function save()
    {
        try {
            $ids = explode("\n", str_replace("\r", "", $this->iin_list));
            foreach ($ids as $id) {
                $whiteList = new WhiteList();
                $whiteList->iin = $id;
                $whiteList->olympiad_id = $this->olympiad_id;
                $whiteList->subject_id = $this->subject_id;
                $whiteList->save();
            }
            return true;
        } catch (\ErrorException $e) {
            throw new ErrorException($e);
        }
    }
}