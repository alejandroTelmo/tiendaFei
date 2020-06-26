<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pagoCliente}}`.
 */
class m200619_201144_create_pagoCliente_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pagoCliente}}', [
            'id' => $this->primaryKey(),
            'fecha' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pagoCliente}}');
    }
}
