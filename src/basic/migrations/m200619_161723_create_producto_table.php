<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%producto}}`.
 */
class m200619_161723_create_producto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%producto}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(255),
            'descripcion' => $this->string(255),
            'stock' => $this->integer(),
            'precioVenta' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%producto}}');
    }
}
