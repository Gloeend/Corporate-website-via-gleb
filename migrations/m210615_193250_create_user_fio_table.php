<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_fio}}`.
 */
class m210615_193250_create_user_fio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_fio}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_fio' => $this->integer(),
        ]);

        $this->createIndex('idx_user_user_fio-id_user', '{{%user_fio}}', 'id_user');
        $this->createIndex('idx_fio_user_fio-id_fio', '{{%user_fio}}', 'id_fio');

        $this->addForeignKey('fk_user_user_fio-id_user', '{{%user_fio}}', 'id_user', '{{%user}}', 'id');
        $this->addForeignKey('fk_fio_user_fio-id_fio', '{{%user_fio}}', 'id_fio', '{{%fio}}', 'id');

        $this->insert('{{%user_fio}}', [
            'id_user' => 1,
            'id_fio' => 1,
        ]);
        $this->insert('{{%user_fio}}', [
            'id_user' => 2,
            'id_fio' => 2,
        ]);
        $this->insert('{{%user_fio}}', [
            'id_user' => 3,
            'id_fio' => 3,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_fio}}');
    }
}
