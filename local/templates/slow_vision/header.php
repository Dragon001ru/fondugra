<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Page\Asset;
use \Bitrix\Main\Application;
use \Bitrix\Main\Config\Option;

global $APPLICATION;

$arPage = array(
    'js' => array(
        SITE_TEMPLATE_PATH . '/js/main.js',
        SITE_TEMPLATE_PATH . '/js/jquery-1.7.2.min.js',
        SITE_TEMPLATE_PATH . '/js/cookie.js',
        SITE_TEMPLATE_PATH . '/js/js.js',
        SITE_TEMPLATE_PATH . '/js/calendar.js',
        SITE_TEMPLATE_PATH . '/js/jquery.datepicker/jquery-datepicker.js',
    )
);
$oAsset = Asset::getInstance();
$siteName = \CSite::GetByID(SITE_ID)->Fetch()['SITE_NAME'];
$curDir = Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory() . '/';
$curFullDir = Application::getDocumentRoot() . $curDir;
$dirParent = realpath('../') . '/';
$boolEng = \UW\Services::isEngVersion();
$bool404 = defined('ERR_404');
$boolHomePage = ($curDir === '/') || ($curDir === '/en/');
foreach ($arPage['js'] as $js) {
    $oAsset->addJs($js);
}
$oAsset->addCss(SITE_TEMPLATE_PATH . '/js/jquery.datepicker/jquery-datepicker.css');

if ($_REQUEST['slow_vision'] === 'N')
{
    $_SESSION['slow_vision'] = 'N';
    LocalRedirect($APPLICATION->GetCurDir());
}

?>

<!DOCTYPE html>
<html lang="<? echo LANGUAGE_ID ?>">
<head>
    <title><? $APPLICATION->ShowTitle() ?> - <?= $siteName ?></title>
    <? $APPLICATION->ShowHead() ?>
</head>
<body>
<div><? $APPLICATION->ShowPanel() ?></div>
<div class="page">
        <header class="header">
            <section class="header-tool">
                <div class="wrapper clearfix" style="position: relative">

                    <div class="aa-block aaFontsize">
                        <a class="special-set" href="#">Настройки</a>
                    </div>
                    <div class="aa-settings-popup">
                        <div class="popup-flex">
                            <div class="aaKerning">
                                <div style="margin-right: 20px">Кернинг</div>
                                <div class="aaKerning-wrapper">
                                    <a class="aaKerning-small <? echo ($_COOKIE['js-kerning'] === 'normal' || !$_COOKIE['js-kerning']) ? 'a-current' : '' ?>" data-aa-kerning="normal" href="#">Стандартный</a>
                                    <a class="aaKerning-big <? echo ($_COOKIE['js-kerning'] === 'big') ? 'a-current' : '' ?>" style="letter-spacing: 5px" data-aa-kerning="big" href="#">Средний</a>
                                    <a class="aaKerning-extra <? echo ($_COOKIE['js-kerning'] === 'extra') ? 'a-current' : '' ?>" style="letter-spacing: 8px" data-aa-kerning="extra" href="#">Большой</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tool-font"><span class="tool__label">Размер шрифта</span>
                        <a href="#" data-size="small" class="tool__size js-size tool__size_small <? echo ($_COOKIE['js-size'] === 'small' || !$_COOKIE['js-size']) ? 'tool__size_active' : '' ?>">A</a>
                        <a href="#" data-size="normal" class="tool__size js-size" <? echo ($_COOKIE['js-size'] === 'normal') ? 'tool__size_active' : '' ?>>A</a>
                        <a href="#" data-size="big" class="tool__size js-size tool__size_big <? echo ($_COOKIE['js-size'] === 'big') ? 'tool__size_active' : '' ?>">A</a>
                    </div>
                    <div class="tool-color">
                        <span class="tool__label tool__label_color">Цвет сайта</span>
                        <a href="#" data-color="normal" class="tool__size js-color tool__color <? echo ($_COOKIE['js-color'] === 'normal' || !$_COOKIE['js-color']) ? 'tool__color_active' : '' ?>">Ц</a>
                        <a href="#" data-color="black"
                           class="tool__size js-color tool__color tool__color_black <? echo ($_COOKIE['js-color'] === 'black') ? 'tool__color_active' : '' ?>">Ц</a>
                        <a href="#" data-color="blue" class="tool__size js-color tool__color tool__color_blue <? echo ($_COOKIE['js-color'] === 'blue') ? 'tool__color_active' : '' ?>">Ц</a>
                    </div>
                    <div class="tool-eye">
                        <a href="<?= $APPLICATION->GetCurDir() ?>?slow_vision=N" class="tool__label tool__label_link">Обычная версия</a>
                    </div>
                </div>
            </section>
            <section class="wrapper">
                <div class="header-logo clearfix">
                    <form class="search" action="/search/">
                        <div class="tool-search">
                            <input
                                    id="hdr_search"
                                    name="q"
                                    class="tool-search__input"
                                    placeholder="Поиск"
                            />
                            <button id="input-name" class="tool-search__submit"></button>
                        </div>
                    </form>
                </div>
            </section>
            <section class="wrapper">
                <div class="header-logo clearfix">
                    <a class="logo__link" href="<? echo ($boolEng) ? '/en/' : '/' ?>">
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/logo_text.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </a>
                    <div class="header-info">

                        <div class="contacts-line__item">
                            <? $APPLICATION->IncludeFile(
                                SITE_DIR . "inc/hdr_phone.txt",
                                Array(),
                                Array("MODE" => "text")
                            ); ?>
                            <? $APPLICATION->IncludeFile(
                                SITE_DIR . "inc/hdr_fax.txt",
                                Array(),
                                Array("MODE" => "text")
                            ); ?>

                        </div>
                    </div>
                </div>
            </section>
            <section class="wrapper">
                <div class="header-logo clearfix">
                    <div class="header-info">
                        <div class="contacts-line__item">
                            <? $APPLICATION->IncludeFile(
                                SITE_DIR . "inc/hdr_email.txt",
                                Array(),
                                Array("MODE" => "text")
                            ); ?>
                        </div>
                        <? $APPLICATION->IncludeFile(
                            SITE_DIR . "inc/hdr_ask_question.txt",
                            Array(),
                            Array("MODE" => "text")
                        ); ?>
                    </div>
                </div>
            </section>
            <section class="wrapper">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top-menu",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "right",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "top",
                        "USE_EXT" => "N",
                        "COMPONENT_TEMPLATE" => "top-menu",
                        "MENU_THEME" => "black"
                    ),
                    false
                ); ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "right-menu",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "subright",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "3",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "right",
                        "USE_EXT" => "N",
                        "COMPONENT_TEMPLATE" => "right-menu"
                    ),
                    false
                ); ?>
            </section>
        </header>

    <section class="wrapper">
        <? if (!$boolHomePage && !$bool404): ?>
            <h1 class="h1"><? $APPLICATION->ShowTitle() ?></h1>
         <?endif;?>


