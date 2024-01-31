<?php
global $arTask, $agreement;
ini_set('error_reporting', E_ALL);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule("sale");

/*
Mindfulness 3.0
@mindfulness4uBot
mindfulness4uBot.php

6776296096:AAEMZAtFgDJ-4eZ6rC79zeoTNDxHahIVvVI
https://api.telegram.org/bot6182608551:AAFxnBByp__y12vg7GeBbJz1SR5y-UkEaSk/setWebhook?url=https://clinli.ru/mybots/mindfulness4uBot.php
https://api.telegram.org/bot6182608551:AAFxnBByp__y12vg7GeBbJz1SR5y-UkEaSk/setWebhook?remove

https://clinli.ru/mybots/mindfulness4uBot.php

!!!
если есть меню-ссылка то меню работать не будет
Добавление-удаление меню со ссылкой перехода
Для этого снова используем команду /mybots. Выбираем бота и жмем «Bot Settings».
Выбираем «Menu Button».
Выбираем «Configure menu button».
@BotFather запросит ссылку, по которой нужно будет переходить при нажатии кнопки. 


https://drive.google.com/drive/folders/0B3C1J5WeYrBqYVNQWTF1RF81T00?resourcekey=0-eGuIazQsIGYkpYUxuNDavg


1. принять условия


*/

include dirname(__FILE__).'/functions.php';

define('DEBUG', true);







$data  = json_decode(file_get_contents('php://input'), true);
if($data) file_put_contents(__DIR__ . '/log.txt', print_r($data, true));
$chat_id = $data["message"]["chat"]["id"];

// обработка callback
if (isset($data['callback_query'])) {
	$callback_array = json_decode($data['callback_query']['data'], true);
	
	// принял условия пользования
	if($callback_array['action'] == 'agreement_accept') {
		$chat_id = $data['callback_query']['from']['id'];
		// отправляем сообщение
		sendTelegram('sendMessage', array(
			'chat_id' => $chat_id, // attention!!! another method for chat_id
			'text' => 'Спасибо, что прияняли соглашение!',
		));
		
		// отметка о принятии соглашения
		$PROPERTY_VALUES['AGREEMENT'] = 235;
		$objDateTime = new DateTime();
		$PROPERTY_VALUES['AGREEMENT_DATETIME'] = $objDateTime->toString();
		CIBlockElement::SetPropertyValuesEx(idByName($chat_id), 28, $PROPERTY_VALUES); 
		
	}
	
}

/*
изменение нижнего меню, это меню обрабатывется как обычный текст
$result = sendTelegram('sendMessage', [
	'chat_id' => $chat_id,
	'text' => 'Изменение',
	'reply_markup' => json_encode([
		'resize_keyboard' => true,
		'one_time_keyboard' => true,
		'keyboard' => [
			[['text' => 'Бот побухать)!']],
		],
	])
]);	
*/
	

if (!empty($data['message']['text'])) {

	switch($data['message']['text']) {

	case 'Бот побухать)!':
		sendTelegram('sendMessage', ['chat_id' => $chat_id, 'text' => 'Этот и друние боты для улучшения жизни еще в разработке.']);
	
	break;	
	case '/start':
		
		if($chat_id) {
			
			if(checkUser($chat_id, 'exist')) { // если пользователь существует
				// выводить только при дебаге
				sendTelegram('sendMessage', ['chat_id' => $chat_id, 'text' => 'Пользователь уже существует.'], DEBUG); 
				
				if(!checkUser($chat_id, 'agreementAccept')) {
					// отправляем соглашение
					sendTelegram('sendMessage', ['chat_id' => $chat_id, 'text' => 'Пользователь в БД, соглашение не подписано, высылаем.'], DEBUG);
					sendTelegram('sendMessage',[
						'chat_id' => $chat_id,
						'text' => $agreement,
						'parse_mode' => 'HTML', 
						'reply_markup' => json_encode([
								'inline_keyboard' => [
										[
												['text' => 'Принимаю', 'callback_data' => json_encode(['action' => 'agreement_accept'])],
												['text' => 'Отказываюсь', 'callback_data' => json_encode(['action' => 'agreement_refuse'])]
										]
								]
						]) 
					]);
					exit;	
				}
			}
			
			else { // если в базе нет текущего пользователя создаем
				sendTelegram('sendMessage', ['chat_id' => $chat_id, 'text' => 'Пользователь НЕ существует. Создаем.']);	
				$element = new CIBlockElement;
				$arElement = Array(
					"IBLOCK_SECTION_ID" => false,
					"IBLOCK_ID"      => 28,
					"NAME"           => $chat_id,
					"ACTIVE"         => "Y",            
				);
				if ($ID = $element->Add($arElement)) {
					// после создания выводим приглашение и соглашение $debugOnly = true
					sendTelegram('sendMessage', ['chat_id' => $chat_id, 'text' => 'Новый пользователь добавлен в систему. Добро пожаловать!'], DEBUG);
					sendTelegram('sendMessage',[
						'chat_id' => $chat_id,
						'text' => $agreement,
						'parse_mode' => 'HTML', 
						'reply_markup' => json_encode([
								'inline_keyboard' => [
										[
												['text' => 'Принимаю', 'callback_data' => json_encode(['action' => 'agreement_accept'])],
												['text' => 'Отказываюсь', 'callback_data' => json_encode(['action' => 'agreement_refuse'])]
										]
								]
						]) 
					]);
				}
				else sendTelegram('sendMessage', ['chat_id' => $chat_id, 'text' => 'Ошибка в работе бота. Ошибка 001.'], DEBUG);
				
				exit;

			}
		}
			
	break;	


	default:


	}
}	 // !empty($data['message']['text'])

		
		
// на любое сообщение 	
if(checkUser($chat_id, 'agreementAccept')){
	sendTelegram('sendMessage', ['chat_id' => $chat_id, 'text' => 'Вы зарегистрированы! Соглашение принято! Ожидайте первое/очередное задание']);
}

// CRON каждые 50 секунд или строго в фиксированное время

// выбираем всех пользователей у кого есть соглашение
$rsItems = CIBlockElement::GetList(
	[],
	['IBLOCK_ID' => 28, 'ACTIVE' => 'Y', 'PROPERTY_AGREEMENT_VALUE' => 'Да'], 
	false, 
	false, 
	['ID', 'NAME', 'PROPERTY_AGREEMENT_DATETIME']
);
while($arItem = $rsItems->GetNext()) {  
	/*
	$startDateTime = $arItem['PROPERTY_AGREEMENT_DATETIME_VALUE'];
	//$nowDateTime = date('d.m.Y h:i:s');
	$nowDateTime = '31.01.2024 00:28:00';
	$days = dayDiff($nowDateTime, $startDateTime); // разница в днях
	$week = floor (($days - 1) / 7) + 1;
	*/

    //29.01.2024 21:29:07

    $start = DateTime::createFromFormat('d.m.Y H:i:s', $arItem['PROPERTY_AGREEMENT_DATETIME_VALUE']);
	$now = new DateTime();
	$now = DateTime::createFromFormat('d.m.Y H:i:s', '30.01.2024 08:08:00');
	$interval = DateTime::createFromFormat('d.m.Y', $start->format('d.m.Y'))->diff(DateTime::createFromFormat('d.m.Y', $now->format('d.m.Y')));
	$days = $interval->d;
	$weeks = floor($days/7);

	SendTelegram(
		'sendMessage', 
		[
            'chat_id' => $arItem['NAME'],
            'text' => $start->format('d.m.Y H:i:s').' -> '.$now->format('d.m.Y H:i:s').' Д '.$days.', Н '.$weeks.', В '. $now->format('H:i')],
		DEBUG
	);
	
	if($days > 0 ) {
        if ($arTask[$weeks][$now->format('h:i')]) {
            SendTelegram(
                'sendMessage',
                [
                    'chat_id' => $arItem['NAME'],
                    'text' => $arTask[$weeks][$now->format('H:i')],
                ]
            );
        } else {
            SendTelegram(
                'sendMessage',
                [
                    'chat_id' => $arItem['NAME'],
                    'text' => 'Для вас нет заданий!',
                ],
                DEBUG
            );

        }
    }
    else {
        SendTelegram('sendMessage', ['chat_id' => $arItem['NAME'], 'text' => 'Задания начнут приходить с завтрашнего дня'],DEBUG);
    }

}



