<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 06.02.2018
 * Time: 16:50
 */

namespace app\controllers;
use app\models\Client;
use app\models\ClientAddress;
use yii\helpers\Url;
use yii\web\Controller;
use yii\data\Pagination;


class ClientController extends Controller
{
    public function actionNew()
    {
        $clientModel = new Client();
        $clientAddressModel = new ClientAddress();

        if ($clientModel->load(\Yii::$app->request->post()) && $clientModel->validate()) {
            $clientModel->save();
            $clientPk = $clientModel->getPrimaryKey();

            if ($clientAddressModel->load(\Yii::$app->request->post()) && $clientAddressModel->validate()) {
                $clientAddressModel->client_id = $clientPk;
                $clientAddressModel->save();
            }


            return $this->redirect(['/client/list']);
        }

        return $this->render('new', ['clientModel' => $clientModel, 'clientAddressModel' => $clientAddressModel]);

    }

    public function actionList()
    {
        $clients = Client::find();

        $pagination = new Pagination(
            [
                'defaultPageSize' => 2,
                'totalCount' => $clients->count()

            ]
        );

        $clients = $clients->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy('id DESC')
            ->all();


        return $this->render('list', ['clients' => $clients, 'pagination' => $pagination]);
    }

}