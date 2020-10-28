<?php


namespace app\widgets;


use yii\base\Widget;

class HotOffer extends Widget
{
    public $offers;

    public function run()
    {
        return $this->render('hot_offer', ['offers' => $this->offers]);
    }
}