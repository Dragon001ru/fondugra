<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 22.08.2017
 * Time: 17:20
 * @var array $arParams
 * @var array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Config\Option;

$newWidth = 298;
$newHeight = 296;

$noPhoto = Option::get('main', 'noPhoto');
if (intval($noPhoto) < 1) {
    $arFile = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/upload/no_photo.jpg");
    $noPhoto = CFile::SaveFile($arFile, "main");
    Option::set('main', 'noPhoto', $noPhoto);
}

foreach ($arResult["ITEMS"] as $key => $arItem) {
    if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem['PREVIEW_PICTURE'])) {
        $fileID = $arItem['PREVIEW_PICTURE']['ID'];
    } else {
        $fileID = $noPhoto;
    }
    $file = CFile::ResizeImageGet(
        $fileID,
        array('width' => $newWidth, 'height' => $newHeight),
        BX_RESIZE_IMAGE_EXACT,
        false
    );
    if ($file['src']) {
        $arResult["ITEMS"][$key]['PREVIEW_PICTURE']['SRC'] = $file['src'];
    }

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