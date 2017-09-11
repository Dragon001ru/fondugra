<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @global $APPLICATION
 * @var array $manifest
 * @var \Bitrix\Main\Page\Asset $oAsset
 */
$APPLICATION->SetTitle("Характеристика промышленности");
$oAsset->addJs(SITE_TEMPLATE_PATH . '/dist/js/vendor/scrollmagic.js');
$oAsset->addJs(SITE_TEMPLATE_PATH . '/dist/js/vendor/odometer/odometer.min.js');
$oAsset->addJs(SITE_TEMPLATE_PATH . '/dist/js/' . $manifest['animateNumbers.js']);
if($_SESSION["slow_vision"] == "Y")
    LocalRedirect(SITE_DIR);
?>

    <div id="anim-first">
        <div class="digit-line">
            <div class="digit">
                <div class="digit-title">Основа промышленности</div>
                <div class="digit-flex">
                    <div class="digit-number js-number" data-value="300" style="min-width: 130px"></div>
                    <div class="digit-desc">крупных и средних предприятий, в т.ч. ведущие компании России</div>
                </div>
            </div>
            <div class="digit with-map">
                <div class="digit-title">Объем произведенной продукции</div>
                <div class="digit-flex">
                    <div class="digit-number with-percent js-number" data-value="7" style="min-width: 45px"></div>
                    <div class="digit-desc">от общероссийского уровня (3,33 трлн руб.)</div>
                </div>
            </div>
            <div class="digit">
                <div class="digit-title">В экономике занято</div>
                <div class="digit-flex top">
                    <div class="digit-number js-number" data-value="878.4" style="min-width: 190px"></div>
                    <div class="digit-desc">
                        тыс. человек, из них 254,5 тыс. человек в промышленности (без учета субъектов малого
                        предпринимательства)
                    </div>
                </div>
            </div>
        </div>
        <h3 class="h3">Структура промышленного производства</h3>
        <div class="digit-stats">
            <div class="digit">
                <div class="digit-number with-percent js-number" data-value="81.06"></div>
                <br>
                <div class="digit-desc">Добыча полезных ископаемых</div>
            </div>
            <div class="digit">
                <div class="digit-number with-percent js-number" data-value="12.39"></div>
                <br>
                <div class="digit-desc">Обрабатывающие производства</div>
            </div>
            <div class="digit">
                <div class="digit-number with-percent js-number" data-value="6.55"></div>
                <br>
                <div class="digit-desc">Энергетика</div>
            </div>
        </div>
        <h2 class="h2">Основные показатели промышленного производства</h2>
        <img src="<? echo SITE_TEMPLATE_PATH . '/dist/images/graphs.png' ?>">
        <br><br><br>
    </div>
    <div id="anim-second">
        <h2 class="h2">Обрабатывающие отрасли</h2>
        <h1 class="h1 img oil">Нефтегазопереработка</h1>
        <div class="digit-wrap">
            <div class="digit-line">
                <div class="digit">
                    <div class="digit-title"></div>
                    <div class="digit-flex">
                        <div class="digit-number js-number" data-value="6"></div>
                        <div class="digit-desc">нефтеперерабатывающих предприятий</div>
                    </div>
                </div>
                <div class="digit">
                    <div class="digit-title"></div>
                    <div class="digit-flex">
                        <div class="digit-number js-number" data-value="9"></div>
                        <div class="digit-desc">газоперерабатывающих предприятий</div>
                    </div>
                </div>
                <div class="digit">
                    <div class="digit-title"></div>
                    <div class="digit-flex">
                        <div class="digit-number js-number" data-value="1"></div>
                        <div class="digit-desc">завод стабилизации<br>газового конденсата</div>
                    </div>
                </div>
            </div>
            <div class="digit-after">Переработано</div>
            <div class="digit">
                <div class="digit-title"></div>
                <div class="digit-flex">
                    <div class="digit-number js-number" data-value="32.9" style="min-width: 150px"></div>
                    <div class="digit-desc">млрд м³ попутного нефтяного газа (95,5%)</div>
                </div>
            </div>
            <div class="digit mar-left">
                <div class="digit-title"></div>
                <div class="digit-flex">
                    <div class="digit-number js-number" data-value="6"></div>
                    <div class="digit-desc">млн тонн нефти (произведено<br>1,9 млн тонн нефтепродуктов)</div>
                </div>
            </div>
        </div>
        <br><br>
    </div>

    <div id="anim-third">
        <h1 class="h1 img forest">Лесопромышленный комплекс</h1>
        <div class="digit-wrap">
            <div class="digit-line">
                <div class="digit">
                    <div class="digit-title"></div>
                    <div class="digit-flex">
                        <div class="digit-number js-number" data-value="130" style="min-width: 130px"></div>
                        <div class="digit-desc">организаций и индивидуальных предпринимателей</div>
                    </div>
                </div>
                <div class="digit">
                    <div class="digit-title">Общий запас древесных насаждений</div>
                    <div class="digit-flex">
                        <div class="digit-number js-number" data-value="2.9" style="min-width: 110px"></div>
                        <div class="digit-desc">млрд м³, из которых<br>более 80% хвойные породы</div>
                    </div>
                </div>
                <div class="digit">
                    <div class="digit-title">Произведено более</div>
                    <div class="digit-flex">
                        <div class="digit-number js-number" data-value="1.8" style="min-width: 110px"></div>
                        <div class="digit-desc">млн м³ продукции (пиломатериал, ЛВЛ-брус, ДСП)</div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>

    <div id="anim-fourth">
        <h1 class="h1 img house">Агропромышленный комплекс</h1>
        <div class="digit-wrap">
            <div class="digit">
                <div class="digit-title"></div>
                <div class="digit-flex">
                    <div class="digit-number js-number" data-value="794" style="min-width: 130px"></div>
                    <div class="digit-desc">крестьянских (фермерских)<br>хозяйства (КФХ)</div>
                </div>
            </div>
            <div class="digit-after">Всего произведено</div>
            <div class="digit-line">
                <div class="digit">
                    <div class="digit-title"></div>
                    <div class="digit-flex">
                        <div class="digit-number js-number" data-value="16.9">16,9</div>
                        <div class="digit-desc">тыс. тонн мяса<br>(68,8% – КФХ)</div>
                    </div>
                </div>
                <div class="digit">
                    <div class="digit-title"></div>
                    <div class="digit-flex">
                        <div class="digit-number js-number" data-value="27.6"></div>
                        <div class="digit-desc">тыс. тонн молока<br>(61,7% – КФХ)</div>
                    </div>
                </div>
                <div class="digit">
                    <div class="digit-title">Произведено более</div>
                    <div class="digit-flex">
                        <div class="digit-number js-number" data-value="48.8"></div>
                        <div class="digit-desc">млн штук яиц<br>(32% – КФХ)</div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>

    <div id="anim-fifth">
        <h1 class="h1 img mountain">Горнопромышленный комплекс, промышленность строительных материалов</h1>
        <div class="digit-wrap">
            <div class="digit">
                <div class="digit-title"></div>
                <div class="digit-flex">
                    <div class="digit-number js-number" data-value="123"></div>
                    <div class="digit-desc">предприятия</div>
                </div>
            </div>
            <div class="digit">
                <div class="digit-title"></div>
                <div class="digit-flex">
                    <div class="digit-number js-number" data-value="1568" style="min-width: 160px"></div>
                    <div class="digit-desc">месторождений общераспространенных полезных ископаемых</div>
                </div>
            </div>
            <div class="digit-after">Добывается ежегодно</div>
            <br>
            <div class="digit">
                <div>более</div>
                <div class="digit-flex">
                    <div class="digit-number js-number" data-value="50"></div>
                    <div class="digit-desc">млн м³ песка</div>
                </div>
            </div>
            <div class="digit">
                <div>более</div>
                <div class="digit-flex">
                    <div class="digit-number js-number" data-value="800"></div>
                    <div class="digit-desc">тыс. м³ торфа</div>
                </div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>