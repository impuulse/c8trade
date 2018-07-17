<?php

use yii\db\Migration;

/**
 * Handles the creation of table `model`.
 */
class m180717_121802_create_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('model', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()
        ]);

        $this->addForeignKey('model-brand_id', 'model', 'brand_id', 'brand', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('model-brand_id', 'model');
        $this->dropTable('model');
    }
}
