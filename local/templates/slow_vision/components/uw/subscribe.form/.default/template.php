<?
/** @var array $arResult */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<hr class="hr">
<a name="subscribe-form"></a>
<? if ($_SESSION['SEND_SUBSCRIBE_CONFIRM']): ?>

    <div class="mess valid">
        <div class="mess-wrap">
            <div class="mess-left"><?= $_SESSION['SEND_SUBSCRIBE_CONFIRM'] ?></div>
            <button class="button js-mess-close" type="button">Закрыть</button>
        </div>
    </div>
    <? $_SESSION['SEND_SUBSCRIBE_CONFIRM'] = 0; ?>

<? // Вывод сообщение об успешной подписке?>
<? elseif ($_SESSION['SEND_SUBSCRIBE_OK']): ?>

    <div class="mess valid">
        <div class="mess-wrap">
            <div class="mess-left">На указанный в форме E-MAIL отправлено письмо с ссылкой для подтверждения
                подписки.
            </div>
            <button class="button js-mess-close" type="button">Закрыть</button>
        </div>
    </div>
    <? $_SESSION['SEND_SUBSCRIBE_OK'] = 0; ?>

<? else: ?>

    <div class="mess<? if (count($arResult["Error"]) > 0) {
        echo ' invalid';
    } ?>">
        <div class="main-news-item">
            <div class="main-news-item__title h4">Подпишитесь<br>на новостную рассылку</div>
            <? // Вывод формы для подписки?>
            <form class="mess-right" action="<?= POST_FORM_ACTION_URI ?>#subscribe-form" method="post">
                <label class="main-news-item__title h4" for="email">E-mail:</label>
                <? // Вывод ошибок, если есть
                if (count($arResult["Error"]) > 0): ?>
                    <input class="slow__input" style="border-color: #f24f18;" type="text"
                           size="30" <? if (strpos($arResult["Error"][0], 'E-MAIL')){ ?>
                           <? } ?>name="subscribe-email" value="<?= $arResult["subscribe-email"] ?>">
                <? else: ?>
                    <input class="slow__input" type="text" size="30" <? if (strpos($arResult["Error"][0], 'E-MAIL')){ ?>
                           <? } ?>name="subscribe-email" value="<?= $arResult["subscribe-email"] ?>">
                <? endif; ?>
                <div style="display: none">
                    <label for="rubric">Рубрики: <span class="req">*</span></label>
                    <? foreach ($arResult["RUBRIC_LIST"] as $arRubric): ?>
                        <input type="checkbox" name="subscribe-rubric[]" value="<?= $arRubric['ID'] ?>"
                               checked
                        > <?= $arRubric['NAME'] ?><br/>
                    <? endforeach; ?>
                </div>
                <button class="form__submit" name="submit" value="Подписаться">Подписаться</button>
                <? // Вывод ошибок, если есть
                if (count($arResult["Error"]) > 0): ?>
                    <span class="invalid-info"><? echo implode("<br />", $arResult["Error"]); ?></span>
                <? endif; ?>
            </form>
        </div>
    </div>

<? endif ?>

