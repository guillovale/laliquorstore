<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
#use yii\db\ActiveRecord;
#use yii\helpers\Security;
#use yii\web\IdentityInterface;

/**
 * This is the model class for table "tbl_usuario".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $passwordsalt
 * @property string $password
 * @property string $fecha
 * @property string $rol
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['fecha'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['passwordsalt'], 'string', 'max' => 6],
            [['password'], 'string', 'max' => 60],
            [['rol'], 'string', 'max' => 1],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'passwordsalt' => 'Passwordsalt',
            'password' => 'Password',
            'fecha' => 'Fecha',
            'rol' => 'Rol',
        ];
    }

	public static function findIdentity($id)
    {
		return static::findOne($id);
        #return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
		return static::findOne(['username' => $username]);
		
        #foreach (self::$users as $user) {
         #   if (strcasecmp($user['username'], $username) === 0) {
         #       return new static($user);
         #   }
        #}

        #return null;
    }

	

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
		#echo var_dump(crypt($password, $this->password), $this->password, hash_equals($this->password, crypt($password, $this->password))); exit;
        return password_verify($password, trim($this->password));
    }
	
	public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

}
