<?php
namespace frontend\models;


use common\models\Article;
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
class CheckCertForm extends Model
{
    public $iin;

    public function rules()
    {
        return [
            ['iin', 'required'],
            ['iin', 'string', 'max' => 20],
        ];
    }

    public function attributeLabels()
    {
        return [
          'iin' => Yii::t('site', 'ИИН')
        ];
    }
}