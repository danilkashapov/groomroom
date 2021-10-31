<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $login;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    public function rules()
    {
        return [
            // username and password are both required
            [['login', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'

        ];
    }
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user ) {
                $this->addError($attribute, 'Incorrect username.');
                return;
            }
            if (!$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect password.');
                return;
            }

        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->login);
        }

        return $this->_user;
    }
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }


//
//    public function login(){
//        $user = User::find()->where(['login' => $this->login, 'password' => $this->password])->one();
//        if($user){
//            \Yii::$app->user->login($user);
//            return $user;
//        }
//        $this->addError('login','Неправильный логин...');
//        $this->addError('password','...или пароль');
//        return false;
//    }
}
