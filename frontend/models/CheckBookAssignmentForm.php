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
class CheckBookAssignmentForm extends Model
{
    public $iin;

    public function rules()
    {
        return [
            [['iin'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'iin' => Yii::t('app', 'ИИН/ЖСН'),
        ];
    }

    public function check($isFinished = false)
    {
        $bookAssignment = BookAssignment::find()->andWhere(['iin' => trim($this->iin)])->one();

        if ($bookAssignment) {
            return $bookAssignment->id;
        }

        return false;
    }
}
