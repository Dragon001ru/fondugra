<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 21.08.2017
 * Time: 15:08
 * @var array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

foreach ($arResult['ITEMS'] as $key => $arItem) {
    if (isset($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE']['SRC'])) {
        $fileValue = $arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE'];
        unset($arResult['ITEMS'][$key]['DISPLAY_PROPERTIES']['files']['FILE_VALUE']);
        $arResult['ITEMS'][$key]['DISPLAY_PROPERTIES']['files']['FILE_VALUE'][] = $fileValue;
    }
}

foreach ($arResult['ITEMS'] as $key => $arItem) {
    if (isset($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE'])) {
        foreach ($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE'] as $keyFile => $arFile) {
            $arFile['ext'] = end(explode('.', $arFile['FILE_NAME']));
            $arFile['name'] = str_replace('.' . $arFile['ext'], '', $arFile['ORIGINAL_NAME']);
            $arFile['ext'] = ToLower(end(explode('.', $arFile['FILE_NAME'])));
            $arFile['size'] = UW\Services::FBytes($arFile['FILE_SIZE'], 0);
            $arResult['ITEMS'][$key]['DISPLAY_PROPERTIES']['files']['FILE_VALUE'][$keyFile] = $arFile;
        }
    }
}