<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");

?><?$APPLICATION->IncludeComponent(
	"bitrix:fileman.light_editor",
	"",
	Array(
		"CONTENT" => "Тестовая информация",
		"HEIGHT" => "300px",
		"ID" => "",
		"INPUT_ID" => "test",
		"INPUT_NAME" => "test",
		"JS_OBJ_NAME" => "",
		"RESIZABLE" => "N",
		"USE_FILE_DIALOGS" => "Y",
		"VIDEO_ALLOW_VIDEO" => "Y",
		"VIDEO_BUFFER" => "20",
		"VIDEO_LOGO" => "",
		"VIDEO_MAX_HEIGHT" => "480",
		"VIDEO_MAX_WIDTH" => "640",
		"VIDEO_SKIN" => "/bitrix/components/bitrix/player/mediaplayer/skins/bitrix.swf",
		"VIDEO_WINDOWLESS" => "Y",
		"VIDEO_WMODE" => "transparent",
		"WIDTH" => "100%"
	)
);?><?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>