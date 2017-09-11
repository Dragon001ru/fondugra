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
    <h3 class="h3"><? echo $arItem["NAME"] ?></h3>
    <div class="main-news-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <ul>
            <? if ($arItem["PROPERTIES"]['municipality']['VALUE']): ?>
                <div class="main-news-item__title h4"><?= $arItem["PROPERTIES"]['municipality']['~VALUE']['TEXT'] ?>
                   <span class="main-news-item__date">(Муниципалитет)</span>
                </div>
            <? endif; ?>
            <? if ($arItem["PROPERTIES"]['plan_invest']['VALUE']): ?>
                <li class="main-news-item__title">Планируемый объем инвестиций
                   <span class="main-news-item__title h4"><?= $arItem["PROPERTIES"]['plan_invest']['VALUE'] ?> млрд руб</span>
                </li>
            <? endif; ?>
            <? if ($arItem["PROPERTIES"]['plan_budget']['VALUE']): ?>
                <li class="main-news-item__title">Планируемый бюджетный эффект
                    <span class="main-news-item__title h4"><?= $arItem["PROPERTIES"]['plan_budget']['VALUE'] ?> млрд руб</span>
                </li>
            <? endif; ?>
            <? if (count($arItem["PROPERTIES"]['links_map']['VALUE']) === 1): ?>
                <hr>
                <ul>
                    <? foreach ($arItem["PROPERTIES"]['links_map']['VALUE'] as $keyLink => $href): ?>
                        <a class="link_clear" href="<?= $href ?>" target="_blank">
                            <div class="main-news-item__title" >
                            <? if ($arItem["PROPERTIES"]['links_map']['DESCRIPTION'][$keyLink]): ?>
                                <?= $arItem["PROPERTIES"]['links_map']['DESCRIPTION'][$keyLink] ?>

                            <? else: ?>
                            <div class="main-news-item__title"> Проект на инвестиционной карте</div>
                            <? endif; ?>
                            </div>
                        </a>
                    <? endforeach; ?>
                </ul>
            <? endif; ?>
        </ul>
        <? if (count($arItem["PROPERTIES"]['links_map']['VALUE']) > 1): ?>
            <hr>
            <ul>
                <? foreach ($arItem["PROPERTIES"]['links_map']['VALUE'] as $keyLink => $href): ?>
                    <a class="link_clear" href="<?= $href ?>" target="_blank">
                        <div class="main-news-item__title" >
                        <? if ($arItem["PROPERTIES"]['links_map']['DESCRIPTION'][$keyLink]): ?>
                            <?= $arItem["PROPERTIES"]['links_map']['DESCRIPTION'][$keyLink] ?>

                        <? else: ?>
                           <div class="main-news-item__title">Проект на инвестиционной карте</div>
                        <? endif; ?>
                        </div>
                    </a>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
    </div>
    <br>
    <br>
    <? if (count($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE']) > 0): ?>
        <? foreach ($arItem['DISPLAY_PROPERTIES']['files']['FILE_VALUE'] as $arFile): ?>
            <a class="files__item" href="<?= $arFile['SRC'] ?>" target="_blank">
                <div class="files__item-format <?= $arFile['ext'] ?>"><?= $arFile['ext'] ?></div>
                <div class="files__item-desc">
                    <?= $arFile['name'] ?> (<?= $arFile['size'] ?>)
                </div>
            </a>
        <? endforeach; ?>
    <? endif; ?>
<? endforeach; ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
