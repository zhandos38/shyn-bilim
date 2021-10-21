<?php
namespace frontend\models;

use common\models\Subscribe;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\db\Exception;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class SubscribeForm extends Model
{
    public $address;
    public $city_id;
    public $region_id;
    public $school_id;
    public $post;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post', 'address', 'school_id'], 'required'],
            [['post', 'address'], 'string'],
            [['city_id', 'region_id', 'school_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'address' => 'Адрес',
            'school_id' => Yii::t('app', 'Школа/Колледж'),
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
            'post' => Yii::t('app', 'Почтовый индекс'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     * @throws Exception
     */
    public function save()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = Yii::$app->user->identity;
        $user->address = $this->address;
        $user->post = $this->post;
        $user->school_id = $this->school_id;
//        $user->article_count += 3;
        if (!$user->save()) {
            throw new Exception('Subscribe form error!');
        }

        $subscribe = new Subscribe();
        $subscribe->user_id = $user->id;
        $subscribe->created_at = time();
        if (!$subscribe->save()) {
            throw new Exception('Subscribe error!');
        }

        return $subscribe->id;
    }
}
