<?
// CRON: FirstVDS /usr/bin/php /var/www/www-root/data/www/clinli.ru/mindfulness/notifymebyclinlibot.php >/dev/null 2>&1
// высылает любые оповещения в NotifyMe @NotifyMeByClinliBot
$_SERVER["DOCUMENT_ROOT"] = "/home/c/cq68811/clinli.ru/public_html";
//$_SERVER["DOCUMENT_ROOT"] = "/var/www/www-root/data/www/clinli.ru";
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");


/*
BotFather

Use this token to access the HTTP API:
5932693888:AAF85vumLv9Xe45-d1VNIuhvBjk_ToHqjps

!!!!!!!!!!!! для установки ХУКА не забудь кроме url подставить и токен !!!!!!!!!!!!!
https://api.telegram.org/bot5932693888:AAF85vumLv9Xe45-d1VNIuhvBjk_ToHqjps/setWebhook?url=https://clinli.ru/mybots/notifymebyclinlibot.php
{"ok":true,"result":true,"description":"Webhook was set"}

Unfortunately, at this moment we don't have methods for sending bulk messages, e.g. notifications. We may add something along these lines in the future.

не более  30 пользователям в секунду
Также обратите внимание, что ваш бот не сможет отправлять более 20 сообщений в минуту в одну и ту же группу.
*/



include 'functions.php';
define('TOKEN','6776296096:AAEMZAtFgDJ-4eZ6rC79zeoTNDxHahIVvVI');


/*
ОАОВЕЩЕНИЯ ОБ ОПЛАЧЕННЫХ ТЕСТАХ
CModule::IncludeModule("iblock");
$rsItems = CIBlockElement::GetList(
	array(),
	//array('IBLOCK_ID' => 11, "PROPERTY_PAID_RESULT_VALUE" => 'Да'), 
	array(
		'IBLOCK_ID' => 11, 
		array(
			"LOGIC" => "AND",
			array("!PROPERTY_PAYCONFIRM" => false,), // оплата подтверждена
			array("PROPERTY_PAID_RESULT_VALUE" => false), // но доступ не открыт
		),
	),
	false, 
	false, 
	array(
		'ID', 
		'NAME', 
		'PROPERTY_TEST.ID', 
		'DETAIL_PAGE_URL', 
		'PROPERTY_LINK', 
		'PROPERTY_USER_ID', 
		'PROPERTY_PAID_RESULT', // оплачен ли результат
		'PROPERTY_PAYCONFIRM',
		'PROPERTY_LINK',
		'DATE_CREATE',
		'ACTIVE_FROM',
	)
);

while ($arItem = $rsItems->GetNext()) {
	$text .= "https://clinli.ru/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=11&type=clinli&ID=".$arItem['ID']." [".$arItem['PROPERTY_PAYCONFIRM_VALUE']."]\n\n";
}
if(!empty($text)){
	$result = sendTelegram('sendMessage',[
	'chat_id' => 525697558, // its me
	'text' => $text
]);	
	
}
*/







?>