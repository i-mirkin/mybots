<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
$APPLICATION->SetPageProperty("title", "Регистрация");
$APPLICATION->SetPageProperty("description", "Регистрация");
$APPLICATION->SetPageProperty("keywords", "регистрация");
$APPLICATION->SetPageProperty("bgClass", "login-bg access-register");
$APPLICATION->SetPageProperty("bodyClass", "");
$APPLICATION->SetPageProperty("containerClass", "login-area");
?>

<?$APPLICATION->IncludeComponent(
	"custom:main.register",
	"",
	Array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array("EMAIL"),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array("EMAIL"),
		"SUCCESS_PAGE" => "/personal/profile/",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>