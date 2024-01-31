<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("TEST");
$APPLICATION->SetPageProperty("bodyClass", "isfullscreen");
?>

<?

function howmuch($in, $arNums, $s, $firstIndexOfKeysIsOne = true) { // true (по умолччанию) нужно для того чтобы не менять ключевой массив ответов 
// вх. массив, какие номера массива проверять, что искать (да/нет/0/1 и пр.), номера $arNums начинаются с 1 (чаще всего)    возвращает количество вхождений
// пример $S['L'] = howmuch($in, array(15,120,135,150,165,195,225,255,285), "Нет");
	if(!is_array($in) || !is_array($arNums)) return false;
	$r = 0;
	if($firstIndexOfKeysIsOne == true){
		foreach ($arNums as $num) {
			if($in[$num-1] == $s) $r++;
		}	
	}
	else{
		foreach ($arNums as $num) {
			if($in[$num] == $s) $r++;
		}	
	}
	return $r;
};

$in = '{"0":"Да","1":"Нет","2":"Да","3":"Да","4":"Да","5":"Да","6":"Да","7":"Да","8":"Да","9":"Да","10":"Нет","11":"Да","12":"Да","13":"Да","14":"Да","15":"Да","16":"Да","17":"Нет","18":"Нет","19":"Да","20":"Да","21":"Да","22":"Нет","23":"Да","24":"Да","25":"Да","26":"Да","27":"Да","28":"Да","29":"Да","30":"Да","31":"Да","32":"Да","33":"Да","34":"Да","35":"Да","36":"Да","37":"Нет","38":"Нет","39":"Нет","40":"Нет","41":"Нет","42":"Нет","43":"Нет","44":"Нет"}';

$in = json_decode($in, true);

print_r($in);

//шкала достоверности
			$S['L'] = howmuch($in, array(11, 12, 18, 21, 23, 25, 29, 34, 39), "Да", true);
			$S['L'] += howmuch($in, array(42), "Нет", true);
			$S['L'] = $S['L']/10; 
			
			
			//шкала суицидального риска
			$S['R'] = howmuch($in, array(1, 2, 3, 5, 7, 9, 13, 14, 15, 16, 19, 22, 24, 28, 31, 33, 35, 36, 37, 38, 40, 41, 43, 44), "Да", true);
			$S['R'] += howmuch($in, array(4, 6, 8, 10, 17, 20, 26, 27, 30, 32, 45), "Нет", true);
			$S['R'] = round($S['R']/35, 2);
			/*
			if($S['R']>= 0.01 && $S['R']<= 0.23) $DATA['RESULT_FULL'] .= "<strong>5 баллов (из 5)</strong> – низкий уровень склонности к суицидальным реакциям.";
			elseif($S['R']>= 0.24 && $S['R']<= 0.38) $DATA['RESULT_FULL'] .= "<strong>4 балла (из 5)</strong> – суицидальная реакция может возникнуть только на фоне длительной психической травматизации и при реактивных состояниях психики.";
			elseif($S['R']>= 0.39 && $S['R']<= 0.59) $DATA['RESULT_FULL'] .= "<strong>4 балла (из 5)</strong> – суицидальная реакция может возникнуть только на фоне длительной психической травматизации и при реактивных состояниях психики.";
			elseif($S['R']>= 0.39 && $S['R']<= 0.59) $DATA['RESULT_FULL'] .= "<strong>3 балла (из 5)</strong> – «потенциал» склонности к суицидальным реакциям не отличается высокой устойчивостью.";
			elseif($S['R']>= 0.60 && $S['R']<= 0.74) $DATA['RESULT_FULL'] .= "<strong>2 балла (из 5)</strong> – группа суицидального риска с высоким уровнем проявления склонности к суицидальным реакциям (при нарушениях адаптации возможна суицидальная попытка или реализация саморазрушающего поведения).";
			elseif($S['R']>= 0.75 && $S['R']<= 1) $DATA['RESULT_FULL'] .= "<strong>1 балл (из 5)</strong> – группа суицидального риска с очень высоким уровнем проявления склонности к суицидальным реакциям (ситуация внутреннего и внешнего конфликта, нуждаются в медикопсихологической помощи).";

			$DATA['RESULT_SHORT'] = $DATA['RESULT_FULL'];

			if($S['L'] <= 0.44) $DATA['RESULT_FULL'] .= "<br>Достоверность результатов тестирования: открытость  и  откровенность в раскрытии своих проблем, отсутствие сознательного намрения приукрасить свой характер."; 
			elseif($S['L'] >= 0.76) $DATA['RESULT_FULL'] .= "<br>Достоверность результатов тестирования: высокое стремление приукрасить себя и неадекватность ответов."; 
			elseif($S['L'] >= 0.76) $DATA['RESULT_FULL'] .= "<br>Достоверность результатов тестирования: относительно надежная достоверность результатов обследования."; 
			*/
			
			print_r($S);
			
			
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>