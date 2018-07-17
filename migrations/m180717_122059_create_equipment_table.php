<?php

use yii\db\Migration;

/**
 * Handles the creation of table `equipment`.
 */
class m180717_122059_create_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('equipment', [
            'id' => $this->primaryKey(),
            'model_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
            'description' => $this->text()
        ]);

        $this->addForeignKey('equipment-model_id', 'equipment', 'model_id', 'model', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('equipment-model_id', 'equipment');
        $this->dropTable('equipment');
    }
}
