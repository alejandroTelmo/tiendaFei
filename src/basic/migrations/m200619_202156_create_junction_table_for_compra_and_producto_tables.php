<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%compra_producto}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%compra}}`
 * - `{{%producto}}`
 */
class m200619_202156_create_junction_table_for_compra_and_producto_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%compra_producto}}', [
            'compra_id' => $this->integer(),
            'producto_id' => $this->integer(),
            'PRIMARY KEY(compra_id, producto_id)',
        ]);

        // creates index for column `compra_id`
        $this->createIndex(
            '{{%idx-compra_producto-compra_id}}',
            '{{%compra_producto}}',
            'compra_id'
        );

        // add foreign key for table `{{%compra}}`
        $this->addForeignKey(
            '{{%fk-compra_producto-compra_id}}',
            '{{%compra_producto}}',
            'compra_id',
            '{{%compra}}',
            'id',
            'CASCADE'
        );

        // creates index for column `producto_id`
        $this->createIndex(
            '{{%idx-compra_producto-producto_id}}',
            '{{%compra_producto}}',
            'producto_id'
        );

        // add foreign key for table `{{%producto}}`
        $this->addForeignKey(
            '{{%fk-compra_producto-producto_id}}',
            '{{%compra_producto}}',
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
        // drops foreign key for table `{{%compra}}`
        $this->dropForeignKey(
            '{{%fk-compra_producto-compra_id}}',
            '{{%compra_producto}}'
        );

        // drops index for column `compra_id`
        $this->dropIndex(
            '{{%idx-compra_producto-compra_id}}',
            '{{%compra_producto}}'
        );

        // drops foreign key for table `{{%producto}}`
        $this->dropForeignKey(
            '{{%fk-compra_producto-producto_id}}',
            '{{%compra_producto}}'
        );

        // drops index for column `producto_id`
        $this->dropIndex(
            '{{%idx-compra_producto-producto_id}}',
            '{{%compra_producto}}'
        );

        $this->dropTable('{{%compra_producto}}');
    }
}
