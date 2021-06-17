<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fio}}`.
 */
class m210615_193156_create_fio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fio}}', [
            'id' => $this->primaryKey(),
            'id_fn' => $this->integer(),
            'id_ln' => $this->integer(),
            'id_mn' => $this->integer(),
        ]);

        $this->createIndex('idx_fn_fio-id_fn', '{{%fio}}', 'id_fn');
        $this->createIndex('idx_ln_fio-id_ln', '{{%fio}}', 'id_ln');
        $this->createIndex('idx_mn_fio-id_mn', '{{%fio}}', 'id_mn');

        $this->addForeignKey('fk_fn_fio-id_fn', '{{%fio}}', 'id_fn', '{{%fn}}', 'id');
        $this->addForeignKey('fk_ln_fio-id_ln', '{{%fio}}', 'id_ln', '{{%ln}}', 'id');
        $this->addForeignKey('fk_mn_fio-id_mn', '{{%fio}}', 'id_mn', '{{%mn}}', 'id');

        $this->insert('{{%fio}}', [
            'id_fn' => 1,
            'id_ln' => 1,
            'id_mn' => 1,
        ]);
        $this->insert('{{%fio}}', [
            'id_fn' => 2,
            'id_ln' => 2,
            'id_mn' => 2,
        ]);
        $this->insert('{{%fio}}', [
            'id_fn' => 3,
            'id_ln' => 3,
            'id_mn' => 3,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fio}}');
    }
}
