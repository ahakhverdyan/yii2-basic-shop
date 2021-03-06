<?php
use yii\helpers\Html;
use yii\helpers\Url;
/** @var \app\models\Product $offers */
?>
<div class="container">
    <h3>Hot Offers</h3>
    <div class="agile_top_brands_grids">
        <?php if ($offers): ?>
            <?php foreach ($offers as $offer): ?>
                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <?= Html::img('@web/images/offer.png', ['alt' => 'offer', 'class' => 'img-responsive']); ?>
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="<?= Url::to(['product/view', 'id' => $offer->id]) ?>">
                                                <?= Html::img('@web/' . $offer->img) ?>
                                            </a>
                                            <p><?= $offer->title; ?></p>
                                            <h4>$<?= $offer->price; ?>
                                                <?php if (!empty((float)$offer->old_price)): ?>
                                                <span>$<?= $offer->old_price; ?></span></h4>
                                            <?php endif; ?>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <?=Html::a('Добавить продукт',
                                                ['cart/add', 'id' => $offer->id],
                                                ['data-id' => $offer->id, 'class' => 'button add-to-cart']);
                                            ?>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
</div>