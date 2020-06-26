<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pagoProveedor}}`.
 */
class m200619_184214_create_pagoProveedor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pagoProveedor}}', [
            'id' => $this->primaryKey(),
            'fecha' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pagoProveedor}}');
    }
}
