<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 26.07.2017
 * Time: 15:20
 * @var array $arParams
 * @var array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Config\Option;

foreach ($arResult["ITEMS"] as $key => $arItem) {

    $link = !empty($arItem['PROPERTIES']['link']['VALUE']) ? $arItem['PROPERTIES']['link']['VALUE'] : '#';
    $link = (stripos($link, 'http://') === false ) ?  'http://' . $link : $link;

    $arResult["ITEMS"][$key]['link'] = $link;
}

$arResult["ITEMS"] = array_chunk($arResult["ITEMS"], 4);