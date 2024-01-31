<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мои записи");
global $USER;
CModule::IncludeModule('iblock');


if(!empty($_REQUEST['TYPE'])){
	$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>18, "EXTERNAL_ID"=>$_REQUEST['TYPE'])); //if $_REQUEST['TYPE'] == "" выбирает все записи
	$enum_fields = $property_enums->Fetch();
}
?>




<?if(empty($USER->GetID())):?>

	<div class="card card-diary card-style">
		<div class="content mb-4">
			<h2 class="font-600">Доступ закрыт</h2>
			<p>Надо <a href="/auth/">войти</a> или <a href="/auth/?register=yes">зарегистрироваться</a>.</p>
		</div>
	</div>

<?else:?>

	<h1 class="pagetitle"><?=empty($_REQUEST['TYPE'])?'Все записи':$ar_title_by_type[$_REQUEST['TYPE']]?></h1>
	
	<div class="fastfilter">
		<a href="/personal/items/">Все записи</a> &nbsp;&nbsp; | &nbsp;&nbsp;
		<a href="/personal/items/goal/">Цели</a> &nbsp;&nbsp; | &nbsp;&nbsp;
		<a href="/personal/items/reminder/">Напоминания</a> &nbsp;&nbsp; | &nbsp;&nbsp;
		<a href="/personal/items/task/">Задачи</a> &nbsp;&nbsp; | &nbsp;&nbsp;
		<a href="/personal/items/event/">Мероприятия</a> 
	</div>
	

	<?
	$arParams['PROPERTY_TYPE'] = empty($_REQUEST['TYPE'])?'':$enum_fields['ID'];
	$arParams['IBLOCK_ID'] = empty($_REQUEST['TYPE'])?18:$ar_iblock_id_by_type[$_REQUEST['TYPE']]; // look for init.php: category(17), goal(16) and other(18)

	$arParams['PAGEN'] = (!empty($_REQUEST['PAGEN_1']))?$_REQUEST['PAGEN_1']:1;

	$arParams['COUNT_ON_PAGE'] = 20;
	$arResult['ITEMS'] = array();

	$arOrder = array('DATE_CREATE' => 'DESC');
	$arFilter = array(		
		'ACTIVE' => 'Y',
		'IBLOCK_ID' => $arParams['IBLOCK_ID'],
		'PROPERTY_USER' => $USER->GetID(),
		'PROPERTY_TYPE' => $arParams['PROPERTY_TYPE'],
	);
		
	$arSelect = array('IBLOCK_ID','ID','NAME','DETAIL_PAGE_URL','PREVIEW_TEXT','DETAIL_TEXT','DATE_CREATE', 'PROPERTY_USER', 'PROPERTY_TYPE', 'PROPERTY_CATEGORY', 'PROPERTY_GOAL', 'PROPERTY_COMMENT', 'PROPERTY_TERM');
	$arGroupBy = false; //default = false
	$arNavStartParams = array(//default = false
			'iNumPage' => $arParams['PAGEN'], //номер страницы при постраничной навигации
			'nPageSize' => $arParams['COUNT_ON_PAGE'], //количество элементов на странице при постраничной навигации
	);


	if(CIBlockElement::GetList($arOrder, $arFilter, array('IBLOCK_ID'))->Fetch()['CNT'] > 0):


		$rsElement = CIBlockElement::GetList($arOrder, $arFilter, $arGroupBy, $arNavStartParams, $arSelect);

		while($arElement = $rsElement->GetNext()){
						//$arItem = $obElement->GetFields();
						//$arItem['PROP'] = $obElement->GetProperties(); //Получение свойств
						$arResult['ITEMS'][] = $arElement;		
		}
		$arResult['NAV_STRING'] = $rsElement->GetPageNavString('');
		?>

		<?foreach($arResult['ITEMS'] as $item):?>
			
			<?
			
			//алиас типа записи
			if($_REQUEST['TYPE'] != 'category' && $_REQUEST['TYPE'] != 'goal'){
				$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>18, "VALUE"=>$item['PROPERTY_TYPE_VALUE']));
				$enum_fields = $property_enums->Fetch();
				$type = strtolower($enum_fields['EXTERNAL_ID']);	
			}
			else {
				$type = $_REQUEST['TYPE'];
			}
			
			$categoryName = "";
			$goalName = "";
			if($item['PROPERTY_CATEGORY_VALUE'] > 0){
				$res_category = CIBlockElement::GetList(Array(), Array('IBLOCK_ID'=>17, 'ID' => $item['PROPERTY_CATEGORY_VALUE']),	false, false,	Array('ID', 'NAME'));
				if($item_category = $res_category->GetNext()) $categoryName = $item_category['NAME'];		
			}

			if($item['PROPERTY_GOAL_VALUE'] > 0){
				$res_goal = CIBlockElement::GetList(Array(), Array('IBLOCK_ID'=>16, 'ID' => $item['PROPERTY_GOAL_VALUE']),	false, false,	Array('ID', 'NAME'));
				if($item_goal = $res_goal->GetNext()) $goalName = $item_goal['NAME'];		
			}
			?>
			
			
			
			
			
			<div class="card card-item card<?=$item['ID']?> darken-1 <?if($_REQUEST['anchor'] == $item['ID']):?>primary-bg<?endif?>">
				
				<a id="<?=$item['ID']?>"></a>
				
				<div class="card-content">
					<span class="card-title item-name-<?=$item['ID']?>"><?=($item['NAME']=="Без названия")?"":$item['NAME']?></span>
					
					
					
					
					<?if(!empty($item['PROPERTY_TERM_VALUE'])):?>
						<div class="mt-1">Срок выполнения: <span class="new badge badge-rounded blue-grey lighten-2"><?=$item['PROPERTY_TERM_VALUE']?></span></div>
					<?endif?>
					
					<div class="mt-1">Дата записи: <span class="new badge badge-rounded blue-grey lighten-2"><?=$item['DATE_CREATE']?></span></div>
					
					<?if(!empty($categoryName)):?>
					<br><span class="new badge badge-rounded blue-grey lighten-2"><?=$categoryName?></span> 
					<?endif?>
					
					<?if(!empty($goalName)):?>
					<br><span class="new badge badge-rounded blue-grey lighten-2"><?=$goalName?></span>
					<?endif?>
					
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


		<?endforeach?>
				

		<?=$arResult['NAV_STRING']?>

	<?else: // CNT < 0?>


	<div class="card card-style">
		<div class="content mb-4">
			<h4 class="font-600">В данном разделе нет элементов</h4>
			<p class="opacity-80">	В нижнем меню нажмите «Добавить» и выберите тип добавляемого объекта.</p>
		</div>
	</div>


	<?endif // CNT > 0 ?>



<?endif //empty($USER->GetID())?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>