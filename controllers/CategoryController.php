<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\web\{
    Controller,
    NotFoundHttpException
};


class CategoryController extends AppController
{
    public function actionView($id)
    {

        $category = Category::findOne($id);

        if (empty($category)) {
            throw new NotFoundHttpException('Page not found');
        }

        $this->setMeta(
            $category->title . ' : ' . 'Sitename',
            $category->keywords,
            $category->description
        );
        $products = Product::find()
            ->where(['category_id' => $id])
            ->all();

        return $this->render('view', compact('category', 'products'));
    }
}