<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cliente_domicilio}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%cliente}}`
 * - `{{%domicilio}}`
 */
class m200701_152046_create_junction_table_for_cliente_and_domicilio_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cliente_domicilio}}', [
            'cliente_id' => $this->integer(),
            'domicilio_id' => $this->integer(),
            'PRIMARY KEY(cliente_id, domicilio_id)',
        ]);

        // creates index for column `cliente_id`
        $this->createIndex(
            '{{%idx-cliente_domicilio-cliente_id}}',
            '{{%cliente_domicilio}}',
            'cliente_id'
        );

        // add foreign key for table `{{%cliente}}`
        $this->addForeignKey(
            '{{%fk-cliente_domicilio-cliente_id}}',
            '{{%cliente_domicilio}}',
            'cliente_id',
            '{{%cliente}}',
            'id',
            'CASCADE'
        );

        // creates index for column `domicilio_id`
        $this->createIndex(
            '{{%idx-cliente_domicilio-domicilio_id}}',
            '{{%cliente_domicilio}}',
            'domicilio_id'
        );

        // add foreign key for table `{{%domicilio}}`
        $this->addForeignKey(
            '{{%fk-cliente_domicilio-domicilio_id}}',
            '{{%cliente_domicilio}}',
            'domicilio_id',
            '{{%domicilio}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%cliente}}`
        $this->dropForeignKey(
            '{{%fk-cliente_domicilio-cliente_id}}',
            '{{%cliente_domicilio}}'
        );

        // drops index for column `cliente_id`
        $this->dropIndex(
            '{{%idx-cliente_domicilio-cliente_id}}',
            '{{%cliente_domicilio}}'
        );

        // drops foreign key for table `{{%domicilio}}`
        $this->dropForeignKey(
            '{{%fk-cliente_domicilio-domicilio_id}}',
            '{{%cliente_domicilio}}'
        );

        // drops index for column `domicilio_id`
        $this->dropIndex(
            '{{%idx-cliente_domicilio-domicilio_id}}',
            '{{%cliente_domicilio}}'
        );

        $this->dropTable('{{%cliente_domicilio}}');
    }
}
