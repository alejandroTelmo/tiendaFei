<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pagoProveedor}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%compra}}`
 */
class m200619_203216_add_position_column_to_pagoProveedor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%pagoProveedor}}', 'id_compra', $this->integer()->notNull());

        // creates index for column `id_compra`
        $this->createIndex(
            '{{%idx-pagoProveedor-id_compra}}',
            '{{%pagoProveedor}}',
            'id_compra'
        );

        // add foreign key for table `{{%compra}}`
        $this->addForeignKey(
            '{{%fk-pagoProveedor-id_compra}}',
            '{{%pagoProveedor}}',
            'id_compra',
            '{{%compra}}',
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
            '{{%fk-pagoProveedor-id_compra}}',
            '{{%pagoProveedor}}'
        );

        // drops index for column `id_compra`
        $this->dropIndex(
            '{{%idx-pagoProveedor-id_compra}}',
            '{{%pagoProveedor}}'
        );

        $this->dropColumn('{{%pagoProveedor}}', 'id_compra');
    }
}
