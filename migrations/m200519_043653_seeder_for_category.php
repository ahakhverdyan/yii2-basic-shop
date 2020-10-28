<?php

use yii\db\Migration;

/**
 * Class m200519_043653_seeder_for_category
 */
class m200519_043653_seeder_for_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = 'INSERT INTO `category` (`id`, `parent_id`, `title`, `description`, `keywords`) VALUES
                (1, 0, \'Branded Foods\', \'Branded Foods description\', \'Branded Foods keywords\'),
                (2, 0, \'Households\', \'Households description\', \'Households keywords\'),
                (3, 0, \'Veggies & Fruits\', \'Veggies & Fruits description\', \'Veggies & Fruits keywords\'),
                (4, 3, \'Vegetables\', \'Vegetables description\', \'Vegetables keywords\'),
                (5, 3, \'Fruits\', \'Fruits description\', \'Fruits keywords\'),
                (6, 0, \'Kitchen\', NULL, NULL),
                (7, 0, \'Short Codes\', NULL, NULL),
                (8, 0, \'Beverages\', NULL, NULL),
                (9, 8, \'Soft Drinks\', NULL, NULL),
                (10, 8, \'Juices\', NULL, NULL),
                (11, 0, \'Pet Food\', NULL, NULL),
                (12, 0, \'Frozen Foods\', NULL, NULL),
                (13, 12, \'Frozen Snacks\', NULL, NULL),
                (14, 12, \'Frozen Nonveg\', NULL, NULL),
                (15, 0, \'Bread & Bakery\', NULL, NULL)';
        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

}
