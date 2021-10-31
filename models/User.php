<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $login
 * @property string $email
 * @property string $password
 * @property string $role
 *
 * @property Applications[] $applications
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'patronymic', 'login', 'email', 'password', 'role'], 'required'],
            [['role'], 'string'],
            [['surname', 'name', 'patronymic', 'login', 'email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 155],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getApplications()
    {
        return $this->hasMany(Applications::className(), ['user_id' => 'id']);
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
//        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    public static function findByUsername($login)
    {
        $user = User::find()->where(['login' => $login])->one();
        return $user;

//        return null;
    }
    public function getUsername()
    {
        return Yii::$app->user->identity;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password,$this->password);
        Yii::debug($this->password.'==='.$password);
        return $this->password === $password;
    }
    public function getName()
    {
        return \Yii::$app->user->identity->surname;
    }

}
