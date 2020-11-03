<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m201030_125816_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey()->unsigned(),
            'username' => $this->string(100)->notNull(),
            'password' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255)->defaultValue(Null)
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
