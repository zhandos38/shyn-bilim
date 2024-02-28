<?php
namespace frontend\models;


use common\models\Article;
use common\models\TestAssignment;
use Yii;
use yii\base\Model;
use Exception;
use yii\helpers\VarDumper;

/**
 * Class OrderPayForm
 * @package api\modules\paybox\forms
 *
 * @property mixed $requestFields
 */
class CheckAssignmentForm extends Model
{
    public $iin;
    public $subject_id;
    public $olympiad_id;

    public function rules()
    {
        return [
            [['iin', 'olympiad_id'], 'required'],
            ['iin', 'string', 'max' => 20],
            [['subject_id', 'olympiad_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'iin' => Yii::t('app', 'ИИН/ЖСН'),
          'subject_id' => Yii::t('app', 'Предмет'),
          'olympiad_id' => Yii::t('app', 'Олимпиада'),
        ];
    }

    public function check($isFinished = false)
    {
        $query = TestAssignment::find()->andWhere(['olympiad_id' => $this->olympiad_id, 'iin' => $this->iin]);
        if ($isFinished) {
            $query->andWhere(['status' => TestAssignment::STATUS_FINISHED]);
        } else {
            $query->andWhere(['status' => TestAssignment::STATUS_ACTIVE]);
        }
        $testAssignment = $query->one();

        if ($testAssignment) {
            return $testAssignment->id;
        }

        return false;
    }
}
