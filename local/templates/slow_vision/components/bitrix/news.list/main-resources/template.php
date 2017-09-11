<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
?>
<ul>
    <? foreach ($arResult['ITEMS'] as $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a
                class="link_clear"
                style="background: url('<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>') no-repeat center;"
                href="<? echo $arItem['PROPERTIES']['link']['VALUE'] ?>" target="_blank"
                id="<? echo $this->GetEditAreaId($arItem['ID']); ?>"
        >

            <li><? echo $arItem['NAME'] ?>
            <? if ($arItem['PROPERTIES']['region']['VALUE']): ?>
                    <span><? echo $arItem['PROPERTIES']['region']['VALUE'] ?></span>
            <? endif; ?>
            </li>
        </a>
    <? endforeach; ?>
</ul>