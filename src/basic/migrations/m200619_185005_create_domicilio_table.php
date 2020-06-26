<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%domicilio}}`.
 */
class m200619_185005_create_domicilio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%domicilio}}', [
            'id' => $this->primaryKey(),
            'calle' => $this->string(),
            'numero' => $this->integer(),
            'ciudad' => $this->string(),
            'provincia' => $this->string(),
            'codPostal' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%domicilio}}');
    }
}
