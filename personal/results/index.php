<?
define("NEED_AUTH", true); // выводит CMain::AuthForm выводится system.auth.authorize
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require($_SERVER["DOCUMENT_ROOT"]."/lib/functions.php");
$APPLICATION->SetTitle("Результаты тестов");
$APPLICATION->SetPageProperty("bodyClass", "test");
$APPLICATION->SetPageProperty("bgClass", "");
$APPLICATION->SetPageProperty("containerClass", "padding-top-common");
CModule::IncludeModule("iblock");
// <div ..-bg  /div>
// <div container
// <div section
?>


<div class="row">
<div class="col s12">

<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."personal/personal_menu.php",
		"AREA_FILE_RECURSIVE" => "N",
		"EDIT_MODE" => "html",
	),
	false,
	Array('HIDE_ICONS' => 'Y')
);?>
</div>
</div>

<div class="row">
<div class="col s12">
<h5 class="pagetitle"><?$APPLICATION->ShowTitle();?></h5>
</div>
</div>


<div class="results-list">

<div class="row">
<?if($USER->GetID() > 0):?>
		
		<?if(CIBlockElement::GetList(false, array('IBLOCK_ID' => 11, "PROPERTY_USER_ID" => $USER->GetID()), array('IBLOCK_ID'))->Fetch()['CNT'] <=0 ):?>
			<div class="col s12">
			<h2 class="h5">У Вас нет пройденных тестов.</h2>
			<br>
			<a class="waves-effect waves-light btn red lighten-2" href="/tests/">Тесты</a>
			</div>
		<?else:?>
		
			<?
			$rsItems = CIBlockElement::GetList(
				array('created' => 'DESC'),
				array('IBLOCK_ID' => 11, "PROPERTY_USER_ID" => $USER->GetID()), 
				false, 
				false, 
				array('ID', 'NAME', 'PROPERTY_RESULT_RAW', 'DETAIL_PAGE_URL', 'DATE_CREATE')
			);
			$cell = -1;
			while($arItem = $rsItems->GetNext()){
				//debug($arItem['PROPERTY_RESULT_RAW_VALUE']); //serialize(request('data'))	
				$cell ++;
			?>	
					<?if ($arItem["DATE_CREATE"]) {$pub_date =  FormatDate($GLOBALS['DB']->DateFormatToPhp(CSite::GetDateFormat('FULL')), MakeTimeStamp($arItem["DATE_CREATE"]));}?>
						<div class="col s12 l6">              
							<div class="card darken-1">
								<div class="card-content">
									<h2 class="bot-20 sec-tit"><?=$arItem["NAME"]?></h2>
									<div class="card-result scrollbar-c" id="card-result-<?=$arItem["ID"]?>">
										<?result($arItem["ID"], 'short');?>
									</div>
								</div>
								<div class="card-footer"><div class="card-action"><a class="card-more-link" href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a></div>
								<div class="card-attr"><?=$pub_date?></div></div>
							</div>
						</div>
					<?if($cell%2==1):?><div class="clearfix">&nbsp;</div><?endif?>
			<?	
			}
			?>
		<?endif?>

<?else:?>
	<div class=""></div>
<?endif?>

</div>

</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>