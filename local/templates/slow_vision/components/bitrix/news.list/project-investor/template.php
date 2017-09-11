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
<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="main-news-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="main-news-item__title h4"><? echo $arItem["NAME"] ?></div>
            <ul>
                <li class="main-news-item__title">Планируемый объем инвестиций:
                    <? if ($arItem['PROPERTIES']['plan_invest']['VALUE']): ?>
                        <?= $arItem['PROPERTIES']['plan_invest']['VALUE'] ?> млрд руб
                    <? else: ?>
                        <?= $arItem['PROPERTIES']['plan_invest']['VALUE'] ?> рассчитывается
                    <? endif; ?>
                </li>
                    <li class="main-news-item__title">Период реализации проекта:
                        <?= $arItem['PROPERTIES']['period_implement']['VALUE'] ?>
                        <? if ($arItem['PROPERTIES']['period_implement']['VALUE']): ?>гг<? else: ?>рассчитывается<? endif; ?>
                    </li>

                    <li class="main-news-item__title">Планируемый бюджетный:
                            эффект <?= $arItem['PROPERTIES']['plan_budget']['DESCRIPTION'] ?>
                        <? if ($arItem['PROPERTIES']['plan_budget']['VALUE']): ?>
                            <?= $arItem['PROPERTIES']['plan_budget']['VALUE'] ?> млрд руб
                        <? else: ?>
                            <?= $arItem['PROPERTIES']['plan_budget']['VALUE'] ?> рассчитывается
                        <? endif; ?>
                    </li>
                    <li class="main-news-item__title">
                        <? if (!$arItem['PROPERTIES']['irr']['VALUE']): ?>IRR:
                        <? else: ?>
                            <?= $arItem['PROPERTIES']['irr']['VALUE'] ?><? endif; ?>
                        <? if ($arItem['PROPERTIES']['irr']['VALUE']): ?>IRR:
                        <? else: ?>рассчитывается<? endif; ?>
                    </li>
                    <li class="main-news-item__title">
                        <? if (!$arItem['PROPERTIES']['npv']['VALUE']): ?>NPV:
                        <? else: ?><?= $arItem['PROPERTIES']['npv']['VALUE'] ?><? endif; ?>
                        <? if ($arItem['PROPERTIES']['npv']['VALUE']): ?>NPV:
                        <? else: ?>рассчитывается<? endif; ?>
                    </li>

                     <li class="main-news-item__title">Период окупаемости проекта:
                        <? if ($arItem['PROPERTIES']['period_payback']['VALUE']): ?>
                            <?= $arItem['PROPERTIES']['period_payback']['VALUE'] ?> года
                        <? else: ?>
                            <?= $arItem['PROPERTIES']['period_payback']['VALUE'] ?> рассчитывается
                        <? endif; ?>
                    </li>
                 <li class=main-news-item__title">Создаваемые рабочие места:
                    <?= $arItem['PROPERTIES']['jobs_created']['VALUE'] ?>
                        <? if (!$arItem['PROPERTIES']['jobs_created']['VALUE']): ?>рассчитывается<? endif; ?>
                    </li>
            </ul>
        <? if (count($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE']) > 0): ?>
            <div class="main-news-item__title">Файлы проекта:</div>
            <ul>
                <? foreach ($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE'] as $arFile): ?>
                   <li><a href="<?= $arFile['SRC'] ?>">
                        <div>
                            <?= $arFile['name'] ?> (<?= $arFile['size'] ?>)
                        </div>
                    </a></li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>

<? endforeach; ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
