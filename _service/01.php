<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("TEST");
$APPLICATION->SetPageProperty("bodyClass", "isfullscreen");
// <div ..-bg
// <div container
// <section
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule("sale");
global $USER;

?>

<h5 class="pagetitle"><?$APPLICATION->ShowTitle();?></h5>

<div class="row">
<div class="col s12 pad-0">


<?
debug($ar_iblock_ids);
?>



</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>