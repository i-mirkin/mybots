<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("TEST3");
use Bitrix\Main\Page\Asset;
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?

//echo ConvertTimeStamp(getmicrotime(), "SHORT", "ru");
echo ConvertTimeStamp(getmicrotime(), "FULL", "ru");

// global $DB, $USER_FIELD_MANAGER, $USER;
// $fields = Array(
	// "UF_BOT_PAY_INFO" => '999',
// );
// if($USER_FIELD_MANAGER->Update("USER", $USER->GetID(), $fields) == 1) {
	// $arResult["result"] = 'ок';
	// $arResult["message"] = "Мы проверим информацию в течение нескольких минут";
// }

?>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>