<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m210615_193053_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(63)->defaultValue(3),
        ]);

        $this->insert('{{%role}}', [
           'title' => 'admin',
        ]);

        $this->insert('{{%role}}', [
           'title' => 'moderator',
        ]);

        $this->insert('{{%role}}', [
           'title' => 'user',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role}}');
    }
}
