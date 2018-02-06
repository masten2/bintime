<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $lastName
 * @property int $gender
 * @property string $created_at
 * @property string $mail
 */
class Client extends \yii\db\ActiveRecord
{

    const GENDER_EMPTY = array('id' => 0, 'value' => "Нет информации");
    const GENDER_MALE = array('id' => 1, 'value' => "Мужской");
    const GENDER_FEMALE = array('id' => 2, 'value' => "Женский");

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'lastName', 'gender', 'mail'], 'trim'],
            [['login', 'password', 'name', 'lastName', 'gender', 'mail'], 'required'],
            ['login', 'string', 'min' => 4],
            [['gender'], 'integer'],
            [['created_at'], 'safe'],
            [['login', 'password', 'name', 'lastName', 'mail'], 'string', 'max' => 255],
            [['mail', 'login'], 'unique'],
            [['mail'], 'email'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'name' => 'Имя',
            'lastName' => 'Фамилия',
            'gender' => 'Пол',
            'created_at' => 'Created At',
            'mail' => 'e-mail',
        ];
    }

    public function getGenderList()
    {
        $genders = [self::GENDER_EMPTY, self::GENDER_MALE, self::GENDER_FEMALE];

        return ArrayHelper::map($genders, 'id', 'value');
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->name = ucfirst(strtolower($this->name));
            $this->lastName = ucfirst(strtolower($this->lastName));

            return true;
        }
        return false;
    }
}
