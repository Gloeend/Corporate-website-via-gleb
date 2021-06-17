<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_role}}`.
 */
class m210615_193254_create_user_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_role}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_role' => $this->integer(),
        ]);

        $this->createIndex('idx_user_user_role-id_user', '{{%user_role}}', 'id_user');
        $this->createIndex('idx_role_user_role-id_role', '{{%user_role}}', 'id_role');

        $this->addForeignKey('fk_user_user_role-id_user', '{{%user_role}}', 'id_user', '{{%user}}', 'id');
        $this->addForeignKey('fk_role_user_role-id_role', '{{%user_role}}', 'id_role', '{{%role}}', 'id');

        $this->insert('{{%user_role}}', [
            'id_user' => 1,
            'id_role' => 1,
        ]);
        $this->insert('{{%user_role}}', [
            'id_user' => 2,
            'id_role' => 2,
        ]);
        $this->insert('{{%user_role}}', [
            'id_user' => 3,
            'id_role' => 3,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_role}}');
    }
}
