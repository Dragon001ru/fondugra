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

if (!empty($arResult['PROPERTIES']['date_from']['VALUE'])) {
    $mDateFrom = MakeTimeStamp($arResult['PROPERTIES']['date_from']['VALUE']);
    $arResult['day_from'] = date('d', $mDateFrom);
    $arResult['month_from'] = ToUpper(FormatDate('F', $mDateFrom));
}

if (!empty($arResult['PROPERTIES']['date_to']['VALUE'])) {
    $mDateTo = MakeTimeStamp($arResult['PROPERTIES']['date_to']['VALUE']);
    $arResult['day_to'] = date('d', $mDateTo);
    $arResult['month_to'] = ToUpper(FormatDate('F', $mDateTo));
}

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

if (isset($arResult['DISPLAY_PROPERTIES']['links_youtube']['VALUE'])) {
    foreach ($arResult['DISPLAY_PROPERTIES']['links_youtube']['VALUE'] as $key => $link) {
        $arResult['VIDEO'][$key] = explode('v=', $link)[1];
        if (stripos($arResult['VIDEO'][$key], '&') !== false) {
            $arResult['VIDEO'][$key] = explode('&', $arResult['VIDEO'][$key])[0];
        }
    }
}