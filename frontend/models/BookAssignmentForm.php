<?php
namespace frontend\models;


use common\models\BookAssignment;
use Yii;
use yii\base\Model;

/**
 * Class OrderPayForm
 * @package api\modules\paybox\forms
 *
 * @property mixed $requestFields
 */
class BookAssignmentForm extends Model
{
    public $iin;
    public $olympiad_id;

    public function rules()
    {
        return [
            [['olympiad_id', 'iin'], 'required'],
            [['iin'], 'string', 'max' => 20],
            [['olympiad_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'iin' => Yii::t('app', 'ИИН/ЖСН'),
          'olympiad_id' => Yii::t('app', 'Олимпиада'),
        ];
    }

    public function check()
    {
        return BookAssignment::find()->andFilterWhere(['iin' => trim($this->iin)])->orderBy(['id' => SORT_DESC])->one();
    }
}
