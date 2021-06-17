<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_news}}`.
 */
class m210615_193310_create_user_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_news}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_news' => $this->integer(),
        ]);

        $this->createIndex('idx_user_user_news-id_user', '{{%user_news}}', 'id_user');
        $this->createIndex('idx_news_user_news-id_news', '{{%user_news}}', 'id_news');

        $this->addForeignKey('fk_user_user_news-id_user', '{{%user_news}}', 'id_user', '{{%user}}', 'id');
        $this->addForeignKey('fk_news_user_news-id_news', '{{%user_news}}', 'id_news', '{{%news}}', 'id');

        $this->insert('{{%user_news}}', [
           'id_user' => 2,
           'id_news' => 1
        ]);
        $this->insert('{{%user_news}}', [
           'id_user' => 2,
           'id_news' => 2
        ]);
        $this->insert('{{%user_news}}', [
           'id_user' => 2,
           'id_news' => 3
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_news}}');
    }
}
