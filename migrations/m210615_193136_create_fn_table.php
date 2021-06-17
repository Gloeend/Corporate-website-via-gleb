<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fn}}`.
 */
class m210615_193136_create_fn_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fn}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(127),
        ]);

        $this->insert('{{%fn}}', [
            'title' => 'Иван'
        ]);

        $this->insert('{{%fn}}', [
            'title' => 'Артем'
        ]);

        $this->insert('{{%fn}}', [
            'title' => 'Юрич'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fn}}');
    }
}
