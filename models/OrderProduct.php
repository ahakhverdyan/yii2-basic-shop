<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_product".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string|null $title
 * @property float $price
 * @property int $qty
 * @property float $total
 *
 * @property Order $order
 * @property Product $product
 */
class OrderProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order_product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'qty', 'total'], 'required'],
            [['order_id', 'product_id', 'qty'], 'integer'],
            [['price', 'total'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'title' => 'Title',
            'price' => 'Price',
            'qty' => 'Qty',
            'total' => 'Total',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }


    public function saveOrderProducts($products, $orderId)
    {
        foreach ($products as $id => $product) {
            $this->id = null;
            $this->isNewRecord = true;
            $this->order_id = $orderId;
            $this->product_id = $id;
            $this->title = $product['title'];
            $this->price = $product['price'];
            $this->qty = $product['qty'];
            $this->total = $product['qty'] * $product['price'];

            if (!$this->save()) return false;
        }

        return true;
    }
}
