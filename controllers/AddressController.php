<?php

namespace app\controllers;

use app\models\ClientAddress;
use yii\web\Controller;


class AddressController extends Controller
{
    public function actionNew()
    {
        $clientAddressModel = new ClientAddress();

        if ($clientAddressModel->load(\Yii::$app->request->post()) && $clientAddressModel->validate()) {
            $clientAddressModel->save();
        }

        return $this->redirect(["/client/edit/$clientAddressModel->client_id"]);
    }

    public function actionEdit()
    {
        $addressId = \Yii::$app->request->post('addressId');

        $clientAddressModel = ClientAddress::findOne($addressId);

        if (!$clientAddressModel instanceof ClientAddress) {
            throw new \yii\web\HttpException(404);
        }

        if ($clientAddressModel->load(\Yii::$app->request->post()) && $clientAddressModel->validate()) {
            $clientAddressModel->save();
        }

        return $this->redirect(["/client/edit/$clientAddressModel->client_id"]);
    }

    public function actionDelete()
    {
        $id = \Yii::$app->request->post('id');
        $clientId = \Yii::$app->request->post('clientId');
        $clientAddress = ClientAddress::findOne($id);

        if ($clientAddress instanceof ClientAddress)
        {
            $clientAddress->delete();
        }

        return $this->redirect(["/client/edit/$clientId"]);
    }
}