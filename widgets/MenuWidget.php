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
    public $model;
    public $cache_time = 3600;


    public function run()
    {
        if($this->cache_time) {
            $menu = \Yii::$app->cache->get('menu');

            if ($menu) return $menu;
        }


        $this->data = Category::find()
            ->select(['id', 'parent_id', 'title'])
            ->indexBy('id')
            ->asArray()
            ->all();

        $this->tree = $this->getTree();

        $this->menuHtml = '<ul class="' . $this->ulClass . '">';
        $this->menuHtml .= $this->getMenuHtml($this->tree);
        $this->menuHtml .= '</ul>';

        if($this->cache_time) {
            \Yii::$app->cache->set('menu', $this->menuHtml, $this->cache_time);
        }

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

    /**
     * @param array $tree
     * @param string $tab
     * @return string
     */
    protected function getMenuHtml(Array $tree, $tab = ' ')
    {
        $str = '';

        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }

        return $str;
    }

    /**
     * @param $category
     * @param string $tab
     * @return false|string
     */
    private function catToTemplate($category, $tab)
    {
        ob_start();
        include __DIR__ . '/views/menu_tpl/' . $this->tpl . '.php';
        return ob_get_clean();
    }

}