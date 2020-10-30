<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Order;
use app\models\OrderProduct;
use app\models\Product;
use yii\web\NotFoundHttpException;

class CartController extends AppController
{
    public function actionAdd($id)
    {
        $product = Product::findOne($id);

        if (empty($product)) {
            return false;
        }

        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);

        if(\Yii::$app->request->isAjax) {
            return $this->renderPartial('cart-modal', compact('session'));
        }

        return $this->redirect(\Yii::$app->request->referrer);

    }

    public function actionShow() {
        if(\Yii::$app->request->isAjax) {
            $session = \Yii::$app->session;
            $session->open();
            return $this->renderPartial('cart-modal', compact('session'));
        } else {
            throw new NotFoundHttpException('Page not found');
        }

    }

    public function actionDeleteItem($id) {
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalculate($id);
        if(\Yii::$app->request->isAjax) {
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionClear() {
        $session = \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionCheckout()
    {

        $this->setMeta('Оформление заказа');
        $session = \Yii::$app->session;
        $order = new Order();
        $orderProduct = new OrderProduct();

        if ($order->load(\Yii::$app->request->post())) {
            $order->qty = $session['cart.qty'];
            $order->total = $session['cart.sum'];
            $transaction = \Yii::$app->getDb()->beginTransaction();

            if (!$order->save() || !$orderProduct->saveOrderProducts($session['cart'], $order->id)) {
                \Yii::$app->session->setFlash('error', 'Ошыбка при оформлении заказа');
                $transaction->rollBack();

            } else {
                \Yii::$app->session->setFlash('success', 'Заказ оформлен');
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                $transaction->commit();
                return $this->refresh();
            }
        }

        return $this->render('checkout', compact('session', 'order'));
    }

    public function actionChangeCart() {
        $request = \Yii::$app->request;
        $id = $request->get('id');
        $qty = $request->get('qty');

        $product = Product::findOne($id);

        if(empty($product)) {
            return false;
        }

        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        return $this->renderPartial('cart-modal', compact('session'));

    }
}