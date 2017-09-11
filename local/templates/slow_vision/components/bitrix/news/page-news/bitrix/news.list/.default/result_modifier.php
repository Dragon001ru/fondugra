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

$newWidth = 300;
$newHeight = 200;

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

    $arResult["ITEMS"][$key]['DISPLAY_ACTIVE_FROM'] = ToLower($arItem["DISPLAY_ACTIVE_FROM"]);
}