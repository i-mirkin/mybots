<?
$GLOBALS['og_site_name'] = "Персональный раздел осознанного клиента";
$GLOBALS['og_description'] = "Здесь вы можете настроить собственные уведомления, а также найти много другого полезного функционала";
define("NEED_AUTH", true); // выводит CMain::AuthForm выводится system.auth.authorize
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мои записи");
global $USER;
CModule::IncludeModule('iblock');

?>

<h1 class="pagetitle">Бот-записи</h1>

<?
$type = "botitem";

$arOrder = array('DATE_CREATE' => 'DESC');
$arFilter = array('ACTIVE' => 'Y', 'IBLOCK_ID' => 21, 'PROPERTY_USER' => $USER->GetID());
$arSelect = array('IBLOCK_ID','ID','NAME','DETAIL_PAGE_URL','DETAIL_TEXT','DATE_CREATE', 'PROPERTY_FREQ');	
$rsElement = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

while($item = $rsElement->GetNext()):?>

	<div class="card card-item card<?=$item['ID']?> darken-1 <?if($_REQUEST['anchor'] == $item['ID']):?>primary-bg<?endif?>">
		
		<a id="<?=$item['ID']?>"></a>
		
		<div class="card-content">
			<span class="card-title item-name-<?=$item['ID']?>"><?=($item['NAME']=="Без названия")?"":$item['NAME']?></span>
			
			
			
			
			<?if(!empty($item['PROPERTY_FREQ_VALUE'])):?>
				<div class="mt-1">Частота выполнения: <span class="new badge badge-rounded blue-grey lighten-2"><?=$item['PROPERTY_FREQ_VALUE']?></span></div>
			<?endif?>
			
			<div class="mt-1">Дата записи: <span class="new badge badge-rounded blue-grey lighten-2"><?=$item['DATE_CREATE']?></span></div>
			
			
			
			<div class="mt-1 item-detail-<?=$item['ID']?>"><?=$item['DETAIL_TEXT']?></div>		

			<?if(!empty($item['PROPERTY_COMMENT_VALUE'])):?>
			<br>
			<div class="clearfix"></div>
			<div class="speech-bubble speech-left color-black">
				<strong>Ответ администратора:</strong> <br>
				<?=$item['PROPERTY_COMMENT_VALUE']['TEXT']?>			
			</div>
			<div class="clearfix"></div>
			<?endif?>

			
		</div>
		<div class="card-action">
			<a href="#modal-add-item" class="modal-trigger" 
				data-act="edit-item" 
				data-id="<?=$item['ID']?>" 
				data-action="Изменить запись"
				data-type="<?=$type?>"
				data-pagen="<?=$arParams['PAGEN']?>"
				title="Изменить"
			>
				Изменить
			</a>
			<a href="#modal-add-item" class="modal-trigger"
				data-act="remove-item" 
				data-id="<?=$item['ID']?>" 
				data-name="<?=$item['NAME']?>"
				data-action="Удалить запись"
				data-type="<?=$type?>"
				data-pagen="<?=$arParams['PAGEN']?>"
				title="Удалить"
			>
				Удалить
			</a>
		</div>
		
	</div>

	<div class="divider"></div>
	

<?endwhile?>
<a href="#modal-add-item" data-type="botitem" data-act="add-item" data-action="Добавить Бот-запись" class="waves-effect waves-light btn red lighten-2 modal-trigger mt-2" >
Добавить
</a>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>