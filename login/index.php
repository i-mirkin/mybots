<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("bgClass", "login-bg access-register");
$APPLICATION->SetPageProperty("containerClass", "login-area");
$APPLICATION->SetTitle("Вход на сайт");
?>

 <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"",
	Array(
		"FORGOT_PASSWORD_URL" => "/recover/",
		"PROFILE_URL" => "/personal/profile/",
		"REGISTER_URL" => "/reg/",
		"SHOW_ERRORS" => "Y"
	)
);?> 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>