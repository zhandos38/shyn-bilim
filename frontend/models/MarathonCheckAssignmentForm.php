<?php
namespace frontend\models;


use common\models\Article;
use common\models\Marathon;
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
class MarathonCheckAssignmentForm extends Model
{
    public $iin;
    public $marathon_type_id;

    public function rules()
    {
        return [
            [['marathon_type_id', 'iin'], 'required'],
            [['marathon_type_id', 'iin'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'iin' => Yii::t('app', 'ИИН/ЖСН'),
          'marathon_type_id' => Yii::t('app', 'Марафон'),
        ];
    }

    public function check()
    {
        $query = Marathon::find()->andFilterWhere(['iin' => $this->iin])->andFilterWhere(['marathon_type_id' => $this->marathon_type_id]);

        $marathon = $query->one();

        if ($marathon) {
            return $marathon->id;
        }

        return false;
    }
}
