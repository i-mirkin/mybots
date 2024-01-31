<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("TEST");
$APPLICATION->SetPageProperty("bodyClass", "isfullscreen");
// <div ..-bg
// <div container
// <section
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule("sale");
global $USER;

?>

<h5 class="pagetitle"><?$APPLICATION->ShowTitle();?></h5>

<div class="row">
<div class="col s12 pad-0">


<?
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
global $USER;


$res = CIBlockElement::GetList(
		Array("timestamp_x" => "desc"), 
		Array("IBLOCK_ID"=>11, "PROPERTY_USER_ID_VALUE" => $_SESSION['USER_ID'], "PROPERTY_TEST_VALUE" => 103725), 
		false, 
		false, 
		Array("ID", "NAME", "PROPERTY_RESULT_SHORT")
	);
	if($ob = $res->GetNextElement()) {  // есть запись, т.е. пользователь проходил этот тест
		$arFields = $ob->GetFields();
		$DATA['RESULT_SHORT'] = $arFields['~PROPERTY_RESULT_SHORT_VALUE']['TEXT'];
		$lastCurTestId = $arFields['ID']; // последний id пройденного теста для текущего пользователя текущего теста
		echo $lastCurTestId;
		print_r( $arFields);
		$testPassed = true;
	}	
?>
<br>
=======================================
<br>

<?



if($USER->IsAuthorized()) $_SESSION['USER_ID'] = $USER->GetID();
// извлекаем временные результаты
$res = CIBlockElement::GetList(
		Array("timestamp_x" => "desc"), 
		Array("IBLOCK_ID"=>11, "PROPERTY_USER_ID_VALUE" => $_SESSION['USER_ID'], "PROPERTY_TEST_VALUE" => 103716), 
		false, 
		false, 
		Array("ID", "NAME", "PROPERTY_RESULTS_SHORT")
	);
	if($ob = $res->GetNextElement()) {  // есть запись, т.е. пользователь проходил этот тест
		$arFields = $ob->GetFields();
		//echo "<pre>";	print_r($arFields);		echo "</pre>";
		echo $arFields['~PROPERTY_RESULTS_SHORT_VALUE']['TEXT'];
	}	

?>



<?


$UserId = $USER->GetID();
$FUserId = CSaleBasket::GetBasketUserID();

/*
// код другого пользователя
$FUserId = CSaleUser::GetList(['USER_ID' => $UserId])['ID'];
if (!$FUserId) {
    //если он не найден - создадим
    $FUserId = CSaleUser::_Add(['USER_ID' => $UserId]);
}
*/
$FUserId = CSaleBasket::GetBasketUserID(); // код текущего пользователя
echo "USER_ID = ".$UserId;
echo "<br>";
echo "FUSER_ID = ".$FUserId;


/*
if(!empty($UserId)) {
		
		//$FUserId = CSaleBasket::GetBasketUserID();
		//$FUserId = CSaleUser::GetList(['USER_ID' => $UserId])['ID'];
		
		// перезаписываем в инфоблоке результатов с FUSER_ID  на USER_ID
		// 11 - инфоблок результаты тестирования
		$i = 0;
		$res = CIBlockElement::GetList(
			Array(), 
			Array("IBLOCK_ID" => 11, "INCLUDE_SUBSECTIONS" => "Y", "PROPERTY_FUSER_ID" => $FUserId), 
			false, 
			Array(),  
			Array("IBLOCK_ID", "ID", "NAME")
		);
		while($ob = $res->GetNextElement())	{
			$i++;
			$arFields = $ob->GetFields();
			echo "<pre>";
			print_r($arFields);
			echo "</pre>";
			CIBlockElement::SetPropertyValuesEx($arFields['ID'], false, array("USER_ID"=>$UserId));
			CIBlockElement::SetPropertyValuesEx($arFields['ID'], false, array("FUSER_ID" => ""));
			//if( $i > 0 ) LocalRedirect("/personal/results/");
		}
	
}
*/

$array = unserialize( 'a:10:{i:1;s:6:"Нет";i:2;s:4:"Да";i:3;s:6:"Нет";i:4;s:4:"Да";i:5;s:6:"Нет";i:6;s:4:"Да";i:7;s:6:"Нет";i:8;s:4:"Да";i:9;s:6:"Нет";i:10;s:4:"Да";}' );
echo "<pre>";
print_r($array);
echo "</pre>";
/*
Array
(
    [1] => Да
    [2] => Нет
    [3] => Да
)
*/

function howmuch($in, $arNums, $s) { // вх. массив, какие номера массива проверять, что искать (да/нет/0/1 и пр.)
		if(!is_array($in) || !is_array($arNums)) return false;
		$r = 0;
		foreach ($arNums as $num) {
			if($in[$num] == $s) $r++;
		}
		return $r;
	};
	
	
	echo howmuch($array, array(1,3,6,8,9,10), "Да");



?>


</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>