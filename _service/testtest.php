<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("TEST3");
use Bitrix\Main\Page\Asset;
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?
// https://www.psyoffice.ru/3-0-praktikum-kettell4.htm
		
		
function kettell($in) {
	//'женский' 'мужской'  16 - 18 лет 19 - 28 лет 29 - 70 лет
	
	$S = array();
	
	switch ($in[1]){
		case 'да': ;break;
		case 'не уверен': ;break;
		case 'нет': ;break;
	};

	switch ($in[2]){ 
		case 'да': break; 
		case 'не уверен': break; 
		case 'нет': break; 
	};

	switch ($in[3]){
		case 'в обжитом городе': $S['A']+=2;  ;break;
		case 'нечто среднее': $S['A']+=1; ;break;
		case 'одиноко в глухих лесах': $S['A']+=0 ;break;
	}

	switch ($in[4]){
		case 'всегда':       $S['C']+=2;  break;
		case 'обычно':          $S['C']+=1; break;
		case 'редко': break;
	}

	switch ($in[5]){
		case 'верно':       break;
		case 'не уверен': $S['C']+=1;  break;
		case 'неверно': $S['C']+=2; break;
	}

	switch ($in[6]){ 
		case 'да': break; 
		case 'иногда': $S['E']+=1; break; 
		case 'нет': $S['E']+=2; break; 
	}

	switch ($in[7]){ 
		case 'обычно': $S['E']+=2; break; 
		case 'иногда': $S['E']+=1; break; 
		case 'никогда': break; 
	}

	switch ($in[8]){ 
		case 'верно': break; 
		case 'не уверен': $S['F']+=1; break; 
		case 'неверно': $S['F']+=2; break; 
	}

	switch ($in[9]){ 
		case 'дал бы им возможность договориться самим': break; 
		case 'не уверен': $S['G']+=1; break; 
		case 'рассудил бы их': $S['G']+=2; break; 
	}

	switch ($in[10]){ 
		case 'с готовностью вступаю в разговор': $S['H']+=2; break; 
		case 'нечто среднее': $S['H']+=1; break; 
		case 'предпочитаю спокойно оставаться в стороне': break; 
	}

	switch ($in[11]){ 
		case 'инженером-строителем': break; 
		case 'не уверен': $S['I']+=1; break; 
		case 'драматургом': $S['I']+=2;  break; 
	}

	switch ($in[12]){ 
		case 'верно': $S['I']+=2; break; 
		case 'не уверен': $S['I']+=1; break; 
		case 'неверно': break; 
	}

	switch ($in[13]){ 
		case 'да': break; 
		case 'нечто среднее': $S['L']+=1; break; 
		case 'нет': $S['L']+=2; break; 
	}

	switch ($in[14]){ 
		case 'да': break; 
		case 'не уверен': $S['M']+=1; break; 
		case 'нет': $S['M']+=2;  break; 
	}

	switch ($in[15]){ 
		case 'согласен': break; 
		case 'не уверен': $S['M']+=1; break; 
		case 'не согласен': $S['M']+=2; break; 
	}

	switch ($in[16]){ 
		case 'согласен': break; 
		case 'не уверен': $S['N']+=1; break; 
		case 'не согласен': $S['N']+=2; break; 
	}

	switch ($in[17]){ 
		case 'только если это необходимо': $S['N']+=2; break; 
		case 'нечто среднее': $S['N']+=1; break; 
		case 'охотно, когда представится возможность': break; 
	}

	switch ($in[18]){ 
		case 'да': $S['O']+=2; break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[19]){ 
		case 'не испытываю чувства вины': break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'все же чувствую себя немного виноватым': $S['O']+=2; break; 
	}

	switch ($in[20]){ 
		case 'да': $S['Q1']+=2; break; 
		case 'не уверен': $S['Q1']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[21]){ 
		case 'сердце': break; 
		case 'сердце и разум в равной степени': $S['Q1']+=1; break; 
		case 'разум': $S['Q1']+=2; break; 
	}

	switch ($in[22]){ 
		case 'да': break; 
		case 'не уверен': $S['Q2']+=1; break; 
		case 'нет': $S['Q2']+=2; break; 
	}

	switch ($in[23]){ 
		case 'верно': break; 
		case 'не уверен': $S['Q3']+=1; break; 
		case 'неверно': $S['Q3']+=2; break; 
	}

	switch ($in[24]){ 
		case 'высказывать свои мысли так, как они приходят мне в голову': break; 
		case 'нечто среднее': $S['Q3']+=1; break; 
		case 'сначала сформулировать получше свои мысли': $S['Q3']+=2; break; 
	}

	switch ($in[25]){ 
		case 'да': break; 
		case 'нечто среднее': $S['Q4']+=1; break; 
		case 'нет':$S['Q4']+=2; break; 
	}
	switch ($in[26]){
		case 'плотником или поваром': ;break;
		case 'не уверен': $S['A']+=1; ;break;
		case 'официантом в хорошем ресторане': $S['A']+=2 ;break;
	}
	switch ($in[27]){
		case 'очень редко': $S['A']+=0;  ;break;
		case 'иногда':      $S['A']+=1; ;break;
		case 'много раз':   $S['A']+=2 ;break;
	}
	switch ($in[28]){
		case '«острый»': $S['B']+=0; break;
		case '«резать»': $S['B']+=1; break;
		case '«указывать»': $S['B']+=0; break;
	}
	switch ($in[29]){ 
		case 'верно': break; 
		case 'не уверен': $S['C']+=1; break; 
		case 'неверно': $S['C']+=2; break; 
	}
	switch ($in[30]){ 
		case 'верно': $S['C']+=2; break; 
		case 'не уверен': $S['C']+=1; break; 
		case 'неверно': break; 
	}
	switch ($in[31]){ 
		case 'только после основательного обсуждения': break; 
		case 'не уверен': $S['E']+=1; break; 
		case 'как можно скорее': $S['E']+=2; break; 
	}

	switch ($in[32]){ 
		case 'верно': break; 
		case 'нечто среднее': $S['E']+=1; break; 
		case 'неверно': $S['E']+=2; break; 
	}

	switch ($in[33]){ 
		case 'да': $S['F']+=2; break; 
		case 'не уверен': $S['F']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[34]){ 
		case 'принимаю их такими, как они есть': break; 
		case 'нечто среднее': $S['G']+=1; break; 
		case 'испытываю отвращение и возмущение': $S['G']+=2; break; 
	}

	switch ($in[35]){ 
		case 'да': break; 
		case 'нечто среднее': $S['H']+=1; break; 
		case 'нет': $S['H']+=2; break; 
	}

	switch ($in[36]){ 
		case 'да': $S['H']+=2; break; 
		case 'нечто среднее': $S['H']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[37]){ 
		case 'заниматься музыкой, пением': $S['I']+=2; break; 
		case 'нечто среднее': $S['I']+=1; break; 
		case 'выпиливать и мастерить что-либо': break; 
	}

	switch ($in[38]){ 
		case 'да': $S['L']+=2; break; 
		case 'иногда': $S['L']+=1; break; 
		case 'нет':  break; 
	}

	switch ($in[39]){ 
		case 'помогали детям развивать свои чувства': $S['M']+=2; break; 
		case 'нечто среднее':$S['M']+=1; break; 
		case 'обучали детей сдерживать свои чувства': break; 
	}

	switch ($in[40]){ 
		case 'постараться улучшить организацию работы': $S['M']+=2; break; 
		case 'нечто среднее':$S['M']+=1; break; 
		case 'следить за результатами и соблюдением правил': break; 
	}

	switch ($in[41]){ 
		case 'да': break; 
		case 'нечто среднее': $S['N']+=1; break; 
		case 'нет': $S['N']+=2; break; 
	}

	switch ($in[42]){ 
		case 'да': $S['N']+=2; break; 
		case 'нечто среднее': $S['N']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[43]){ 
		case 'верно': $S['O']+=2; break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'неверно': break; 
	}

	switch ($in[44]){ 
		case 'пользуюсь случаем, чтобы попросить о чем-то нужном мне': break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'боюсь, что это связано с какой-нибудь оплошностью в моей работе': $S['O']+=2; break; 
	}

	switch ($in[45]){ 
		case 'больше спокойных, солидных людей': break; 
		case 'не уверен': $S['Q1']+=1; break; 
		case 'больше «идеалистов», планирующих лучшее будущее': $S['Q1']+=2; break; 
	}

	switch ($in[46]){ 
		case 'да': $S['Q1']+=2; break; 
		case 'не уверен': $S['Q1']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[47]){ 
		case 'иногда': $S['Q2']+=2; break; 
		case 'довольно часто': $S['Q2']+=1; break; 
		case 'многократно': break; 
	}

	switch ($in[48]){ 
		case 'да': $S['Q3']+=2; break; 
		case 'нечто среднее': $S['Q3']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[49]){ 
		case 'да': $S['Q4']+=2; break; 
		case 'нечто среднее': $S['Q4']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[50]){ 
		case 'да':$S['Q4']+=2; break; 
		case 'не уверен': $S['Q4']+=1;break; 
		case 'нет': break; 
	}

	switch ($in[51]){
		case 'лесником': 					      $S['A']+=0;  ;break;
		case 'не уверен':                $S['A']+=1; ;break;
		case 'учителем средней школы':   $S['A']+=2 ;break;
	}
	switch ($in[52]){
		case 'люблю делать подарки': 					                       $S['A']+=0;  ;break;
		case 'неопределенно':                                         $S['A']+=1; ;break;
		case 'считаю, что делать подарки – довольно неприятная вещь': $S['A']+=2 ;break;
	}
	switch ($in[53]){
		case '«улыбка»': $S['B']+=0; break;
		case '«успех»': $S['B']+=1; break;
		case '«счастливый»': $S['B']+=0; break;
	}
	switch ($in[54]){
		case 'свеча': $S['B']+=0; break;
		case 'луна': $S['B']+=1; break;
		case 'электрический свет': $S['B']+=0; break;
	}
	switch ($in[55]){ 
		case 'очень редко': $S['C']+=2; break; 
		case 'иногда': $S['C']+=1; break; 
		case 'довольно часто': break; 
	}
	switch ($in[56]){ 
		case 'да': $S['E']+=2; break; 
		case 'не уверен': $S['E']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[57]){ 
		case 'верно': break; 
		case 'нечто среднее': $S['E']+=1; break; 
		case 'неверно': $S['E']+=2; break; 
	}

	switch ($in[58]){ 
		case 'чаще, чем раз в неделю (т.е. чаще, чем большинство)': $S['F']+=2; break; 
		case 'примерно раз в неделю (т.е. как большинство)': $S['F']+=1; break; 
		case 'реже, чем раз в неделю (т.е. реже, чем большинство)': break; 
	}

	switch ($in[59]){ 
		case 'верно': break; 
		case 'не уверен': $S['G']+=1; break; 
		case 'неверно': $S['G']+=2; break; 
	}

	switch ($in[60]){ 
		case 'да': break; 
		case 'нечто среднее': $S['H']+=1; break; 
		case 'нет': $S['H']+=2; break; 
	}

	switch ($in[61]){ 
		case 'да': break; 
		case 'нечто среднее': $S['H']+=1; break; 
		case 'нет': $S['H']+=2; break; 
	}

	switch ($in[62]){ 
		case 'да': break; 
		case 'нечто среднее': $S['I']+=1; break; 
		case 'нет': $S['I']+=2; break; 
	}

	switch ($in[63]){ 
		case 'постараюсь его успокоить':  break; 
		case 'нечто среднее': $S['L']+=1; break; 
		case 'раздражаюсь': $S['L']+=2; break; 
	}

	switch ($in[64]){ 
		case 'верно': break; 
		case 'не уверен': $S['L']+=1; break; 
		case 'неверно': $S['L']+=2; break; 
	}

	switch ($in[65]){ 
		case 'да': $S['M']+=2; break; 
		case 'нечто среднее': $S['M']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[66]){ 
		case 'да': break; 
		case 'не уверен': $S['N']+=1; break; 
		case 'нет': $S['N']+=2; break; 
	}

	switch ($in[67]){ 
		case 'да': break; 
		case 'не уверен': $S['N']+=1; break; 
		case 'неверно':$S['N']+=2; break; 
	}

	switch ($in[68]){ 
		case 'очень редко': break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'довольно часто': $S['O']+=2; break; 
	}

	switch ($in[69]){ 
		case 'да': $S['O']+=2; break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[70]){ 
		case 'оставался при своем мнении': $S['Q1']+=2; break; 
		case 'нечто среднее': $S['Q1']+=1; break; 
		case 'соглашался с их авторитетом': break; 
	}

	switch ($in[71]){ 
		case 'да':  $S['Q2']+=2;break; 
		case 'не уверен': $S['Q2']+=1; break; 
		case 'нет': break; 
	}

	switch ($in[72]){ 
		case 'верно': $S['Q2']+=2; break; 
		case 'не уверен':$S['Q2']+=1; break; 
		case 'неверно': break; 
	}

	switch ($in[73]){ 
		case 'верно': $S['Q3']+=2; break; 
		case 'не уверен': $S['Q3']+=1; break; 
		case 'неверно': break; 
	}

	switch ($in[74]){ 
		case 'часто': $S['Q4']+=2; break; 
		case 'иногда': $S['Q4']+=1; break; 
		case 'никогда': break; 
	}

	switch ($in[75]){ 
		case 'да': break; 
		case 'нечто среднее': $S['Q4']+=1; break; 
		case 'нет': $S['Q4']+=2; break; 
	}

	switch ($in[76]){
		case 'разрабатывать его в лаборатории': 				$S['A']+=0;  ;break;
		case 'нечто среднее':                           $S['A']+=1; ;break;
		case 'заниматься его практической реализацией': $S['A']+=2 ;break;
	}
	switch ($in[77]){
		case '«смелый»': $S['B']+=0; break;
		case '«тревожный»': $S['B']+=0; break;
		case '«ужасный»': $S['B']+=1; break;
	}
	switch ($in[78]){
		case '3/7': $S['B']+=0; break;
		case '3/9': $S['B']+=1; break;
		case '3/11': $S['B']+=0; break;
	}
	switch ($in[79]){ 
		case 'верно': break; 
		case 'не уверен': $S['C']+=1; break; 
		case 'неверно': $S['C']+=2;  break; 
	}

	switch ($in[80]){ 
		case 'часто': break; 
		case 'иногда': $S['C']+=1; break; 
		case 'никогда': $S['C']+=2; break; 
	}
	switch ($in[81]){ 
		case 'да': break; 
		case 'нечто среднее': $S['E']+=1; break; 
		case 'нет': $S['E']+=2; break; 
	};

	switch ($in[82]){ 
		case 'да': break; 
		case 'нечто среднее': $S['F']+=1; break; 
		case 'нет': $S['F']+=2; break; 
	};

	switch ($in[83]){ 
		case 'верно': $S['F']+=2; break; 
		case 'нечто среднее': $S['F']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[84]){ 
		case 'да': break; 
		case 'не уверен': $S['G']+=1; break; 
		case 'нет': $S['G']+=2; break; 
	};

	switch ($in[85]){ 
		case 'довольно часто': break; 
		case 'иногда': $S['H']+=1; break; 
		case 'почти никогда': $S['H']+=2; break; 
	};

	switch ($in[86]){ 
		case 'да': break; 
		case 'нечто среднее': $S['H']+=1; break; 
		case 'нет': $S['H']+=2; break; 
	};

	switch ($in[87]){ 
		case 'реалистические описания военных и политических сражений': break; 
		case 'нечто среднее': $S['I']+=1; break; 
		case 'роман, где много чувств и воображения': $S['I']+=2; break; 
	};

	switch ($in[88]){ 
		case 'да': $S['L']+=2; break; 
		case 'нечто среднее': $S['L']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[89]){ 
		case 'верно': break; 
		case 'нечто среднее': $S['L']+=1; break; 
		case 'неверно':  $S['L']+=2; break; 
	};

	switch ($in[90]){ 
		case 'да':  break; 
		case 'нечто среднее': $S['M']+=1; break; 
		case 'нет':$S['M']+=2; break; 
	};

	switch ($in[91]){ 
		case 'читать что-нибудь серьезное, но интересное': $S['M']+=2; break; 
		case 'неопределенно': $S['M']+=1; break; 
		case 'провести время, беседуя с кем-нибудь из пассажиров': break; 
	};

	switch ($in[92]){ 
		case 'да': break; 
		case 'не уверен': $S['N']+=1; break; 
		case 'нет': $S['N']+=2; break; 
	};

	switch ($in[93]){ 
		case 'меня это совершенно не трогает': break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'я расстраиваюсь': $S['O']+=2; break; 
	};

	switch ($in[94]){ 
		case 'да': $S['O']+=2; break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[95]){ 
		case 'с постоянным окладом': break; 
		case 'нечто среднее': $S['Q1']+=1; break; 
		case 'с большим окладом, который бы зависел от моей способности показать людям, чего я стою': $S['Q1']+=2; break; 
	};

	switch ($in[96]){ 
		case 'в общении с людьми': break; 
		case 'нечто среднее': $S['Q2']+=1; break; 
		case 'из литературы': $S['Q2']+=2; break; 
	};

	switch ($in[97]){ 
		case 'да': break; 
		case 'нечто среднее': $S['Q2']+=1; break; 
		case 'нет': $S['Q2']+=2; break; 
	};

	switch ($in[98]){ 
		case 'верно': $S['Q3']+=2; break; 
		case 'не уверен': $S['Q3']+=1; break; 
		case 'неверно': break; 
	};

	switch ($in[99]){ 
		case 'да': $S['Q4']+=2; break; 
		case 'нечто среднее': $S['Q4']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[100]){ 
		case 'да': break; 
		case 'не уверен': $S['Q4']+=1; break; 
		case 'нет': $S['Q4']+=2; break; 
	};
	switch ($in[101]){
		case 'нужно разговаривать с людьми': 			 $S['A']+=2;  ;break;
		case 'нечто среднее':                       $S['A']+=1; ;break;
		case 'нужно заниматься счетами и записями': $S['A']+=0;  ;break;
	}
	switch ($in[102]){
		case '«тюрьма»': $S['B']+=0; break;
		case '«нарушение»':  $S['B']+=0; break;
		case '«кража»': $S['B']+=1; break;
	}
	switch ($in[103]){
		case '«ПО»': $S['B']+=0; break;
		case '«ОП»': $S['B']+=1; break;
		case '«ТУ»': $S['B']+=0; break;
	}
	switch ($in[104]){ 
		case 'молчу': $S['C']+=2; break; 
		case 'не уверен': $S['C']+=1; break; 
		case 'высказываю свое презрение': break; 
	};

	switch ($in[105]){ 
		case 'могу сосредоточиться на музыке, не отвлекаться': $S['C']+=2; break; 
		case 'нечто среднее': $S['C']+=1; break; 
		case 'чувствую, что это портит мне удовольствие и раздражает': break; 
	};

	switch ($in[106]){ 
		case 'вежливого и спокойного': break; 
		case 'нечто среднее': $S['E']+=1; break; 
		case 'энергичного': $S['E']+=2; break; 
	};

	switch ($in[107]){ 
		case 'да': break; 
		case 'не уверен': $S['F']+=1; break; 
		case 'нет': $S['F']+=2; break; 
	};

	switch ($in[108]){ 
		case 'верно': break; 
		case 'не уверен': $S['F']+=1; break; 
		case 'неверно': $S['F']+=2; break; 
	};

	switch ($in[109]){ 
		case 'стараюсь планировать заранее, прежде чем встретить трудность': $S['G']+=2; break; 
		case 'нечто среднее': $S['G']+=1; break; 
		case 'считаю, что справлюсь с трудностями по мере того, как они возникнут': break; 
	};

	switch ($in[110]){ 
		case 'верно': $S['H']+=2; break; 
		case 'не уверен': $S['H']+=1; break; 
		case 'неверно': break; 
	};

	switch ($in[111]){ 
		case 'верно': $S['H']+=2; break; 
		case 'не уверен': $S['H']+=1; break; 
		case 'неверно': break; 
	};

	switch ($in[112]){ 
		case 'консультантом, помогающим людям выбирать профессию': $S['I']+=2; break; 
		case 'нечто среднее': $S['I']+=1; break; 
		case 'руководителем технического предприятия': break; 
	};

	switch ($in[113]){ 
		case 'да': $S['L']+=2; break; 
		case 'нечто среднее': $S['L']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[114]){ 
		case 'да': $S['L']+=2; break; 
		case 'не уверен': $S['L']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[115]){ 
		case 'да': $S['M']+=2; break; 
		case 'не уверен': $S['M']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[116]){ 
		case 'верно':$S['M']+=2; break; 
		case 'не уверен':$S['M']+=1; break; 
		case 'неверно': break; 
	};

	switch ($in[117]){ 
		case 'он – лжец': $S['N']+=2; break; 
		case 'не уверен': $S['N']+=1; break; 
		case 'по-видимому, он плохо информирован': break; 
	};

	switch ($in[118]){ 
		case 'часто': $S['O']+=2; break; 
		case 'иногда': $S['O']+=1; break; 
		case 'никогда': break; 
	};

	switch ($in[119]){ 
		case 'да': $S['O']+=2; break; 
		case 'не уверен': $S['O']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[120]){ 
		case 'да': break; 
		case 'не уверен': $S['Q1']+=1; break; 
		case 'нет': $S['Q1']+=2; break; 
	};

	switch ($in[121]){ 
		case 'очень': break; 
		case 'немного': $S['Q2']+=1; break; 
		case 'совсем не беспокоит': $S['Q2']+=2; break; 
	};

	switch ($in[122]){ 
		case 'в составе коллектива': break; 
		case 'не уверен': $S['Q2']+=1; break; 
		case 'самостоятельно': $S['Q2']+=2; break; 
	};

	switch ($in[123]){ 
		case 'часто': break; 
		case 'иногда': $S['Q3']+=1; break; 
		case 'никогда':  $S['Q3']+=2; break; 
	};

	switch ($in[124]){ 
		case 'да': $S['Q4']+=2; break; 
		case 'нечто среднее':  $S['Q4']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[125]){ 
		case 'да': break; 
		case 'не уверен': $S['Q4']+=1; break; 
		case 'нет':$S['Q4']+=2; break; 
	};
	switch ($in[126]){
		case 'адвокатом': 			             $S['A']+=2;  ;break;
		case 'не уверен':                   $S['A']+=1; ;break;
		case 'пилотом или капитаном судна': $S['A']+=0;  ;break;
	}
	switch ($in[127]){
		case '«быстрое»': $S['B']+=0; break;
		case '«лучшее»': $S['B']+=0; break;
		case '«быстрейшее»': $S['B']+=1; break;
	}
	switch ($in[128]){
		case 'ОРРР': $S['B']+=0; break;
		case 'ООРР': $S['B']+=1; break;
		case 'РООО': $S['B']+=0; break;
	}
	switch ($in[129]){ 
		case 'верно': break; 
		case 'нечто среднее': $S['C']+=1; break; 
		case 'неверно': $S['C']+=2; break; 
	};

	switch ($in[130]){ 
		case 'да': $S['C']+=2; break; 
		case 'нечто среднее': $S['C']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[131]){ 
		case 'да': $S['E']+=2; break; 
		case 'нечто среднее': $S['E']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[132]){ 
		case 'да': $S['F']+=2; break; 
		case 'нечто среднее': $S['F']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[133]){ 
		case 'да': $S['F']+=2; break; 
		case 'не уверен': $S['F']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[134]){ 
		case 'да': $S['G']+=2; break; 
		case 'нечто среднее': $S['G']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[135]){ 
		case 'да': $S['H']+=2; break; 
		case 'нечто среднее': $S['H']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[136]){ 
		case 'свободно проявляю свои чувства': $S['H']+=2; break; 
		case 'нечто среднее': $S['H']+=1; break; 
		case 'держу свои переживания «при себе»': break; 
	};

	switch ($in[137]){ 
		case 'легкую, живую': break; 
		case 'нечто среднее': $S['I']+=1; break; 
		case 'чувствительную': $S['I']+=2; break; 
	};

	switch ($in[138]){ 
		case 'да': $S['I']+=2; break; 
		case 'не уверен': $S['I']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[139]){ 
		case 'смирюсь с этим': break; 
		case 'нечто среднее': $S['L']+=1; break; 
		case 'даю людям возможность услышать его еще раз': $S['L']+=2; break; 
	};

	switch ($in[140]){ 
		case 'да': $S['M']+=2; break; 
		case 'не уверен': $S['M']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[141]){ 
		case 'да': break; 
		case 'не уверен': $S['M']+=1; break; 
		case 'нет':$S['M']+=2; break; 
	};

	switch ($in[142]){ 
		case 'да': $S['N']+=2; break; 
		case 'не уверен': $S['N']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[143]){ 
		case 'да': $S['O']+=2; break; 
		case 'не уверен': $S['O']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[144]){ 
		case 'верно':  break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'неверно': $S['O']+=2; break; 
	};

	switch ($in[145]){ 
		case 'увидеть, кто же «победил»': $S['Q1']+=2; break; 
		case 'нечто среднее': $S['Q1']+=1; break; 
		case 'чтобы спор разрешился мирно': break; 
	};

	switch ($in[146]){ 
		case 'да': $S['Q2']+=2; break; 
		case 'нечто среднее': $S['Q2']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[147]){ 
		case 'да': break; 
		case 'не уверен': $S['Q3']+=1; break; 
		case 'нет': $S['Q3']+=2; break; 
	};

	switch ($in[148]){ 
		case 'да': $S['Q3']+=2; break; 
		case 'не уверен': $S['Q3']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[149]){ 
		case 'да': $S['Q4']+=2; break; 
		case 'иногда': $S['Q4']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[150]){ 
		case 'верно': break; 
		case 'нечто среднее': $S['Q4']+=1; break; 
		case 'неверно': $S['Q4']+=2; break; 
	};

	switch ($in[151]){
		case 'художником': 			                    $S['A']+=0;  ;break;
		case 'не уверен':                            $S['A']+=1; ;break;
		case 'организатором культурных развлечений': $S['A']+=2;  ;break;
	}
	switch ($in[152]){
		case 'любые': $S['B']+=1; break;
		case 'некоторые': $S['B']+=0; break;
		case 'большинство': $S['B']+=0; break;
	}
	switch ($in[153]){
		case 'ОРРР': $S['B']+=0; break;
		case 'ООРР': $S['B']+=0; break;
		case 'РООО': $S['B']+=1; break;
	}
	switch ($in[154]){ 
		case 'часто': break; 
		case 'иногда': $S['C']+=1; break; 
		case 'практически никогда':$S['C']+=2;  break; 
	};

	switch ($in[155]){ 
		case 'да': $S['E']+=2; break; 
		case 'нечто среднее': $S['E']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[156]){ 
		case 'да': $S['E']+=2; break; 
		case 'нечто среднее': $S['E']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[157]){ 
		case 'верно':  break; 
		case 'не уверен': $S['F']+=1; break; 
		case 'неверно': $S['F']+=2; break; 
	};

	switch ($in[158]){ 
		case 'верно': break; 
		case 'не уверен': $S['F']+=1; break; 
		case 'неверно': $S['F']+=2; break; 
	};

	switch ($in[159]){ 
		case 'иногда': break; 
		case 'почти никогда': $S['G']+=1; break; 
		case 'никогда': $S['G']+=2; break; 
	};

	switch ($in[160]){ 
		case 'да': $S['G']+=2; break; 
		case 'нечто среднее': $S['G']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[161]){ 
		case 'да': break; 
		case 'нечто среднее': $S['H']+=1; break; 
		case 'нет': $S['H']+=2; break; 
	};

	switch ($in[162]){ 
		case 'верно': break; 
		case 'нечто среднее': $S['I']+=1; break; 
		case 'неверно': $S['I']+=2; break; 
	};

	switch ($in[163]){ 
		case 'русский язык и литературу': $S['I']+=2; break; 
		case 'не уверен': $S['I']+=1; break; 
		case 'математику или арифметику': break; 
	};

	switch ($in[164]){ 
		case 'да': $S['L']+=2; break; 
		case 'не уверен': $S['L']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[165]){ 
		case 'часто вполне интересен и содержателен': break; 
		case 'нечто среднее': $S['M']+=1; break; 
		case 'раздражает меня, потому что ограничивается мелочами': $S['M']+=2; break; 
	};

	switch ($in[166]){ 
		case 'да': break; 
		case 'нечто среднее': $S['M']+=1; break; 
		case 'нет': $S['M']+=2; break; 
	};

	switch ($in[167]){ 
		case 'относиться к ребенку с достаточной любовью': $S['N']+=2; break; 
		case 'нечто среднее': $S['N']+=1; break; 
		case 'выработать нужные привычки и отношение к жизни': break; 
	};

	switch ($in[168]){ 
		case 'да': break; 
		case 'нечто среднее': $S['O']+=1; break; 
		case 'нет':$S['O']+=2; break; 
	};

	switch ($in[169]){ 
		case 'да': $S['Q1']+=2; break; 
		case 'не уверен': $S['Q1']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[170]){ 
		case 'вопросы нравственности': break; 
		case 'не уверен': $S['Q1']+=1; break; 
		case 'разногласия между странами мира': $S['Q1']+=2; break; 
	};

	switch ($in[171]){ 
		case 'читая хорошо написанную книгу': $S['Q2']+=2; break; 
		case 'нечто среднее': $S['Q2']+=1; break; 
		case 'участвуя в обсуждении вопроса': break; 
	};

	switch ($in[172]){ 
		case 'верно': break; 
		case 'не уверен': $S['Q3']+=1; break; 
		case 'неверно': $S['Q3']+=2; break; 
	};

	switch ($in[173]){ 
		case 'всегда': $S['Q3']+=2; break; 
		case 'обычно': $S['Q3']+=1; break; 
		case 'только если это целесообразно': break; 
	};

	switch ($in[174]){ 
		case 'да': $S['Q4']+=2; break; 
		case 'нечто среднее': $S['Q4']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[175]){ 
		case 'верно': break; 
		case 'не уверен': $S['Q4']+=1; break; 
		case 'неверно': $S['Q4']+=2; break; 
	};
	switch ($in[176]){
		case 'согласился': $S['A']+=2;  ;break;
		case 'не уверен': $S['A']+=1; ;break;
		case 'вежливо сказал, что занят': ;break;
	}
	switch ($in[177]){
		case 'широкий': $S['B']+=1; break;
		case 'зигзагообразный': $S['B']+=0; break;
		case 'прямой': $S['B']+=0; break;
	}
	switch ($in[178]){
		case '«нигде»': $S['B']+=1; break;
		case '«далеко»': $S['B']+=0; break;
		case '«где-то»': $S['B']+=0; break;
	}
	switch ($in[179]){ 
		case 'да': $S['C']+=2; break; 
		case 'нечто среднее': $S['C']+=1;  break; 
		case 'нет': break; 
	};

	switch ($in[180]){ 
		case 'да': $S['E']+=2; break; 
		case 'не уверен': $S['E']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[181]){ 
		case 'в трудных ситуациях, когда нужно сохранить самообладание': $S['E']+=2; break; 
		case 'не уверен': $S['E']+=1; break; 
		case 'когда требуется умение ладить с людьми': break; 
	};

	switch ($in[182]){ 
		case 'да': $S['F']+=2; break; 
		case 'нечто среднее': $S['F']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[183]){ 
		case 'да': $S['F']+=2; break; 
		case 'нечто среднее': $S['F']+=1; break; 
		case 'нет':  break; 
	};

	switch ($in[184]){ 
		case 'верно': $S['G']+=2; break; 
		case 'нечто среднее': $S['G']+=1; break; 
		case 'неверно': break; 
	};

	switch ($in[185]){ 
		case 'да': $S['G']+=2; break; 
		case 'нечто среднее': $S['G']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[186]){ 
		case 'да': $S['H']+=2; break; 
		case 'не уверен': $S['H']+=1; break; 
		case 'нет': break; 
	};

	switch ($in[187]){ 
		case 'да': break; 
		case 'не уверен': break; 
		case 'нет': break; 
	};
	
	echo '<pre>'; print_r($S); echo '</pre>';
	
	if($in[188] == 'женский' && $in[189] == '16 - 18 лет') {
		if($S['А']>=0 && $S['А']<=6) $S['А'] = 1;
		if($S['А']>=7 && $S['А']<=8) $S['А'] = 2;
		if($S['А']>=7 && $S['А']<=8) $S['А'] = 3;
		if($S['А']>=9 && $S['А']<=10) $S['А'] = 4;
		if($S['А']>=11 && $S['А']<=11) $S['А'] = 5;
		if($S['А']>=12 && $S['А']<=13) $S['А'] = 6;
		if($S['А']>=14 && $S['А']<=15) $S['А'] = 7;
		if($S['А']>=16 && $S['А']<=16) $S['А'] = 8;
		if($S['А']>=17 && $S['А']<=18) $S['А'] = 9;
		if($S['А']>=19 && $S['А']<=20) $S['А'] = 10;
		if($S['В']>=0 && $S['В']<=1) $S['В'] = 1;
		if($S['В']>=2 && $S['В']<=2) $S['В'] = 2;
		if($S['В']>=3 && $S['В']<=3) $S['В'] = 3;
		if($S['В']>=4 && $S['В']<=4) $S['В'] = 4;
		if($S['В']>=5 && $S['В']<=5) $S['В'] = 5;
		if($S['В']>=6 && $S['В']<=6) $S['В'] = 6;
		if($S['В']>=7 && $S['В']<=7) $S['В'] = 7;
		if($S['В']>=8 && $S['В']<=9) $S['В'] = 8;
		if($S['В']>=10 && $S['В']<=10) $S['В'] = 9;
		if($S['В']>=11 && $S['В']<=12) $S['В'] = 10;
		if($S['С']>=0 && $S['С']<=6) $S['С'] = 1;
		if($S['С']>=7 && $S['С']<=8) $S['С'] = 2;
		if($S['С']>=9 && $S['С']<=10) $S['С'] = 3;
		if($S['С']>=11 && $S['С']<=12) $S['С'] = 4;
		if($S['С']>=13 && $S['С']<=14) $S['С'] = 5;
		if($S['С']>=15 && $S['С']<=16) $S['С'] = 6;
		if($S['С']>=17 && $S['С']<=18) $S['С'] = 7;
		if($S['С']>=19 && $S['С']<=20) $S['С'] = 8;
		if($S['С']>=21 && $S['С']<=21) $S['С'] = 9;
		if($S['С']>=22 && $S['С']<=26) $S['С'] = 10;
		if($S['E']>=0 && $S['E']<=3) $S['E'] = 1;
		if($S['E']>=4 && $S['E']<=4) $S['E'] = 2;
		if($S['E']>=5 && $S['E']<=6) $S['E'] = 3;
		if($S['E']>=7 && $S['E']<=8) $S['E'] = 4;
		if($S['E']>=9 && $S['E']<=10) $S['E'] = 5;
		if($S['E']>=11 && $S['E']<=12) $S['E'] = 6;
		if($S['E']>=13 && $S['E']<=15) $S['E'] = 7;
		if($S['E']>=16 && $S['E']<=17) $S['E'] = 8;
		if($S['E']>=18 && $S['E']<=19) $S['E'] = 9;
		if($S['E']>=20 && $S['E']<=26) $S['E'] = 10;
		if($S['F']>=0 && $S['F']<=6) $S['F'] = 1;
		if($S['F']>=7 && $S['F']<=8) $S['F'] = 2;
		if($S['F']>=9 && $S['F']<=11) $S['F'] = 3;
		if($S['F']>=12 && $S['F']<=14) $S['F'] = 4;
		if($S['F']>=15 && $S['F']<=16) $S['F'] = 5;
		if($S['F']>=17 && $S['F']<=18) $S['F'] = 6;
		if($S['F']>=19 && $S['F']<=20) $S['F'] = 7;
		if($S['F']>=21 && $S['F']<=22) $S['F'] = 8;
		if($S['F']>=23 && $S['F']<=23) $S['F'] = 9;
		if($S['F']>=24 && $S['F']<=26) $S['F'] = 10;
		if($S['G']>=0 && $S['G']<=5) $S['G'] = 1;
		if($S['G']>=6 && $S['G']<=7) $S['G'] = 2;
		if($S['G']>=8 && $S['G']<=9) $S['G'] = 3;
		if($S['G']>=10 && $S['G']<=11) $S['G'] = 4;
		if($S['G']>=12 && $S['G']<=13) $S['G'] = 5;
		if($S['G']>=14 && $S['G']<=14) $S['G'] = 6;
		if($S['G']>=15 && $S['G']<=16) $S['G'] = 7;
		if($S['G']>=17 && $S['G']<=17) $S['G'] = 8;
		if($S['G']>=18 && $S['G']<=18) $S['G'] = 9;
		if($S['G']>=19 && $S['G']<=20) $S['G'] = 10;
		if($S['H']>=0 && $S['H']<=2) $S['H'] = 1;
		if($S['H']>=3 && $S['H']<=4) $S['H'] = 2;
		if($S['H']>=5 && $S['H']<=7) $S['H'] = 3;
		if($S['H']>=8 && $S['H']<=9) $S['H'] = 4;
		if($S['H']>=10 && $S['H']<=12) $S['H'] = 5;
		if($S['H']>=13 && $S['H']<=14) $S['H'] = 6;
		if($S['H']>=15 && $S['H']<=17) $S['H'] = 7;
		if($S['H']>=18 && $S['H']<=20) $S['H'] = 8;
		if($S['H']>=21 && $S['H']<=22) $S['H'] = 9;
		if($S['H']>=23 && $S['H']<=26) $S['H'] = 10;
		if($S['I']>=0 && $S['I']<=5) $S['I'] = 1;
		if($S['I']>=6 && $S['I']<=7) $S['I'] = 2;
		if($S['I']>=8 && $S['I']<=8) $S['I'] = 3;
		if($S['I']>=9 && $S['I']<=10) $S['I'] = 4;
		if($S['I']>=11 && $S['I']<=11) $S['I'] = 5;
		if($S['I']>=12 && $S['I']<=13) $S['I'] = 6;
		if($S['I']>=14 && $S['I']<=14) $S['I'] = 7;
		if($S['I']>=15 && $S['I']<=15) $S['I'] = 8;
		if($S['I']>=16 && $S['I']<=17) $S['I'] = 9;
		if($S['I']>=18 && $S['I']<=20) $S['I'] = 10;
		if($S['L']>=0 && $S['L']<=2) $S['L'] = 1;
		if($S['L']>=3 && $S['L']<=3) $S['L'] = 2;
		if($S['L']>=4 && $S['L']<=5) $S['L'] = 3;
		if($S['L']>=6 && $S['L']<=6) $S['L'] = 4;
		if($S['L']>=7 && $S['L']<=8) $S['L'] = 5;
		if($S['L']>=9 && $S['L']<=9) $S['L'] = 6;
		if($S['L']>=10 && $S['L']<=11) $S['L'] = 7;
		if($S['L']>=12 && $S['L']<=13) $S['L'] = 8;
		if($S['L']>=14 && $S['L']<=14) $S['L'] = 9;
		if($S['L']>=15 && $S['L']<=16) $S['L'] = 10;
		if($S['M']>=0 && $S['M']<=6) $S['M'] = 1;
		if($S['M']>=7 && $S['M']<=7) $S['M'] = 2;
		if($S['M']>=8 && $S['M']<=9) $S['M'] = 3;
		if($S['M']>=10 && $S['M']<=10) $S['M'] = 4;
		if($S['M']>=11 && $S['M']<=12) $S['M'] = 5;
		if($S['M']>=13 && $S['M']<=14) $S['M'] = 6;
		if($S['M']>=15 && $S['M']<=16) $S['M'] = 7;
		if($S['M']>=17 && $S['M']<=17) $S['M'] = 8;
		if($S['M']>=18 && $S['M']<=19) $S['M'] = 9;
		if($S['M']>=20 && $S['M']<=26) $S['M'] = 10;
		if($S['N']>=0 && $S['N']<=5) $S['N'] = 1;
		if($S['N']>=6 && $S['N']<=6) $S['N'] = 2;
		if($S['N']>=7 && $S['N']<=7) $S['N'] = 3;
		if($S['N']>=8 && $S['N']<=8) $S['N'] = 4;
		if($S['N']>=9 && $S['N']<=10) $S['N'] = 5;
		if($S['N']>=11 && $S['N']<=11) $S['N'] = 6;
		if($S['N']>=12 && $S['N']<=13) $S['N'] = 7;
		if($S['N']>=14 && $S['N']<=14) $S['N'] = 8;
		if($S['N']>=15 && $S['N']<=15) $S['N'] = 9;
		if($S['N']>=16 && $S['N']<=20) $S['N'] = 10;
		if($S['O']>=0 && $S['O']<=4) $S['O'] = 1;
		if($S['O']>=5 && $S['O']<=5) $S['O'] = 2;
		if($S['O']>=6 && $S['O']<=7) $S['O'] = 3;
		if($S['O']>=8 && $S['O']<=9) $S['O'] = 4;
		if($S['O']>=10 && $S['O']<=11) $S['O'] = 5;
		if($S['O']>=12 && $S['O']<=13) $S['O'] = 6;
		if($S['O']>=14 && $S['O']<=15) $S['O'] = 7;
		if($S['O']>=16 && $S['O']<=17) $S['O'] = 8;
		if($S['O']>=18 && $S['O']<=19) $S['O'] = 9;
		if($S['O']>=20 && $S['O']<=26) $S['O'] = 10;
		if($S['Q1']>=0 && $S['Q1']<=3) $S['Q1'] = 1;
		if($S['Q1']>=4 && $S['Q1']<=4) $S['Q1'] = 2;
		if($S['Q1']>=5 && $S['Q1']<=5) $S['Q1'] = 3;
		if($S['Q1']>=6 && $S['Q1']<=6) $S['Q1'] = 4;
		if($S['Q1']>=7 && $S['Q1']<=8) $S['Q1'] = 5;
		if($S['Q1']>=9 && $S['Q1']<=9) $S['Q1'] = 6;
		if($S['Q1']>=10 && $S['Q1']<=11) $S['Q1'] = 7;
		if($S['Q1']>=12 && $S['Q1']<=12) $S['Q1'] = 8;
		if($S['Q1']>=13 && $S['Q1']<=14) $S['Q1'] = 9;
		if($S['Q1']>=15 && $S['Q1']<=20) $S['Q1'] = 10;
		if($S['Q2']>=0 && $S['Q2']<=3) $S['Q2'] = 1;
		if($S['Q2']>=4 && $S['Q2']<=4) $S['Q2'] = 2;
		if($S['Q2']>=5 && $S['Q2']<=6) $S['Q2'] = 3;
		if($S['Q2']>=7 && $S['Q2']<=7) $S['Q2'] = 4;
		if($S['Q2']>=8 && $S['Q2']<=9) $S['Q2'] = 5;
		if($S['Q2']>=10 && $S['Q2']<=11) $S['Q2'] = 6;
		if($S['Q2']>=12 && $S['Q2']<=13) $S['Q2'] = 7;
		if($S['Q2']>=14 && $S['Q2']<=15) $S['Q2'] = 8;
		if($S['Q2']>=16 && $S['Q2']<=17) $S['Q2'] = 9;
		if($S['Q2']>=18 && $S['Q2']<=20) $S['Q2'] = 10;
		if($S['Q3']>=0 && $S['Q3']<=4) $S['Q3'] = 1;
		if($S['Q3']>=5 && $S['Q3']<=6) $S['Q3'] = 2;
		if($S['Q3']>=7 && $S['Q3']<=7) $S['Q3'] = 3;
		if($S['Q3']>=8 && $S['Q3']<=9) $S['Q3'] = 4;
		if($S['Q3']>=10 && $S['Q3']<=10) $S['Q3'] = 5;
		if($S['Q3']>=11 && $S['Q3']<=12) $S['Q3'] = 6;
		if($S['Q3']>=13 && $S['Q3']<=13) $S['Q3'] = 7;
		if($S['Q3']>=14 && $S['Q3']<=14) $S['Q3'] = 8;
		if($S['Q3']>=15 && $S['Q3']<=16) $S['Q3'] = 9;
		if($S['Q3']>=17 && $S['Q3']<=20) $S['Q3'] = 10;
		if($S['Q4']>=0 && $S['Q4']<=3) $S['Q4'] = 1;
		if($S['Q4']>=4 && $S['Q4']<=5) $S['Q4'] = 2;
		if($S['Q4']>=6 && $S['Q4']<=8) $S['Q4'] = 3;
		if($S['Q4']>=9 && $S['Q4']<=11) $S['Q4'] = 4;
		if($S['Q4']>=12 && $S['Q4']<=13) $S['Q4'] = 5;
		if($S['Q4']>=14 && $S['Q4']<=16) $S['Q4'] = 6;
		if($S['Q4']>=17 && $S['Q4']<=19) $S['Q4'] = 7;
		if($S['Q4']>=20 && $S['Q4']<=21) $S['Q4'] = 8;
		if($S['Q4']>=22 && $S['Q4']<=23) $S['Q4'] = 9;
		if($S['Q4']>=24 && $S['Q4']<=26) $S['Q4'] = 10;

	}

	if($in[188] == 'мужской' && $in[189] == '16 - 18 лет') {
		if($S['A']>=0 && $S['A']<=3) $S['A'] = 1;
		if($S['A']>=4 && $S['A']<=4) $S['A'] = 2;
		if($S['A']>=5 && $S['A']<=6) $S['A'] = 3;
		if($S['A']>=7 && $S['A']<=7) $S['A'] = 4;
		if($S['A']>=8 && $S['A']<=9) $S['A'] = 5;
		if($S['A']>=10 && $S['A']<=11) $S['A'] = 6;
		if($S['A']>=12 && $S['A']<=12) $S['A'] = 7;
		if($S['A']>=13 && $S['A']<=14) $S['A'] = 8;
		if($S['A']>=15 && $S['A']<=16) $S['A'] = 9;
		if($S['A']>=17 && $S['A']<=20) $S['A'] = 10;
		if($S['B']>=0 && $S['B']<=1) $S['B'] = 1;
		if($S['B']>=2 && $S['B']<=2) $S['B'] = 2;
		if($S['B']>=3 && $S['B']<=3) $S['B'] = 3;
		if($S['B']>=4 && $S['B']<=4) $S['B'] = 4;
		if($S['B']>=5 && $S['B']<=5) $S['B'] = 5;
		if($S['B']>=6 && $S['B']<=6) $S['B'] = 6;
		if($S['B']>=7 && $S['B']<=7) $S['B'] = 7;
		if($S['B']>=8 && $S['B']<=9) $S['B'] = 8;
		if($S['B']>=10 && $S['B']<=10) $S['B'] = 9;
		if($S['B']>=11 && $S['B']<=12) $S['B'] = 10;
		if($S['C']>=0 && $S['C']<=7) $S['C'] = 1;
		if($S['C']>=8 && $S['C']<=9) $S['C'] = 2;
		if($S['C']>=10 && $S['C']<=11) $S['C'] = 3;
		if($S['C']>=12 && $S['C']<=13) $S['C'] = 4;
		if($S['C']>=14 && $S['C']<=15) $S['C'] = 5;
		if($S['C']>=16 && $S['C']<=17) $S['C'] = 6;
		if($S['C']>=18 && $S['C']<=19) $S['C'] = 7;
		if($S['C']>=20 && $S['C']<=20) $S['C'] = 8;
		if($S['C']>=21 && $S['C']<=22) $S['C'] = 9;
		if($S['C']>=23 && $S['C']<=26) $S['C'] = 10;
		if($S['E']>=0 && $S['E']<=6) $S['E'] = 1;
		if($S['E']>=7 && $S['E']<=8) $S['E'] = 2;
		if($S['E']>=9 && $S['E']<=9) $S['E'] = 3;
		if($S['E']>=10 && $S['E']<=11) $S['E'] = 4;
		if($S['E']>=12 && $S['E']<=13) $S['E'] = 5;
		if($S['E']>=14 && $S['E']<=15) $S['E'] = 6;
		if($S['E']>=16 && $S['E']<=17) $S['E'] = 7;
		if($S['E']>=18 && $S['E']<=19) $S['E'] = 8;
		if($S['E']>=20 && $S['E']<=21) $S['E'] = 9;
		if($S['E']>=22 && $S['E']<=26) $S['E'] = 10;
		if($S['F']>=0 && $S['F']<=5) $S['F'] = 1;
		if($S['F']>=6 && $S['F']<=8) $S['F'] = 2;
		if($S['F']>=9 && $S['F']<=11) $S['F'] = 3;
		if($S['F']>=12 && $S['F']<=14) $S['F'] = 4;
		if($S['F']>=15 && $S['F']<=16) $S['F'] = 5;
		if($S['F']>=17 && $S['F']<=18) $S['F'] = 6;
		if($S['F']>=19 && $S['F']<=20) $S['F'] = 7;
		if($S['F']>=21 && $S['F']<=22) $S['F'] = 8;
		if($S['F']>=23 && $S['F']<=23) $S['F'] = 9;
		if($S['F']>=24 && $S['F']<=26) $S['F'] = 10;
		if($S['G']>=0 && $S['G']<=4) $S['G'] = 1;
		if($S['G']>=5 && $S['G']<=6) $S['G'] = 2;
		if($S['G']>=7 && $S['G']<=8) $S['G'] = 3;
		if($S['G']>=9 && $S['G']<=10) $S['G'] = 4;
		if($S['G']>=11 && $S['G']<=12) $S['G'] = 5;
		if($S['G']>=13 && $S['G']<=14) $S['G'] = 6;
		if($S['G']>=15 && $S['G']<=16) $S['G'] = 7;
		if($S['G']>=17 && $S['G']<=17) $S['G'] = 8;
		if($S['G']>=18 && $S['G']<=18) $S['G'] = 9;
		if($S['G']>=19 && $S['G']<=20) $S['G'] = 10;
		if($S['H']>=0 && $S['H']<=2) $S['H'] = 1;
		if($S['H']>=3 && $S['H']<=4) $S['H'] = 2;
		if($S['H']>=5 && $S['H']<=7) $S['H'] = 3;
		if($S['H']>=8 && $S['H']<=10) $S['H'] = 4;
		if($S['H']>=11 && $S['H']<=13) $S['H'] = 5;
		if($S['H']>=14 && $S['H']<=16) $S['H'] = 6;
		if($S['H']>=17 && $S['H']<=18) $S['H'] = 7;
		if($S['H']>=19 && $S['H']<=20) $S['H'] = 8;
		if($S['H']>=21 && $S['H']<=22) $S['H'] = 9;
		if($S['H']>=23 && $S['H']<=26) $S['H'] = 10;
		if($S['I']>=0 && $S['I']<=2) $S['I'] = 1;
		if($S['I']>=3 && $S['I']<=3) $S['I'] = 2;
		if($S['I']>=4 && $S['I']<=4) $S['I'] = 3;
		if($S['I']>=5 && $S['I']<=6) $S['I'] = 4;
		if($S['I']>=7 && $S['I']<=8) $S['I'] = 5;
		if($S['I']>=9 && $S['I']<=9) $S['I'] = 6;
		if($S['I']>=10 && $S['I']<=11) $S['I'] = 7;
		if($S['I']>=12 && $S['I']<=13) $S['I'] = 8;
		if($S['I']>=14 && $S['I']<=15) $S['I'] = 9;
		if($S['I']>=16 && $S['I']<=20) $S['I'] = 10;
		if($S['L']>=0 && $S['L']<=3) $S['L'] = 1;
		if($S['L']>=4 && $S['L']<=4) $S['L'] = 2;
		if($S['L']>=5 && $S['L']<=6) $S['L'] = 3;
		if($S['L']>=7 && $S['L']<=8) $S['L'] = 4;
		if($S['L']>=9 && $S['L']<=9) $S['L'] = 5;
		if($S['L']>=10 && $S['L']<=11) $S['L'] = 6;
		if($S['L']>=12 && $S['L']<=13) $S['L'] = 7;
		if($S['L']>=14 && $S['L']<=14) $S['L'] = 8;
		if($S['L']>=15 && $S['L']<=16) $S['L'] = 9;
		if($S['L']>=17 && $S['L']<=20) $S['L'] = 10;
		if($S['M']>=0 && $S['M']<=4) $S['M'] = 1;
		if($S['M']>=5 && $S['M']<=6) $S['M'] = 2;
		if($S['M']>=7 && $S['M']<=7) $S['M'] = 3;
		if($S['M']>=8 && $S['M']<=9) $S['M'] = 4;
		if($S['M']>=10 && $S['M']<=11) $S['M'] = 5;
		if($S['M']>=12 && $S['M']<=13) $S['M'] = 6;
		if($S['M']>=14 && $S['M']<=14) $S['M'] = 7;
		if($S['M']>=15 && $S['M']<=16) $S['M'] = 8;
		if($S['M']>=17 && $S['M']<=18) $S['M'] = 9;
		if($S['M']>=19 && $S['M']<=26) $S['M'] = 10;
		if($S['N']>=0 && $S['N']<=5) $S['N'] = 1;
		if($S['N']>=6 && $S['N']<=7) $S['N'] = 2;
		if($S['N']>=8 && $S['N']<=8) $S['N'] = 3;
		if($S['N']>=9 && $S['N']<=9) $S['N'] = 4;
		if($S['N']>=10 && $S['N']<=10) $S['N'] = 5;
		if($S['N']>=11 && $S['N']<=12) $S['N'] = 6;
		if($S['N']>=13 && $S['N']<=13) $S['N'] = 7;
		if($S['N']>=14 && $S['N']<=15) $S['N'] = 8;
		if($S['N']>=16 && $S['N']<=16) $S['N'] = 9;
		if($S['N']>=17 && $S['N']<=20) $S['N'] = 10;
		if($S['O']>=0 && $S['O']<=3) $S['O'] = 1;
		if($S['O']>=4 && $S['O']<=4) $S['O'] = 2;
		if($S['O']>=5 && $S['O']<=6) $S['O'] = 3;
		if($S['O']>=7 && $S['O']<=8) $S['O'] = 4;
		if($S['O']>=9 && $S['O']<=10) $S['O'] = 5;
		if($S['O']>=11 && $S['O']<=11) $S['O'] = 6;
		if($S['O']>=12 && $S['O']<=13) $S['O'] = 7;
		if($S['O']>=14 && $S['O']<=15) $S['O'] = 8;
		if($S['O']>=16 && $S['O']<=17) $S['O'] = 9;
		if($S['O']>=18 && $S['O']<=26) $S['O'] = 10;
		if($S['Q1']>=0 && $S['Q1']<=4) $S['Q1'] = 1;
		if($S['Q1']>=5 && $S['Q1']<=5) $S['Q1'] = 2;
		if($S['Q1']>=6 && $S['Q1']<=6) $S['Q1'] = 3;
		if($S['Q1']>=7 && $S['Q1']<=8) $S['Q1'] = 4;
		if($S['Q1']>=9 && $S['Q1']<=9) $S['Q1'] = 5;
		if($S['Q1']>=10 && $S['Q1']<=11) $S['Q1'] = 6;
		if($S['Q1']>=12 && $S['Q1']<=12) $S['Q1'] = 7;
		if($S['Q1']>=13 && $S['Q1']<=13) $S['Q1'] = 8;
		if($S['Q1']>=14 && $S['Q1']<=15) $S['Q1'] = 9;
		if($S['Q1']>=16 && $S['Q1']<=20) $S['Q1'] = 10;
		if($S['Q2']>=0 && $S['Q2']<=3) $S['Q2'] = 1;
		if($S['Q2']>=4 && $S['Q2']<=4) $S['Q2'] = 2;
		if($S['Q2']>=5 && $S['Q2']<=6) $S['Q2'] = 3;
		if($S['Q2']>=7 && $S['Q2']<=8) $S['Q2'] = 4;
		if($S['Q2']>=9 && $S['Q2']<=9) $S['Q2'] = 5;
		if($S['Q2']>=10 && $S['Q2']<=11) $S['Q2'] = 6;
		if($S['Q2']>=12 && $S['Q2']<=13) $S['Q2'] = 7;
		if($S['Q2']>=14 && $S['Q2']<=15) $S['Q2'] = 8;
		if($S['Q2']>=16 && $S['Q2']<=17) $S['Q2'] = 9;
		if($S['Q2']>=18 && $S['Q2']<=20) $S['Q2'] = 10;
		if($S['Q3']>=0 && $S['Q3']<=3) $S['Q3'] = 1;
		if($S['Q3']>=4 && $S['Q3']<=5) $S['Q3'] = 2;
		if($S['Q3']>=6 && $S['Q3']<=6) $S['Q3'] = 3;
		if($S['Q3']>=7 && $S['Q3']<=8) $S['Q3'] = 4;
		if($S['Q3']>=9 && $S['Q3']<=10) $S['Q3'] = 5;
		if($S['Q3']>=11 && $S['Q3']<=11) $S['Q3'] = 6;
		if($S['Q3']>=12 && $S['Q3']<=13) $S['Q3'] = 7;
		if($S['Q3']>=14 && $S['Q3']<=14) $S['Q3'] = 8;
		if($S['Q3']>=15 && $S['Q3']<=16) $S['Q3'] = 9;
		if($S['Q3']>=17 && $S['Q3']<=20) $S['Q3'] = 10;
		if($S['Q4']>=0 && $S['Q4']<=2) $S['Q4'] = 1;
		if($S['Q4']>=3 && $S['Q4']<=4) $S['Q4'] = 2;
		if($S['Q4']>=5 && $S['Q4']<=6) $S['Q4'] = 3;
		if($S['Q4']>=7 && $S['Q4']<=8) $S['Q4'] = 4;
		if($S['Q4']>=10 && $S['Q4']<=12) $S['Q4'] = 5;
		if($S['Q4']>=13 && $S['Q4']<=15) $S['Q4'] = 6;
		if($S['Q4']>=16 && $S['Q4']<=17) $S['Q4'] = 7;
		if($S['Q4']>=18 && $S['Q4']<=19) $S['Q4'] = 8;
		if($S['Q4']>=20 && $S['Q4']<=21) $S['Q4'] = 9;
		if($S['Q4']>=22 && $S['Q4']<=26) $S['Q4'] = 10;
	};

	if($in[188] == 'женский' && $in[189] == '19 - 28 лет') {
		if($S['A']>=0 && $S['A']<=4) $S['A'] = 1;
		if($S['A']>=5 && $S['A']<=6) $S['A'] = 2;
		if($S['A']>=7 && $S['A']<=7) $S['A'] = 3;
		if($S['A']>=8 && $S['A']<=9) $S['A'] = 4;
		if($S['A']>=10 && $S['A']<=12) $S['A'] = 5;
		if($S['A']>=13 && $S['A']<=13) $S['A'] = 6;
		if($S['A']>=14 && $S['A']<=14) $S['A'] = 7;
		if($S['A']>=16 && $S['A']<=16) $S['A'] = 8;
		if($S['A']>=17 && $S['A']<=18) $S['A'] = 9;
		if($S['A']>=19 && $S['A']<=20) $S['A'] = 10;
		if($S['B']>=0 && $S['B']<=4) $S['B'] = 1;
		if($S['B']>=5 && $S['B']<=5) $S['B'] = 2;
		if($S['B']>=5 && $S['B']<=5) $S['B'] = 3;
		if($S['B']>=6 && $S['B']<=6) $S['B'] = 4;
		if($S['B']>=7 && $S['B']<=7) $S['B'] = 5;
		if($S['B']>=8 && $S['B']<=8) $S['B'] = 6;
		if($S['B']>=9 && $S['B']<=9) $S['B'] = 7;
		if($S['B']>=10 && $S['B']<=10) $S['B'] = 8;
		if($S['B']>=11 && $S['B']<=11) $S['B'] = 9;
		if($S['B']>=12 && $S['B']<=13) $S['B'] = 10;
		if($S['C']>=0 && $S['C']<=6) $S['C'] = 1;
		if($S['C']>=7 && $S['C']<=8) $S['C'] = 2;
		if($S['C']>=9 && $S['C']<=10) $S['C'] = 3;
		if($S['C']>=11 && $S['C']<=12) $S['C'] = 4;
		if($S['C']>=13 && $S['C']<=14) $S['C'] = 5;
		if($S['C']>=15 && $S['C']<=16) $S['C'] = 6;
		if($S['C']>=17 && $S['C']<=18) $S['C'] = 7;
		if($S['C']>=19 && $S['C']<=20) $S['C'] = 8;
		if($S['C']>=21 && $S['C']<=22) $S['C'] = 9;
		if($S['C']>=23 && $S['C']<=26) $S['C'] = 10;
		if($S['E']>=0 && $S['E']<=3) $S['E'] = 1;
		if($S['E']>=4 && $S['E']<=4) $S['E'] = 2;
		if($S['E']>=5 && $S['E']<=6) $S['E'] = 3;
		if($S['E']>=7 && $S['E']<=8) $S['E'] = 4;
		if($S['E']>=9 && $S['E']<=10) $S['E'] = 5;
		if($S['E']>=11 && $S['E']<=12) $S['E'] = 6;
		if($S['E']>=13 && $S['E']<=14) $S['E'] = 7;
		if($S['E']>=15 && $S['E']<=16) $S['E'] = 8;
		if($S['E']>=17 && $S['E']<=18) $S['E'] = 9;
		if($S['E']>=19 && $S['E']<=26) $S['E'] = 10;
		if($S['F']>=0 && $S['F']<=5) $S['F'] = 1;
		if($S['F']>=6 && $S['F']<=7) $S['F'] = 2;
		if($S['F']>=8 && $S['F']<=10) $S['F'] = 3;
		if($S['F']>=11 && $S['F']<=12) $S['F'] = 4;
		if($S['F']>=13 && $S['F']<=15) $S['F'] = 5;
		if($S['F']>=16 && $S['F']<=17) $S['F'] = 6;
		if($S['F']>=18 && $S['F']<=19) $S['F'] = 7;
		if($S['F']>=20 && $S['F']<=21) $S['F'] = 8;
		if($S['F']>=22 && $S['F']<=22) $S['F'] = 9;
		if($S['F']>=23 && $S['F']<=26) $S['F'] = 10;
		if($S['G']>=0 && $S['G']<=4) $S['G'] = 1;
		if($S['G']>=5 && $S['G']<=6) $S['G'] = 2;
		if($S['G']>=7 && $S['G']<=8) $S['G'] = 3;
		if($S['G']>=9 && $S['G']<=10) $S['G'] = 4;
		if($S['G']>=11 && $S['G']<=12) $S['G'] = 5;
		if($S['G']>=13 && $S['G']<=13) $S['G'] = 6;
		if($S['G']>=14 && $S['G']<=15) $S['G'] = 7;
		if($S['G']>=16 && $S['G']<=17) $S['G'] = 8;
		if($S['G']>=18 && $S['G']<=18) $S['G'] = 9;
		if($S['G']>=19 && $S['G']<=20) $S['G'] = 10;
		if($S['H']>=0 && $S['H']<=2) $S['H'] = 1;
		if($S['H']>=3 && $S['H']<=4) $S['H'] = 2;
		if($S['H']>=5 && $S['H']<=7) $S['H'] = 3;
		if($S['H']>=8 && $S['H']<=9) $S['H'] = 4;
		if($S['H']>=10 && $S['H']<=12) $S['H'] = 5;
		if($S['H']>=13 && $S['H']<=15) $S['H'] = 6;
		if($S['H']>=16 && $S['H']<=17) $S['H'] = 7;
		if($S['H']>=18 && $S['H']<=20) $S['H'] = 8;
		if($S['H']>=21 && $S['H']<=22) $S['H'] = 9;
		if($S['H']>=23 && $S['H']<=26) $S['H'] = 10;
		if($S['I']>=0 && $S['I']<=5) $S['I'] = 1;
		if($S['I']>=6 && $S['I']<=6) $S['I'] = 2;
		if($S['I']>=7 && $S['I']<=8) $S['I'] = 3;
		if($S['I']>=9 && $S['I']<=10) $S['I'] = 4;
		if($S['I']>=11 && $S['I']<=12) $S['I'] = 5;
		if($S['I']>=13 && $S['I']<=13) $S['I'] = 6;
		if($S['I']>=14 && $S['I']<=14) $S['I'] = 7;
		if($S['I']>=15 && $S['I']<=15) $S['I'] = 8;
		if($S['I']>=16 && $S['I']<=17) $S['I'] = 9;
		if($S['I']>=18 && $S['I']<=20) $S['I'] = 10;
		if($S['L']>=0 && $S['L']<=1) $S['L'] = 1;
		if($S['L']>=2 && $S['L']<=3) $S['L'] = 2;
		if($S['L']>=4 && $S['L']<=4) $S['L'] = 3;
		if($S['L']>=5 && $S['L']<=5) $S['L'] = 4;
		if($S['L']>=6 && $S['L']<=7) $S['L'] = 5;
		if($S['L']>=8 && $S['L']<=9) $S['L'] = 6;
		if($S['L']>=10 && $S['L']<=10) $S['L'] = 7;
		if($S['L']>=11 && $S['L']<=12) $S['L'] = 8;
		if($S['L']>=13 && $S['L']<=14) $S['L'] = 9;
		if($S['L']>=15 && $S['L']<=20) $S['L'] = 10;
		if($S['M']>=0 && $S['M']<=5) $S['M'] = 1;
		if($S['M']>=6 && $S['M']<=7) $S['M'] = 2;
		if($S['M']>=8 && $S['M']<=8) $S['M'] = 3;
		if($S['M']>=9 && $S['M']<=10) $S['M'] = 4;
		if($S['M']>=11 && $S['M']<=12) $S['M'] = 5;
		if($S['M']>=13 && $S['M']<=14) $S['M'] = 6;
		if($S['M']>=15 && $S['M']<=16) $S['M'] = 7;
		if($S['M']>=17 && $S['M']<=17) $S['M'] = 8;
		if($S['M']>=18 && $S['M']<=19) $S['M'] = 9;
		if($S['M']>=20 && $S['M']<=26) $S['M'] = 10;
		if($S['N']>=0 && $S['N']<=5) $S['N'] = 1;
		if($S['N']>=6 && $S['N']<=6) $S['N'] = 2;
		if($S['N']>=7 && $S['N']<=7) $S['N'] = 3;
		if($S['N']>=8 && $S['N']<=8) $S['N'] = 4;
		if($S['N']>=9 && $S['N']<=10) $S['N'] = 5;
		if($S['N']>=11 && $S['N']<=11) $S['N'] = 6;
		if($S['N']>=12 && $S['N']<=13) $S['N'] = 7;
		if($S['N']>=14 && $S['N']<=14) $S['N'] = 8;
		if($S['N']>=15 && $S['N']<=16) $S['N'] = 9;
		if($S['N']>=17 && $S['N']<=20) $S['N'] = 10;
		if($S['O']>=0 && $S['O']<=3) $S['O'] = 1;
		if($S['O']>=4 && $S['O']<=4) $S['O'] = 2;
		if($S['O']>=5 && $S['O']<=6) $S['O'] = 3;
		if($S['O']>=7 && $S['O']<=7) $S['O'] = 4;
		if($S['O']>=8 && $S['O']<=9) $S['O'] = 5;
		if($S['O']>=10 && $S['O']<=12) $S['O'] = 6;
		if($S['O']>=13 && $S['O']<=14) $S['O'] = 7;
		if($S['O']>=15 && $S['O']<=16) $S['O'] = 8;
		if($S['O']>=17 && $S['O']<=18) $S['O'] = 9;
		if($S['O']>=19 && $S['O']<=20) $S['O'] = 10;
		if($S['Q1']>=0 && $S['Q1']<=3) $S['Q1'] = 1;
		if($S['Q1']>=4 && $S['Q1']<=4) $S['Q1'] = 2;
		if($S['Q1']>=5 && $S['Q1']<=5) $S['Q1'] = 3;
		if($S['Q1']>=6 && $S['Q1']<=7) $S['Q1'] = 4;
		if($S['Q1']>=8 && $S['Q1']<=8) $S['Q1'] = 5;
		if($S['Q1']>=9 && $S['Q1']<=9) $S['Q1'] = 6;
		if($S['Q1']>=10 && $S['Q1']<=11) $S['Q1'] = 7;
		if($S['Q1']>=12 && $S['Q1']<=13) $S['Q1'] = 8;
		if($S['Q1']>=14 && $S['Q1']<=14) $S['Q1'] = 9;
		if($S['Q1']>=15 && $S['Q1']<=20) $S['Q1'] = 10;
		if($S['Q2']>=0 && $S['Q2']<=3) $S['Q2'] = 1;
		if($S['Q2']>=4 && $S['Q2']<=4) $S['Q2'] = 2;
		if($S['Q2']>=5 && $S['Q2']<=6) $S['Q2'] = 3;
		if($S['Q2']>=7 && $S['Q2']<=7) $S['Q2'] = 4;
		if($S['Q2']>=8 && $S['Q2']<=9) $S['Q2'] = 5;
		if($S['Q2']>=10 && $S['Q2']<=11) $S['Q2'] = 6;
		if($S['Q2']>=12 && $S['Q2']<=13) $S['Q2'] = 7;
		if($S['Q2']>=14 && $S['Q2']<=15) $S['Q2'] = 8;
		if($S['Q2']>=16 && $S['Q2']<=17) $S['Q2'] = 9;
		if($S['Q2']>=18 && $S['Q2']<=20) $S['Q2'] = 10;
		if($S['Q3']>=0 && $S['Q3']<=4) $S['Q3'] = 1;
		if($S['Q3']>=5 && $S['Q3']<=5) $S['Q3'] = 2;
		if($S['Q3']>=6 && $S['Q3']<=7) $S['Q3'] = 3;
		if($S['Q3']>=8 && $S['Q3']<=9) $S['Q3'] = 4;
		if($S['Q3']>=10 && $S['Q3']<=10) $S['Q3'] = 5;
		if($S['Q3']>=11 && $S['Q3']<=12) $S['Q3'] = 6;
		if($S['Q3']>=13 && $S['Q3']<=13) $S['Q3'] = 7;
		if($S['Q3']>=14 && $S['Q3']<=14) $S['Q3'] = 8;
		if($S['Q3']>=15 && $S['Q3']<=16) $S['Q3'] = 9;
		if($S['Q3']>=17 && $S['Q3']<=20) $S['Q3'] = 10;
		if($S['Q4']>=0 && $S['Q4']<=3) $S['Q4'] = 1;
		if($S['Q4']>=4 && $S['Q4']<=5) $S['Q4'] = 2;
		if($S['Q4']>=6 && $S['Q4']<=7) $S['Q4'] = 3;
		if($S['Q4']>=8 && $S['Q4']<=10) $S['Q4'] = 4;
		if($S['Q4']>=11 && $S['Q4']<=12) $S['Q4'] = 5;
		if($S['Q4']>=13 && $S['Q4']<=15) $S['Q4'] = 6;
		if($S['Q4']>=16 && $S['Q4']<=18) $S['Q4'] = 7;
		if($S['Q4']>=19 && $S['Q4']<=20) $S['Q4'] = 8;
		if($S['Q4']>=21 && $S['Q4']<=22) $S['Q4'] = 9;
		if($S['Q4']>=23 && $S['Q4']<=26) $S['Q4'] = 10;
	};

	if($in[188] == 'мужской' && $in[189] == '19 - 28 лет') {
		if($S['A']>=0 && $S['A']<=3) $S['A'] = 1;
		if($S['A']>=4 && $S['A']<=4) $S['A'] = 2;
		if($S['A']>=5 && $S['A']<=6) $S['A'] = 3;
		if($S['A']>=7 && $S['A']<=7) $S['A'] = 4;
		if($S['A']>=8 && $S['A']<=9) $S['A'] = 5;
		if($S['A']>=10 && $S['A']<=11) $S['A'] = 6;
		if($S['A']>=12 && $S['A']<=13) $S['A'] = 7;
		if($S['A']>=14 && $S['A']<=14) $S['A'] = 8;
		if($S['A']>=15 && $S['A']<=16) $S['A'] = 9;
		if($S['A']>=17 && $S['A']<=20) $S['A'] = 10;
		if($S['B']>=0 && $S['B']<=4) $S['B'] = 1;
		if($S['B']>=5 && $S['B']<=5) $S['B'] = 2;
		if($S['B']>=5 && $S['B']<=5) $S['B'] = 3;
		if($S['B']>=6 && $S['B']<=6) $S['B'] = 4;
		if($S['B']>=7 && $S['B']<=7) $S['B'] = 5;
		if($S['B']>=8 && $S['B']<=8) $S['B'] = 6;
		if($S['B']>=9 && $S['B']<=9) $S['B'] = 7;
		if($S['B']>=10 && $S['B']<=10) $S['B'] = 8;
		if($S['B']>=11 && $S['B']<=11) $S['B'] = 9;
		if($S['B']>=12 && $S['B']<=13) $S['B'] = 10;
		if($S['C']>=0 && $S['C']<=7) $S['C'] = 1;
		if($S['C']>=8 && $S['C']<=9) $S['C'] = 2;
		if($S['C']>=10 && $S['C']<=11) $S['C'] = 3;
		if($S['C']>=12 && $S['C']<=13) $S['C'] = 4;
		if($S['C']>=14 && $S['C']<=15) $S['C'] = 5;
		if($S['C']>=16 && $S['C']<=17) $S['C'] = 6;
		if($S['C']>=18 && $S['C']<=19) $S['C'] = 7;
		if($S['C']>=20 && $S['C']<=21) $S['C'] = 8;
		if($S['C']>=22 && $S['C']<=22) $S['C'] = 9;
		if($S['C']>=23 && $S['C']<=26) $S['C'] = 10;
		if($S['E']>=0 && $S['E']<=6) $S['E'] = 1;
		if($S['E']>=7 && $S['E']<=8) $S['E'] = 2;
		if($S['E']>=9 && $S['E']<=9) $S['E'] = 3;
		if($S['E']>=10 && $S['E']<=11) $S['E'] = 4;
		if($S['E']>=12 && $S['E']<=13) $S['E'] = 5;
		if($S['E']>=14 && $S['E']<=16) $S['E'] = 6;
		if($S['E']>=17 && $S['E']<=18) $S['E'] = 7;
		if($S['E']>=19 && $S['E']<=19) $S['E'] = 8;
		if($S['E']>=20 && $S['E']<=21) $S['E'] = 9;
		if($S['E']>=22 && $S['E']<=26) $S['E'] = 10;
		if($S['F']>=0 && $S['F']<=5) $S['F'] = 1;
		if($S['F']>=6 && $S['F']<=8) $S['F'] = 2;
		if($S['F']>=9 && $S['F']<=10) $S['F'] = 3;
		if($S['F']>=11 && $S['F']<=13) $S['F'] = 4;
		if($S['F']>=14 && $S['F']<=15) $S['F'] = 5;
		if($S['F']>=16 && $S['F']<=17) $S['F'] = 6;
		if($S['F']>=18 && $S['F']<=19) $S['F'] = 7;
		if($S['F']>=20 && $S['F']<=21) $S['F'] = 8;
		if($S['F']>=22 && $S['F']<=23) $S['F'] = 9;
		if($S['F']>=24 && $S['F']<=26) $S['F'] = 10;
		if($S['G']>=0 && $S['G']<=4) $S['G'] = 1;
		if($S['G']>=5 && $S['G']<=6) $S['G'] = 2;
		if($S['G']>=7 && $S['G']<=9) $S['G'] = 3;
		if($S['G']>=10 && $S['G']<=11) $S['G'] = 4;
		if($S['G']>=12 && $S['G']<=12) $S['G'] = 5;
		if($S['G']>=13 && $S['G']<=14) $S['G'] = 6;
		if($S['G']>=15 && $S['G']<=16) $S['G'] = 7;
		if($S['G']>=17 && $S['G']<=17) $S['G'] = 8;
		if($S['G']>=18 && $S['G']<=19) $S['G'] = 9;
		if($S['G']>=20 && $S['G']<=20) $S['G'] = 10;
		if($S['H']>=0 && $S['H']<=2) $S['H'] = 1;
		if($S['H']>=3 && $S['H']<=4) $S['H'] = 2;
		if($S['H']>=5 && $S['H']<=7) $S['H'] = 3;
		if($S['H']>=8 && $S['H']<=10) $S['H'] = 4;
		if($S['H']>=11 && $S['H']<=13) $S['H'] = 5;
		if($S['H']>=14 && $S['H']<=16) $S['H'] = 6;
		if($S['H']>=17 && $S['H']<=18) $S['H'] = 7;
		if($S['H']>=19 && $S['H']<=20) $S['H'] = 8;
		if($S['H']>=21 && $S['H']<=22) $S['H'] = 9;
		if($S['H']>=23 && $S['H']<=26) $S['H'] = 10;
		if($S['I']>=0 && $S['I']<=2) $S['I'] = 1;
		if($S['I']>=3 && $S['I']<=3) $S['I'] = 2;
		if($S['I']>=4 && $S['I']<=5) $S['I'] = 3;
		if($S['I']>=6 && $S['I']<=6) $S['I'] = 4;
		if($S['I']>=7 && $S['I']<=8) $S['I'] = 5;
		if($S['I']>=9 && $S['I']<=10) $S['I'] = 6;
		if($S['I']>=11 && $S['I']<=12) $S['I'] = 7;
		if($S['I']>=13 && $S['I']<=14) $S['I'] = 8;
		if($S['I']>=15 && $S['I']<=15) $S['I'] = 9;
		if($S['I']>=16 && $S['I']<=20) $S['I'] = 10;
		if($S['L']>=0 && $S['L']<=3) $S['L'] = 1;
		if($S['L']>=4 && $S['L']<=4) $S['L'] = 2;
		if($S['L']>=5 && $S['L']<=6) $S['L'] = 3;
		if($S['L']>=7 && $S['L']<=7) $S['L'] = 4;
		if($S['L']>=8 && $S['L']<=9) $S['L'] = 5;
		if($S['L']>=10 && $S['L']<=11) $S['L'] = 6;
		if($S['L']>=12 && $S['L']<=12) $S['L'] = 7;
		if($S['L']>=13 && $S['L']<=14) $S['L'] = 8;
		if($S['L']>=15 && $S['L']<=15) $S['L'] = 9;
		if($S['L']>=16 && $S['L']<=20) $S['L'] = 10;
		if($S['M']>=0 && $S['M']<=5) $S['M'] = 1;
		if($S['M']>=6 && $S['M']<=6) $S['M'] = 2;
		if($S['M']>=7 && $S['M']<=8) $S['M'] = 3;
		if($S['M']>=9 && $S['M']<=9) $S['M'] = 4;
		if($S['M']>=10 && $S['M']<=11) $S['M'] = 5;
		if($S['M']>=12 && $S['M']<=13) $S['M'] = 6;
		if($S['M']>=14 && $S['M']<=15) $S['M'] = 7;
		if($S['M']>=16 && $S['M']<=17) $S['M'] = 8;
		if($S['M']>=18 && $S['M']<=18) $S['M'] = 9;
		if($S['M']>=19 && $S['M']<=20) $S['M'] = 10;
		if($S['N']>=0 && $S['N']<=5) $S['N'] = 1;
		if($S['N']>=6 && $S['N']<=7) $S['N'] = 2;
		if($S['N']>=8 && $S['N']<=8) $S['N'] = 3;
		if($S['N']>=9 && $S['N']<=9) $S['N'] = 4;
		if($S['N']>=10 && $S['N']<=10) $S['N'] = 5;
		if($S['N']>=11 && $S['N']<=12) $S['N'] = 6;
		if($S['N']>=13 && $S['N']<=13) $S['N'] = 7;
		if($S['N']>=14 && $S['N']<=15) $S['N'] = 8;
		if($S['N']>=16 && $S['N']<=16) $S['N'] = 9;
		if($S['N']>=17 && $S['N']<=20) $S['N'] = 10;
		if($S['O']>=0 && $S['O']<=3) $S['O'] = 1;
		if($S['O']>=4 && $S['O']<=4) $S['O'] = 2;
		if($S['O']>=5 && $S['O']<=6) $S['O'] = 3;
		if($S['O']>=7 && $S['O']<=8) $S['O'] = 4;
		if($S['O']>=9 && $S['O']<=9) $S['O'] = 5;
		if($S['O']>=10 && $S['O']<=11) $S['O'] = 6;
		if($S['O']>=12 && $S['O']<=13) $S['O'] = 7;
		if($S['O']>=14 && $S['O']<=15) $S['O'] = 8;
		if($S['O']>=16 && $S['O']<=17) $S['O'] = 9;
		if($S['O']>=18 && $S['O']<=26) $S['O'] = 10;
		if($S['Q1']>=0 && $S['Q1']<=4) $S['Q1'] = 1;
		if($S['Q1']>=5 && $S['Q1']<=5) $S['Q1'] = 2;
		if($S['Q1']>=6 && $S['Q1']<=6) $S['Q1'] = 3;
		if($S['Q1']>=7 && $S['Q1']<=8) $S['Q1'] = 4;
		if($S['Q1']>=9 && $S['Q1']<=9) $S['Q1'] = 5;
		if($S['Q1']>=10 && $S['Q1']<=10) $S['Q1'] = 6;
		if($S['Q1']>=11 && $S['Q1']<=12) $S['Q1'] = 7;
		if($S['Q1']>=13 && $S['Q1']<=13) $S['Q1'] = 8;
		if($S['Q1']>=14 && $S['Q1']<=15) $S['Q1'] = 9;
		if($S['Q1']>=16 && $S['Q1']<=20) $S['Q1'] = 10;
		if($S['Q2']>=0 && $S['Q2']<=3) $S['Q2'] = 1;
		if($S['Q2']>=4 && $S['Q2']<=4) $S['Q2'] = 2;
		if($S['Q2']>=5 && $S['Q2']<=6) $S['Q2'] = 3;
		if($S['Q2']>=7 && $S['Q2']<=7) $S['Q2'] = 4;
		if($S['Q2']>=8 && $S['Q2']<=9) $S['Q2'] = 5;
		if($S['Q2']>=10 && $S['Q2']<=11) $S['Q2'] = 6;
		if($S['Q2']>=12 && $S['Q2']<=13) $S['Q2'] = 7;
		if($S['Q2']>=14 && $S['Q2']<=15) $S['Q2'] = 8;
		if($S['Q2']>=16 && $S['Q2']<=17) $S['Q2'] = 9;
		if($S['Q2']>=18 && $S['Q2']<=20) $S['Q2'] = 10;
		if($S['Q3']>=0 && $S['Q3']<=3) $S['Q3'] = 1;
		if($S['Q3']>=4 && $S['Q3']<=5) $S['Q3'] = 2;
		if($S['Q3']>=6 && $S['Q3']<=6) $S['Q3'] = 3;
		if($S['Q3']>=7 && $S['Q3']<=8) $S['Q3'] = 4;
		if($S['Q3']>=9 && $S['Q3']<=10) $S['Q3'] = 5;
		if($S['Q3']>=11 && $S['Q3']<=11) $S['Q3'] = 6;
		if($S['Q3']>=12 && $S['Q3']<=13) $S['Q3'] = 7;
		if($S['Q3']>=14 && $S['Q3']<=14) $S['Q3'] = 8;
		if($S['Q3']>=15 && $S['Q3']<=16) $S['Q3'] = 9;
		if($S['Q3']>=17 && $S['Q3']<=20) $S['Q3'] = 10;
		if($S['Q4']>=0 && $S['Q4']<=3) $S['Q4'] = 1;
		if($S['Q4']>=4 && $S['Q4']<=4) $S['Q4'] = 2;
		if($S['Q4']>=5 && $S['Q4']<=7) $S['Q4'] = 3;
		if($S['Q4']>=8 && $S['Q4']<=9) $S['Q4'] = 4;
		if($S['Q4']>=10 && $S['Q4']<=12) $S['Q4'] = 5;
		if($S['Q4']>=13 && $S['Q4']<=14) $S['Q4'] = 6;
		if($S['Q4']>=15 && $S['Q4']<=17) $S['Q4'] = 7;
		if($S['Q4']>=18 && $S['Q4']<=19) $S['Q4'] = 8;
		if($S['Q4']>=20 && $S['Q4']<=21) $S['Q4'] = 9;
		if($S['Q4']>=22 && $S['Q4']<=26) $S['Q4'] = 10;
	}

	if($in[188] == 'женский' && $in[189] == '29 - 70 лет') {
		if($S['A']>=0 && $S['A']<=4) $S['A'] = 1;
		if($S['A']>=5 && $S['A']<=6) $S['A'] = 2;
		if($S['A']>=7 && $S['A']<=8) $S['A'] = 3;
		if($S['A']>=9 && $S['A']<=10) $S['A'] = 4;
		if($S['A']>=11 && $S['A']<=11) $S['A'] = 5;
		if($S['A']>=12 && $S['A']<=13) $S['A'] = 6;
		if($S['A']>=14 && $S['A']<=15) $S['A'] = 7;
		if($S['A']>=16 && $S['A']<=16) $S['A'] = 8;
		if($S['A']>=17 && $S['A']<=18) $S['A'] = 9;
		if($S['A']>=19 && $S['A']<=20) $S['A'] = 10;
		if($S['B']>=0 && $S['B']<=1) $S['B'] = 1;
		if($S['B']>=2 && $S['B']<=2) $S['B'] = 2;
		if($S['B']>=3 && $S['B']<=3) $S['B'] = 3;
		if($S['B']>=4 && $S['B']<=4) $S['B'] = 4;
		if($S['B']>=5 && $S['B']<=5) $S['B'] = 5;
		if($S['B']>=6 && $S['B']<=6) $S['B'] = 6;
		if($S['B']>=7 && $S['B']<=7) $S['B'] = 7;
		if($S['B']>=8 && $S['B']<=9) $S['B'] = 8;
		if($S['B']>=10 && $S['B']<=10) $S['B'] = 9;
		if($S['B']>=11 && $S['B']<=13) $S['B'] = 10;
		if($S['C']>=0 && $S['C']<=7) $S['C'] = 1;
		if($S['C']>=8 && $S['C']<=9) $S['C'] = 2;
		if($S['C']>=10 && $S['C']<=11) $S['C'] = 3;
		if($S['C']>=12 && $S['C']<=13) $S['C'] = 4;
		if($S['C']>=14 && $S['C']<=15) $S['C'] = 5;
		if($S['C']>=16 && $S['C']<=17) $S['C'] = 6;
		if($S['C']>=18 && $S['C']<=20) $S['C'] = 7;
		if($S['C']>=21 && $S['C']<=22) $S['C'] = 8;
		if($S['C']>=23 && $S['C']<=24) $S['C'] = 9;
		if($S['C']>=25 && $S['C']<=26) $S['C'] = 10;
		if($S['E']>=0 && $S['E']<=2) $S['E'] = 1;
		if($S['E']>=3 && $S['E']<=3) $S['E'] = 2;
		if($S['E']>=4 && $S['E']<=5) $S['E'] = 3;
		if($S['E']>=6 && $S['E']<=7) $S['E'] = 4;
		if($S['E']>=8 && $S['E']<=9) $S['E'] = 5;
		if($S['E']>=10 && $S['E']<=11) $S['E'] = 6;
		if($S['E']>=12 && $S['E']<=14) $S['E'] = 7;
		if($S['E']>=15 && $S['E']<=16) $S['E'] = 8;
		if($S['E']>=17 && $S['E']<=18) $S['E'] = 9;
		if($S['E']>=19 && $S['E']<=26) $S['E'] = 10;
		if($S['F']>=0 && $S['F']<=4) $S['F'] = 1;
		if($S['F']>=5 && $S['F']<=6) $S['F'] = 2;
		if($S['F']>=7 && $S['F']<=8) $S['F'] = 3;
		if($S['F']>=9 && $S['F']<=10) $S['F'] = 4;
		if($S['F']>=11 && $S['F']<=13) $S['F'] = 5;
		if($S['F']>=14 && $S['F']<=15) $S['F'] = 6;
		if($S['F']>=16 && $S['F']<=17) $S['F'] = 7;
		if($S['F']>=18 && $S['F']<=19) $S['F'] = 8;
		if($S['F']>=20 && $S['F']<=21) $S['F'] = 9;
		if($S['F']>=22 && $S['F']<=26) $S['F'] = 10;
		if($S['G']>=0 && $S['G']<=6) $S['G'] = 1;
		if($S['G']>=7 && $S['G']<=7) $S['G'] = 2;
		if($S['G']>=8 && $S['G']<=9) $S['G'] = 3;
		if($S['G']>=10 && $S['G']<=11) $S['G'] = 4;
		if($S['G']>=12 && $S['G']<=13) $S['G'] = 5;
		if($S['G']>=14 && $S['G']<=15) $S['G'] = 6;
		if($S['G']>=16 && $S['G']<=16) $S['G'] = 7;
		if($S['G']>=17 && $S['G']<=17) $S['G'] = 8;
		if($S['G']>=18 && $S['G']<=19) $S['G'] = 9;
		if($S['G']>=20 && $S['G']<=20) $S['G'] = 10;
		if($S['H']>=0 && $S['H']<=2) $S['H'] = 1;
		if($S['H']>=3 && $S['H']<=4) $S['H'] = 2;
		if($S['H']>=5 && $S['H']<=7) $S['H'] = 3;
		if($S['H']>=8 && $S['H']<=9) $S['H'] = 4;
		if($S['H']>=10 && $S['H']<=12) $S['H'] = 5;
		if($S['H']>=13 && $S['H']<=14) $S['H'] = 6;
		if($S['H']>=15 && $S['H']<=17) $S['H'] = 7;
		if($S['H']>=18 && $S['H']<=20) $S['H'] = 8;
		if($S['H']>=21 && $S['H']<=22) $S['H'] = 9;
		if($S['H']>=23 && $S['H']<=26) $S['H'] = 10;
		if($S['I']>=0 && $S['I']<=5) $S['I'] = 1;
		if($S['I']>=6 && $S['I']<=7) $S['I'] = 2;
		if($S['I']>=8 && $S['I']<=8) $S['I'] = 3;
		if($S['I']>=9 && $S['I']<=10) $S['I'] = 4;
		if($S['I']>=11 && $S['I']<=11) $S['I'] = 5;
		if($S['I']>=12 && $S['I']<=13) $S['I'] = 6;
		if($S['I']>=14 && $S['I']<=14) $S['I'] = 7;
		if($S['I']>=15 && $S['I']<=16) $S['I'] = 8;
		if($S['I']>=17 && $S['I']<=17) $S['I'] = 9;
		if($S['I']>=18 && $S['I']<=20) $S['I'] = 10;
		if($S['L']>=0 && $S['L']<=1) $S['L'] = 1;
		if($S['L']>=2 && $S['L']<=2) $S['L'] = 2;
		if($S['L']>=3 && $S['L']<=4) $S['L'] = 3;
		if($S['L']>=5 && $S['L']<=5) $S['L'] = 4;
		if($S['L']>=6 && $S['L']<=7) $S['L'] = 5;
		if($S['L']>=8 && $S['L']<=8) $S['L'] = 6;
		if($S['L']>=9 && $S['L']<=10) $S['L'] = 7;
		if($S['L']>=11 && $S['L']<=11) $S['L'] = 8;
		if($S['L']>=12 && $S['L']<=13) $S['L'] = 9;
		if($S['L']>=14 && $S['L']<=20) $S['L'] = 10;
		if($S['M']>=0 && $S['M']<=6) $S['M'] = 1;
		if($S['M']>=7 && $S['M']<=7) $S['M'] = 2;
		if($S['M']>=8 && $S['M']<=9) $S['M'] = 3;
		if($S['M']>=10 && $S['M']<=11) $S['M'] = 4;
		if($S['M']>=12 && $S['M']<=12) $S['M'] = 5;
		if($S['M']>=13 && $S['M']<=14) $S['M'] = 6;
		if($S['M']>=15 && $S['M']<=16) $S['M'] = 7;
		if($S['M']>=17 && $S['M']<=17) $S['M'] = 8;
		if($S['M']>=18 && $S['M']<=19) $S['M'] = 9;
		if($S['M']>=20 && $S['M']<=26) $S['M'] = 10;
		if($S['N']>=0 && $S['N']<=5) $S['N'] = 1;
		if($S['N']>=6 && $S['N']<=6) $S['N'] = 2;
		if($S['N']>=7 && $S['N']<=7) $S['N'] = 3;
		if($S['N']>=8 && $S['N']<=9) $S['N'] = 4;
		if($S['N']>=10 && $S['N']<=10) $S['N'] = 5;
		if($S['N']>=11 && $S['N']<=11) $S['N'] = 6;
		if($S['N']>=12 && $S['N']<=13) $S['N'] = 7;
		if($S['N']>=14 && $S['N']<=14) $S['N'] = 8;
		if($S['N']>=15 && $S['N']<=15) $S['N'] = 9;
		if($S['N']>=16 && $S['N']<=20) $S['N'] = 10;
		if($S['O']>=0 && $S['O']<=3) $S['O'] = 1;
		if($S['O']>=4 && $S['O']<=4) $S['O'] = 2;
		if($S['O']>=5 && $S['O']<=6) $S['O'] = 3;
		if($S['O']>=7 && $S['O']<=8) $S['O'] = 4;
		if($S['O']>=9 && $S['O']<=10) $S['O'] = 5;
		if($S['O']>=11 && $S['O']<=12) $S['O'] = 6;
		if($S['O']>=13 && $S['O']<=14) $S['O'] = 7;
		if($S['O']>=15 && $S['O']<=16) $S['O'] = 8;
		if($S['O']>=17 && $S['O']<=18) $S['O'] = 9;
		if($S['O']>=19 && $S['O']<=26) $S['O'] = 10;
		if($S['Q1']>=0 && $S['Q1']<=3) $S['Q1'] = 1;
		if($S['Q1']>=4 && $S['Q1']<=4) $S['Q1'] = 2;
		if($S['Q1']>=5 && $S['Q1']<=5) $S['Q1'] = 3;
		if($S['Q1']>=6 && $S['Q1']<=7) $S['Q1'] = 4;
		if($S['Q1']>=8 && $S['Q1']<=8) $S['Q1'] = 5;
		if($S['Q1']>=9 && $S['Q1']<=9) $S['Q1'] = 6;
		if($S['Q1']>=10 && $S['Q1']<=11) $S['Q1'] = 7;
		if($S['Q1']>=12 && $S['Q1']<=13) $S['Q1'] = 8;
		if($S['Q1']>=14 && $S['Q1']<=14) $S['Q1'] = 9;
		if($S['Q1']>=15 && $S['Q1']<=20) $S['Q1'] = 10;
		if($S['Q2']>=0 && $S['Q2']<=3) $S['Q2'] = 1;
		if($S['Q2']>=4 && $S['Q2']<=4) $S['Q2'] = 2;
		if($S['Q2']>=5 && $S['Q2']<=6) $S['Q2'] = 3;
		if($S['Q2']>=7 && $S['Q2']<=8) $S['Q2'] = 4;
		if($S['Q2']>=9 && $S['Q2']<=9) $S['Q2'] = 5;
		if($S['Q2']>=10 && $S['Q2']<=11) $S['Q2'] = 6;
		if($S['Q2']>=12 && $S['Q2']<=13) $S['Q2'] = 7;
		if($S['Q2']>=14 && $S['Q2']<=15) $S['Q2'] = 8;
		if($S['Q2']>=16 && $S['Q2']<=17) $S['Q2'] = 9;
		if($S['Q2']>=18 && $S['Q2']<=20) $S['Q2'] = 10;
		if($S['Q3']>=0 && $S['Q3']<=5) $S['Q3'] = 1;
		if($S['Q3']>=6 && $S['Q3']<=7) $S['Q3'] = 2;
		if($S['Q3']>=8 && $S['Q3']<=8) $S['Q3'] = 3;
		if($S['Q3']>=9 && $S['Q3']<=10) $S['Q3'] = 4;
		if($S['Q3']>=11 && $S['Q3']<=11) $S['Q3'] = 5;
		if($S['Q3']>=12 && $S['Q3']<=13) $S['Q3'] = 6;
		if($S['Q3']>=14 && $S['Q3']<=14) $S['Q3'] = 7;
		if($S['Q3']>=15 && $S['Q3']<=16) $S['Q3'] = 8;
		if($S['Q3']>=17 && $S['Q3']<=17) $S['Q3'] = 9;
		if($S['Q3']>=18 && $S['Q3']<=20) $S['Q3'] = 10;
		if($S['Q4']>=0 && $S['Q4']<=2) $S['Q4'] = 1;
		if($S['Q4']>=3 && $S['Q4']<=4) $S['Q4'] = 2;
		if($S['Q4']>=5 && $S['Q4']<=7) $S['Q4'] = 3;
		if($S['Q4']>=8 && $S['Q4']<=10) $S['Q4'] = 4;
		if($S['Q4']>=11 && $S['Q4']<=12) $S['Q4'] = 5;
		if($S['Q4']>=13 && $S['Q4']<=15) $S['Q4'] = 6;
		if($S['Q4']>=16 && $S['Q4']<=17) $S['Q4'] = 7;
		if($S['Q4']>=18 && $S['Q4']<=20) $S['Q4'] = 8;
		if($S['Q4']>=21 && $S['Q4']<=22) $S['Q4'] = 9;
		if($S['Q4']>=23 && $S['Q4']<=26) $S['Q4'] = 10;
	}

	if($in[188] == 'мужской' && $in[189] == '29 - 70 лет') {
		if($S['A']>=0 && $S['A']<=3) $S['A'] = 1;
		if($S['A']>=4 && $S['A']<=4) $S['A'] = 2;
		if($S['A']>=5 && $S['A']<=6) $S['A'] = 3;
		if($S['A']>=7 && $S['A']<=7) $S['A'] = 4;
		if($S['A']>=8 && $S['A']<=9) $S['A'] = 5;
		if($S['A']>=10 && $S['A']<=11) $S['A'] = 6;
		if($S['A']>=12 && $S['A']<=13) $S['A'] = 7;
		if($S['A']>=14 && $S['A']<=14) $S['A'] = 8;
		if($S['A']>=15 && $S['A']<=16) $S['A'] = 9;
		if($S['A']>=17 && $S['A']<=20) $S['A'] = 10;
		if($S['B']>=0 && $S['B']<=1) $S['B'] = 1;
		if($S['B']>=2 && $S['B']<=2) $S['B'] = 2;
		if($S['B']>=3 && $S['B']<=3) $S['B'] = 3;
		if($S['B']>=4 && $S['B']<=4) $S['B'] = 4;
		if($S['B']>=5 && $S['B']<=5) $S['B'] = 5;
		if($S['B']>=6 && $S['B']<=6) $S['B'] = 6;
		if($S['B']>=7 && $S['B']<=7) $S['B'] = 7;
		if($S['B']>=8 && $S['B']<=9) $S['B'] = 8;
		if($S['B']>=10 && $S['B']<=10) $S['B'] = 9;
		if($S['B']>=11 && $S['B']<=13) $S['B'] = 10;
		if($S['C']>=0 && $S['C']<=7) $S['C'] = 1;
		if($S['C']>=8 && $S['C']<=10) $S['C'] = 2;
		if($S['C']>=11 && $S['C']<=12) $S['C'] = 3;
		if($S['C']>=13 && $S['C']<=14) $S['C'] = 4;
		if($S['C']>=15 && $S['C']<=16) $S['C'] = 5;
		if($S['C']>=17 && $S['C']<=17) $S['C'] = 6;
		if($S['C']>=18 && $S['C']<=19) $S['C'] = 7;
		if($S['C']>=20 && $S['C']<=21) $S['C'] = 8;
		if($S['C']>=22 && $S['C']<=23) $S['C'] = 9;
		if($S['C']>=24 && $S['C']<=26) $S['C'] = 10;
		if($S['E']>=0 && $S['E']<=5) $S['E'] = 1;
		if($S['E']>=6 && $S['E']<=7) $S['E'] = 2;
		if($S['E']>=8 && $S['E']<=9) $S['E'] = 3;
		if($S['E']>=10 && $S['E']<=11) $S['E'] = 4;
		if($S['E']>=12 && $S['E']<=13) $S['E'] = 5;
		if($S['E']>=14 && $S['E']<=15) $S['E'] = 6;
		if($S['E']>=16 && $S['E']<=17) $S['E'] = 7;
		if($S['E']>=18 && $S['E']<=19) $S['E'] = 8;
		if($S['E']>=20 && $S['E']<=21) $S['E'] = 9;
		if($S['E']>=22 && $S['E']<=26) $S['E'] = 10;
		if($S['F']>=0 && $S['F']<=3) $S['F'] = 1;
		if($S['F']>=4 && $S['F']<=5) $S['F'] = 2;
		if($S['F']>=6 && $S['F']<=8) $S['F'] = 3;
		if($S['F']>=9 && $S['F']<=10) $S['F'] = 4;
		if($S['F']>=11 && $S['F']<=13) $S['F'] = 5;
		if($S['F']>=14 && $S['F']<=15) $S['F'] = 6;
		if($S['F']>=16 && $S['F']<=17) $S['F'] = 7;
		if($S['F']>=18 && $S['F']<=19) $S['F'] = 8;
		if($S['F']>=20 && $S['F']<=20) $S['F'] = 9;
		if($S['F']>=21 && $S['F']<=26) $S['F'] = 10;
		if($S['G']>=0 && $S['G']<=4) $S['G'] = 1;
		if($S['G']>=5 && $S['G']<=7) $S['G'] = 2;
		if($S['G']>=8 && $S['G']<=10) $S['G'] = 3;
		if($S['G']>=11 && $S['G']<=12) $S['G'] = 4;
		if($S['G']>=13 && $S['G']<=13) $S['G'] = 5;
		if($S['G']>=14 && $S['G']<=15) $S['G'] = 6;
		if($S['G']>=16 && $S['G']<=17) $S['G'] = 7;
		if($S['G']>=18 && $S['G']<=18) $S['G'] = 8;
		if($S['G']>=19 && $S['G']<=19) $S['G'] = 9;
		if($S['G']>=20 && $S['G']<=20) $S['G'] = 10;
		if($S['H']>=0 && $S['H']<=3) $S['H'] = 1;
		if($S['H']>=4 && $S['H']<=5) $S['H'] = 2;
		if($S['H']>=6 && $S['H']<=8) $S['H'] = 3;
		if($S['H']>=9 && $S['H']<=11) $S['H'] = 4;
		if($S['H']>=12 && $S['H']<=14) $S['H'] = 5;
		if($S['H']>=15 && $S['H']<=16) $S['H'] = 6;
		if($S['H']>=17 && $S['H']<=19) $S['H'] = 7;
		if($S['H']>=20 && $S['H']<=21) $S['H'] = 8;
		if($S['H']>=22 && $S['H']<=23) $S['H'] = 9;
		if($S['H']>=24 && $S['H']<=26) $S['H'] = 10;
		if($S['I']>=0 && $S['I']<=2) $S['I'] = 1;
		if($S['I']>=3 && $S['I']<=3) $S['I'] = 2;
		if($S['I']>=4 && $S['I']<=4) $S['I'] = 3;
		if($S['I']>=5 && $S['I']<=6) $S['I'] = 4;
		if($S['I']>=7 && $S['I']<=8) $S['I'] = 5;
		if($S['I']>=9 && $S['I']<=10) $S['I'] = 6;
		if($S['I']>=11 && $S['I']<=12) $S['I'] = 7;
		if($S['I']>=13 && $S['I']<=14) $S['I'] = 8;
		if($S['I']>=15 && $S['I']<=15) $S['I'] = 9;
		if($S['I']>=16 && $S['I']<=20) $S['I'] = 10;
		if($S['L']>=0 && $S['L']<=2) $S['L'] = 1;
		if($S['L']>=3 && $S['L']<=3) $S['L'] = 2;
		if($S['L']>=4 && $S['L']<=5) $S['L'] = 3;
		if($S['L']>=6 && $S['L']<=7) $S['L'] = 4;
		if($S['L']>=8 && $S['L']<=8) $S['L'] = 5;
		if($S['L']>=9 && $S['L']<=10) $S['L'] = 6;
		if($S['L']>=11 && $S['L']<=12) $S['L'] = 7;
		if($S['L']>=13 && $S['L']<=13) $S['L'] = 8;
		if($S['L']>=14 && $S['L']<=15) $S['L'] = 9;
		if($S['L']>=16 && $S['L']<=20) $S['L'] = 10;
		if($S['M']>=0 && $S['M']<=5) $S['M'] = 1;
		if($S['M']>=6 && $S['M']<=7) $S['M'] = 2;
		if($S['M']>=8 && $S['M']<=8) $S['M'] = 3;
		if($S['M']>=9 && $S['M']<=10) $S['M'] = 4;
		if($S['M']>=11 && $S['M']<=11) $S['M'] = 5;
		if($S['M']>=12 && $S['M']<=13) $S['M'] = 6;
		if($S['M']>=14 && $S['M']<=15) $S['M'] = 7;
		if($S['M']>=16 && $S['M']<=17) $S['M'] = 8;
		if($S['M']>=18 && $S['M']<=19) $S['M'] = 9;
		if($S['M']>=20 && $S['M']<=26) $S['M'] = 10;
		if($S['N']>=0 && $S['N']<=6) $S['N'] = 1;
		if($S['N']>=7 && $S['N']<=7) $S['N'] = 2;
		if($S['N']>=8 && $S['N']<=9) $S['N'] = 3;
		if($S['N']>=10 && $S['N']<=10) $S['N'] = 4;
		if($S['N']>=11 && $S['N']<=11) $S['N'] = 5;
		if($S['N']>=12 && $S['N']<=13) $S['N'] = 6;
		if($S['N']>=14 && $S['N']<=14) $S['N'] = 7;
		if($S['N']>=15 && $S['N']<=15) $S['N'] = 8;
		if($S['N']>=16 && $S['N']<=17) $S['N'] = 9;
		if($S['N']>=18 && $S['N']<=20) $S['N'] = 10;
		if($S['O']>=0 && $S['O']<=2) $S['O'] = 1;
		if($S['O']>=3 && $S['O']<=3) $S['O'] = 2;
		if($S['O']>=4 && $S['O']<=5) $S['O'] = 3;
		if($S['O']>=6 && $S['O']<=7) $S['O'] = 4;
		if($S['O']>=8 && $S['O']<=9) $S['O'] = 5;
		if($S['O']>=10 && $S['O']<=11) $S['O'] = 6;
		if($S['O']>=12 && $S['O']<=12) $S['O'] = 7;
		if($S['O']>=13 && $S['O']<=15) $S['O'] = 8;
		if($S['O']>=16 && $S['O']<=17) $S['O'] = 9;
		if($S['O']>=18 && $S['O']<=26) $S['O'] = 10;
		if($S['Q1']>=0 && $S['Q1']<=4) $S['Q1'] = 1;
		if($S['Q1']>=5 && $S['Q1']<=6) $S['Q1'] = 2;
		if($S['Q1']>=7 && $S['Q1']<=7) $S['Q1'] = 3;
		if($S['Q1']>=8 && $S['Q1']<=8) $S['Q1'] = 4;
		if($S['Q1']>=9 && $S['Q1']<=10) $S['Q1'] = 5;
		if($S['Q1']>=11 && $S['Q1']<=11) $S['Q1'] = 6;
		if($S['Q1']>=12 && $S['Q1']<=13) $S['Q1'] = 7;
		if($S['Q1']>=14 && $S['Q1']<=14) $S['Q1'] = 8;
		if($S['Q1']>=15 && $S['Q1']<=16) $S['Q1'] = 9;
		if($S['Q1']>=17 && $S['Q1']<=20) $S['Q1'] = 10;
		if($S['Q2']>=0 && $S['Q2']<=3) $S['Q2'] = 1;
		if($S['Q2']>=4 && $S['Q2']<=4) $S['Q2'] = 2;
		if($S['Q2']>=5 && $S['Q2']<=6) $S['Q2'] = 3;
		if($S['Q2']>=7 && $S['Q2']<=8) $S['Q2'] = 4;
		if($S['Q2']>=9 && $S['Q2']<=10) $S['Q2'] = 5;
		if($S['Q2']>=11 && $S['Q2']<=11) $S['Q2'] = 6;
		if($S['Q2']>=12 && $S['Q2']<=13) $S['Q2'] = 7;
		if($S['Q2']>=14 && $S['Q2']<=15) $S['Q2'] = 8;
		if($S['Q2']>=16 && $S['Q2']<=17) $S['Q2'] = 9;
		if($S['Q2']>=18 && $S['Q2']<=20) $S['Q2'] = 10;
		if($S['Q3']>=0 && $S['Q3']<=4) $S['Q3'] = 1;
		if($S['Q3']>=5 && $S['Q3']<=6) $S['Q3'] = 2;
		if($S['Q3']>=7 && $S['Q3']<=8) $S['Q3'] = 3;
		if($S['Q3']>=9 && $S['Q3']<=9) $S['Q3'] = 4;
		if($S['Q3']>=10 && $S['Q3']<=11) $S['Q3'] = 5;
		if($S['Q3']>=12 && $S['Q3']<=12) $S['Q3'] = 6;
		if($S['Q3']>=13 && $S['Q3']<=14) $S['Q3'] = 7;
		if($S['Q3']>=15 && $S['Q3']<=15) $S['Q3'] = 8;
		if($S['Q3']>=16 && $S['Q3']<=17) $S['Q3'] = 9;
		if($S['Q3']>=18 && $S['Q3']<=20) $S['Q3'] = 10;
		if($S['Q4']>=0 && $S['Q4']<=0) $S['Q4'] = 1;
		if($S['Q4']>=1 && $S['Q4']<=2) $S['Q4'] = 2;
		if($S['Q4']>=3 && $S['Q4']<=5) $S['Q4'] = 3;
		if($S['Q4']>=6 && $S['Q4']<=7) $S['Q4'] = 4;
		if($S['Q4']>=8 && $S['Q4']<=10) $S['Q4'] = 5;
		if($S['Q4']>=11 && $S['Q4']<=12) $S['Q4'] = 6;
		if($S['Q4']>=13 && $S['Q4']<=15) $S['Q4'] = 7;
		if($S['Q4']>=16 && $S['Q4']<=17) $S['Q4'] = 8;
		if($S['Q4']>=18 && $S['Q4']<=19) $S['Q4'] = 9;
		if($S['Q4']>=20 && $S['Q4']<=26) $S['Q4'] = 10;

	}
	return $S;
};


	$a[1] = ['да','не уверен','нет'];
	$a[2] = ['да','не уверен','нет'];
	$a[3] = ['в обжитом городе','нечто среднее','одиноко в глухих лесах'];
	$a[4] = ['всегда','обычно','редко'];
	$a[5] = ['верно','не уверен','неверно'];
	$a[6] = ['да','иногда','нет'];
	$a[7] = ['обычно','иногда','никогда'];
	$a[8] = ['верно','не уверен','неверно'];
	$a[9] = ['дал бы им возможность договориться самим','не уверен','рассудил бы их'];
	$a[10] = ['с готовностью вступаю в разговор','нечто среднее','предпочитаю спокойно оставаться в стороне'];
	$a[11] = ['инженером-строителем','не уверен','драматургом'];
	$a[12] = ['верно','не уверен','неверно'];
	$a[13] = ['да','нечто среднее','нет'];
	$a[14] = ['да','не уверен','нет'];
	$a[15] = ['согласен','не уверен','не согласен'];
	$a[16] = ['согласен','не уверен','не согласен'];
	$a[17] = ['только если это необходимо','нечто среднее','охотно, когда представится возможность'];
	$a[18] = ['да','нечто среднее','нет'];
	$a[19] = ['не испытываю чувства вины','нечто среднее','все же чувствую себя немного виноватым'];
	$a[20] = ['да','не уверен','нет'];
	$a[21] = ['сердце','сердце и разум в равной степени','разум'];
	$a[22] = ['да','не уверен','нет'];
	$a[23] = ['верно','не уверен','неверно'];
	$a[24] = ['высказывать свои мысли так, как они приходят мне в голову','нечто среднее','сначала сформулировать получше свои мысли'];
	$a[25] = ['да','нечто среднее','нет'];
	$a[26] = ['плотником или поваром','не уверен','официантом в хорошем ресторане'];
	$a[27] = ['очень редко','иногда','много раз'];
	$a[28] = ['«острый»','«резать»','«указывать»'];
	$a[29] = ['верно','не уверен','неверно'];
	$a[30] = ['верно','не уверен','неверно'];
	$a[31] = ['только после основательного обсуждения','не уверен','как можно скорее'];
	$a[32] = ['верно','нечто среднее','неверно'];
	$a[33] = ['да','не уверен','нет'];
	$a[34] = ['принимаю их такими, как они есть','нечто среднее','испытываю отвращение и возмущение'];
	$a[35] = ['да','нечто среднее','нет'];
	$a[36] = ['да','нечто среднее','нет'];
	$a[37] = ['заниматься музыкой, пением','нечто среднее','выпиливать и мастерить что-либо'];
	$a[38] = ['да','иногда','нет'];
	$a[39] = ['помогали детям развивать свои чувства','нечто среднее','обучали детей сдерживать свои чувства'];
	$a[40] = ['постараться улучшить организацию работы','нечто среднее','следить за результатами и соблюдением правил'];
	$a[41] = ['да','нечто среднее','нет'];
	$a[42] = ['да','нечто среднее','нет'];
	$a[43] = ['верно','нечто среднее','неверно'];
	$a[44] = ['пользуюсь случаем, чтобы попросить о чем-то нужном мне','нечто среднее','боюсь, что это связано с какой-нибудь оплошностью в моей работе'];
	$a[45] = ['больше спокойных, солидных людей','не уверен','больше «идеалистов», планирующих лучшее будущее'];
	$a[46] = ['да','не уверен','нет'];
	$a[47] = ['иногда','довольно часто','многократно'];
	$a[48] = ['да','нечто среднее','нет'];
	$a[49] = ['да','нечто среднее','нет'];
	$a[50] = ['да','не уверен','нет'];
	$a[51] = ['лесником','не уверен','учителем средней школы'];
	$a[52] = ['люблю делать подарки','неопределенно','считаю, что делать подарки – довольно неприятная вещь'];
	$a[53] = ['«улыбка»','«успех»','«счастливый»'];
	$a[54] = ['свеча','луна','электрический свет'];
	$a[55] = ['очень редко','иногда','довольно часто'];
	$a[56] = ['да','не уверен','нет'];
	$a[57] = ['верно','нечто среднее','неверно'];
	$a[58] = ['чаще, чем раз в неделю (т.е. чаще, чем большинство)','примерно раз в неделю (т.е. как большинство)','реже, чем раз в неделю (т.е. реже, чем большинство)'];
	$a[59] = ['верно','не уверен','неверно'];
	$a[60] = ['да','нечто среднее','нет'];
	$a[61] = ['да','нечто среднее','нет'];
	$a[62] = ['да','нечто среднее','нет'];
	$a[63] = ['постараюсь его успокоить','нечто среднее','раздражаюсь'];
	$a[64] = ['верно','не уверен','неверно'];
	$a[65] = ['да','нечто среднее','нет'];
	$a[66] = ['да','не уверен','нет'];
	$a[67] = ['да','не уверен','неверно'];
	$a[68] = ['очень редко','нечто среднее','довольно часто'];
	$a[69] = ['да','нечто среднее','нет'];
	$a[70] = ['оставался при своем мнении','нечто среднее','соглашался с их авторитетом'];
	$a[71] = ['да','не уверен','нет'];
	$a[72] = ['верно','не уверен','неверно'];
	$a[73] = ['верно','не уверен','неверно'];
	$a[74] = ['часто','иногда','никогда'];
	$a[75] = ['да','нечто среднее','нет'];
	$a[76] = ['разрабатывать его в лаборатории','нечто среднее','заниматься его практической реализацией'];
	$a[77] = ['«смелый»','«тревожный»','«ужасный»'];
	$a[78] = ['3/7','3/9','3/11'];
	$a[79] = ['верно','не уверен','неверно'];
	$a[80] = ['часто','иногда','никогда'];
	$a[81] = ['да','нечто среднее','нет'];
	$a[82] = ['да','нечто среднее','нет'];
	$a[83] = ['верно','нечто среднее','нет'];
	$a[84] = ['да','не уверен','нет'];
	$a[85] = ['довольно часто','иногда','почти никогда'];
	$a[86] = ['да','нечто среднее','нет'];
	$a[87] = ['реалистические описания военных и политических сражений','нечто среднее','роман, где много чувств и воображения'];
	$a[88] = ['да','нечто среднее','нет'];
	$a[89] = ['верно','нечто среднее','неверно'];
	$a[90] = ['да','нечто среднее','нет'];
	$a[91] = ['читать что-нибудь серьезное, но интересное','неопределенно','провести время, беседуя с кем-нибудь из пассажиров'];
	$a[92] = ['да','не уверен','нет'];
	$a[93] = ['меня это совершенно не трогает','нечто среднее','я расстраиваюсь'];
	$a[94] = ['да','нечто среднее','нет'];
	$a[95] = ['с постоянным окладом','нечто среднее','с большим окладом, который бы зависел от моей способности показать людям, чего я стою'];
	$a[96] = ['в общении с людьми','нечто среднее','из литературы'];
	$a[97] = ['да','нечто среднее','нет'];
	$a[98] = ['верно','не уверен','неверно'];
	$a[99] = ['да','нечто среднее','нет'];
	$a[100] = ['да','не уверен','нет'];
	$a[101] = ['нужно разговаривать с людьми','нечто среднее','нужно заниматься счетами и записями'];
	$a[102] = ['«тюрьма»','«нарушение»','«кража»'];
	$a[103] = ['«ПО»','«ОП»','«ТУ»']; 
	$a[104] = ['молчу','не уверен','высказываю свое презрение'];
	$a[105] = ['могу сосредоточиться на музыке, не отвлекаться','нечто среднее','чувствую, что это портит мне удовольствие и раздражает'];
	$a[106] = ['вежливого и спокойного','нечто среднее','энергичного'];
	$a[107] = ['да','не уверен','нет'];
	$a[108] = ['верно','не уверен','неверно'];
	$a[109] = ['стараюсь планировать заранее, прежде чем встретить трудность','нечто среднее','считаю, что справлюсь с трудностями по мере того, как они возникнут'];
	$a[110] = ['верно','не уверен','неверно'];
	$a[111] = ['верно','не уверен','неверно'];
	$a[112] = ['консультантом, помогающим людям выбирать профессию','нечто среднее','руководителем технического предприятия'];
	$a[113] = ['да','нечто среднее','нет'];
	$a[114] = ['да','не уверен','нет'];
	$a[115] = ['да','не уверен','нет'];
	$a[116] = ['верно','не уверен','неверно'];
	$a[117] = ['он – лжец','не уверен','по-видимому, он плохо информирован'];
	$a[118] = ['часто','иногда','никогда'];
	$a[119] = ['да','не уверен','нет'];
	$a[120] = ['да','не уверен','нет'];
	$a[121] = ['очень','немного','совсем не беспокоит'];
	$a[122] = ['в составе коллектива','не уверен','самостоятельно'];
	$a[123] = ['часто','иногда','никогда'];
	$a[124] = ['да','нечто среднее','нет'];
	$a[125] = ['да','не уверен','нет'];
	$a[126] = ['адвокатом','не уверен','пилотом или капитаном судна'];
	$a[127] = ['«быстрое»','«лучшее»','«быстрейшее»'];
	$a[128] = ['ОРРР','ООРР','РООО'];
	$a[129] = ['верно','нечто среднее','неверно'];
	$a[130] = ['да','нечто среднее','нет'];
	$a[131] = ['да','нечто среднее','нет'];
	$a[132] = ['да','нечто среднее','нет'];
	$a[133] = ['да','не уверен','нет'];
	$a[134] = ['да','нечто среднее','нет'];
	$a[135] = ['да','нечто среднее','нет'];
	$a[136] = ['свободно проявляю свои чувства','нечто среднее','держу свои переживания «при себе»'];
	$a[137] = ['легкую, живую','нечто среднее','чувствительную'];
	$a[138] = ['да','не уверен','нет'];
	$a[139] = ['смирюсь с этим','нечто среднее','даю людям возможность услышать его еще раз'];
	$a[140] = ['да','не уверен','нет'];
	$a[141] = ['да','не уверен','нет'];
	$a[142] = ['да','не уверен','нет'];
	$a[143] = ['да','не уверен','нет'];
	$a[144] = ['верно','нечто среднее','неверно'];
	$a[145] = ['увидеть, кто же «победил»','нечто среднее','чтобы спор разрешился мирно'];
	$a[146] = ['да','нечто среднее','нет'];
	$a[147] = ['да','не уверен','нет'];
	$a[148] = ['да','не уверен','нет'];
	$a[149] = ['да','иногда','нет'];
	$a[150] = ['верно','нечто среднее','неверно'];
	$a[151] = ['художником','не уверен','организатором культурных развлечений'];
	$a[152] = ['любые','некоторые','большинство'];
	$a[153] = ['«шип»','«красивые лепестки»','«аромат»'];
	$a[154] = ['часто','иногда','практически никогда'];
	$a[155] = ['да','нечто среднее','нет'];
	$a[156] = ['да','нечто среднее','нет'];
	$a[157] = ['верно','не уверен','неверно'];
	$a[158] = ['верно','не уверен','неверно'];
	$a[159] = ['иногда','почти никогда','никогда'];
	$a[160] = ['да','нечто среднее','нет'];
	$a[161] = ['да','нечто среднее','нет'];
	$a[162] = ['верно','нечто среднее','неверно'];
	$a[163] = ['русский язык и литературу','не уверен','математику или арифметику'];
	$a[164] = ['да','не уверен','нет'];
	$a[165] = ['часто вполне интересен и содержателен','нечто среднее','раздражает меня, потому что ограничивается мелочами'];
	$a[166] = ['да','нечто среднее','нет'];
	$a[167] = ['относиться к ребенку с достаточной любовью','нечто среднее','выработать нужные привычки и отношение к жизни'];
	$a[168] = ['да','нечто среднее','нет'];
	$a[169] = ['да','не уверен','нет'];
	$a[170] = ['вопросы нравственности','не уверен','разногласия между странами мира'];
	$a[171] = ['читая хорошо написанную книгу','нечто среднее','участвуя в обсуждении вопроса'];
	$a[172] = ['верно','не уверен','неверно'];
	$a[173] = ['всегда','обычно','только если это целесообразно'];
	$a[174] = ['да','нечто среднее','нет'];
	$a[175] = ['верно','не уверен','неверно'];
	$a[176] = ['согласился','не уверен','вежливо сказал, что занят'];
	$a[177] = ['широкий','зигзагообразный','прямой'];
	$a[178] = ['«нигде»','«далеко»','«где-то»'];
	$a[179] = ['да','нечто среднее','нет'];
	$a[180] = ['да','не уверен','нет'];
	$a[181] = ['в трудных ситуациях, когда нужно сохранить самообладание','не уверен','когда требуется умение ладить с людьми'];
	$a[182] = ['да','нечто среднее','нет'];
	$a[183] = ['да','нечто среднее','нет'];
	$a[184] = ['верно','нечто среднее','неверно'];
	$a[185] = ['да','нечто среднее','нет'];
	$a[186] = ['да','не уверен','нет'];
	$a[187] = ['да','не уверен','нет'];

	$a[188] = 'мужской';
	$a[189] = '29 - 70 лет';

	for($i=1; $i<=187; $i++) $a[$i] = $a[$i][0];
	
	
	 
	
	
	echo "<pre>";print_r($a);echo "</pre>";
	
	$S = kettell($a);
	echo "<pre>";print_r($S);echo "</pre>";
	
	
	
	


?>

<?
global $APPLICATION;
//$this->addExternalJS(SITE_TEMPLATE_PATH."/js/lightbox/js/lightbox.min.js");
//$this->addExternalJS(SITE_DIR."/modules/echarts/echarts.min.js");  // в template.php
//$this->addExternalJS(SITE_DIR."/modules/echarts/chart-echarts.js");
?>

<?
$v = time();
$APPLICATION->AddHeadScript("/modules/echarts/echarts.min.js?$v");
$APPLICATION->AddHeadScript("/modules/echarts/chart-echarts.js?$v");
?>

 <div class="chart-container z-depth-1">
                  <div class="" style="height:500px" id="results_chart"></div>
              </div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>