<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ln}}`.
 */
class m210615_193141_create_ln_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ln}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(127),
        ]);

        $this->insert('{{%ln}}', [
            'title' => 'Иванов'
        ]);

        $this->insert('{{%ln}}', [
            'title' => 'Артемов'
        ]);

        $this->insert('{{%ln}}', [
            'title' => 'Грушевский'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ln}}');
    }
}
