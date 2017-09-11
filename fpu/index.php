<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Фонд промышленности Югры");
if($_SESSION["slow_vision"] == "Y")
    LocalRedirect(SITE_DIR);
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>