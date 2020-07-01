<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%compra}}`.
 */
class m200629_143300_add_position_column_to_compra_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%compra}}', 'fecha', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%compra}}', 'fecha');
    }
}
