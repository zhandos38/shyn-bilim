<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $auth_key
 * @property integer $status
 * @property string $role
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 *
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $iin
 * @property string $phone
 * @property string $address
 * @property integer $school_id
 * @property string $post
 * @property integer $article_count
 * @property string $subscribe_until
 * @property integer $shyn_bonus
 * @property integer $grade
 * @property string $teacher_title
 *
 * @property string $verification_code [varchar(4)]
 * @property Subject $subject
 * @property School $school
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const MAX_REQUEST_COUNT = 5;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_TEACHER = 'teacher';
    const ROLE_STUDENT = 'student';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],

            [['name', 'surname', 'patronymic', 'iin', 'phone', 'address', 'post', 'subscribe_until', 'teacher_title'], 'string'],
            [['school_id', 'article_count', 'shyn_bonus', 'grade'], 'integer'],

            ['verification_code', 'string', 'max' => 4],
        ];
    }

    public function attributeLabels()
    {
        return [
            'role' => 'Роль',
            'status' => 'Статус',
            'created_at' => 'Дата добавление',
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'iin' => Yii::t('app', 'ИИН'),
            'phone' => Yii::t('app', 'Номер телефона'),
            'address' => 'Адрес',
            'school_id' => Yii::t('app', 'Школа/Колледж'),
            'post' => Yii::t('app', 'Почтовый индекс'),
            'article_count' => Yii::t('app', 'Лимит на материалы'),
            'subscribe_until' => 'Подписан до',
            'shyn_bonus' => 'Шың бонус',
            'grade' => 'Класс',
            'teacher_title' => 'Пән мүғалімі',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by iin
     *
     * @param string $iin
     * @return static|null
     */
    public static function findByIIN($iin)
    {
        return static::findOne(['iin' => $iin, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by phone
     *
     * @param $phone
     * @return static|null
     */
    public static function findByPhone($phone)
    {
        return static::findOne(['phone' => $phone]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    public function getGrade()
    {
        return $this->grade . ' сынып оқушысы';
    }

    public static function getStatuses() {
        return [
            self::STATUS_DELETED => 'Удален',
            self::STATUS_INACTIVE => 'Отключен',
            self::STATUS_ACTIVE => 'Включен'
        ];
    }

    /**
     * @return mixed
     */
    public function getStatusLabel()
    {
        return ArrayHelper::getValue(static::getStatuses(), $this->status);
    }

    public static function getRoles() {
        return [
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_USER => 'Пользователь',
            self::ROLE_TEACHER => 'Преподаватель',
            self::ROLE_STUDENT => 'Школьник',
        ];
    }

    /**
     * @return mixed
     */
    public function getRoleLabel()
    {
        return ArrayHelper::getValue(static::getRoles(), $this->role);
    }

    public function validateCode($code)
    {
        return $this->verification_code === $code;
    }

    public function getLastSMS()
    {
        return $this->hasOne(SmsLog::className(), ['user_id' => 'id'])->orderBy(['id' => SORT_DESC]);
    }

    /**
     * @return bool
     */
    public function checkSubscription(): bool
    {
        return date('Y-m-d', strtotime(Yii::$app->user->identity->subscribe_until)) >= date('Y-m-d');
    }
}
