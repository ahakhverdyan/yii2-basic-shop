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
        $qty = ($qty == '-1') ? -1 : 1;
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

        if($_SESSION['cart'][$product->id]['qty'] == 0) {
            unset($_SESSION['cart'][$product->id]);
        }

        $this->calcTotalBalance();
    }

    /**
     *  Its for delete product by id from session
     * @param $id
     * @return bool
     */
    public function recalculate($id)
    {
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }

        $minusQty = $_SESSION['cart'][$id]['qty'];
        $minusSum = $minusQty * $_SESSION['cart'][$id]['price'];

        $_SESSION['cart']['qty'] -= $minusQty;
        $_SESSION['cart']['sum'] -= $minusSum;
        unset($_SESSION['cart'][$id]);

        $this->calcTotalBalance();

    }


    /**
     *  If no products delete total sum and qty
     * @return bool
     */
    public function calcTotalBalance() {
        if($_SESSION['cart']['qty'] == 0) {
            unset($_SESSION['cart']['qty']);
            unset($_SESSION['cart']['sum']);
        }
        return true;
    }

}