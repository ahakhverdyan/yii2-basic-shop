<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string|null $note
 * @property int|null $status
 * @property float $total
 * @property int $qty
 * @property int $created_at
 * @property int $updated_at
 *
 * @property OrderProduct[] $orderProducts
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    public function behaviors()
    {
        return [
          TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address', 'qty'], 'required'],
            [['note'], 'string'],
            [['qty', 'created_at', 'updated_at'], 'integer'],
            [['total'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['email', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            ['status', 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'note' => 'Примичание',
            'status' => 'Status',
            'total' => 'Total',
            'qty' => 'Qty',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[OrderProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::class, ['order_id' => 'id']);
    }
}
