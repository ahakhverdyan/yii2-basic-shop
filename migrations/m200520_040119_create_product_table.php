<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200520_040119_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->unsigned()->notNull(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'price' => $this->decimal(6, 2)->notNull()->defaultValue('0.00'),
            'old_price' => $this->decimal(6, 2)->notNull()->defaultValue('0.00'),
            'description' => $this->string()->defaultValue(Null),
            'keywords' => $this->string()->defaultValue(Null),
            'img' => $this->string()->notNull()->defaultValue('no-image.png'),
            'is_offer' => $this->tinyInteger(4)->notNull()->defaultValue(0)
        ]);

        $seaderSql = 'INSERT INTO `product` (`id`, `category_id`, `title`, `content`, `price`, `old_price`, `description`, `keywords`, `img`, `is_offer`) VALUES
(1, 1, \'knorr instant soup (100 gm)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'3.00\', \'0.00\', NULL, NULL, \'5.png\', 1),
(2, 1, \'chings noodles (75 gm)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'5.00\', \'8.00\', NULL, NULL, \'6.png\', 1),
(3, 1, \'lahsun sev (150 gm)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'3.00\', \'5.00\', NULL, NULL, \'7.png\', 1),
(4, 1, \'premium bake rusk (300 gm)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'5.00\', \'7.00\', NULL, NULL, \'8.png\', 1),
(5, 4, \'fresh spinach (palak)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'2.00\', \'3.00\', NULL, NULL, \'9.png\', 1),
(6, 5, \'fresh mango dasheri (1 kg)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'5.00\', \'8.00\', NULL, NULL, \'10.png\', 1),
(7, 5, \'fresh apple red (1 kg)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'6.00\', \'8.00\', NULL, NULL, \'11.png\', 1),
(8, 4, \'fresh broccoli (500 gm)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'4.00\', \'6.00\', NULL, NULL, \'12.png\', 1),
(9, 10, \'mixed fruit juice (1 ltr)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'3.00\', \'0.00\', NULL, NULL, \'13.png\', 1),
(10, 10, \'prune juice - sunsweet (1 ltr)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'4.00\', \'0.00\', NULL, NULL, \'14.png\', 1),
(11, 9, \'coco cola zero can (330 ml)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'3.00\', \'0.00\', NULL, NULL, \'15.png\', 1),
(12, 9, \'sprite bottle (2 ltr)\', \'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\', \'3.00\', \'0.00\', NULL, NULL, \'16.png\', 1);
';
        Yii::$app->db->createCommand($seaderSql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
