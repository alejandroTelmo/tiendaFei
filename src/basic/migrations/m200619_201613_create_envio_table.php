<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%envio}}`.
 */
class m200619_201613_create_envio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%envio}}', [
            'id' => $this->primaryKey(),
            'fecha' => $this->date(),
            'bultos' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%envio}}');
    }
}
