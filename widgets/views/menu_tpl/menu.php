<?php
use \yii\helpers\Url;
$isParent = isset($category['children']);
?>
<li class="<?=($isParent) ? 'dropdown' : '' ?>">
    <a <?php if($isParent) echo 'class="dropdown-toggle" data-toggle="dropdown"' ?>  href="<?=Url::to(['category/view', 'id' => $category['id']])?>">
        <?php if($isParent): ?>
            <span class="caret"></span>
        <?php endif; ?>
        <?=$category['title']?>
    </a>
    <?php if($isParent): ?>
        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
            <div class="w3ls_vegetables">
                <ul>
                    <?=$this->getMenuHtml($category['children'], $tab .= '-')?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</li>