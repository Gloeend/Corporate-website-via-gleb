<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%software}}`.
 */
class m210615_193514_create_software_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%software}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(127),
        ]);

        $this->insert('{{%software}}', [
            'title' => 'Веб-приложение'
        ]);

        $this->insert('{{%software}}', [
            'title' => 'Настольная программа'
        ]);

        $this->insert('{{%software}}', [
            'title' => 'Мобильное приложение'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%software}}');
    }
}
