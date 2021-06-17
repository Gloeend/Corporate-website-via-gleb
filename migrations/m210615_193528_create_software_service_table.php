<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%software_service}}`.
 */
class m210615_193528_create_software_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%software_service}}', [
            'id' => $this->primaryKey(),
            'id_software' => $this->integer(),
            'id_service' => $this->integer(),
        ]);

        $this->createIndex('idx_software_software_service-id_software', '{{%software_service}}', 'id_software');
        $this->createIndex('idx_service_software_service-id_service', '{{%software_service}}', 'id_service');

        $this->addForeignKey('fk_software_software_service-id_software', '{{%software_service}}', 'id_software', '{{%software}}', 'id');
        $this->addForeignKey('fk_service_software_service-id_service', '{{%software_service}}', 'id_service', '{{%service}}', 'id');


        $this->insert('{{%software_service}}', [
            'id_software' => 1,
            'id_service' => 1,
        ]);
        $this->insert('{{%software_service}}', [
            'id_software' => 2,
            'id_service' => 2,
        ]);
        $this->insert('{{%software_service}}', [
            'id_software' => 3,
            'id_service' => 3,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%software_service}}');
    }
}
