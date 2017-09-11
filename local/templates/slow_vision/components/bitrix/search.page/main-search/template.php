<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
?>

<form action="">
    <input class="slow__input" name="q" title="Поиск" value="<? echo $arResult['REQUEST']['QUERY'] ?>">
    <button class="form__submit">Искать</button>
</form>

<? if ($arResult['SEARCH']): ?>
    <div class="main-news-item">
        <? foreach ($arResult['SEARCH'] as $item): ?>
            <a class="link_clear" href="<? echo $item['URL'] ?>">
                <div class="main-news-item__date"><? echo $item['DATE_CUSTOM'] ?></div>
                <div class="main-news-item__title h4"><? echo $item['TITLE_FORMATED'] ?></div>
                <p><? echo $item['BODY_FORMATED'] ?></p>
            </a>
        <? endforeach; ?>
    </div>
    <? echo $arResult['NAV_STRING'] ?>
<? else: ?>
    <div class="err-notify">По Вашему запросу ничего не найдено.</div>
<? endif; ?>
