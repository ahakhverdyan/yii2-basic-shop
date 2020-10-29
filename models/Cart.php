<?php


namespace app\models;


use yii\base\Model;

/**
 * Class Cart
 * @package app\models
 */
class Cart extends Model
{
    /**
     * @param Product $product
     * @param int $qty
     *
     *  Cart data session example
     *  [
     *      [2] => [
     *          'title' => Oil,
     *          'price' => 10,
     *          'qty' => 2,
     *          'img' => 10.png,
     *      ],
     *      'qty' => 2,   // all qty
     *      'sum' => 10, // all sum
     *  ]
     *
     */
    public function addToCart(Product $product,  $qty = 1)
    {
        // if isset add else create
        if(isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$product->id] = [
                'title' => $product->title,
                'price' => $product->price,
                'qty' => $qty,
                'img' => $product->img,
            ];
        }

        $_SESSION['cart']['qty'] = (isset($_SESSION['cart']['qty'])) ? $_SESSION['cart']['qty'] + $qty : $qty;
        $sum =  $qty * $product->price;
        $_SESSION['cart']['sum'] = (isset($_SESSION['cart']['sum'])) ? $_SESSION['cart']['sum'] + $sum : $sum;
    }
}