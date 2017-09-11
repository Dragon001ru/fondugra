<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<? if (!empty($arResult)): ?>
    <nav class="menu">
        <?
        foreach($arResult as $arItem):
            ?>
            <a href="<?=$arItem["LINK"]?>" class="menu__link<?if($arItem["SELECTED"]):?> menu__link_active<?endif;?>"><?=$arItem["TEXT"]?></a>
        <?endforeach?>

    </nav>
<? endif ?>