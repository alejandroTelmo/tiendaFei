<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%usuario_permiso}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%usuario}}`
 * - `{{%permiso}}`
 */
class m200620_111225_create_junction_table_for_usuario_and_permiso_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usuario_permiso}}', [
            'usuario_id' => $this->integer(),
            'permiso_id' => $this->integer(),
            'PRIMARY KEY(usuario_id, permiso_id)',
        ]);

        // creates index for column `usuario_id`
        $this->createIndex(
            '{{%idx-usuario_permiso-usuario_id}}',
            '{{%usuario_permiso}}',
            'usuario_id'
        );

        // add foreign key for table `{{%usuario}}`
        $this->addForeignKey(
            '{{%fk-usuario_permiso-usuario_id}}',
            '{{%usuario_permiso}}',
            'usuario_id',
            '{{%usuario}}',
            'id',
            'CASCADE'
        );

        // creates index for column `permiso_id`
        $this->createIndex(
            '{{%idx-usuario_permiso-permiso_id}}',
            '{{%usuario_permiso}}',
            'permiso_id'
        );

        // add foreign key for table `{{%permiso}}`
        $this->addForeignKey(
            '{{%fk-usuario_permiso-permiso_id}}',
            '{{%usuario_permiso}}',
            'permiso_id',
            '{{%permiso}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%usuario}}`
        $this->dropForeignKey(
            '{{%fk-usuario_permiso-usuario_id}}',
            '{{%usuario_permiso}}'
        );

        // drops index for column `usuario_id`
        $this->dropIndex(
            '{{%idx-usuario_permiso-usuario_id}}',
            '{{%usuario_permiso}}'
        );

        // drops foreign key for table `{{%permiso}}`
        $this->dropForeignKey(
            '{{%fk-usuario_permiso-permiso_id}}',
            '{{%usuario_permiso}}'
        );

        // drops index for column `permiso_id`
        $this->dropIndex(
            '{{%idx-usuario_permiso-permiso_id}}',
            '{{%usuario_permiso}}'
        );

        $this->dropTable('{{%usuario_permiso}}');
    }
}
