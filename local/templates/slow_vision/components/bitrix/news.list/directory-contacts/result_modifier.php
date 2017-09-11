<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
/** @var array $arParams */

$sections = [];
foreach ($arResult['ITEMS'] as $keyItem => $item) {
    $arResult['departments'][$item['IBLOCK_SECTION_ID']]['items'][] = [
        'fio' => $item['NAME'],
        'job' => $item['PROPERTIES']['job']['VALUE'],
        'jobMarker' => intval($item['PROPERTIES']['job_marker']['VALUE']),
        'email' => $item['PROPERTIES']['email']['VALUE'],
        'onBr' => intval($item['PROPERTIES']['on_br']['VALUE']),
        'edit_link' => $item['EDIT_LINK'],
        'delete_link' => $item['DELETE_LINK'],
        'id' => $item['ID']
    ];
    $sections[] = $item['IBLOCK_SECTION_ID'];
}

if (count($sections) > 0) {
    $sections = array_unique($sections);
    $rsSectionsInfo = \CIBlockSection::GetList(
        [
            $arParams['SORT_BY1'] => $arParams['SORT_ORDER1'],
            $arParams['SORT_BY2'] => $arParams['SORT_ORDER2']
        ],
        [
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            'ID' => $sections
        ],
        false,
        [
            'ID',
            'NAME',
            'UF_PHONES',
            'UF_DISPLAY_NAME'
        ]
    );
    while ($obSectionsInfo = $rsSectionsInfo->GetNextElement()) {
        $arFields = $obSectionsInfo->GetFields();
        if (array_key_exists($arFields['ID'], $arResult['departments'])) {
            $arResult['deps'][] = [
                'info' => [
                    'name' => $arFields['NAME'],
                    'phones' => $arFields['UF_PHONES'],
                    'displayName' => intval($arFields['UF_DISPLAY_NAME'])
                ],
                'items' => $arResult['departments'][$arFields['ID']]['items']
            ];
        }
    }
}
unset($arResult['departments']);
