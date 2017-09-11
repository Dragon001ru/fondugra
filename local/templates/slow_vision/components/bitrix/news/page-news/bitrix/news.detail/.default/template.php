<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
<div class="main-news-item__date"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></div>
<? endif; ?>
<div class="main-news-item">
    <? if (strlen($arResult["DETAIL_TEXT"]) > 0): ?>
        <? echo $arResult["DETAIL_TEXT"]; ?>
    <? endif ?>
    <div style="clear:both"></div>
<!--    --><?// if (isset($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'])): ?>
<!--        --><?// foreach ($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'] as $arFile): ?>
<!--            <div class="photo-item"><a data-fancybox="gallery" href="--><?//= $arFile['BIG'] ?><!--"><img-->
<!--                            src="--><?//= $arFile['SMALL'] ?><!--"></a></div>-->
<!--        --><?// endforeach; ?>
<!--    --><?// endif; ?>
</div>