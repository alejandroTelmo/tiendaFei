<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carrito_producto}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%carrito}}`
 * - `{{%producto}}`
 */
class m200619_203524_create_junction_table_for_carrito_and_producto_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%carrito_producto}}', [
            'carrito_id' => $this->integer(),
            'producto_id' => $this->integer(),
            'PRIMARY KEY(carrito_id, producto_id)',
        ]);

        // creates index for column `carrito_id`
        $this->createIndex(
            '{{%idx-carrito_producto-carrito_id}}',
            '{{%carrito_producto}}',
            'carrito_id'
        );

        // add foreign key for table `{{%carrito}}`
        $this->addForeignKey(
            '{{%fk-carrito_producto-carrito_id}}',
            '{{%carrito_producto}}',
            'carrito_id',
            '{{%carrito}}',
            'id',
            'CASCADE'
        );

        // creates index for column `producto_id`
        $this->createIndex(
            '{{%idx-carrito_producto-producto_id}}',
            '{{%carrito_producto}}',
            'producto_id'
        );

        // add foreign key for table `{{%producto}}`
        $this->addForeignKey(
            '{{%fk-carrito_producto-producto_id}}',
            '{{%carrito_producto}}',
            'producto_id',
            '{{%producto}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%carrito}}`
        $this->dropForeignKey(
            '{{%fk-carrito_producto-carrito_id}}',
            '{{%carrito_producto}}'
        );

        // drops index for column `carrito_id`
        $this->dropIndex(
            '{{%idx-carrito_producto-carrito_id}}',
            '{{%carrito_producto}}'
        );

        // drops foreign key for table `{{%producto}}`
        $this->dropForeignKey(
            '{{%fk-carrito_producto-producto_id}}',
            '{{%carrito_producto}}'
        );

        // drops index for column `producto_id`
        $this->dropIndex(
            '{{%idx-carrito_producto-producto_id}}',
            '{{%carrito_producto}}'
        );

        $this->dropTable('{{%carrito_producto}}');
    }
}
