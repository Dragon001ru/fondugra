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


<div class="main-news-item" id="<?=$this->GetEditAreaId($item['ID']);?>">
    <a href="<?echo $item["DETAIL_PAGE_URL"]?>" class="link_clear">
        <div class="main-news-item__date"><?echo $item['DISPLAY_ACTIVE_FROM']?></div>
        <div class="main-news-item__title h4"><?echo $item['NAME']?></div>
        <div class="main-news-item__title"><?echo $item['PREVIEW_TEXT']?></div>
    </a>
</div>

<? foreach ($arResult['deps'] as $department): ?>

    <div class="main-news-item">
            <? if ($department['info']['displayName']): ?>
                <div class="main-news-item__title h1"><?= $department['info']['name'] ?></div>
            <?else:?>
                <div class="main-news-item__title h1">Руководство</div>
            <? endif; ?>
        <hr>

            <? foreach ($department['items'] as $item): ?>
                <?
                $this->AddEditAction($item['id'], $item['edit_link'],
                    CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($item['id'], $item['delete_link'],
                    CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"),
                    array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div id="<?= $this->GetEditAreaId($item['id']); ?>">
                    <div class="main-news-item__title h4"><?= $item['job'] ?></div>
                   <?= $item['fio'] ?>
                    <? if ($item['email']): ?>
                        <a href="emailto:<?= $item['email'] ?>"><?= $item['email'] ?></a>
                    <? endif; ?>
                </div>
            <? endforeach; ?>
        <hr>
        <ul class="main-news-item__title ">
        <? if (count($department['info']['phones']) > 0): ?>
            <div>
                <? foreach ($department['info']['phones'] as $number):
                    $arNumber = explode(';', $number) ?>
                   <li class="main-news-item__title h4"><?= $arNumber[0] ?><span><?= $arNumber[1] ?></span></li>
                <? endforeach; ?>
            </div>
        <? endif; ?>
        </ul>
    </div>
<? endforeach; ?>
<hr class="hr">
