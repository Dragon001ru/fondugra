<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
?>

<? if ($arResult['ITEMS']): ?>
    <ul>
        <? foreach ($arResult['ITEMS'] as $item):
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <li>
            <a
                    id="<? echo $this->GetEditAreaId($item['ID']); ?>"
                    class="link_clear"
                    href="<? echo $item['PROPERTIES']['LINK']['VALUE'] ?>"
                    data-fancybox
            >
                <div class="main-news-item__title h4"><? echo $item['NAME'] ?></div>
            </a>
            </li>
        <? endforeach; ?>
    </ul>
<? else: ?>
    <p>Медиатека пуста.</p>
<? endif; ?>
