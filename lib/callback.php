<?php
//if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule("sale");



$arResult = array("RESULT" => "ok", "MESSAGE" => "");
$to = "i.mirkin@yandex.ru";
$from = "info@clinli.ru";

switch($_POST["act"]) {

case "add-category": /////////////////////////////////// case "add-category" START
	
	global $USER;
	if(!$USER->IsAuthorized()){
		echo json_encode(array("RESULT" => "error", "MESSAGE" => "Для добавления/редактирования записи необходимо <a href='/login/' title='Войти'>войти</a> или <a href='/reg/'  title='Зарегистрироваться'>зарегистрироваться</a>"), JSON_UNESCAPED_UNICODE);
		return;
	} 

	$el = new CIBlockElement;	
	$PROP = array();
	$PROP[88] = $_POST['user'];
	$PROP[89] = $_POST['color'];
	$arLoadProductArray = Array(
		"IBLOCK_SECTION_ID" => false, //элемент лежит в корне раздела
		"IBLOCK_ID"      => 17, 
		"PROPERTY_VALUES"=> $PROP,
		"NAME"           => $_POST['name'],
		"ACTIVE"         => "Y"
	);
	if($RESULT_ID = $el->Add($arLoadProductArray)) {
		echo json_encode(array("RESULT" => "ok", "MESSAGE" => "Категория добавлена. Добавьте еще или вернитесь к редактированию записи.", "ID" => $RESULT_ID), JSON_UNESCAPED_UNICODE);
	}
	else {
		echo json_encode(array("RESULT" => "error", "MESSAGE" => "Error: ".$el->LAST_ERROR), JSON_UNESCAPED_UNICODE);
	}
	return;
break; /////////////////////////////////// case "add-category" END


/*
case "add-goal": /////////////////////////////////// case "add-goal" START DINAMICLY!!!
	$el = new CIBlockElement;	
	$PROP = array();
	$PROP[87] = $_POST['user'];
	$arLoadProductArray = Array(
		"IBLOCK_SECTION_ID" => false, //элемент лежит в корне раздела
		"IBLOCK_ID"      => 16, 
		"PROPERTY_VALUES"=> $PROP,
		"NAME"           => $_POST['name'],
		"ACTIVE"         => "Y"
	);
	if($RESULT_ID = $el->Add($arLoadProductArray)) {
		echo json_encode(array("RESULT" => "ok", "MESSAGE" => "Цель добавлена. Добавьте еще или вернитесь к редактированию записи.", "ID" => $RESULT_ID), JSON_UNESCAPED_UNICODE);
	}
	else {
		echo json_encode(array("RESULT" => "error", "MESSAGE" => "Error: ".$el->LAST_ERROR), JSON_UNESCAPED_UNICODE);
	}
	return;
break; /////////////////////////////////// case "add-goal" END
*/



case "remove-item": /////////////////////////////////// case "remove-item" START

	global $USER;
	if(!$USER->IsAuthorized()){
		echo json_encode(array("RESULT" => "error", "MESSAGE" => "Для добавления/редактирования записи необходимо <a href='/login/' title='Войти'>войти</a> или <a href='/reg/'  title='Зарегистрироваться'>зарегистрироваться</a>"), JSON_UNESCAPED_UNICODE);
		return;
	} 
		
		
	$ID = $_POST['id'];
	if($type == 'botitem') $AFTERACTION = 'reload';
	if(CIBlockElement::Delete($ID)) {
		echo json_encode(array("RESULT" => "ok", "ACT" => "remove-item", "MESSAGE" => "Запись успешно удалена: id=".$ID, "ID" => $ID, "PAGEN" => $pagen, "AFTERACTION" => $AFTERACTION), JSON_UNESCAPED_UNICODE);
	}
	else {
		echo json_encode(array("RESULT" => "error", "ACT" => "remove-item", "MESSAGE" => "Ошибка при удалении записи(".$ID."): ".$el->LAST_ERROR, "ID" => $ID), JSON_UNESCAPED_UNICODE);
	}
break; /////////////////////////////////// case "remove-item" END




case "add-item": /////////////////////////////////// case "add-item edit-item" START
case "edit-item": 
	
	global $USER;
	if(!$USER->IsAuthorized()){
		echo json_encode(array("RESULT" => "error", "MESSAGE" => "Для добавления/редактирования записи необходимо <a href='/login/' title='Войти'>войти</a> или <a href='/reg/'  title='Зарегистрироваться'>зарегистрироваться</a>"), JSON_UNESCAPED_UNICODE);
		return;
	} 
	
	$el = new CIBlockElement;
	$PROP = array();
	$ID = $_POST['id'];
	$pagen = empty($_POST['pagen'])?1:$_POST['pagen'];
	$type = $_POST['type']; // diary, task и т.д. тип записи
	
	if($type == 'botitem'){
		$PROP = array();
		$PROP[105] = $_POST['user'];
		$PROP[107] = $_POST['freq'];
		$IBLOCK_ID = 21;
		$AFTERACTION = 'reload';
	}
	
	elseif($type == 'category') {
		$IBLOCK_ID = 17;	
		$PROP[88] = $_POST['user']; //Пользователь
		$PROP[89] = $_POST['color']; //Цвет
	}

	elseif($type == 'goal') {
		$IBLOCK_ID = 16;
		$PROP[87] = $_POST['user']; //Пользователь
		$PROP[99] = $_POST['term'] . " " . $_POST['term-time']; //Срок
	} 
	
	else {
		$IBLOCK_ID = 18;
		$PROP[99] = $_POST['term'] . " " . $_POST['term-time']; //Срок
		$PROP[90] = $_POST['user']; //Пользователь
		
		$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>$IBLOCK_ID, "EXTERNAL_ID"=> $_POST['type']));
		$enum_fields = $property_enums->Fetch();
		$PROP[94] = $enum_fields['ID'] ; //id типа записи: 

			//$parts = date_parse_from_format("Y-m-d", $_POST['date']);
		$PROP[95] = date_format(date_create($_POST['date']),"d.m.Y"); //  $parts['day'].'.'.$parts['month'].'.'.$parts['year']; //Дата записи, не дата создания // в поле дата важо вносить 01.04.2021
		$PROP[100] = $_POST['category']; //ИД категории
		$PROP[92] = $_POST['comment']; //Комментарий администратора
		$PROP[93] = $_POST['goal']; //ИД цели
		$PROP[96] = $_POST['completion']; //Степень выполненности
		$PROP[97] = $_POST['work']; //Что сделано

		$uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/tmp';
		foreach ($_FILES["files"]["error"] as $key => $error) {
				if ($error == UPLOAD_ERR_OK) {
						$tmp_name = $_FILES["files"]["tmp_name"][$key];
						// basename() может предотвратить атаку на файловую систему;
						// может быть целесообразным дополнительно проверить имя файла
						$file_name = basename($_FILES["files"]["name"][$key]);
						move_uploaded_file($tmp_name, "$uploads_dir/$file_name");
						$PROP[98][] = CFile::MakeFileArray("$uploads_dir/$file_name");
				}
		}
	}
	
	$name = $_POST['name'];
	if(empty( $_POST['name'])) $name = "Без названия"; 

	$arLoadProductArray = Array(
		"IBLOCK_SECTION_ID" => false, // элемент лежит в корне раздела
		"IBLOCK_ID"      => $IBLOCK_ID, 
		"PROPERTY_VALUES"=> $PROP,
		"NAME"           => $name,
		"ACTIVE"         => "Y", // активен
		"PREVIEW_TEXT"   => "",
		"DETAIL_TEXT"    => $_POST['detail']
	);

		
	if($_POST['act'] == 'add-item'){
		if($RESULT_ID = $el->Add($arLoadProductArray)) {
			//echo json_encode(array("RESULT" => "ok", "MESSAGE" => "Запись успешно добавлена ".print_r($PROP, true), "ID" => $RESULT_ID), JSON_UNESCAPED_UNICODE);
			echo json_encode(array("RESULT" => "ok", "MESSAGE" => "Запись успешно добавлена.<br> Добавьте еще или закройте окно.", "ID" => $RESULT_ID, "AFTERACTION" => $AFTERACTION), JSON_UNESCAPED_UNICODE);
		}
		else {
			echo json_encode(array("RESULT" => "error", "MESSAGE" => "Ошибка при добавлении записи: ".$el->LAST_ERROR), JSON_UNESCAPED_UNICODE);
		}
	}

	elseif($_POST['act'] == 'edit-item'){
		if($el->Update($ID, $arLoadProductArray)) {
			echo json_encode(array("RESULT" => "ok", "MESSAGE" => "Запись успешно обновлена", "ID" => $ID, "PAGEN" => $pagen, "AFTERACTION" => $AFTERACTION), JSON_UNESCAPED_UNICODE);
		}
		else {
			echo json_encode(array("RESULT" => "error", "MESSAGE" => "Ошибка обновления: ".$el->LAST_ERROR, "ID" => $ID), JSON_UNESCAPED_UNICODE);
		}
		//CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, false, array($PROPERTY_CODE => $PROPERTY_VALUE));
	}
	
	else {
		echo json_encode(array("RESULT" => "error", "MESSAGE" => "Вообще хуйня какая-то"), JSON_UNESCAPED_UNICODE);
	}
break; /////////////////////////////////// case "add-item edit-item" END

case "payconfirm": /////////////////////////////////// подтверждение оплаты
	$ELEMENT_ID = $_POST['id'];
	//$PROP[119] = $_POST['card']; //ИД категории
	
	CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, false, array("PAYCONFIRM" => $_POST['card']));
	
	echo json_encode(array("RESULT" => "ok", "MESSAGE" => "Мы уже проверяем! В течение нескольких минут доступ будет открыт - на Ваш email придет уведомление!<br> Если возникла проблема, <a data-action='Ошибка при оплате' href='#modal-order' class='underline modal-trigger' data-message='Ошибка при оплате ".$ELEMENT_ID."'>сообщите</a>, пожалуйста об этом!", "ID" => $ID), JSON_UNESCAPED_UNICODE);
	

break;



default:
//case "message": /////////////////////////////////// case "message" START
$subject = "CLINLI.RU [ORDER]";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";
$headers .= "From: " . $from . "\r\n";
$headers .= "Reply-To: " . $from . "\r\n";


$message = "Заявка с сайта CLINLI.RU\n";

foreach($_POST as $key => $value) {
	$message.= "\n".$key.": ".$value."\n";
}

if(isset($_FILES['files'])){

	$boundary = md5(date('r', time()));
  $filesize = 0;
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "From: " . $from . "\r\n";
  $headers .= "Reply-To: " . $from . "\r\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
  $message="
Content-Type: multipart/mixed; boundary=\"$boundary\"

--$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

$message";
  for($i=0;$i<count($_FILES['files']['name']);$i++) {
      if(is_uploaded_file($_FILES['files']['tmp_name'][$i])) {
         $attachment = chunk_split(base64_encode(file_get_contents($_FILES['files']['tmp_name'][$i])));
         $filename = $_FILES['files']['name'][$i];
         $filetype = $_FILES['files']['type'][$i];
         $filesize += $_FILES['files']['size'][$i];
         $message.="

--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"

$attachment";
     }
   }
   $message.="
--$boundary--";

}

if(isset($_POST["phone"]) && strlen($_POST["phone"]) < 5) {
	$arResult["RESULT"] = "error";
	$arResult["MESSAGE"] = "Введите номер телефона";
}
elseif(isset($_POST["contact"]) && strlen($_POST["contact"]) < 3) {
	$arResult["RESULT"] = "error";
	$arResult["MESSAGE"] = "Введите контакты для связи";
}
else{
	if(mail($to, $subject, $message, $headers, "-f info@".$_SERVER["SERVER_NAME"])) {
		$arResult["RESULT"] = "ok";
		$arResult["MESSAGE"] = "Сообщение успешно отправлено. Мы скоро свяжемся с Вами.";
		
		$arLoadProductArray = Array(
		"IBLOCK_SECTION_ID" => false, // элемент лежит в корне раздела
		"IBLOCK_ID"      => 22, 
		"NAME"           => $_POST["info"].' '.$_POST["name"],
		"ACTIVE"         => "Y", // активен
		"PREVIEW_TEXT"   => "",
		"DETAIL_TEXT"    => $message
		);
		$el = new CIBlockElement;	
		$RESULT_ID = $el->Add($arLoadProductArray);
	}
	else {
		$arResult["RESULT"] = "ok";
		$arResult["MESSAGE"] = "Ошибка отправки, попробуйте позже.";
	}
}

echo json_encode($arResult);
break; /////////////////////////////////// case "message" END

}


//}
/*
else {
	echo "Ошибка _SERVER отправки, попробуйте позже.";
}  //$_SERVER['HTTP_X_REQUESTED_WITH']
*/
?>