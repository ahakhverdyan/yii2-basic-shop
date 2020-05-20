<?php


namespace app\widgets;


use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $tpl = 'menu';
    public $ulClass = 'nav navbar-nav nav_1';
    public $data;
    public $tree;
    public $menuHtml;


    public function run()
    {
        $menu = \Yii::$app->cache->get('menu');

        if ($menu) return $menu;

        $this->data = Category::find()
            ->select(['id', 'parent_id', 'title'])
            ->indexBy('id')
            ->asArray()
            ->all();

        $this->tree = $this->getTree();

        $this->menuHtml = '<ul class="' . $this->ulClass . '">';
        $this->menuHtml .= $this->getMenuHtml($this->tree);
        $this->menuHtml .= '</ul>';

        \Yii::$app->cache->set('menu', $this->menuHtml, 3600);

        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];

        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $this->data[$node['parent_id']]['children'][$node['id']] = &$node;
            }
        }

        return $tree;
    }

    protected function getMenuHtml(Array $tree)
    {
        $str = '';

        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }

        return $str;
    }

    private function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/views/menu_tpl/' . $this->tpl . '.php';
        return ob_get_clean();
    }

}