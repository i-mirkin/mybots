<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Восстановление доступа");
$APPLICATION->SetPageProperty("title", "Восстановление доступа");
$APPLICATION->SetPageProperty("description", "Восстановление доступа");
$APPLICATION->SetPageProperty("keywords", "Восстановление доступа");
$APPLICATION->SetPageProperty("bgClass", "login-bg access-register");
$APPLICATION->SetPageProperty("bodyClass", "");
$APPLICATION->SetPageProperty("containerClass", "login-area");
?>

 <?$APPLICATION->IncludeComponent(
	"bitrix:main.auth.forgotpasswd",
	"",
	Array(
		"AUTH_AUTH_URL" => "/login/",
		"AUTH_REGISTER_URL" => "/reg/"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>