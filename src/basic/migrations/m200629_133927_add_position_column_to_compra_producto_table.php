<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%compra_producto}}`.
 */
class m200629_133927_add_position_column_to_compra_producto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%compra_producto}}', 'cantidad', $this->integer());
        $this->addColumn('{{%compra_producto}}', 'costo', $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%compra_producto}}', 'cantidad');
        $this->dropColumn('{{%compra_producto}}', 'costo');
    }
}
