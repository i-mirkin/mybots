<?
// опрос с вариантами ответов
{
sendTelegram('sendPoll', array(
	'chat_id' => 525697558,
	'is_anonymous' => false, //!!! 
	'question' => 'Что такое синус '.$_SESSION['poll_chat_id'],
	'options' => json_encode(['0', '1', '2', '3']),
	'correct_option_id' => 2,
	'type' => 'quiz',
	'explanation' => 'Текст, который отображается, когда пользователь выбирает неправильный ответ или нажимает на значок лампы в опросе в стиле викторины',
	'reply_markup' => json_encode([
			"resize_keyboard" => true,
			"one_time_keyboard" => true,
			"keyboard" => [
				[["text" => "blablabla"],["text" => "blablabla"]],
				[["text" => "blablabla"],["text" => "blablabla"]],
			],
		])
));

if(!empty($data['poll_answer'])) {
	
	$correct_option_id = $data['poll']['correct_option_id'];
	$text = 'Поступил ответ';
	if($data['poll_answer']['option_ids'] == 'Что такое синус') {
		if ($data['poll']['options'][$correct_option_id]['voter_count'] == 1){
			$text = 'Правильный ответ!';
		}
		else {
			$text = 'НЕ правильный ответ!';
		}
	}
	sendTelegram('sendMessage', array(
		'chat_id' => $_SESSION['poll_chat_id'],
		'text' => $text."123"
	));
	
}

}