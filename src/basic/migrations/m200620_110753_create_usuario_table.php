<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%usuario}}`.
 */
class m200620_110753_create_usuario_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usuario}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'puesto' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%usuario}}');
    }
}
