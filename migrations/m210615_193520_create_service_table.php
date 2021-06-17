<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m210615_193520_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(127),
            'price' => $this->integer(),
        ]);

        $this->insert('{{%service}}', [
            'title' => 'Сайт',
            'price' => 5000,
        ]);

        $this->insert('{{%service}}', [
            'title' => 'Игра',
            'price' => 15000,
        ]);

        $this->insert('{{%service}}', [
            'title' => 'Мессенджер',
            'price' => 10000,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');
    }
}
