<?
define("NEED_AUTH", true); // выводит CMain::AuthForm выводится system.auth.authorize
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require($_SERVER["DOCUMENT_ROOT"]."/lib/functions.php");

$APPLICATION->SetTitle("Результаты тестов");
$APPLICATION->SetPageProperty("bodyClass", "test");
$APPLICATION->SetPageProperty("bgClass", "");
$APPLICATION->SetPageProperty("containerClass", "padding-top-common");

use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule("sale");
global $USER;
$FUserId = CSaleBasket::GetBasketUserID();

// <div ..-bg  /div>
// <div container
// <div section

// в $_GET['ID'] преедается ID РЕЗУЛЬТАТ_ТЕСТА согдасно urlrewrite.php

$ID_TEST_RESULT = $_GET['ID'];


?>


<?//if($_SERVER['REMOTE_ADDR'] == '188.242.149.209'):?>
<?if(true):?>
	
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

<div class="personal-results-s">
	<div class="row bot-0">
		<?
		//свойства результата теста
		$rsItems = CIBlockElement::GetList(
		array(),
		array('IBLOCK_ID' => 11, "ID" => $_GET['ID']), 
		false, 
		false, 
		array(
			'ID', 
			'NAME', 
			'PROPERTY_TEST.ID', // на выходе [PROPERTY_TEST_ID] => 322709 
			'PROPERTY_TEST.CODE',  // на выходе [PROPERTY_TEST_CODE] => mmpi-short
			'PROPERTY_RESULT_RAW', 
			'DETAIL_PAGE_URL', 
			'PROPERTY_LINK', 
			'PROPERTY_USER_ID', 
			'PROPERTY_FUSER_ID', 
			'PROPERTY_RESULT_SHORT', // вручную дописанные результаты
			'PROPERTY_RESULT_FULL', // вручную дописанные результаты
			'PROPERTY_RESULT_EXTENDED', // вручную дописанные результаты
			'PROPERTY_RESULT_MAXIMUM', // вручную дописанные результаты
			'PROPERTY_PAID_RESULT', // оплачен ли результат
			'PROPERTY_LINK',
			'DATE_CREATE',
			'ACTIVE_FROM',
		)
		);
		$arItem = $rsItems->GetNext();
		
		
		//свойства теста
		$rsTests = CIBlockElement::GetList(
		array(),
		array('IBLOCK_ID' => 13,'ID' => $arItem['PROPERTY_TEST_ID']), 
		false, 
		false, 
		array(
			'IBLOCK_ID', 
			'ID', 
			'NAME', 
			'DETAIL_PAGE_URL', 
			'PROPERTY_HAS_RESULT_EXTENDED', 
			'PROPERTY_PRICE_RESULT_EXTENDED', 
			'PROPERTY_PRICE_OLD_RESULT_EXTENDED', 
			'PROPERTY_MOTIVATOR_RESULT_EXTENDED', 
			'PROPERTY_HAS_RESULT_MAXIMUM',
			'PROPERTY_PRICE_RESULT_MAXIMUM',
			'PROPERTY_MOTIVATOR_RESULT_MAXIMUM', 
			'PROPERTY_RESULT_SAMPLE',
			'PROPERTY_RESULT_SAMPLE_IMG',
			'PROPERTY_SECTION',
			'PROPERTY_SECTION_ENUM_ID',
		)
		);
		$arTest = $rsTests->GetNext();
		//debug($arTest);
		//debug($arItem);
		//PROPERTY_SECTION_VALUE_ID PROPERTY_SECTION_ENUM_ID
		$section_xmls = CIBlockPropertyEnum::GetList(
		 Array(),
		 Array("IBLOCK_ID" => 13, "ID" => $arTest['PROPERTY_SECTION_ENUM_ID'])
		);
		$section_xml = $section_xmls->GetNext();
		//debug($section_xml['XML_ID']);
		
		$APPLICATION->SetTitle($arItem['NAME']);
		$APPLICATION->SetPageProperty("title", $arItem['NAME']);
		?>
		
		<?
		$access = true;
		if($USER->IsAdmin()) $access = true;
		elseif ($arItem['PROPERTY_USER_ID_VALUE'] != $USER->GetID() && $arItem['PROPERTY_FUSER_ID_VALUE'] != $FUserId) $access = false;
		?>
		
		<?if(!$access):?>
			<div class="col s12">
				<p>Доступ закрыт.</p>
			</div>
		<?else:?>
		
			<div class="col s12 m8 offset-m2 text-center">
					<?
					if($USER->IsAdmin()):
					$rsUser = CUser::GetByID($arItem['PROPERTY_USER_ID_VALUE']);
					$arUser = $rsUser->Fetch();
					?>
					<div class="">
						[<?=$arUser['LOGIN']?> IDрезультата=<?=$_GET['ID']?> IDтеста=<?=$arItem['PROPERTY_TEST_ID']?>]
					</div>
					<?endif?>
					
					
					<? $pub_date = '';	if ($arItem["ACTIVE_FROM"])	$pub_date = $arItem["ACTIVE_FROM"];	elseif ($arItem["DATE_CREATE"])	$pub_date = $arItem["DATE_CREATE"]; ?>
					<span class="small date"><?=$pub_date?></span>
					<span class="small tags">
						<a class="small" href="/tests/">Тесты</a>, 
						<a class="small" href="/tests/filter/section-is-<?=$section_xml['XML_ID']?>/apply/"><?=$arTest['PROPERTY_SECTION_VALUE']?></a>
						<a class="small" href="<?=$arTest['DETAIL_PAGE_URL']?>"><?=$arItem["NAME"]?></a>
					</span>
			</div>

			<div class="col s12">		

					<ul class="collapsible expandable">

					<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-square-edit-outline"></i>Краткие результаты тестирования</div>
						<div class="collapsible-body ">
							<span>
								<div class='personal-RESULT__short'>
									<?result($_GET['ID'], 'short');?>
								</div>
							</span>
						</div>
					</li>
					
					<br>

					
					
					<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-file-outline"></i>Полные результаты тестирования</div>
						<div class="collapsible-body ">
							<span>
								<div class='personal-RESULT__full'>
									<?result($_GET['ID'], 'full');?>
								</div>
							</span>
						</div>
					</li>
					
					
					<?if($arTest['PROPERTY_HAS_RESULT_EXTENDED_VALUE'] == 'Да'): //если тест имеет расширенные результаты ?>
						<br>
						<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-file-multiple"></i><span>Расширенные результаты тестирования</span></div>
						<div class="collapsible-body ">
						<a name="extended"></a>
							
						
							<?if($arItem['PROPERTY_PAID_RESULT_VALUE'] == 'Да'): //доступ к расширенным рез-м открыт / результат оплачен?>
								<span>
									<div class='personal-RESULT__full'>
										<?result($_GET['ID'], 'extended');?>
									</div>
									<div class="">
										<?=$arItem["~PROPERTY_RESULT_EXTENDED_VALUE"]["TEXT"]?>
									</div>
								</span>
							<?else: //доступ к расширенным результатм закрыт ?>  
						
								<div class="personal-results-motivator">
									<?=$arTest["~PROPERTY_MOTIVATOR_RESULT_EXTENDED_VALUE"]["TEXT"]?>
									
								</div>
								
								<?if(!empty($arTest["PROPERTY_RESULT_SAMPLE_IMG_VALUE"])): // если есть картинки отображаем их?>
								
										<?
										$sliderImg = array();
										if(!empty($sliderImg[0] = $arTest["PROPERTY_RESULT_SAMPLE_IMG_VALUE"])) {
											while ($ob = $rsTests->GetNext()){
												$sliderImg[] = $ob['PROPERTY_RESULT_SAMPLE_IMG_VALUE'];
											}
										}
										CFile::GetFileArray($img)["SRC"]
										?>
										
										<?
										foreach($sliderImg as $key => $img):
										$img_src = CFile::GetFileArray($img)["SRC"];
										?>		
											<a href="<?=$img_src?>" 
												data-fancybox="gallery" 
												data-caption="Пример результатов" 
												<?if($key == 0):?>class="underline"<?endif?>  
												<?if($arTest['ID'] == 10371):?> <?//для MMPI отслеживаем клики?> 	
													onclick="ym(67293874,'reachGoal','SHOW_MMPI_EXAMPLE_EXTENDED'); return true;"
												<?else:?> <?//для ДРУГИХ тоже отслеживаем клики?> 	
													onclick="ym(67293874,'reachGoal','SHOW_ANY_EXAMPLE_EXTENDED'); return true;"
												<?endif?>	
											>
												<?if($key == 0):?>Пример результатов<?endif?>
											</a>
										<?endforeach?>
								
								<?elseif(!empty($arTest["~PROPERTY_RESULT_SAMPLE_VALUE"]["TEXT"])): // еесли картинок нет и заполнена текстовая часть, отображаем текстовое содержимое ?>
										<a href="#modal-sample" 
											class="underline modal-trigger"
											<?if($arTest['ID'] == 10371):?> <?//для MMPI отслеживаем клики?> 	
												onclick="ym(67293874,'reachGoal','SHOW_MMPI_EXAMPLE_EXTENDED'); return true;"
											<?else:?> <?//для ДРУГИХ отслеживаем клики?> 	
												onclick="ym(67293874,'reachGoal','SHOW_ANY_EXAMPLE_EXTENDED'); return true;"
											<?endif?>										
										>
										Пример расширенных результатов
										</a>
										<div id="modal-sample" class="modal"> 
											<div class="modal-content ">
												<button type="button" class="modal-close waves-effect waves-red btn-flat"><i class="mdi mdi-close"></i></button>
												<h4 class="bot-20 sec-tit">Пример расширенных результатов<br><?=$arTest['NAME']?></h4>
												<div class='personal-RESULT__full'>
													<?=$arTest["~PROPERTY_RESULT_SAMPLE_VALUE"]["TEXT"]?>	
												</div>
											</div>
										</div>
								<?endif // если есть картинки ... ?>		
							
							<br>
							<br>
							
							
							
							
							<?
							$OutSum = $arTest['PROPERTY_PRICE_RESULT_EXTENDED_VALUE'];
							
							$out_sum = trim(htmlspecialchars(strip_tags($OutSum))); //цена
							$mrh_login = "CLINLI";
							$mrh_pass1 = "fmiHr4H98PpYVtM8wJg0"; // work
							//$mrh_pass1 = "FSPDb7M5s6cXQU0Gw5GB"; // test
							$inv_id = $ID_TEST_RESULT; //уникальный идентификатор операции
							
							$items = array (
								'items' => array (
									0 => array (
										'name' => 'Консультация',
										'quantity' => 1,
										'sum' => 	$out_sum,
										'payment_method' => 'full_payment',
										'payment_object' => 'payment',
										'tax' => 'none',
										 ),
									),
							);
							$arr_encode = json_encode($items);
							$receipt = urlencode($arr_encode);
							$receipt_urlencode = urlencode($receipt);
							
							$inv_desc = 'Консультация';
							
							$crc = md5("$mrh_login:$out_sum:$inv_id:$receipt:$mrh_pass1");
							$url = "https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=$mrh_login&OutSum=$out_sum&InvId=$inv_id&Receipt=$receipt_urlencode&Description=$inv_desc&SignatureValue=$crc";
							
							//$crc = md5("$mrh_login:$out_sum:$inv_id:$mrh_pass1");
							//$url = "https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=$mrh_login&OutSum=$out_sum&InvId=$inv_id&Description=$inv_desc&SignatureValue=$crc"; // без фискализации
							?>
							
							
							<div class="row">
								<div class="col s12 m12 l6">
									<div class="icon-block block left z-depth-1">
										
										<?if($arTest['PROPERTY_PRICE_OLD_RESULT_EXTENDED_VALUE'] > 0):?>
										<p class="personal-results-discount">-<?=ceil(($arTest['PROPERTY_PRICE_OLD_RESULT_EXTENDED_VALUE'] - $arTest['PROPERTY_PRICE_RESULT_EXTENDED_VALUE'])/$arTest['PROPERTY_PRICE_OLD_RESULT_EXTENDED_VALUE']*100)?>%</p>
										<p class="personal-results-price"><?=$arTest['PROPERTY_PRICE_RESULT_EXTENDED_VALUE']?> руб.</p>
										<p class="personal-results-price-old"><?=$arTest['PROPERTY_PRICE_OLD_RESULT_EXTENDED_VALUE']?> руб.</p>
										<?endif?>
										
										<p><b>Открыть доступ к расширенным результатам [<?=$OutSum?> руб.]:</b> </p>
										<a href="<?=$url?>" class="waves-effect waves-light btn secondary" title="Оплатить расширенные результаты тестирования">Оплатить</a>
									</div>
								</div>
							</div>
							
							
							
							
							
							
							
							
							
							
							
						<?endif //доступ к расширенным рез-м ?>
						

						
						</div>
						</li>
					<?endif //если тест имеет расширенные результаты ?>
					
					<?if($arTest['PROPERTY_HAS_RESULT_MAXIMUM_VALUE'] == 'Да'): // если тест имеет максимальные результаты ?>
						<br>
						<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-account-edit"></i><span>Получить рекомендации психолога</span></div>
						<div class="collapsible-body">
						<span>
							<?if(empty($arItem["~PROPERTY_RESULT_MAXIMUM_VALUE"]["TEXT"])):?>
								<p class="small">
								Психолог проанализирует результаты тестирования, даст пояснения по интерсующим вопросам и предоставит рекомендации.<br>
								<strong>Стоимость:</strong> <?=(!empty($arTest['PROPERTY_PRICE_RESULT_MAXIMUM_VALUE'])) ? $arTest['PROPERTY_PRICE_RESULT_MAXIMUM_VALUE'] : '1500'?> рублей. <br>
								<strong>Срок выполнения заказа:</strong> 1-3 дня.</p>
								<br>
								<a class="waves-effect waves-light btn red lighten-2 modal-trigger" data-action="Получить рекомендации психолога" href="#modal-order">Заказать</a>
							<?else:?>
								<?=$arItem['~PROPERTY_RESULT_MAXIMUM_VALUE']['TEXT']?>
							<?endif?>
						</span>
						</div>
						</li>
						
						<br>
						<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-account-switch"></i><span>Получить консультацию психолога</span></div>
						<div class="collapsible-body">
						<span>
							<?if(empty($arItem["~PROPERTY_RESULT_MAXIMUM_VALUE"]["TEXT"])):?>
								<p class="small">
								Оставьте заявку, специалист свяжется с Вами и договорится об удобном времени и способе связи.<br>
								<strong>Стоимость: 3700 рублей. <br>
								<br>
								<a class="waves-effect waves-light btn red lighten-2 modal-trigger" data-action="Записаться к психологу" href="#modal-callback">Записаться к психологу</a>
							<?else:?>
								<?=$arItem['~PROPERTY_RESULT_MAXIMUM_VALUE']['TEXT']?>
							<?endif?>
						</span>
						</div>
						</li>
					
					<?endif // если тест имеет максимальные результаты ?>
					
				
					</ul>

					<div class="spacer"></div>
					
					<?
					//адрес сайта с протоколом
					$isHttps = !empty($_SERVER['HTTPS']) && 'off' !== strtolower($_SERVER['HTTPS']);
					if($isHttps) $host = "https://".$_SERVER['HTTP_HOST'];
					else         $host = "http://".$_SERVER['HTTP_HOST']; 
					?>
					
					<div class="truncate">Пост. ссылка на результат<br> <a href='<?=$host?>/r/<?=$arItem["PROPERTY_LINK_VALUE"]?>/' title='Откроется в новом окне' target='_blank'><?=$host?>/r/<?=$arItem["PROPERTY_LINK_VALUE"]?>/</a></div>
					
					<div class="divider"></div>
					
			</div>
		<?endif // $access?>

	</div> <? // row ?>
</div> <? // personal-results-s ?>

<div id="orderTestDetail" class="modal modal-fixed-footer">
	<div class="modal-content ">
		<h4>Детализация теста [бесплатно по случаю запуска сайта]</h4>
		<form>
			<input type="hidden" name="idresult" value="<?=$arResult['ID']?>">
			<input type="hidden" name="iduser" value="<?=$USER->GetID();?>">
			<input type="hidden" name="idfuser" value="<?=$FUserId?>">
			
			<div class="row">
				<div class="input-field col s12 mb-0">
					<select id="orderTestDetailSelect">
						<option value="1" selected>Интерпретация результатов</option>
						<option value="2">Интерпретация результатов под конкретную задачу</option>
					</select>
					<label>Вариант детализации</label>
				</div>
			
				<div class="input-field col s12 mb-0">
					<input id="first_name1" type="text" class="validate">
					<label for="first_name1" class="">Контакты для связи*</label>
				</div>
					
				<div class="input-field col s12">
					<textarea id="textarea-normal" class="materialize-textarea validate"></textarea>
					<label for="textarea-normal">Дополнительная информация</label>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer red lighten-2 white-text">
	<button type="button" class="modal-close waves-effect waves-red btn-flat">Заказать</button>
	<button type="button" class="modal-close waves-effect waves-red btn-flat"><i class="mdi mdi-close"></i></button>
	</div>
</div>


<script>
function isEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}
</script>	



<?php
	$componentCommentsParams = array(
		'ELEMENT_ID' => $_GET['ID'],
		'ELEMENT_CODE' => '',
		'IBLOCK_ID' => 11,
		'SHOW_DEACTIVATED' => 'N',
		'URL_TO_COMMENT' => '',
		'WIDTH' => '',
		'COMMENTS_COUNT' => '5',
		'BLOG_USE' => 'Y',
		'FB_USE' => 'N',
		'FB_APP_ID' => '',
		'VK_USE' => 'N',
		'VK_API_ID' => '',
		'CACHE_TYPE' => 'A',
		'CACHE_TIME' => 36000000,
		'CACHE_GROUPS' => 'Y',
		'BLOG_TITLE' => '',
		'BLOG_URL' => 'results_comments_ps',
		'PATH_TO_SMILE' => '',
		'EMAIL_NOTIFY' => 'Y',
		'AJAX_POST' => 'Y',
		'SHOW_SPAM' => 'Y',
		'SHOW_RATING' => 'N',
		'FB_TITLE' => '',
		'FB_USER_ADMIN_ID' => '',
		'FB_COLORSCHEME' => 'light',
		'FB_ORDER_BY' => 'reverse_time',
		'VK_TITLE' => '',
		'TEMPLATE_THEME' => '',
		'USER_CONSENT' => 'N',
    'USER_CONSENT_ID' => 0,
    'USER_CONSENT_IS_CHECKED' => 'Y',
    'USER_CONSENT_IS_LOADED' => 'N',
	);
	$APPLICATION->IncludeComponent(
		'bitrix:catalog.comments',
		'',
		$componentCommentsParams,
		$component,
		array('HIDE_ICONS' => 'Y')
	);
?>

<div class="spacer"></div>
<a href="/tests/" title="К списку результатов" class="underline">К списку результатов</a>
<div class="spacer"></div>

<?else: // $_SERVER['REMOTE_ADDR'] == '188.242.149.209'?>


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

<div class="personal-results-s">
	<div class="row bot-0">
		<?
		//свойства результата теста
		$rsItems = CIBlockElement::GetList(
		array(),
		array('IBLOCK_ID' => 11, "ID" => $_GET['ID']), 
		false, 
		false, 
		array(
			'ID', 
			'NAME', 
			'PROPERTY_TEST.ID', // на выходе [PROPERTY_TEST_ID] => 322709 
			'PROPERTY_TEST.CODE',  // на выходе [PROPERTY_TEST_CODE] => mmpi-short
			'PROPERTY_RESULT_RAW', 
			'DETAIL_PAGE_URL', 
			'PROPERTY_LINK', 
			'PROPERTY_USER_ID', 
			'PROPERTY_FUSER_ID', 
			'PROPERTY_RESULT_SHORT', // вручную дописанные результаты
			'PROPERTY_RESULT_FULL', // вручную дописанные результаты
			'PROPERTY_RESULT_EXTENDED', // вручную дописанные результаты
			'PROPERTY_RESULT_MAXIMUM', // вручную дописанные результаты
			'PROPERTY_PAID_RESULT', // оплачен ли результат
			'PROPERTY_LINK',
			'DATE_CREATE',
			'ACTIVE_FROM',
		)
		);
		$arItem = $rsItems->GetNext();
		
		
		//свойства теста
		$rsTests = CIBlockElement::GetList(
		array(),
		array('IBLOCK_ID' => 13,'ID' => $arItem['PROPERTY_TEST_ID']), 
		false, 
		false, 
		array(
			'IBLOCK_ID', 
			'ID', 
			'NAME', 
			'DETAIL_PAGE_URL', 
			'PROPERTY_HAS_RESULT_EXTENDED', 
			'PROPERTY_PRICE_RESULT_EXTENDED', 
			'PROPERTY_MOTIVATOR_RESULT_EXTENDED', 
			'PROPERTY_HAS_RESULT_MAXIMUM',
			'PROPERTY_PRICE_RESULT_MAXIMUM',
			'PROPERTY_MOTIVATOR_RESULT_MAXIMUM', 
			'PROPERTY_RESULT_SAMPLE',
			'PROPERTY_RESULT_SAMPLE_IMG',
			'PROPERTY_SECTION',
			'PROPERTY_SECTION_ENUM_ID',
		)
		);
		$arTest = $rsTests->GetNext();
		//debug($arTest);
		//debug($arItem);
		//PROPERTY_SECTION_VALUE_ID PROPERTY_SECTION_ENUM_ID
		$section_xmls = CIBlockPropertyEnum::GetList(
		 Array(),
		 Array("IBLOCK_ID" => 13, "ID" => $arTest['PROPERTY_SECTION_ENUM_ID'])
		);
		$section_xml = $section_xmls->GetNext();
		//debug($section_xml['XML_ID']);
		
		$APPLICATION->SetTitle($arItem['NAME']);
		$APPLICATION->SetPageProperty("title", $arItem['NAME']);
		?>
		
		<?
		$access = true;
		if($USER->IsAdmin()) $access = true;
		elseif ($arItem['PROPERTY_USER_ID_VALUE'] != $USER->GetID() && $arItem['PROPERTY_FUSER_ID_VALUE'] != $FUserId) $access = false;
		?>
		
		<?if(!$access):?>
			<div class="col s12">
				<p>Доступ закрыт.</p>
			</div>
		<?else:?>
		
			<div class="col s12 m8 offset-m2 text-center">
					<?
					if($USER->IsAdmin()):
					$rsUser = CUser::GetByID($arItem['PROPERTY_USER_ID_VALUE']);
					$arUser = $rsUser->Fetch();
					?>
					<div class="">
						[<?=$arUser['LOGIN']?> IDрезультата=<?=$_GET['ID']?> IDтеста=<?=$arItem['PROPERTY_TEST_ID']?>]
					</div>
					<?endif?>
					
					
					<? $pub_date = '';	if ($arItem["ACTIVE_FROM"])	$pub_date = $arItem["ACTIVE_FROM"];	elseif ($arItem["DATE_CREATE"])	$pub_date = $arItem["DATE_CREATE"]; ?>
					<span class="small date"><?=$pub_date?></span>
					<span class="small tags">
						<a class="small" href="/tests/">Тесты</a>, 
						<a class="small" href="/tests/filter/section-is-<?=$section_xml['XML_ID']?>/apply/"><?=$arTest['PROPERTY_SECTION_VALUE']?></a>
						<a class="small" href="<?=$arTest['DETAIL_PAGE_URL']?>"><?=$arItem["NAME"]?></a>
					</span>
			</div>

			<div class="col s12">		

					<ul class="collapsible expandable">

					<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-square-edit-outline"></i>Краткие результаты тестирования</div>
						<div class="collapsible-body ">
							<span>
								<div class='personal-RESULT__short'>
									<?result($_GET['ID'], 'short');?>
								</div>
							</span>
						</div>
					</li>
					<br>

					<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-file-outline"></i>Полные результаты тестирования</div>
						<div class="collapsible-body ">
							<span>
								<div class='personal-RESULT__full'>
									<?result($_GET['ID'], 'full');?>
								</div>
							</span>
						</div>
					</li>
					
					<?if($arTest['PROPERTY_HAS_RESULT_EXTENDED_VALUE'] == 'Да'): //если тест имеет расширенные результаты ?>
						<br>
						<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-file-multiple"></i><span>Расширенные результаты тестирования</span></div>
						<div class="collapsible-body ">
						
						
							<?if($arItem['PROPERTY_PAID_RESULT_VALUE'] == 'Да'): //доступ к расширенным рез-м открыт / результат оплачен?>
								<span>
									<div class='personal-RESULT__full'>
										<?result($_GET['ID'], 'extended');?>
									</div>
									
									<div class="">
										<?=$arItem["~PROPERTY_RESULT_EXTENDED_VALUE"]["TEXT"]?>
									</div>
									
								</span>
							<?else: //доступ к расширенным результатм закрыт ?>  
						
								<div class="personal-results-motivator">
									<?=$arTest["~PROPERTY_MOTIVATOR_RESULT_EXTENDED_VALUE"]["TEXT"]?>
								</div>
								
								<?if(!empty($arTest["PROPERTY_RESULT_SAMPLE_IMG_VALUE"])): // если есть картинки отображаем их?>
								
										<?
										$sliderImg = array();
										if(!empty($sliderImg[0] = $arTest["PROPERTY_RESULT_SAMPLE_IMG_VALUE"])) {
											while ($ob = $rsTests->GetNext()){
												$sliderImg[] = $ob['PROPERTY_RESULT_SAMPLE_IMG_VALUE'];
											}
										}
										CFile::GetFileArray($img)["SRC"]
										?>
										
										<?
										foreach($sliderImg as $key => $img):
										$img_src = CFile::GetFileArray($img)["SRC"];
										?>		
											<a href="<?=$img_src?>" 
												data-fancybox="gallery" 
												data-caption="Пример результатов" 
												<?if($key == 0):?>class="underline"<?endif?>  
												<?if($arTest['ID'] == 10371):?> <?//для MMPI отслеживаем клики?> 	
													onclick="ym(67293874,'reachGoal','SHOW_MMPI_EXAMPLE_EXTENDED'); return true;"
												<?else:?> <?//для ДРУГИХ тоже отслеживаем клики?> 	
													onclick="ym(67293874,'reachGoal','SHOW_ANY_EXAMPLE_EXTENDED'); return true;"
												<?endif?>	
											>
												<?if($key == 0):?>Пример результатов<?endif?>
											</a>
										<?endforeach?>
								
								<?elseif(!empty($arTest["~PROPERTY_RESULT_SAMPLE_VALUE"]["TEXT"])): // еесли картинок нет и заполнена текстовая часть, отображаем текстовое содержимое ?>
										<a href="#modal-sample" 
											class="underline modal-trigger"
											<?if($arTest['ID'] == 10371):?> <?//для MMPI отслеживаем клики?> 	
												onclick="ym(67293874,'reachGoal','SHOW_MMPI_EXAMPLE_EXTENDED'); return true;"
											<?else:?> <?//для ДРУГИХ отслеживаем клики?> 	
												onclick="ym(67293874,'reachGoal','SHOW_ANY_EXAMPLE_EXTENDED'); return true;"
											<?endif?>										
										>
										Пример расширенных результатов
										</a>
										<div id="modal-sample" class="modal"> 
											<div class="modal-content ">
												<button type="button" class="modal-close waves-effect waves-red btn-flat"><i class="mdi mdi-close"></i></button>
												<h4 class="bot-20 sec-tit">Пример расширенных результатов<br><?=$arTest['NAME']?></h4>
												<div class='personal-RESULT__full'>
													<?=$arTest["~PROPERTY_RESULT_SAMPLE_VALUE"]["TEXT"]?>	
												</div>
											</div>
										</div>
								<?endif // если есть картинки ... ?>		
							
							<br>
							<br>
							
							<p><b>Открыть доступ к расширенным результатам:</b> </p>
							
							<?if($arTest['PROPERTY_PRICE_RESULT_EXTENDED_VALUE'] == '99'):?>
								<iframe src="https://yoomoney.ru/quickpay/fundraise/button?billNumber=O3590gPyCyM.221214&" width="330" height="50" frameborder="0" allowtransparency="true" scrolling="no"></iframe>​
							<?elseif($arTest['PROPERTY_PRICE_RESULT_EXTENDED_VALUE'] == '199'):?>
								<iframe class="iframe-yoomoney" src="https://yoomoney.ru/quickpay/fundraise/button?billNumber=AppSKAKZTvk.221203&" width="320" height="50" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
							<?elseif($arTest['PROPERTY_PRICE_RESULT_EXTENDED_VALUE'] == '499'):?>
								<iframe src="https://yoomoney.ru/quickpay/fundraise/button?billNumber=SNpjkALRX2Q.230219&" width="330" height="50" frameborder="0" allowtransparency="true" scrolling="no"></iframe>​
							<?else: /*199*/?>
								<iframe class="iframe-yoomoney" src="https://yoomoney.ru/quickpay/fundraise/button?billNumber=AppSKAKZTvk.221203&" width="320" height="50" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
							<?endif?>
							
							
							<ul class="collapsible collapsible-payconfirm">
								<li>
									<div class="collapsible-header">
										<a class="waves-effect waves-light btn secondary">Я уже оплатил</a>
									</div>
									
									<div class="collapsible-body">
										Если Вы уже произвели оплату - укажите последние 2 цифры Вашей карты или приблизительное время оплаты.
										
										<form class="action">
											<!-- for required fields class="required" -->
											<!-- /lib/callback.php -->
											<input type="hidden" name="act" value="payconfirm"> <!-- by button data-act="add-item" -->
											<input type="hidden" name="email" value="<?=$USER->GetEmail()?>">
											<input type="hidden" name="login" value="<?=$USER->GetLogin()?>">
											<input type="hidden" name="id" value="<?=$_GET['ID']?>">
									
											<div class="modal-inputs">
												<div class="row">
												<div class="input-field col s12">
													<input id="card-callback" name="card" type="text" class="validate required">
													<label for="card-callback">Последние 2 цифры Вашей карты</label>
												</div>
												</div>
											</div>
											
											<input type="submit" value="Отправить" class="waves-effect waves-light btn secondary">
											
											<div class="form-result"></div>
											<div class="form-loading" style="display: none;">Загрузка ...</div>
										
										</form>
									
									</div>
								</li>
							</ul>
							
						<?endif //доступ к расширенным рез-м ?>
						

						
						</div>
						</li>
					<?endif //если тест имеет расширенные результаты ?>
					
					<?if($arTest['PROPERTY_HAS_RESULT_MAXIMUM_VALUE'] == 'Да'): // если тест имеет максимальные результаты ?>
						<br>
						<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-account-edit"></i><span>Получить рекомендации психолога</span></div>
						<div class="collapsible-body">
						<span>
							<?if(empty($arItem["~PROPERTY_RESULT_MAXIMUM_VALUE"]["TEXT"])):?>
								<p class="small">
								Психолог проанализирует результаты тестирования, даст пояснения по интерсующим вопросам и предоставит рекомендации.<br>
								<strong>Стоимость:</strong> <?=(!empty($arTest['PROPERTY_PRICE_RESULT_MAXIMUM_VALUE'])) ? $arTest['PROPERTY_PRICE_RESULT_MAXIMUM_VALUE'] : '1500'?> рублей. <br>
								<strong>Срок выполнения заказа:</strong> 1-3 дня.</p>
								<br>
								<a class="waves-effect waves-light btn red lighten-2 modal-trigger" data-action="Получить рекомендации психолога" href="#modal-order">Заказать</a>
							<?else:?>
								<?=$arItem['~PROPERTY_RESULT_MAXIMUM_VALUE']['TEXT']?>
							<?endif?>
						</span>
						</div>
						</li>
						
						<br>
						<li class="active">
						<div class="collapsible-header "><i class="mdi mdi-account-switch"></i><span>Получить консультацию психолога</span></div>
						<div class="collapsible-body">
						<span>
							<?if(empty($arItem["~PROPERTY_RESULT_MAXIMUM_VALUE"]["TEXT"])):?>
								<p class="small">
								Оставьте заявку, специалист свяжется с Вами и договорится об удобном времени и способе связи.<br>
								<strong>Стоимость: 3700 рублей. <br>
								<br>
								<a class="waves-effect waves-light btn red lighten-2 modal-trigger" data-action="Записаться к психологу" href="#modal-callback">Записаться к психологу</a>
							<?else:?>
								<?=$arItem['~PROPERTY_RESULT_MAXIMUM_VALUE']['TEXT']?>
							<?endif?>
						</span>
						</div>
						</li>
					
					<?endif // если тест имеет максимальные результаты ?>
					
				
					</ul>

					<div class="spacer"></div>
					
					<?
					//адрес сайта с протоколом
					$isHttps = !empty($_SERVER['HTTPS']) && 'off' !== strtolower($_SERVER['HTTPS']);
					if($isHttps) $host = "https://".$_SERVER['HTTP_HOST'];
					else         $host = "http://".$_SERVER['HTTP_HOST']; 
					?>
					
					<div class="truncate">Пост. ссылка на результат<br> <a href='<?=$host?>/r/<?=$arItem["PROPERTY_LINK_VALUE"]?>/' title='Откроется в новом окне' target='_blank'><?=$host?>/r/<?=$arItem["PROPERTY_LINK_VALUE"]?>/</a></div>
					
					<div class="divider"></div>
					
			</div>
		<?endif // $access?>

	</div> <? // row ?>
</div> <? // personal-results-s ?>

<div id="orderTestDetail" class="modal modal-fixed-footer">
	<div class="modal-content ">
		<h4>Детализация теста [бесплатно по случаю запуска сайта]</h4>
		<form>
			<input type="hidden" name="idresult" value="<?=$arResult['ID']?>">
			<input type="hidden" name="iduser" value="<?=$USER->GetID();?>">
			<input type="hidden" name="idfuser" value="<?=$FUserId?>">
			
			<div class="row">
				<div class="input-field col s12 mb-0">
					<select id="orderTestDetailSelect">
						<option value="1" selected>Интерпретация результатов</option>
						<option value="2">Интерпретация результатов под конкретную задачу</option>
					</select>
					<label>Вариант детализации</label>
				</div>
			
				<div class="input-field col s12 mb-0">
					<input id="first_name1" type="text" class="validate">
					<label for="first_name1" class="">Контакты для связи*</label>
				</div>
					
				<div class="input-field col s12">
					<textarea id="textarea-normal" class="materialize-textarea validate"></textarea>
					<label for="textarea-normal">Дополнительная информация</label>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer red lighten-2 white-text">
	<button type="button" class="modal-close waves-effect waves-red btn-flat">Заказать</button>
	<button type="button" class="modal-close waves-effect waves-red btn-flat"><i class="mdi mdi-close"></i></button>
	</div>
</div>


<script>
function isEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}
</script>	



<?php
	$componentCommentsParams = array(
		'ELEMENT_ID' => $_GET['ID'],
		'ELEMENT_CODE' => '',
		'IBLOCK_ID' => 11,
		'SHOW_DEACTIVATED' => 'N',
		'URL_TO_COMMENT' => '',
		'WIDTH' => '',
		'COMMENTS_COUNT' => '5',
		'BLOG_USE' => 'Y',
		'FB_USE' => 'N',
		'FB_APP_ID' => '',
		'VK_USE' => 'N',
		'VK_API_ID' => '',
		'CACHE_TYPE' => 'A',
		'CACHE_TIME' => 36000000,
		'CACHE_GROUPS' => 'Y',
		'BLOG_TITLE' => '',
		'BLOG_URL' => 'results_comments_ps',
		'PATH_TO_SMILE' => '',
		'EMAIL_NOTIFY' => 'Y',
		'AJAX_POST' => 'Y',
		'SHOW_SPAM' => 'Y',
		'SHOW_RATING' => 'N',
		'FB_TITLE' => '',
		'FB_USER_ADMIN_ID' => '',
		'FB_COLORSCHEME' => 'light',
		'FB_ORDER_BY' => 'reverse_time',
		'VK_TITLE' => '',
		'TEMPLATE_THEME' => '',
		'USER_CONSENT' => 'N',
    'USER_CONSENT_ID' => 0,
    'USER_CONSENT_IS_CHECKED' => 'Y',
    'USER_CONSENT_IS_LOADED' => 'N',
	);
	$APPLICATION->IncludeComponent(
		'bitrix:catalog.comments',
		'',
		$componentCommentsParams,
		$component,
		array('HIDE_ICONS' => 'Y')
	);
?>

<div class="spacer"></div>
<a href="/tests/" title="К списку результатов" class="underline">К списку результатов</a>
<div class="spacer"></div>


<?endif // $_SERVER['REMOTE_ADDR'] != '188.242.149.209'?>


<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
// </div container
// </div section
?>


