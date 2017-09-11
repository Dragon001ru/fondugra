<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */

if (!$arResult["NavShowAlways"] || $arResult["NavShowAlways"] !== 'Y') {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>

<div class="pager">
    <? if ($arResult["NavPageNomer"] > 1): ?>

        <? if ($arResult["bSavePage"]): ?>
            <a class="pager__link Предыдущая"
               href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>">Предыдущая</a>
        <? else: ?>
            <? if ($arResult["NavPageNomer"] > 2): ?>
                <a class="pager__link pager__link_arrow"
                   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>">Предыдущая</a>
            <? else: ?>
                <a class="pager__link pager__link_arrow" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">Предыдущая</a>
            <? endif ?>
        <? endif ?>

    <? else: ?>
        <a class="pager__link pager__link_arrow">Предыдущая</a>
    <? endif ?>

    <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>

        <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
            <div class="pager__link pager__link_active"><?= $arResult["nStartPage"] ?></div>
        <? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
            <a class="pager__link"
               href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
        <? else: ?>
            <a class="pager__link"
               href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
        <? endif ?>
        <? $arResult["nStartPage"]++ ?>
    <? endwhile ?>

    <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
        <a class="pager__link pager__link_arrow"
           href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>">Следующая</a>
    <? else: ?>
        <a class="pager__link pager__link_arrow">Следующая</a>
    <? endif ?>
</div>
