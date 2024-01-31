<?php

$agreement = <<< EOF
Добро пожаловать в чат-бот!
Здесь вы научитесь...
Мы поможнм вам...
Для продолжения вам необходимо принять условия соглашения...
Подробности на <a href="https://clinli.ru/mybots/agreement/">сайте</a>
EOF;


define('TOKEN', '6182608551:AAFxnBByp__y12vg7GeBbJz1SR5y-UkEaSk');

function sendTelegram($method, $response, $show = true)
{
	if(!$show) return;
	$ch = curl_init('https://api.telegram.org/bot' . TOKEN . '/' . $method);  
	curl_setopt($ch, CURLOPT_POST, 1);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$res = curl_exec($ch);
	curl_close($ch);
	return !curl_error($ch) ? $res : false;
}


function idByName($name){
	$rsItems = CIBlockElement::GetList(array(),array('IBLOCK_ID' => 28,'NAME' => $name), false, false, array('ID'));
	if($arItem = $rsItems->GetNext()){
		return($arItem['ID']);
	}
	else return false;  
}


function showAgreement($chat_id){  // не работает sendTelegram из include
    global $agreement;
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



function checkUser($name, $prop = 'exist') {
	 
	switch ($prop){
		case 'exist':
			$rsItems = CIBlockElement::GetList(
				array(),
				array('IBLOCK_ID' => 28,'NAME' => $name), 
				false, 
				false, 
				array()
			);
			if($arItem = $rsItems->GetNext()){
				return true;
			}
		break;
		
		case 'agreementAccept': 
			$rsItems = CIBlockElement::GetList(
			array(),
			array('IBLOCK_ID' => 28,'NAME' => $name), 
			false, 
			false, 
			array('PROPERTY_AGREEMENT')
		);
		if($arItem = $rsItems->GetNext()){
			if($arItem['PROPERTY_AGREEMENT_VALUE'] == 'Да') return true;
			else return false;
		}
		return false;
		
		break;
		
		case 'agreementDateTime': 
			$rsItems = CIBlockElement::GetList(
			array(),
			array('IBLOCK_ID' => 28,'NAME' => $name), 
			false, 
			false, 
			array('PROPERTY_AGREEMENT_DATETIME')
		);
		if($arItem = $rsItems->GetNext())	return $arItem['PROPERTY_AGREEMENT_DATETIME_VALUE'];
		else return false;
		
		break;
		
	}
	return false;
}

// $nowdate & $date in d.m.Y H:i:s
function dayDiff($nowdate, $date){
	$nowdate = date('Y-m-d', strtotime($nowdate));
	$date = date('Y-m-d', strtotime($date));
	$diff = abs(strtotime($nowdate) - strtotime($date)); // секунд
	$days = floor( $diff / (60*60*24) );
	return $days;
}

function gen_password($length = 6){				
	$chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP'; 
	$size = strlen($chars) - 1; 
	$password = ''; 
	while($length--) {
		$password .= $chars[random_int(0, $size)]; 
	}
	return $password;
}




$arTask =[
	0 => [
		'08:08' =>
		[
			'text' => 'Если ты хочешь получить то, чего у тебя никогда не было, начни делать то, что ты никогда не делал. Сегодня мы встали на путь приключений, которые приблизит нас к особзнанности, а значит, к настоящей  жизни.',
			'inline_keyboard' =>
				[
						['text' => 'Далее', 'callback_data' => json_encode(['action' => '1d1m'])], // first day, first message
				]
		],
		['time' => '11:11', 'text' => 'Сегодня измените немного свой привычный маршрут, пойдите по новой дороге на работу (в магазин, школу, в гости к маме, домой).', 'type' => ''],
		['time' => '14:14', 'text' => 'Задание первой недели 08:08', 'type' => ''],
		['time' => '17:17', 'text' => 'Задание первой недели 08:08', 'type' => ''],
		['time' => '19:19', 'text' => 'Задание первой недели 08:08', 'type' => ''],
		['time' => '21:21', 'text' => 'Задание первой недели 08:08', 'type' => ''],
		['time' => '21:30', 'text' => 'Задание первой недели 08:08', 'type' => ''],
	],

	2 => array(
		'08:08' => 'Задание первой недели 08:08',
		'13:13' => 'Задание первой недели 13:13',
		'16:16' => 'Задание первой недели 16:16',
		'19:19' => 'Задание первой недели 19:19',
		'21:21' => 'Задание первой недели 21:21',
		'21:30' => 'Самопроверка: сколько упражнений у меня получилось выполнить?',
	),

	3 => array(
		'08:08' => 'Задание первой недели 08:08',
		'13:13' => 'Задание первой недели 13:13',
		'16:16' => 'Задание первой недели 16:16',
		'19:19' => 'Задание первой недели 19:19',
		'21:21' => 'Задание первой недели 21:21',
		'21:30' => 'Самопроверка: сколько упражнений у меня получилось выполнить?',
	),

	4 => array(
		'08:08' => 'Задание первой недели 08:08',
		'14:14' => 'Задание первой недели 13:13',
		'18:18' => 'Задание первой недели 16:16',
		'21:21' => 'Задание первой недели 19:19',
		'21:30' => 'Самопроверка: сколько упражнений у меня получилось выполнить?',
	),

	5 => array(
		'08:08' => 'Задание первой недели 08:08',
		'14:14' => 'Задание первой недели 13:13',
		'18:18' => 'Задание первой недели 16:16',
		'21:21' => 'Задание первой недели 19:19',
		'21:30' => 'Самопроверка: сколько упражнений у меня получилось выполнить?',
	),

	6 => array(
		'08:08' => 'Задание первой недели 08:08',
		'15:15' => 'Задание первой недели 15:15',
		'21:21' => 'Задание первой недели 21:21',
		'21:30' => 'Самопроверка: сколько упражнений у меня получилось выполнить?',
	),
];





