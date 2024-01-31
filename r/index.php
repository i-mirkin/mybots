<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты тестов по постоянной ссылке");
// <div ..-bg
// <div container
// <section
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
?>

<h5 class="pagetitle"><?$APPLICATION->ShowTitle();?></h5>

<div class="row">
<div class="col s12 pad-0 full-height">


<?

$link = $_SERVER['REQUEST_URI'];

preg_match('/\/(.{26})\//', $link, $matches, PREG_OFFSET_CAPTURE);

if(!empty($matches[1][0])){
	$link = $matches[1][0];

	//находим запись результата теста по LINK
	$res = CIBlockElement::GetList(
		Array("timestamp_x" => "desc"), 
		Array("IBLOCK_ID"=>11, "PROPERTY_LINK" => $link), 
		false, 
		false, 
		Array("ID", "NAME", "PROPERTY_RESULT_SHORT", "PROPERTY_RESULT_FULL", "PROPERTY_RESULT_PERSONAL", "PROPERTY_USER_ID", "PROPERTY_FUSER_ID")
	);
	
	if($ob = $res->GetNextElement()) {  
		$arFields = $ob->GetFields();
		
		if(!empty($arFields['PROPERTY_USER_ID_VALUE'])){
			$rsUser = CUser::GetByID($arFields['PROPERTY_USER_ID_VALUE']);
			$arUser = $rsUser->Fetch();
			echo 'E-mail тестируемого: <span class="highlight accent-bg white-text">'.$arUser["EMAIL"].'</span><br><br>';
		}
		
		
		echo '<strong>Краткие результаты тестирования:</strong><br><br>';
		echo $arFields['~PROPERTY_RESULT_SHORT_VALUE']['TEXT'];
		echo '<br><br>';
		
		
		//адрес сайта с протоколом
		$isHttps = !empty($_SERVER['HTTPS']) && 'off' !== strtolower($_SERVER['HTTPS']);
		if($isHttps) $host = "https://".$_SERVER['HTTP_HOST'];
		else         $host = "http://".$_SERVER['HTTP_HOST']; 
		
		echo "<br>";
		echo "Постоянная ссылка на результат <a href='".$host."/r/".$link ."/' >".$host."/r/".$link ."/</a>";
		echo "<br>";
		echo "Полные результаты тестирования доступны в личном кабинете.";
		
		/*
		if(empty($arFields['PROPERTY_USER_ID_VALUE'])) {
			echo "<br>Полные и персональные результаты по прямой ссылке доступны только для тестов зарегистрированных пользователей";
		}
		else{
			if(!empty($arFields['~PROPERTY_RESULT_FULL_VALUE']['TEXT'])){
			echo "<h5>Полные результаты тестирования</h5>";
			echo $arFields['~PROPERTY_RESULT_FULL_VALUE']['TEXT'];	
			}
			if(!empty($arFields['~PROPERTY_RESULT_PERSONAL_VALUE']['TEXT'])){
			echo "<h5>Персональные результаты тестирования</h5>";
			echo $arFields['~PROPERTY_RESULT_PERSONAL_VALUE']['TEXT'];
			}
		}
		*/
		
		//echo $_SESSION['USER_ID']." === ".$arFields['PROPERTY_USER_ID_VALUE'];
		
	}	
	else {
		echo "Такой записи не существует";
	}
}
else {
	echo "Такой записи не существует";
}



?>

	
</div>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>