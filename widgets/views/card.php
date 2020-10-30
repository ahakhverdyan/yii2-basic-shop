<?php
use yii\helpers\Url;
?>
<!-- Button trigger modal -->
<button onclick="getCart()" type="button" class="button" data-toggle="modal" data-target="#modal-cart">
    <span class="cart-sum">$<?=$_SESSION['cart.sum'] ?? 0 ?></span>
</button>

<!-- Modal -->
<div class="modal fade" id="modal-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продольжить покупки</button>
                <a href="<?=Url::to(['cart/checkout'])?>"  class="btn btn-success">Оформить заказ</a>
                <button onclick="clearCart()" type="button" class="btn btn-danger">Очистить карзину</button>
            </div>
        </div>
    </div>
</div>