<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_product}}`.
 */
class m201029_191950_create_order_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_product}}', [
            'id' => $this->primaryKey()->unsigned(),
            'order_id' => $this->integer()->unsigned()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'title' => $this->string(255),
            'price' => $this->decimal(6,2)->notNull()->defaultValue('0.00'),
            'qty' => $this->tinyInteger(3)->unsigned()->notNull(),
            'total' => $this->decimal(6,2)->notNull()
        ]);

        $this->createIndex('order_product_order_id', '{{%order_product}}', 'order_id');
        $this->createIndex('order_product_product_id', '{{%order_product}}', 'product_id');

        $this->addForeignKey('fk_order_product_order_id', '{{%order_product}}', 'order_id', '{{%orders}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_order_product_product_id', '{{%order_product}}', 'product_id', '{{%product}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_product}}');
    }
}
