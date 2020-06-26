<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carrito}}`.
 */
class m200619_184445_create_carrito_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%carrito}}', [
            'id' => $this->primaryKey(),
            'cantidad' => $this->integer(),
            'fecha' => $this->date(),
            'totalCarrito' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%carrito}}');
    }
}
