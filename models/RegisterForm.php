<?php


namespace app\models;


use yii\base\Model;

class RegisterForm extends Model
{
 public $surname;
 public $name;
 public $patronymic;
 public $login;
 public $email;
 public $password;
 public $role;

    public function rules()
    {
        return [
            [['surname', 'name', 'patronymic', 'login' , 'email', 'password' ], 'required'],
            ['email', 'email'],
        ];
    }
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
}