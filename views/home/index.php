<?php

use \yii\helpers\Html;
use \yii\helpers\Url;

?>
<!-- banner -->
<div class="banner">
    <?= $this->render('//layouts/inc/sidebar'); ?>
    <div class="w3l_banner_nav_right">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="w3l_banner_nav_right_banner">
                            <h3>Make your <span>food</span> with Spicy.</h3>
                            <div class="more">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick"
                                   data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner1">
                            <h3>Make your <span>food</span> with Spicy.</h3>
                            <div class="more">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick"
                                   data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner2">
                            <h3>upto <i>50%</i> off.</h3>
                            <div class="more">
                                <a href="products.html" class="button--saqui button--round-l button--text-thick"
                                   data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="clearfix"></div>
</div>
<!-- banner -->
<div class="banner_bottom">
    <div class="wthree_banner_bottom_left_grid_sub">
    </div>
    <div class="wthree_banner_bottom_left_grid_sub1">
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="images/4.jpg" alt=" " class="img-responsive"/>
                <div class="wthree_banner_bottom_left_grid_pos">
                    <h4>Discount Offer <span>25%</span></h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="images/5.jpg" alt=" " class="img-responsive"/>
                <div class="wthree_banner_btm_pos">
                    <h3>introducing <span>best store</span> for <i>groceries</i></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="images/6.jpg" alt=" " class="img-responsive"/>
                <div class="wthree_banner_btm_pos1">
                    <h3>Save <span>Upto</span> $10</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- top-brands -->
<div class="top-brands">
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
                                                    <?= Html::img('@web/products/' . $offer->img) ?>
                                                    <img src="images/2.png" alt=" " class="img-responsive"/>
                                                </a>
                                                <p><?= $offer->title; ?></p>
                                                <h4>$<?= $offer->price; ?>
                                                    <?php if (!empty((float)$offer->old_price)): ?>
                                                    <span>$<?= $offer->old_price; ?></span></h4>
                                                <?php endif; ?>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart"/>
                                                        <input type="hidden" name="add" value="1"/>
                                                        <input type="hidden" name="business" value=" "/>
                                                        <input type="hidden" name="item_name" value="Pepsi soft drink"/>
                                                        <input type="hidden" name="amount" value="8.00"/>
                                                        <input type="hidden" name="discount_amount" value="1.00"/>
                                                        <input type="hidden" name="currency_code" value="USD"/>
                                                        <input type="hidden" name="return" value=" "/>
                                                        <input type="hidden" name="cancel_return" value=" "/>
                                                        <input type="submit" name="submit" value="Add to cart"
                                                               class="button"/>
                                                    </fieldset>
                                                </form>
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
</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->
<div class="fresh-vegetables">
    <div class="container">
        <h3>Top Products</h3>
        <div class="w3l_fresh_vegetables_grids">
            <div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
                <div class="w3l_fresh_vegetables_grid2">
                    <ul>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">All Brands</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Vegetables</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Fruits</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="drinks.html">Juices</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="pet.html">Pet Food</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="bread.html">Bread & Bakery</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="household.html">Cleaning</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Spices</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Dry Fruits</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Dairy Products</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 w3l_fresh_vegetables_grid_right">
                <div class="col-md-4 w3l_fresh_vegetables_grid">
                    <div class="w3l_fresh_vegetables_grid1">
                        <img src="images/8.jpg" alt=" " class="img-responsive"/>
                    </div>
                </div>
                <div class="col-md-4 w3l_fresh_vegetables_grid">
                    <div class="w3l_fresh_vegetables_grid1">
                        <div class="w3l_fresh_vegetables_grid1_rel">
                            <img src="images/7.jpg" alt=" " class="img-responsive"/>
                            <div class="w3l_fresh_vegetables_grid1_rel_pos">
                                <div class="more m1">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick"
                                       data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w3l_fresh_vegetables_grid1_bottom">
                        <img src="images/10.jpg" alt=" " class="img-responsive"/>
                        <div class="w3l_fresh_vegetables_grid1_bottom_pos">
                            <h5>Special Offers</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 w3l_fresh_vegetables_grid">
                    <div class="w3l_fresh_vegetables_grid1">
                        <img src="images/9.jpg" alt=" " class="img-responsive"/>
                    </div>
                    <div class="w3l_fresh_vegetables_grid1_bottom">
                        <img src="images/11.jpg" alt=" " class="img-responsive"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="agileinfo_move_text">
                    <div class="agileinfo_marquee">
                        <h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>
                    </div>
                    <div class="agileinfo_breaking_news">
                        <span> </span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //fresh-vegetables -->
<!-- newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="w3agile_newsletter_left">
            <h3>sign up for our newsletter</h3>
        </div>
        <div class="w3agile_newsletter_right">
            <form action="#" method="post">
                <input type="email" name="Email" value="Email" onfocus="this.value = '';"
                       onblur="if (this.value == '') {this.value = 'Email';}" required="">
                <input type="submit" value="subscribe now">
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //newsletter -->