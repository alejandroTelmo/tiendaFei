<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%compra}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tiposDePago}}`
 */
class m200619_203110_add_position_column_to_compra_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%compra}}', 'id_tipos_pagos', $this->integer()->notNull());

        // creates index for column `id_tipos_pagos`
        $this->createIndex(
            '{{%idx-compra-id_tipos_pagos}}',
            '{{%compra}}',
            'id_tipos_pagos'
        );

        // add foreign key for table `{{%tiposDePago}}`
        $this->addForeignKey(
            '{{%fk-compra-id_tipos_pagos}}',
            '{{%compra}}',
            'id_tipos_pagos',
            '{{%tiposDePago}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%tiposDePago}}`
        $this->dropForeignKey(
            '{{%fk-compra-id_tipos_pagos}}',
            '{{%compra}}'
        );

        // drops index for column `id_tipos_pagos`
        $this->dropIndex(
            '{{%idx-compra-id_tipos_pagos}}',
            '{{%compra}}'
        );

        $this->dropColumn('{{%compra}}', 'id_tipos_pagos');
    }
}
