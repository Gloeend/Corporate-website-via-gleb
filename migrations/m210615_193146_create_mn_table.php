<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mn}}`.
 */
class m210615_193146_create_mn_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mn}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(127),
        ]);

        $this->insert('{{%mn}}', [
            'title' => 'Иванович'
        ]);

        $this->insert('{{%mn}}', [
            'title' => 'Артемович'
        ]);

        $this->insert('{{%mn}}', [
            'title' => 'Викторович'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mn}}');
    }
}
