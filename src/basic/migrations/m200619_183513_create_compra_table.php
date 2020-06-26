<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%compra}}`.
 */
class m200619_183513_create_compra_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%compra}}', [
            'id' => $this->primaryKey(),
            'costo' => $this->float(),
            'cantidad' => $this->integer(),
            'fecha' => $this->date(),
            'numRemito' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%compra}}');
    }
}
