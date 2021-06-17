<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m210615_194116_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_status' => $this->integer(),
            'id_software_service' => $this->integer(),
            'sum' => $this->integer(),
        ]);

        $this->createIndex('idx_user_order-id_user', '{{%order}}', 'id_user');
        $this->createIndex('idx_status_order-id_status', '{{%order}}', 'id_status');
        $this->createIndex('idx_software_service_order-id_software_service', '{{%order}}', 'id_software_service');

        $this->addForeignKey('fk_user_order-id_user', '{{%order}}', 'id_user', '{{%user}}', 'id');
        $this->addForeignKey('fk_status_order-id_status', '{{%order}}', 'id_status', '{{%status}}', 'id');
        $this->addForeignKey('fk_software_service_order-id_software_service', '{{%order}}', 'id_software_service', '{{%software_service}}', 'id');

        $this->insert('{{%order}}', [
            'id_user' => 3,
            'id_status' => 1,
            'id_software_service' => 1,
            'sum' => 5000,
        ]);
        $this->insert('{{%order}}', [
            'id_user' => 3,
            'id_status' => 2,
            'id_software_service' => 2,
            'sum' => 5000,
        ]);
        $this->insert('{{%order}}', [
            'id_user' => 3,
            'id_status' => 1,
            'id_software_service' => 3,
            'sum' => 5000,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
