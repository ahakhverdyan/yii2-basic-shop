<?php


namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%category%}}';
    }

    public function getParent() {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

}