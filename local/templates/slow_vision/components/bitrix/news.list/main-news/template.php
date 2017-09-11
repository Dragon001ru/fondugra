<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>



<? if ($arResult['ITEMS']): ?>
    <h1 class="h1">Новости</h1>
        <?foreach ($arResult['ITEMS'] as $item):
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
            ?>
            <div class="main-news-item" id="<?=$this->GetEditAreaId($item['ID']);?>">
                <a href="<?echo $item["DETAIL_PAGE_URL"]?>" class="link_clear">
                    <div class="main-news-item__date"><?echo $item['DISPLAY_ACTIVE_FROM']?></div>
                    <div class="main-news-item__title h4"><?echo $item['NAME']?></div>
                    <div class="main-news-item__title"><?echo $item['PREVIEW_TEXT']?></div>
                </a>
            </div>

        <?endforeach; ?>
        <a href="/news/">
            <button class="form__submit" type="submit" href="/events/">Все новости</button>
        </a>

<? endif; ?>
<hr class="hr">
