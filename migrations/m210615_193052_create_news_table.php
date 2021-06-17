<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m210615_193052_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(127),
            'desc' => $this->text(),
            'preview' => $this->text(),
        ]);

        $this->insert('{{%news}}', [
            'title' => 'Заголовок новости 1',
            'desc' => 'Текст новости 1',
            'preview' => 'img/main/preview.jpg',
        ]);

        $this->insert('{{%news}}', [
            'title' => 'Заголовок новости 2',
            'desc' => 'Текст новости 2',
            'preview' => 'img/main/preview.jpg',
        ]);

        $this->insert('{{%news}}', [
            'title' => 'Заголовок новости 3',
            'desc' => 'Текст новости 3',
            'preview' => 'img/main/preview.jpg',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
