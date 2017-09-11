<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
?>


<h1 class="h1">Мероприятия</h1>
<? if ($arResult['ITEMS']): ?>
    <?foreach ($arResult['ITEMS'] as $row):?>
        <? foreach ($row as $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
        ?>
            <div class="main-news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="link_clear">
                        <div class="main-news-item__title h4"><?echo $arItem['NAME']?></div>
                            <? if ($arItem['PROPERTIES']['date_from']['VALUE']): ?>
                                    <span><? echo $arItem['day_from'] ?></span>
                                    <? if ($arItem['month_from'] !== $arItem['month_to']): ?>
                                        <span><? echo $arItem['month_from'] ?> <? echo ($arItem['years_to']) ? $arItem['years_to'] : '' ?></span>
                                    <? endif; ?>
                            <? endif; ?>
                            <? if ($arItem['PROPERTIES']['date_to']['VALUE']): ?>
                                    <span>- <? echo $arItem['day_to'] ?></span>
                                    <span><? echo $arItem['month_to'] . ' ' . $arItem['years_to'] ?></span>
                            <? endif; ?>
                    </a>
            </div>
          <?endforeach; ?>
    <?endforeach; ?>

<? else: ?>
    <p align="center">На данный момент нет активных мероприятий.</p>
<? endif; ?>
<a href="/events/">
    <button class="form__submit" type="submit" href="/events/">Все мероприятия</button>
</a>

