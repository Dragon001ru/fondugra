<nav class="head-nav">
    <form class="head-nav__link head-nav__link_search" action="/search/">
        <input class="search__checkbox js-search" type="checkbox" id="<?= $arParams['SEARCH_ID'] ?>">
        <input class="search__text js-search-input" name="q" title="">
        <label class="search__label" for="<?= $arParams['SEARCH_ID'] ?>"></label>
        <span class="head-nav__desc">Поиск</span>
    </form>
    <a class="head-nav__link head-nav__link_map" href="/sitemap/">
        <span class="head-nav__desc">Карта сайта</span>
    </a>
     <a class="head-nav__link head-nav__link_eye" href="?slow_vision=Y">
        <span class="head-nav__desc">Версия для слабовидящих</span>
    </a>
    <a class="head-nav__link head-nav__link_print" onclick="window.print()">
        <span class="head-nav__desc">Версия для печати</span>
    </a>
    <? /*$APPLICATION->IncludeComponent(
        'uw:language',
        '.default',
        [],
        false
    ); */?>
</nav>