<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%compra}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%proveedor}}`
 * - `{{%producto}}`
 */
class m200619_202829_add_position_column_to_compra_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%compra}}', 'id_proveedor', $this->integer()->notNull());
        $this->addColumn('{{%compra}}', 'id_producto', $this->integer()->notNull());

        // creates index for column `id_proveedor`
        $this->createIndex(
            '{{%idx-compra-id_proveedor}}',
            '{{%compra}}',
            'id_proveedor'
        );

        // add foreign key for table `{{%proveedor}}`
        $this->addForeignKey(
            '{{%fk-compra-id_proveedor}}',
            '{{%compra}}',
            'id_proveedor',
            '{{%proveedor}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_producto`
        $this->createIndex(
            '{{%idx-compra-id_producto}}',
            '{{%compra}}',
            'id_producto'
        );

        // add foreign key for table `{{%producto}}`
        $this->addForeignKey(
            '{{%fk-compra-id_producto}}',
            '{{%compra}}',
            'id_producto',
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
        // drops foreign key for table `{{%proveedor}}`
        $this->dropForeignKey(
            '{{%fk-compra-id_proveedor}}',
            '{{%compra}}'
        );

        // drops index for column `id_proveedor`
        $this->dropIndex(
            '{{%idx-compra-id_proveedor}}',
            '{{%compra}}'
        );

        // drops foreign key for table `{{%producto}}`
        $this->dropForeignKey(
            '{{%fk-compra-id_producto}}',
            '{{%compra}}'
        );

        // drops index for column `id_producto`
        $this->dropIndex(
            '{{%idx-compra-id_producto}}',
            '{{%compra}}'
        );

        $this->dropColumn('{{%compra}}', 'id_proveedor');
        $this->dropColumn('{{%compra}}', 'id_producto');
    }
}
