<?
/*
iCanDoAnythingBot
iCanDoAnythingByClinliBot
icandoanythingbyclinlibot.php

6776296096:AAEMZAtFgDJ-4eZ6rC79zeoTNDxHahIVvVI
https://api.telegram.org/bot6776296096:AAEMZAtFgDJ-4eZ6rC79zeoTNDxHahIVvVI/setWebhook?url=https://clinli.ru/mybots/icandoanythingbyclinlibot.php


https://clinli.ru/mybots/icandoanythingbyclinlibot.php


[id] => 6776296096
[is_bot] => 1
[first_name] => iCanDoAnything
[username] => iCanDoAnythingByClinliBot

[id] => -1002081212925
[title] => Ilya и Маша
[type] => supergroup


Маша
Your user ID: 460065518
Current chat ID: 460065518

Илья
Your user ID: 525697558
Current chat ID: 525697558


*/

include 'functions.php';

define('TOKEN','6776296096:AAEMZAtFgDJ-4eZ6rC79zeoTNDxHahIVvVI');

$data  = file_get_contents('php://input');
$data  = json_decode($data, true);
if($data) file_put_contents(__DIR__ . '/log.txt', print_r($data, true));


/*
sendTelegram('banChatMember', array(
'chat_id' => -1002081212925,
'user_id' => 460065518
));
*/

/*
что-то не работает
$result = sendTelegram('unbanChatMember', array(
'chat_id' => -1002081212925,
'user_id' => 460065518
));
*/

$reply_markup = json_encode([
	"resize_keyboard" => true,
	"one_time_keyboard" => true,
	"keyboard" => [
		[["text" => "Начать1", 'request_contact' => true]],
	],
]);

$result = sendTelegram('sendMessage',[
	'chat_id' => -1002081212925,
	'user_id' => 525697558,
	'text' => 'Запрос контактных данных',
	'reply_markup' => $reply_markup
]);
var_dump($result);









if (!empty($data['message']['text'])) {

switch($data['message']['text']) {

case '/start':

/*
$reply_markup = json_encode([
	"resize_keyboard" => true,
	"one_time_keyboard" => true,
	"keyboard" => [
		[["text" => "Начать"]],
	],
]);

sendTelegram('sendMessage', array(
'chat_id' => $data['message']['chat']['id'],
'text' => '
	Я ваш тренер в проекте «Я могу всё».
	Раз вы читаете эти строки, значит, у вас есть цель, которую вы хотите реализовать.
	Я с радостью готов вам в этом помочь. Одно условие: с меня действенные практики и конкретные инструкции, с вас — их выполнение. Только в этом случае вы придете к своей цели.
	По рукам? Тогда — вперед!
	Не забывайте проверять меню!
',
'reply_markup' => $reply_markup
));
*/

	// в момент добавления бота к группе/каналу записывваем идентификаторы в массив
	// -4086024876
	
	// необходимо решить по какому параметру можно исключать пользователей из группы/канала
	
	
	/*
	$chatMemberCount = sendTelegram('getChatMemberCount', array(
		'chat_id' => -1002081212925,
		//'chat_id' => 525697558,
	));
	$chatMemberCount =  json_decode($chatMemberCount, true);
	*/
	
	
	$banChatMemberResult = sendTelegram('banChatMember', array(
		'chat_id' => -1002081212925,
		'user_id' => 460065518,
	));
	
	if($banChatMemberResult){
		sendTelegram('sendMessage', array(
			'chat_id' => 525697558,
			'text' => 'Успешно забанили'
		));	
	}
	else {
		sendTelegram('sendMessage', array(
			'chat_id' => 525697558,
			'text' => 'Не получилось'
		));	
	}
	
	/*
	sendTelegram('unbanChatMember', array(
		'chat_id' => -1002081212925,
		'user_id' => 460065518,
	));
	*/
	
	

	// получить список всех пользователей группы/канала
	
	



break;	


case 'Начать':
// создаем пользователя

// обозначаем дату начала работы


break;	

default:


}
}	

