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
    public $phone;
    public $subject_id;
    public $olympiad_id;

    public function rules()
    {
        return [
            [['olympiad_id', 'iin'], 'required'],
            [['iin', 'phone'], 'string', 'max' => 20],
            [['subject_id', 'olympiad_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'iin' => Yii::t('app', 'ИИН/ЖСН'),
          'phone' => Yii::t('app', 'Номер телефона'),
          'subject_id' => Yii::t('app', 'Предмет'),
          'olympiad_id' => Yii::t('app', 'Олимпиада'),
        ];
    }

    public function check($isFinished = false)
    {
        $query = TestAssignment::find()->andWhere(['olympiad_id' => $this->olympiad_id])
        ->andFilterWhere(['iin' => trim($this->iin)])
        ->andFilterWhere(['phone' => $this->phone])
        ->andFilterWhere(['subject_id' => $this->subject_id]);

        if ($isFinished) {
            $query->andWhere(['or', ['status' => TestAssignment::STATUS_FINISHED], ['status' => TestAssignment::STATUS_CERT_PAID]]);
        } else {
            $query->andWhere(['status' => TestAssignment::STATUS_ACTIVE]);

            $hasFinished = TestAssignment::find()->andWhere(['olympiad_id' => $this->olympiad_id])
                ->andFilterWhere(['iin' => $this->iin])
                ->andFilterWhere(['phone' => $this->phone])
                ->andWhere(['status' => TestAssignment::STATUS_FINISHED])
                ->one();
            if (!empty($hasFinished)) {
                return false;
            }
        }
        $testAssignment = $query->one();

        if ($testAssignment && $testAssignment->olympiad_id === 23 && ($testAssignment->point >= 10 && $testAssignment->point <= 14)) {
            $testAssignment->point = 15;
            $testAssignment->save();
        }

        if ($testAssignment) {
            return $testAssignment->id;
        }

        return false;
    }
}
