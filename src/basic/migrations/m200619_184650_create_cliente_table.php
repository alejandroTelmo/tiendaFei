<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cliente}}`.
 */
class m200619_184650_create_cliente_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cliente}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'apellido' => $this->string(),
            'telefono' => $this->string(),
            'cuit' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cliente}}');
    }
}
