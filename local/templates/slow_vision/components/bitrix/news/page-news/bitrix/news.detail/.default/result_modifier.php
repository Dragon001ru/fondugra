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

if ($arResult["DISPLAY_PICTURE"] != "N" && is_array($arResult['DETAIL_PICTURE'])) {
    $file = CFile::ResizeImageGet(
        $arResult['DETAIL_PICTURE']['ID'],
        array('width' => 410, 'height' => 240),
        BX_RESIZE_IMAGE_EXACT,
        false
    );
    if ($file['src']) {
        $arResult['DETAIL_PICTURE']['SRC'] = $file['src'];
    }
}

$arResult['DISPLAY_ACTIVE_FROM'] = ToLower($arResult["DISPLAY_ACTIVE_FROM"]);

if (isset($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE']['SRC'])) {
    $fileValue = $arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'];
    unset($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE']);
    $arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'][] = $fileValue;
}

if (isset($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'])) {
    foreach ($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'] as $key => $arFile) {
        $file = CFile::ResizeImageGet(
            $arFile['ID'],
            array('width' => 238, 'height' => 158),
            BX_RESIZE_IMAGE_EXACT,
            false
        );
        if ($file['src']) {
            $arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'][$key]['SMALL'] = $file['src'];
        }
        $file = CFile::ResizeImageGet(
            $arFile['ID'],
            array('width' => 1024, 'height' => 768),
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
            false
        );
        if ($file['src']) {
            $arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'][$key]['BIG'] = $file['src'];
        }
    }
}