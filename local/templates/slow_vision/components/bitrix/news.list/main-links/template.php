<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
?>
<hr class="hr">
<h1 class="h1">Полезные ссылки</h1>
<div class="main-news">
    <?foreach ($arResult['ITEMS'] as $arGroup):?>
        <? foreach ($arGroup as $arItem): ?>
            <div class="main-news-item"">
                <div class="main-news-item__title h4"><a href="<?= $arItem['link'] ?>" class="link_clear">
                        <?= $arItem['PREVIEW_TEXT'] ?></a></div>
            </div>
        <?endforeach; ?>
    <?endforeach; ?>
</div>

