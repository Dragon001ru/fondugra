<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
/** @var array $arParams */
?>

<hr>
<? if ($arResult['ITEMS']): ?>


        <? foreach ($arResult["ITEMS"] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
        <div class="main-news-item">
            <a class="events-item" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
               id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                    <div class="main-news-item__title h4"><? echo $arItem["NAME"] ?></div>
                <? endif; ?>

                <? if ($arItem['month_from'] == $arItem['month_to']): ?>
                        <? if (!empty($arItem['PROPERTIES']['date_from']['VALUE'])): ?>
                            <?= $arItem['day_from'] ?>
                        <? endif; ?>
                        <? if (!empty($arItem['PROPERTIES']['date_to']['VALUE'])): ?>
                            <?= '- ' . $arItem['day_to'] ?> <span
                                    style="text-transform: lowercase"><?= $arItem['month_to'] ?></span> <?= $arItem['years_to'] ?>
                        <? endif; ?>
                <? else: ?>
                        <? if (!empty($arItem['PROPERTIES']['date_from']['VALUE'])): ?>
                            <?= $arItem['day_from'] ?> <span style="text-transform: lowercase"><?= $arItem['month_from'] ?></span>
                            <? if (empty($arItem['PROPERTIES']['date_to']['VALUE'])): ?>
                                <? echo ' ' . $arItem['years_to'] ?>
                            <? endif; ?>
                        <? endif; ?>
                        <? if (!empty($arItem['PROPERTIES']['date_to']['VALUE'])): ?>
                            <?= '-' . $arItem['day_to'] ?> <span style="text-transform: lowercase"><?= $arItem['month_to'] ?></span> <?= $arItem['years_to'] ?>
                        <? endif; ?>
                <? endif; ?>
        </div>
        <? endforeach; ?>

        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
            <br/><?= $arResult["NAV_STRING"] ?>
        <? endif; ?>

<? else: ?>
    <p>Нет мероприятий.</p>
<? endif; ?>
