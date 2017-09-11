<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 */
?>
<form class="filter" action="<?= POST_FORM_ACTION_URI ?>" method="post">
    <div class="cc">
            <div class="main-news-item__title h4">От</div>
            <label class="js-calendar" for="date-1">
                <input class="slow__input" id="date-1" name="date_from" value="<?= $arResult['restoreEventsFilter']['date_from'] ?>">
            </label>
            <div class="main-news-item__title h4">До</div>
            <label class="js-calendar" for="date-2">
                <input class="slow__input" id="date-2" name="date_to" value="<?= $arResult['restoreEventsFilter']['date_to'] ?>">
            </label>
    </div>
    <div class="filter-right">
        <button class="form__submit" name="setFilter" value="setFilter">Применить</button>
        <button class="form__submit" name="clearFilter" value="clearFilter">Сбросить</button>
    </div>
</form>