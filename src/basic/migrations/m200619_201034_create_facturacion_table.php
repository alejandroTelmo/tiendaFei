<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%facturacion}}`.
 */
class m200619_201034_create_facturacion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%facturacion}}', [
            'id' => $this->primaryKey(),
            'tipo' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%facturacion}}');
    }
}
