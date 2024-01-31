<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"]."/lib/functions.php");

\Bitrix\Main\Loader::includeModule("iblock");
\Bitrix\Main\Loader::includeModule("sale");
global $USER;

$UserId = $USER->GetID();
$FUserId = CSaleBasket::GetBasketUserID();

$echo['result'] = ""; 
$echo['text'] = "";


if(!empty(request('data'))){
	
	
	$DATA = array();
	$DATA['RESULT_RAW'] = serialize(request('data'));  // back is $array = unserialize( $string );
	$DATA['ID'] = request('id');
	$DATA['CODE'] = request('code');
	$DATA['NAME'] = request('name');
	
	//$answers = json_decode($_POST['data']);
	//if($answers->Q1 == "Верно") $res = 'answers[1] == Верно'; 
		
	//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
	//echo json_encode($arr);
	//{"a":1,"b":2,"c":3,"d":4,"e":5}
	
	
	$link = bin2hex(random_bytes(13));
	//$RESULT_SHORT .= "<br> Ссылка на результат <a href='https://clinli.ru/r/".$link ."/' title='Откроется в новом окне' target='_blank'>https://clinli.ru/r/".$link ."/</a>";
	
	// записываем результаты в инфоблок в любом случае: либо по USER_ID либо FUSER_ID
	$el = new CIBlockElement;
	$PROP = array();
	if(!empty($UserId)){
		$PROP[57] = $UserId;
	} else  {
		$PROP[67] = $FUserId;		
	}
	$PROP[59] = $DATA['RESULT_RAW']; // 59 RESULT_RAW
	$PROP[62] = $DATA['ID']; // ID теста
	$PROP[65] = $link; // 65 LINK
	
	$arLoadProductArray = Array(
		"IBLOCK_SECTION_ID" => false, // элемент лежит в корне раздела
		"IBLOCK_ID"      => 11,
		"PROPERTY_VALUES"=> $PROP,
		"NAME"           => request('name'),
		"ACTIVE"         => "Y", // активен
		"PREVIEW_TEXT"   => "",
		"DETAIL_TEXT"    => ""
	);
	
	if($RESULT_ID = $el->Add($arLoadProductArray)) {
		$echo['result'] = "ok"; 
		
		ob_start();
		result($RESULT_ID);
		$RESULT_SHORT = ob_get_contents();
		ob_end_clean();
		
		$echo['text'] .= "<div class='result-short'>".$RESULT_SHORT."</div>"; 
		
		
		//свойства теста
		$rsTests = CIBlockElement::GetList(
			array(),
			array('IBLOCK_ID' => 13,'ID' => $arItem['PROPERTY_TEST_ID']), 
			false, 
			false, 
			array('IBLOCK_ID', 'ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_MOTIVATOR_RESULT_FULL')
		);
		$arTest = $rsTests->GetNext();
		
		
		//мотиватор для регистрации и получения полных результатов
		$echo['text'] .= "<div class='test-motivator test-motivator-short'>";
		if(empty($UserId)) {
			if(!empty($arTest["~PROPERTY_MOTIVATOR_RESULT_FULL_VALUE"]["TEXT"])) {
				$echo['text'] .= '<div class="motivator-full">'.$arTest["~PROPERTY_MOTIVATOR_RESULT_FULL_VALUE"]["TEXT"].'</div>';
			}
			else {
				$echo['text'] .= "
				<div class='motivator-full'>
				Для получения подробного результата тестирования <a href='/reg/' title='Регистрация' class='underline'>зарегистрируйтесь</a> на сайте (потребуется только e-mail).<br>
				<p class='small'>Мы не передаем данные третьим лицам и не используем их в коммерческих целях!</p>
				</div>
				"; 	
			}	
		}
		
		if($USER->IsAuthorized()) {
			$echo['text'] .= " Посмотреть подробные <a href='/personal/results/".$RESULT_ID."/'>результаты тестирования в личном кабинете</a>";  // если пользователь зарегистрирован добавляем ссылку на страницу результатов в личном кабинете
		}
		$echo['text'] .= "</div>";
		
		
		
	}
	else  {
		$echo['result'] = "error"; 
		$echo['text'] .= "Результаты НЕ внесены в систему (Ошибка: ".$el->LAST_ERROR."). ";
	}

	unset($DATA);
	echo json_encode($echo, JSON_UNESCAPED_UNICODE);
	return;	

	
}

	
	

//$echo = print_r($in, true).PHP_EOL;
//$echo .= "check = ".$check.PHP_EOL;
//$echo .= "ID = ".$DATA['ID'].PHP_EOL;
//$echo .= "NAME = ".$DATA['NAME'].PHP_EOL;



