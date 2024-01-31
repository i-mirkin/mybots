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
*/

include 'functions.php';
define('TOKEN','6776296096:AAEMZAtFgDJ-4eZ6rC79zeoTNDxHahIVvVI');

$data  = json_decode(file_get_contents('php://input'), true);
if($data) file_put_contents(__DIR__ . '/log.txt', print_r($data, true));

$chat_id = $data["message"]["chat"]["id"];

// обработка callback_data
if (isset($data['callback_query'])) {
    // Reply with callback_query data
    $r = http_build_query([
        'text' => $data['callback_query']['data'],
        'chat_id' => $data['callback_query']['from']['id']
    ]);
		sendTelegram('sendMessage',[
			'chat_id' => $chat_id,
			'text' => 'OK', 
		]);	
		
		//file_get_contents("https://api.telegram.org/" . TOKEN . "/sendMessage?{$r}");
}


/*

$result = sendTelegram('sendMessage',[
	'chat_id' => -1002081212925,
	'user_id' => 525697558,
	'text' => 'Запрос контактных данных',
	'reply_markup' => $reply_markup
]);
*/




if (!empty($data['message']['text'])) {

	switch($data['message']['text']) {

	case '/start':

		// Меняем всплывающее меню
		{
		$reply_markup = json_encode([
			"resize_keyboard" => true,
			"one_time_keyboard" => true,
			"keyboard" => [
				[["text" => "Побухать"]],
			],
		]);
		$result = sendTelegram('sendMessage', [
			'chat_id' => $chat_id,
			'text' => '',
			'reply_markup' => $reply_markup
		]);	
		}
		

		$result = sendTelegram('sendMessage',[
			'chat_id' => $chat_id,
			'text' => 'Начинаем ' . $chat_id,
			'reply_markup' => json_encode([
					'inline_keyboard' => [
							[
									['text' => 'Ответить', 'web_app' => ['url' => 'https://clinli.ru']],
									['text' => 'Форма', 'callback_data' => 'Нажал на кнопку Форма' ]
							]
					]
			]) 
		]);	
	break;	


	case 'Начать':


	break;	

	default:


	}
}	

