<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта проектов");
$APPLICATION->SetDirProperty('inner_left_detail', ' detail');
?>
<? $APPLICATION->IncludeComponent("uw:map.list", ".default", Array(
	
	),
	false
); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>