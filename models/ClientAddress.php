<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientAddress".
 *
 * @property int $id
 * @property int $postcode
 * @property string $countryCode
 * @property string $cityName
 * @property string $streetName
 * @property string $houseNumber
 * @property string $apartmentNumber
 * @property int $client_id
 *
 * @property ClientAddress $client
 * @property ClientAddress[] $clientAddresses
 */
class ClientAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientAddress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['postcode', 'countryCode', 'cityName', 'streetName', 'houseNumber', 'client_id'], 'trim'],
            [['postcode', 'countryCode', 'cityName', 'streetName', 'houseNumber'], 'required'],
            [['postcode', 'client_id'], 'integer'],
            [['cityName', 'streetName', 'houseNumber', 'apartmentNumber'], 'string', 'max' => 255],
            ['countryCode', 'string', 'max' => 2],
            ['countryCode', 'match', 'not' => true, 'pattern' => '/[^a-zA-Z_-]/', 'message' => 'Only a-z letters'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'postcode' => 'Почтовый индекс',
            'countryCode' => 'Страна',
            'cityName' => 'Название города',
            'streetName' => 'Название улицы',
            'houseNumber' => 'Hомер дома',
            'apartmentNumber' => 'Номер офиса/квартиры',
            'client_id' => 'Client ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(ClientAddress::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientAddresses()
    {
        return $this->hasMany(ClientAddress::className(), ['client_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->countryCode = strtoupper($this->countryCode);
            return true;
        }
        return false;
    }
}
