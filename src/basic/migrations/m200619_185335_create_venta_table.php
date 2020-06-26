<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%venta}}`.
 */
class m200619_185335_create_venta_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%venta}}', [
            'id' => $this->primaryKey(),
            'fecha' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%venta}}');
    }
}
