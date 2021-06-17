<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210615_193237_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->char(31)->unique(),
            'password' => $this->char(63),
            'age' => $this->integer()
        ]);

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'password' => Yii::$app->security->generatePasswordHash('admin'),
            'age' => 18
        ]);

        $this->insert('{{%user}}', [
            'username' => 'mod',
            'password' => Yii::$app->security->generatePasswordHash('mod'),
            'age' => 26
        ]);

        $this->insert('{{%user}}', [
            'username' => 'user',
            'password' => Yii::$app->security->generatePasswordHash('user'),
            'age' => 37
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
