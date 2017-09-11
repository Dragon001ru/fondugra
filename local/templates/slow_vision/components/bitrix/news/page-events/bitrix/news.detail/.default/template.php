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
$this->setFrameMode(true);
?>
    <? if (isset($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'])): ?>
        <? foreach ($arResult['DISPLAY_PROPERTIES']['photos']['FILE_VALUE'] as $arFile): ?>
            <div class="photo-item"><a data-fancybox="gallery" href="<?= $arFile['BIG'] ?>"><img
                            src="<?= $arFile['SMALL'] ?>"></a></div>
        <? endforeach; ?>
    <? endif; ?>
    <? if (isset($arResult['VIDEO'])): ?>
        <div style="clear:both"></div>
        <? foreach ($arResult['VIDEO'] as $code): ?>
            <div class="photo-item">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $code ?>"
                        frameborder="0" allowfullscreen></iframe>
            </div>
        <? endforeach; ?>
    <? endif; ?>
