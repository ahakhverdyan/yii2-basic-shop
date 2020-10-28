<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\web\{
    Controller,
    NotFoundHttpException
};
use yii\data\Pagination;


class CategoryController extends AppController
{
    public function actionView($id)
    {

        $category = Category::find()->with('parent')->where(['id' => $id])->one();

        if (empty($category)) {
            throw new NotFoundHttpException('Page not found');
        }


        $this->setMeta(
            $category->title . ' : ' . 'Sitename',
            $category->keywords,
            $category->description
        );


        $productsQuery = Product::find()->where(['category_id' => $id]);
        $countQuery = clone $productsQuery;

        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 4, 'pageSizeParam' => false, 'forcePageParam' =>false, 'validatePage' => false]);
        $products = $productsQuery->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('category', 'products', 'pages'));
    }
}