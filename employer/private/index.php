<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональный раздел");
$APPLICATION->SetPageProperty("bgClass", "private-bg");
$APPLICATION->SetPageProperty("containerClass", "login-area");
// <div ..-bg
// <div container
// <section
?>


<div class="row">
<div class="col s12 pad-0">
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."personal/personal_menu.php",
		"AREA_FILE_RECURSIVE" => "N",
		"EDIT_MODE" => "html",
	),
	false,
	Array('HIDE_ICONS' => 'Y')
);?>
</div>
</div>


<h5 class="pagetitle"><?$APPLICATION->ShowTitle();?></h5>

<div class="row">
<div class="col s12 pad-0">
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.profile",
		"",
		Array(
			"CHECK_RIGHTS" => "N",
			"SEND_INFO" => "N",
			"SET_TITLE" => "Y",
			"USER_PROPERTY" => array(),
			"USER_PROPERTY_NAME" => ""
		)
	);?>
</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>