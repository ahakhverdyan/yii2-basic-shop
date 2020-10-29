<?php


namespace app\controllers;


use app\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{
    public function actionView($id)
    {
        $product = Product::findOne($id);
        if(empty($product)) {
            throw new NotFoundHttpException('Page not found');
        }

        $this->setMeta(
            $product->title . ' : ' . 'Sitename',
            $product->keywords,
            $product->description
        );

        return $this->render('view', compact('product'));
    }
}