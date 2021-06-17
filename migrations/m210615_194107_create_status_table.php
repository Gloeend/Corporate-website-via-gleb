<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status}}`.
 */
class m210615_194107_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(63),
        ]);

        $this->insert('{{%status}}', [
            'title' => 'В ожидании'
        ]);
        $this->insert('{{%status}}', [
            'title' => 'Одобрено'
        ]);
        $this->insert('{{%status}}', [
            'title' => 'Отказано'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%status}}');
    }
}
