<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property string $total
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $note
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
            [['created_at', 'updated_at', 'qty', 'name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'status'], 'integer'],
            [['total'], 'number'],
            [['note'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Добавлено',
            'updated_at' => 'Обновлено',
            'qty' => 'Кол-во',
            'total' => 'Сумма',
            'status' => 'Статус',
            'name' => 'имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'note' => 'Примечание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts() {
        return $this->hasMany(OrderProduct::class, ['order_id' => 'id']);
    }
}
