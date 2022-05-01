<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * @property string $id
 * @property string $username
 * @property string auth_key
 * @property string password_hash
 * @property string password_reset_token
 * @property string|null email
 * @property string name
 * @property string surname
 * @property int status
 * @property int role
 * @property int|null password_updated_at
 * @property int created_at
 * @property int updated_at
 *
 * @property string $password not written in DB
 */
class User extends ActiveRecord implements IdentityInterface
{
    public const STATUS_DELETED = 0;
    public const STATUS_ACTIVE = 1;

    public const STATUSES_ALLOWED = [
        self::STATUS_DELETED,
        self::STATUS_ACTIVE,
    ];

    public const ROLE_ADMIN = 0;
    public const ROLE_INSTRUCTOR = 1;
    public const ROLE_STUDENT = 2;

    public const ROLES_ALLOWED = [
        self::ROLE_ADMIN,
        self::ROLE_INSTRUCTOR,
        self::ROLE_STUDENT,
    ];

    /**
     * Property not written in DB
     * @var string temporary password storage for new user before data saving in DB
     */
    public string $password = '';

    public static function tableName()
    {
        return 'system_users';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['username', 'password', 'name', 'surname'], 'required'],
            ['username', 'unique'],
            ['email', 'email'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => self::STATUSES_ALLOWED],
            ['role', 'in', 'range' => self::ROLES_ALLOWED],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne(
            [
                'password_reset_token' => $token,
                'status' => self::STATUS_ACTIVE,
            ]
        );
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword(string $password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword(string $password)
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
}
