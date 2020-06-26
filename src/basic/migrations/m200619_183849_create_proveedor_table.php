<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%proveedor}}`.
 */
class m200619_183849_create_proveedor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%proveedor}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'direccion' => $this->string(),
            'ciudad' => $this->string(),
            'telefono' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%proveedor}}');
    }
}
