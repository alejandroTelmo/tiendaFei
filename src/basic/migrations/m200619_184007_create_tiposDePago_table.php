<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tiposDePago}}`.
 */
class m200619_184007_create_tiposDePago_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tiposDePago}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tiposDePago}}');
    }
}
