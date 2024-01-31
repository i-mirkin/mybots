<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule("sale");
global $USER;
$UserId = $USER->GetID();
$FUserId = CSaleBasket::GetBasketUserID();

global $APPLICATION;

if(!empty($UserId)) {
		
		$FUserId = CSaleBasket::GetBasketUserID();
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
			CIBlockElement::SetPropertyValuesEx($arFields['ID'], false, array("PROPERTY_USER_ID_VALUE"=>$UserID, "PROPERTY_FUSER_ID" => ""));
			if( $i > 0 ) LocalRedirect("/personal/results/");
		}
	
}



