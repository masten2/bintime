<?php

use yii\db\Migration;

/**
 * Handles the creation of table `client`.
 */
class m180206_140122_create_client_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'login' => 'varchar(255) not null',
            'password' => 'varchar(255) not null',
            'name' => 'varchar(255) not null',
            'lastName' => 'varchar(255) not null',
            'gender' => 'int not null',
            'created_at' => $this->dateTime()->notNull(),
            'mail' => $this->string()->notNull()->unique()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('client');
    }
}
