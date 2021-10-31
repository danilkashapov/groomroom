<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property string $nickname
 * @property string $description
 * @property int $category_id
 * @property string $image
 * @property string $status
 * @property int $user_id
 *
 * @property Categoryes $category
 * @property User $user
 */
class Applications extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['nickname', 'description', 'image'], 'required'],
//            [['category_id', 'user_id'], 'integer'],
            [['status'], 'string'],
            [['nickname'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoryes::className(), 'targetAttribute' => ['category_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Кличка',
            'description' => 'Описание',
            'category_id' => 'Категория',
            'image' => 'Фото',
            'status' => 'Статус',
            'user_id' => 'Пользователь',
            'imageFile' => 'Фото',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categoryes::className(), ['id' => 'category_id']);
    }




    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
