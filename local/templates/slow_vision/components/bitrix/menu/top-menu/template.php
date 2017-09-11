<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */

$subs = [];
if (count($arResult['ITEMS']) > 0): ?>
    <nav class="menu">
        <?
        foreach($arResult as $arItem):
            if($arItem["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>
            <?if(!$arItem["PARAMS"]['VISION']):?>
            <a href="<?=$arItem["LINK"]?>" class="menu__link<? if($arItem["SELECTED"]): ?> menu__link_active<? endif; ?>"><?=$arItem["TEXT"]?></a>
        <?endif;?>
        <?endforeach?>

    </nav>
<? endif; ?>