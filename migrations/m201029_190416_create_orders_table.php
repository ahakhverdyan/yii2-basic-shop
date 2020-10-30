<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m201029_190416_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(100)->notNull(),
            'email' => $this->string(255)->notNull(),
            'phone' => $this->string(50)->notNull(),
            'address' => $this->string(255)->notNull(),
            'note' => $this->text(),
            'status' => $this->tinyInteger(2)->defaultValue(0),
            'total' => $this->decimal(6,2)->notNull()->defaultValue('0.00'),
            'qty' => $this->tinyInteger(3)->unsigned()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
