<?php


namespace app\controllers;


use app\models\Cart;
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
        return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionClear() {
        $session = \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionView() {

        $this->setMeta('Оформление заказа');

        return $this->render('view');
    }
}