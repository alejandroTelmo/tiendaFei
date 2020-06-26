<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%carrito}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%cliente}}`
 */
class m200619_203332_add_position_column_to_carrito_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%carrito}}', 'id_cliente', $this->integer()->notNull());

        // creates index for column `id_cliente`
        $this->createIndex(
            '{{%idx-carrito-id_cliente}}',
            '{{%carrito}}',
            'id_cliente'
        );

        // add foreign key for table `{{%cliente}}`
        $this->addForeignKey(
            '{{%fk-carrito-id_cliente}}',
            '{{%carrito}}',
            'id_cliente',
            '{{%cliente}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%cliente}}`
        $this->dropForeignKey(
            '{{%fk-carrito-id_cliente}}',
            '{{%carrito}}'
        );

        // drops index for column `id_cliente`
        $this->dropIndex(
            '{{%idx-carrito-id_cliente}}',
            '{{%carrito}}'
        );

        $this->dropColumn('{{%carrito}}', 'id_cliente');
    }
}
