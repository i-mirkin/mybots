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



<div class="row">
<div class="col s12">

		<div class="personal-results-s">
			<div class="row ui-mediabox bot-0">
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
					'PROPERTY_TEST.ID', 
					'PROPERTY_RESULT_RAW', 
					'DETAIL_PAGE_URL', 
					'PROPERTY_LINK', 
					'PROPERTY_USER_ID', 
					'PROPERTY_FUSER_ID', 
					'PROPERTY_COMMON_INTERPRETATION',
					'PROPERTY_EXTENDED_INTERPRETATION',
					'PROPERTY_LINK',
					'DATE_CREATE',
					'ACTIVE_FROM',
				)
				);
				$arItem = $rsItems->GetNext();
				
				
				//debug($arItem);

				
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
					'PROPERTY_HAS_COMMON_INTERPRETATION', 
					'PROPERTY_HAS_EXTENDED_INTERPRETATION',
					'PROPERTY_PRICE_COMMON_INTERPRETATION', 
					'PROPERTY_PRICE_EXTENDED_INTERPRETATION',
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
							<h5 class="title"><?=$arItem["NAME"]?></h5>
							<?
							if($USER->IsAdmin()):
							$rsUser = CUser::GetByID($arItem['PROPERTY_USER_ID_VALUE']);
							$arUser = $rsUser->Fetch();
							?>
							<div class="">
								[<?=$arUser['LOGIN']?> IDтеста=<?=$_GET['ID']?>]
							</div>
							<?endif?>
							
							
							<? $pub_date = '';	if ($arItem["ACTIVE_FROM"])	$pub_date = $arItem["ACTIVE_FROM"];	elseif ($arItem["DATE_CREATE"])	$pub_date = $arItem["DATE_CREATE"]; ?>
							<span class="small date"><?=$pub_date?></span>
							<span class="small tags"><a class="small" href="/tests/">Тесты</a>, <a class="small" href="/tests/filter/section-is-<?=$section_xml['XML_ID']?>/apply/"><?=$arTest['PROPERTY_SECTION_VALUE']?></a></span>
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
								<div class="collapsible-header "><i class="mdi mdi-wallet"></i>Полные результаты тестирования</div>
								<div class="collapsible-body ">
									<span>
										<div class='personal-RESULT__full'>
											<?result($_GET['ID'], 'full');?>
										</div>
									</span>
								</div>
							</li>
							
							<?if($arTest['PROPERTY_HAS_COMMON_INTERPRETATION_VALUE'] == 'Да'):?>
							<br>
							<li class="active">
							<div class="collapsible-header "><i class="mdi mdi-file-outline"></i><span>Интерпретация результатов</span></div>
							<div class="collapsible-body ">
							
							
							<?
							global $USER;
							if ($USER->IsAdmin()): 
							?>
							
							<script>
							$(document).ready(function(){
								
							});
							
							</script>
							
							
							<a class="underline modal-trigger" href="#modal-sample">Пример расширенных результатов</a>
							
							<br>
							<br>
							<br>
							
							<iframe src="https://yoomoney.ru/quickpay/fundraise/button?billNumber=AppSKAKZTvk.221203&" width="330" height="50" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
							
							<ul class="collapsible collapsible-payconfirm">
								<li>
									<div class="collapsible-header">
										<a class="waves-effect waves-light btn secondary">Я уже оплатил</a>
									</div>
									
									<div class="collapsible-body">
										Если Вы уже произвели оплату - укажите последние 2 цифры Вашей карты.
										
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

							<?endif?>
							
							
							
							<span>
								<?if(empty($arItem['~PROPERTY_COMMON_INTERPRETATION_VALUE']['TEXT'])):?>
									<p class="small">
									Подробная расшифровка результатов тестирования с возможными вариантами решения общих проблемных ситуаций. <br>
									<strong>Стоимость:</strong> <?=(!empty($arTest['PROPERTY_PRICE_COMMON_INTERPRETATION_VALUE'])) ? $arTest['PROPERTY_PRICE_COMMON_INTERPRETATION_VALUE'] : '500'?> рублей. <br>
									<strong>Срок выполнения заказа:</strong> 1 день.</p>
									<br>
									<a	class="waves-effect waves-light btn red lighten-2 modal-trigger" 
											data-action="Заказать интепретацию результатов" 
											data-info="Заказать интепретацию результатов ID=<?=$arItem["ID"]?> (<?=$arItem["NAME"]?> для пользователя <?=$USER->GetLogin()?>)" 
											href="#modal-order"
									>
											Заказать 
									</a>
									<?=$arItem['~PROPERTY_COMMON_INTERPRETATION_VALUE']['TEXT']?>
								<?else:?>
									<?=$arItem['~PROPERTY_COMMON_INTERPRETATION_VALUE']['TEXT']?>
								<?endif?>
							</span>
							</div>
							</li>
							<?endif?>
							
							<?if($arTest['PROPERTY_HAS_EXTENDED_INTERPRETATION_VALUE'] == 'Да'):?>
							<br>
							<li class="active">
							<div class="collapsible-header "><i class="mdi mdi-file-outline"></i><span>Получить рекомендации психолога</span></div>
							<div class="collapsible-body">
							<span>
								<?if(empty($arItem["~PROPERTY_EXTENDED_INTERPRETATION_VALUE"]["TEXT"])):?>
									<p class="small">
									Психолог проанализирует результаты тестирования, даст пояснения по интерсующим вопросам и предоставит рекомендации.<br>
									<strong>Стоимость:</strong> <?=(!empty($arTest['PROPERTY_PRICE_EXTENDED_INTERPRETATION_VALUE'])) ? $arTest['PROPERTY_PRICE_EXTENDED_INTERPRETATION_VALUE'] : '1500'?> рублей. <br>
									<strong>Срок выполнения заказа:</strong> 1-3 дня.</p>
									<br>
									<a class="waves-effect waves-light btn red lighten-2 modal-trigger" data-action="Заказать интепретацию результатов под конкретную задачу" href="#modal-order">Заказать</a>
								<?else:?>
									<?=$arItem['~PROPERTY_EXTENDED_INTERPRETATION_VALUE']['TEXT']?>
								<?endif?>
							</span>
							</div>
							</li>
							<?endif?>
							
						
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
				<?endif?>

			</div>
		</div>

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
			<a href="#!" class="modal-close waves-effect waves-red btn-flat">Заказать</a>
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
			</div>
		</div>


		<script>
		function isEmail(email) {
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return regex.test(email);
			}
		</script>	

</div>
</div>


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
<a href="/tests/" title="К списку тестов" class="underline">К списку тестов</a>
<div class="spacer"></div>


<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
// </div container
// </div section
?>