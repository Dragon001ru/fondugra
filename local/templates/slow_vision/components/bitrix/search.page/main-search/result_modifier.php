<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */

\Bitrix\Main\Loader::includeModule('iblock');

$arIds = [];

foreach ($arResult['SEARCH'] as $key => $arItem) {
    $arIds[] = $arItem['ITEM_ID'];

    $date = new DateTime($arItem['DATE_FROM']);
    $arResult['SEARCH'][$key]['DATE_CUSTOM'] = strtolower(FormatDate('d F Y', $date->getTimestamp()));
}

$rs = \CIBlockElement::GetList(
    [],
    ['ACTIVE' => 'Y', 'ID' => $arIds],
    false,
    false,
    ['ID', 'PREVIEW_PICTURE']
);

while ($item = $rs->Fetch()) {
    if ($item['PREVIEW_PICTURE']) {
        foreach ($arResult['SEARCH'] as $key => $arItem) {
            if ($arItem['ITEM_ID'] === $item['ID']) {
                $pic = \CFile::ResizeImageGet(
                    $item['PREVIEW_PICTURE'],
                    [
                        'width' => 300,
                        'height' => 200
                    ],
                    BX_RESIZE_IMAGE_EXACT,
                    false
                );

                $arResult['SEARCH'][$key]['PREVIEW_PICTURE'] = $pic['src'];
            }
        }
    }
}