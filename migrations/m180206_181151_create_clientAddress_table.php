<?php

use yii\db\Migration;

/**
 * Handles the creation of table `clientAddress`.
 */
class m180206_181151_create_clientAddress_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('clientAddress', [
            'id' => $this->primaryKey(),
            'postcode' => 'int not null',
            'countryCode' => 'varchar(255) not null',
            'cityName' => 'varchar(255) not null',
            'streetName' => 'varchar(255) not null',
            'houseNumber' => 'varchar(255) not null',
            'apartmentNumber' => 'varchar(255) null',
            'client_id' => 'int not null'
        ]);

        $this->addForeignKey('clientAddress_client_id', 'clientAddress', 'client_id', 'client', 'id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('clientAddress');
    }
}

