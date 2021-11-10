<?php
namespace frontend\models;


use common\models\Article;
use common\models\TestAssignment;
use Yii;
use yii\base\Model;
use Exception;
use yii\helpers\VarDumper;

/**
 * @property string $leader_name
 * @property string $parent_name
 *
 * @property mixed $requestFields
 */
class ExtraAssignmentForm extends Model
{
    public $iin;

    public function rules()
    {
        return [
            [['leader_name', 'parent_name'], 'required'],
            [['leader_name', 'parent_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
          'leader_name' => Yii::t('app', 'Полноя имя руководителя'),
          'parent_name' => Yii::t('app', 'Полноя имя руководителя'),
        ];
    }
}