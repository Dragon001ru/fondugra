<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */

foreach ($arResult['ITEMS'] as $key => &$arItem) {
    if ($arItem['PROPERTIES']['date_from']['VALUE']) {
        $mDateFrom = MakeTimeStamp($arItem['PROPERTIES']['date_from']['VALUE']);
        $arItem['day_from'] = date('d', $mDateFrom);
        $arItem['month_from'] = ToUpper(FormatDate('F', $mDateFrom));
        if (empty($arItem['PROPERTIES']['date_to']['VALUE'])) {
            $arItem['years_to'] = ToUpper(FormatDate('Y', $mDateFrom));
        }
    }

    if ($arItem['PROPERTIES']['date_to']['VALUE']) {
        $mDateTo = MakeTimeStamp($arItem['PROPERTIES']['date_to']['VALUE']);
        $arItem['day_to'] = date('d', $mDateTo);
        $arItem['month_to'] = ToUpper(FormatDate('F', $mDateTo));
        $arItem['years_to'] = ToUpper(FormatDate('Y', $mDateTo));
    }
}

$arResult["ITEMS"] = array_chunk($arResult["ITEMS"], 2, true);