<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%venta}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%carrito}}`
 * - `{{%facturacion}}`
 */
class m200619_210056_add_position_column_to_venta_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%venta}}', 'id_carrito', $this->integer()->notNull());
        $this->addColumn('{{%venta}}', 'id_facturacion', $this->integer()->notNull());

        // creates index for column `id_carrito`
        $this->createIndex(
            '{{%idx-venta-id_carrito}}',
            '{{%venta}}',
            'id_carrito'
        );

        // add foreign key for table `{{%carrito}}`
        $this->addForeignKey(
            '{{%fk-venta-id_carrito}}',
            '{{%venta}}',
            'id_carrito',
            '{{%carrito}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_facturacion`
        $this->createIndex(
            '{{%idx-venta-id_facturacion}}',
            '{{%venta}}',
            'id_facturacion'
        );

        // add foreign key for table `{{%facturacion}}`
        $this->addForeignKey(
            '{{%fk-venta-id_facturacion}}',
            '{{%venta}}',
            'id_facturacion',
            '{{%facturacion}}',
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
            '{{%fk-venta-id_carrito}}',
            '{{%venta}}'
        );

        // drops index for column `id_carrito`
        $this->dropIndex(
            '{{%idx-venta-id_carrito}}',
            '{{%venta}}'
        );

        // drops foreign key for table `{{%facturacion}}`
        $this->dropForeignKey(
            '{{%fk-venta-id_facturacion}}',
            '{{%venta}}'
        );

        // drops index for column `id_facturacion`
        $this->dropIndex(
            '{{%idx-venta-id_facturacion}}',
            '{{%venta}}'
        );

        $this->dropColumn('{{%venta}}', 'id_carrito');
        $this->dropColumn('{{%venta}}', 'id_facturacion');
    }
}
