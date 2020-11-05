<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property string $price
 * @property string $old_price
 * @property string $description
 * @property string $keywords
 * @property string $img
 * @property int $is_offer
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if($file = UploadedFile::getInstance($this, 'file')) {
            $this->img = $this->getImagePath($file);
            $file->saveAs($this->img);
        }

        return parent::beforeSave($insert);
    }


    public function getImagePath(UploadedFile $file) {
        $dir = 'products/' . date('Y-m-d') . '/' ;
        $fileName = uniqid() . $file->baseName . '.' . $file->extension;
        if(!is_dir($dir)) mkdir($dir);
        return $dir . $fileName;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content'], 'required'],
            [['category_id', 'is_offer'], 'integer'],
            [['content'], 'string'],
            [['price', 'old_price'], 'number'],
            [['price', 'old_price'], 'default', 'value' => 0],
            [['img'], 'default', 'value' => 'products/no_image.png'],
            [['title', 'description', 'keywords', 'img'], 'string', 'max' => 255],
            [['file'], 'image']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'content' => 'Content',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'img' => 'Img',
            'file' => 'Фото',
            'is_offer' => 'Is Offer',
        ];
    }


    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
