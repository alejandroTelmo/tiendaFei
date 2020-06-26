<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pagoCliente}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%venta}}`
 */
class m200619_210226_add_position_column_to_pagoCliente_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%pagoCliente}}', 'id_venta', $this->integer()->notNull());

        // creates index for column `id_venta`
        $this->createIndex(
            '{{%idx-pagoCliente-id_venta}}',
            '{{%pagoCliente}}',
            'id_venta'
        );

        // add foreign key for table `{{%venta}}`
        $this->addForeignKey(
            '{{%fk-pagoCliente-id_venta}}',
            '{{%pagoCliente}}',
            'id_venta',
            '{{%venta}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%venta}}`
        $this->dropForeignKey(
            '{{%fk-pagoCliente-id_venta}}',
            '{{%pagoCliente}}'
        );

        // drops index for column `id_venta`
        $this->dropIndex(
            '{{%idx-pagoCliente-id_venta}}',
            '{{%pagoCliente}}'
        );

        $this->dropColumn('{{%pagoCliente}}', 'id_venta');
    }
}
