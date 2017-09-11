<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
?>
<div class="main-news-item">
        <? foreach ($arResult['list'] as $key => $item):
            $countProjects = count($item['projects']);
            ?>
            <div class="main-news-item__title h4">
              <?= $item['name'] ?>
            </div>
            <ul>
            <? if (is_array($item['projects']) && $countProjects > 0): ?>
                        <? foreach ($item['projects'] as $arProject): ?>
                <li> <a href="<?= $arProject['link_map'] ?>" target="_blank">
                                    <?= $arProject['name'] ?>
                                    </a>    </li>
                        <? endforeach; ?>
                <?else:?>
             <? endif; ?>

            </ul>
            <hr>
        <? endforeach; ?>
            </div>
    <br>
