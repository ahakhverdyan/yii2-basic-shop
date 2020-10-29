<?php
use yii\helpers\Url;
?>
<!-- Button trigger modal -->
<button type="button" class="button" data-toggle="modal" data-target="#modal-card">
    $0
</button>

<!-- Modal -->
<div class="modal fade" id="modal-card" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продольжить покупки</button>
                <a href="<?=Url::to(['cart/view'])?>"  class="btn btn-success">Оформить заказ</a>
                <button type="button" class="btn btn-danger">Очистить карзину</button>
            </div>
        </div>
    </div>
</div>