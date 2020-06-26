<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%envio}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%venta}}`
 */
class m200619_210303_add_position_column_to_envio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%envio}}', 'id_venta', $this->integer()->notNull());

        // creates index for column `id_venta`
        $this->createIndex(
            '{{%idx-envio-id_venta}}',
            '{{%envio}}',
            'id_venta'
        );

        // add foreign key for table `{{%venta}}`
        $this->addForeignKey(
            '{{%fk-envio-id_venta}}',
            '{{%envio}}',
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
            '{{%fk-envio-id_venta}}',
            '{{%envio}}'
        );

        // drops index for column `id_venta`
        $this->dropIndex(
            '{{%idx-envio-id_venta}}',
            '{{%envio}}'
        );

        $this->dropColumn('{{%envio}}', 'id_venta');
    }
}
