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

foreach ($arResult["ITEMS"] as $key => &$arItem) {
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
        $arItem['PREVIEW_PICTURE']['SRC'] = $file['src'];
    }

    if (!empty($arItem['PROPERTIES']['date_from']['VALUE'])) {
        $mDateFrom = MakeTimeStamp($arItem['PROPERTIES']['date_from']['VALUE']);
        $arItem['day_from'] = date('d', $mDateFrom);
        $arItem['month_from'] = ToUpper(FormatDate('F', $mDateFrom));
        if (empty($arItem['PROPERTIES']['date_to']['VALUE'])) {
            $arItem['years_to'] = ToUpper(FormatDate('Y', $mDateFrom));
        }
    }

    if (!empty($arItem['PROPERTIES']['date_to']['VALUE'])) {
        $mDateTo = MakeTimeStamp($arItem['PROPERTIES']['date_to']['VALUE']);
        $arItem['day_to'] = date('d', $mDateTo);
        $arItem['month_to'] = ToUpper(FormatDate('F', $mDateTo));
        $arItem['years_to'] = ToUpper(FormatDate('Y', $mDateTo));
    }
}