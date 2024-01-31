<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("TEST3");

?>
<h5 class="pagetitle"><?$APPLICATION->ShowTitle();?></h5>

<pre>
<?
echo \Bitrix\Main\Authentication\ApplicationPasswordTable::generatePassword(4);
?>

</pre>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>