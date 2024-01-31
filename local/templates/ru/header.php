<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
//https://www.jaybabani.com/alix-html/app/
//https://www.jaybabani.com/alix-html/app/ui-icons-mdi.html
//Проверять email на уникальность при регистрации:	

global $USER;
if ($USER->IsAdmin()) $v = time();
else $v = date('d')+1;

$v = time();

$isIndex = $APPLICATION->GetCurPage(false) == SITE_DIR;
if($APPLICATION->GetCurPage(false) == '/premium/' 
		|| 	$APPLICATION->GetCurPage(false) == '/testmaker/' 
	) $isIndex = true;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta name="viewport" content="initial-scale=1,user-scalable=no,minimum-scale=1,maximum-scale=1,width=device-width">
  <title><?$APPLICATION->ShowTitle()?></title>
	<link rel="apple-touch-icon" sizes="57x57" href="/assets/images/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/images/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/assets/images/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/assets/images/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/assets/images/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/icons/favicon-16x16.png">
  <link rel="manifest" href="/assets/images/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/images/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/images/icons/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/images/icons/favicon-32x32.png">

  <!-- CORE CSS FRAMEWORK - START -->
  <link href="/assets/css/preloader.css" type="text/css" rel="stylesheet" media="screen" />
  <link href="/modules/materialize/materialize.min.css" type="text/css" rel="stylesheet" media="screen" />
  <link href="/modules/fonts/mdi/materialdesignicons.min.css" type="text/css" rel="stylesheet" media="screen" />
  <link href="/modules/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen" />
  <!-- CORE CSS FRAMEWORK - END -->
 
	<link href="/assets/css/variables.css" type="text/css" rel="stylesheet" media="screen" />
	<link href="/assets/css/style.css?<?=$v?>" type="text/css" rel="stylesheet" media="screen" id="main-style" />
	
  

	
	<script src="/modules/jquery/jquery-2.2.4.min.js"></script>
	
	<link href="/assets/css/custom.css?<?=$v?>" type="text/css" rel="stylesheet" />
	<link href="/assets/css/responsive.css?<?=$v?>" type="text/css" rel="stylesheet" />
	
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	
	<?if(!empty($APPLICATION->GetProperty("canonical"))):?>
	<link rel="canonical" href="<?=$APPLICATION->GetProperty("canonical")?>"/>
	<?endif?>
	
	<?
	if (preg_match('/^\/personal\/mybot/', $APPLICATION->GetCurPage(false))) {
		$GLOBALS['og_site_name'] = "Персональный раздел осознанного клиента";
		$GLOBALS['og_description'] = "Здесь вы можете настроить собственные уведомления, а также найти много другого полезного функционала";
	}
	?>
		
	<?
	$isHttps = !empty($_SERVER['HTTPS']) && 'off' !== strtolower($_SERVER['HTTPS']);
	if($isHttps) $host = "https://".$_SERVER['HTTP_HOST'];
	else         $host = "http://".$_SERVER['HTTP_HOST']; 
	?>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?$APPLICATION->ShowTitle()?>"/>
	<meta property="og:image" content="<?=$host?>/assets/images/social.jpg"/>
	<meta property="og:description" content="<?=empty($GLOBALS['og_description'])?$APPLICATION->ShowProperty('description'):$GLOBALS['og_description']?>"/>
	<meta property="og:url" content="<?=$host?><?=$APPLICATION->GetCurPage(false)?>"/>
	<meta property="og:site_name" content="<?=empty($GLOBALS['og_site_name'])?'CLINLI — психологические тесты онлайн!':$GLOBALS['og_site_name']?>"/>
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?$APPLICATION->ShowTitle()?>">
	<meta name="twitter:description" content="<?=empty($GLOBALS['og_description'])?$APPLICATION->ShowProperty('description'):$GLOBALS['og_description']?>">
	<meta name="twitter:image" content="<?=$host?>/assets/images/social.jpg">

  <? $APPLICATION->ShowHead(); ?>
	
	 

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="<?$APPLICATION->ShowProperty('bodyClass')?>  html"  data-header="light" data-footer="dark"  data-header_align="center"  data-menu_type="left" data-menu="light" data-menu_icons="on" data-footer_type="left" data-site_mode="light" data-footer_menu="show" data-footer_menu_style="light" >
	
	<!-- Yandex.Metrika counter -->
	<script>
		 (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		 m[i].l=1*new Date();
		 for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
		 k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		 (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		 ym(67293874, "init", {
					clickmap:true,
					trackLinks:true,
					accurateTrackBounce:true,
					webvisor:true
		 });
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/67293874" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
	
	
	<div class="preloader-background">
    <div class="preloader-wrapper">
      <div id="preloader"></div>
    </div>
  </div>

	<!-- START navigation -->
	<nav class="fix_topscroll logo_on_fixed  topbar navigation" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="/" class=" brand-logo " >CLINLI</a>    
			<a href="#" data-target="" class="waves-effect waves-circle navicon back-button htmlmode show-on-large "><i
					class="mdi mdi-arrow-left" data-page=""></i></a>

			<a href="#" data-target="slide-nav" class="waves-effect waves-circle navicon sidenav-trigger show-on-large"><i class="mdi mdi-menu"></i></a>


			<?if(false):?>
			<a href="/premium/" class="waves-effect navicon right show-on-large sidenav-trigger waves-light btn-small teal lighten-4 width-auto">
				<i class="mdi mdi-approval left"></i>
				<i class="right" style="font-size: 13px; font-style: normal; margin-left: 0px;" >PREM</i>
			</a>
			<?endif?>
			
			<?
			global $USER;
			if ($USER->IsAuthorized()) //Если пользователь авторизован
			{
				$rsUser = CUser::GetByID($USER->GetID()); //$USER->GetID() - получаем ID авторизованного пользователя и сразу же его поля
				$arUser = $rsUser->Fetch();
				?>
				<a href="#" data-target="slide-personal" class="waves-effect waves-circle navicon right sidenav-trigger show-on-large nav-personal-photo-container">
					<?
					if($arUser["PERSONAL_PHOTO"] > 0): 
					$PERSONAL_PHOTO_SRC = CFile::GetFileArray($arUser["PERSONAL_PHOTO"])["SRC"];
					?>
					<i  class="nav-personal-photo" style="background-image: url(<?=$PERSONAL_PHOTO_SRC?>)"></i> <?=$arUser['PERSONAL_PHOTO']?>
					<?else:?>
					<i class="mdi mdi-account-cog"></i>
					<?endif?>
				</a>
				
				<div class="tooltip-c-content clearfix">
					<div class="tooltip-c-text">
						<a class="tooltip-c-text__menu-item" href="/personal/">Личный кабинет пользователя</a>
						<a class="tooltip-c-text__menu-item" href="/personal/results/">Результаты тестов</a>
						<a class="tooltip-c-text__menu-item" href="/tests/">Пройти тест</a>
						<a class="tooltip-c-text__menu-item" href="/?logout=yes">Выйти</a>
						<a class="tooltip-c-text__menu-item" href="/employer/">Личный кабинет нанимателя</a>
						
					</div>
				</div>
			<?
			}
			else{
			?>
				<a href="/login/"  class="waves-effect waves-circle navicon sidenav-trigger right show-on-large" title="Войти"><i class="mdi mdi-login"></i></a>		
			<?
			}
			?>
			
			<a href="#" data-target="" class="waves-effect waves-circle navicon right nav-site-mode show-on-large"><i class="mdi mdi-invert-colors mdi-transition1"></i></a>

			<a href="#modal-callback"  
				class="waves-effect waves-light modal-trigger right show-on-large btn deep-orange lighten-2 text-white mr-3  btn-navigation" 
				title="Записаться к психологу" 
				data-act="callback"
				data-action="Записаться к психологу"
			>
					Записаться к&nbsp;психологу
				</a>	
			<!-- <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
		</div>
	</nav>
	
	


	<ul id="slide-nav" class="sidenav sidemenu">
		<li class="menu-close"><i class="mdi mdi-close"></i></li>
		<li class="user-wrap">
			<div class="user-view row">
				<div class="col s9 infoarea">
				 <a href="/" class="name">CLINLI</a>
				 <span class="name subname">Психологические тесты онлайн</span>
				</div>
			</div>
		</li>

		<li class="menulinks">
			<ul class="collapsible">
				<!-- SIDEBAR - START -->
				<!-- MAIN MENU - START -->
				<li class="sh-wrap">
					<div class="subheader">Навигация</div>
				</li>
				
				<li class="lvl1 ">
					<div class="" >
						<a href="/">
						<i class="mdi mdi-home-outline"></i>
						<span class="title">Главная</span>
						</a>
					</div>
				</li>
		
				<li class="lvl1">
					<div class="" >
						<a href="/about/">
						<i class="mdi mdi-desk-lamp"></i>
						<span class="title">О проекте</span>
						</a>
					</div>
				</li>
		
				<li class="lvl1 ">
					<div class="" >
						<a href="/tests/">
						<i class="mdi mdi-bulletin-board"></i>
						<span class="title">Тесты</span>
						</a>
					</div>
				</li>
				
				<li class="lvl1 ">
					<div class="" >
						<a href="#modal-callback" class="modal-trigger" data-act="callback" data-action="Записаться к психологу">
						<i class="mdi mdi-message-draw"></i>
						<span class="title">Записаться к психологу</span>
						</a>
					</div>
				</li>
				
					
				<li class="sep-wrap"><div class="divider"></div></li>
				<li class="sh-wrap"><div class="subheader">Информаторий</div></li>			
				<li class="lvl1 ">
					<div class="" >
						<a href="/blog/">
							<i class="mdi mdi-square-edit-outline"></i>
							<span class="title">Блог</span>
						</a>
					</div>
				</li>
				<li class="lvl1 ">
					<div class="" >
							<a href="/glossary/">
							<i class="mdi mdi-school"></i>
							<span class="title">Психологический словарь</span>
									</a>
							</div>
				</li>
				
				
				<li class="sep-wrap"><div class="divider"></div></li>
				<li class="sh-wrap"><div class="subheader">Инструменты</div></li>			
				
				<li class="lvl1 ">
					<div class="" >
							<a href="/about/for-candidates/">
							<i class="mdi mdi-square-edit-outline"></i>
							<span class="title">Для соискателей</span>
									</a>
							</div>
				</li>
				
				<li class="lvl1 ">
					<div class="" >
							<a href="/about/for-employers/">
							<i class="mdi mdi-newspaper"></i>
							<span class="title">Для работодателей</span>
									</a>
							</div>
				</li>
				
				<li class="lvl1 accent">
					<div class="" >
							<a href="/testmaker/">
							<i class="mdi mdi-checkbox-multiple-marked-outline"></i>
							<span class="title">Конструктор тестов</span>
									</a>
							</div>
				</li>
				
				
				<li class="lvl1 ">
					<div class="" >
							<a href="/psy-help/">
							<i class="mdi mdi-message-draw"></i>
							<span class="title">Помощь психолога</span>
								</a>
					</div>
				</li>
		
				<li class="lvl1 ">
					<div class="" >
							<a href="/faq/">
							<i class="mdi mdi-school"></i>
							<span class="title">Вопросы</span>
									</a>
							</div>
				</li>
				
				<!--li class="lvl1 ">
					<div class="" >
							<a href="#">
							<i class="mdi mdi-certificate"></i>
							<span class="title">Тренинги</span>
									</a>
							</div>
				</li-->
				
				<!--li class="lvl1 ">
					<div class="" >
							<a href="#">
							<i class="mdi mdi-certificate"></i>
							<span class="title">Обучение</span>
									</a>
							</div>
				</li-->
		
				<!--li class="lvl1 ">
					<div class="" >
							<a href="#">
							<i class="mdi mdi-certificate"></i>
							<span class="title">Ваканасии психолога</span>
									</a>
							</div>
				</li-->

				<!--li class="lvl1 ">
					<div class="" >
							<a href="#">
							<i class="mdi mdi-contacts"></i>
							<span class="title">Задать вопрос</span>
									</a>
							</div>
				</li-->
				
				
				
				<li class="sep-wrap"><div class="divider"></div></li>
				<li class="sh-wrap"><div class="subheader">Личный кабинет</div></li>
				<?if(!$USER->IsAuthorized()):?>
				<li class="lvl1 ">
					<div class="" >
						<a href="/login/">
						<i class="mdi mdi-account-network"></i>
						<span class="title">Войти</span>
						</a>
					</div>
				</li>
				<li class="lvl1 ">
					<div class="" >
						<a href="/reg/">
						<i class="mdi mdi-cart-outline"></i>
						<span class="title">Регистрация</span>
								</a>
						</div>
				</li>
				<?else:?>
				<li class="lvl1 ">
					<div class="" >
						<a href="/personal/private/">
						<i class="mdi mdi-human-handsdown"></i>
						<span class="title">Профиль</span>
								</a>
						</div>
				</li>
				<li class="lvl1 ">
					<div class="" >
						<a href="/personal/results/">
						<i class="mdi mdi-chart-bar-stacked"></i>
						<span class="title">Результаты тестов</span>
								</a>
						</div>
				</li>
				<li class="lvl1 ">
					<div class="" >
						<a href="/?logout=yes">
						<i class="mdi mdi-exit-to-app"></i>
						<span class="title">Выйти</span>
								</a>
						</div>
				</li>
				
				<?endif?>

			
				<li class="sep-wrap"><div class="divider"></div></li>
				<li class="sh-wrap"><div class="subheader">Связь с нами</div></li>
				<li class="lvl1 ">
					<div class="waves-effect ">
						<a href="mailto:i.mirkin@yandex.ru">
						<i class="mdi mdi-email-outline"></i>
						<span class="title">Email</span>  </a>
						</div>
				</li>
				<li class="lvl1 ">
					<div class="waves-effect ">
						<a href="/contacts/">
						<i class="mdi mdi-message-text-outline"></i>
						<span class="title">Контакты</span>  </a>
					</div>
				</li>
				
				<li class="sep-wrap"><div class="divider"></div></li>
				<li class="sh-wrap"><div class="subheader">Условия оказания услуг</div></li>
				<li class="lvl1 ">
					<div class="waves-effect ">
						<a href="/oferta/" title="Публичная оферта">
						<i class="mdi mdi-message-text-outline"></i>
						<span class="title">Публичная оферта</span>  </a>
					</div>
				</li>
				<li class="lvl1 ">
					<div class="waves-effect ">
						<a href="/payinfo/" title="Публичная оферта">
						<i class="mdi mdi-message-text-outline"></i>
						<span class="title">Стоимость. Возврат.</span>  </a>
					</div>
				</li>
				
				
				<!-- MAIN MENU - END -->
				<!--  SIDEBAR - END -->

			</ul>
		</li>

		<li class="copy-spacer"></li>
		<li class="copy-wrap">
			<div class="copyright">&copy; Copyright @ Студия Миркина</div>
		</li>
	</ul>
	<!-- END navigation -->

	<?if(!$isIndex):?>
	<div class="<?$APPLICATION->ShowProperty('bgClass')?>"></div>
	<div class="container <?$APPLICATION->ShowProperty('containerClass')?>" id="main-container">
	<div class="section">
	
	<?$APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"",
		array(
			"START_FROM" => "0",
			"PATH" => "",
			"SITE_ID" => "-"
		),
		false,
		Array('HIDE_ICONS' => 'Y')
	);?>
	
	
	<?endif?>

	<?global $USER; if (true && $USER->GetEmail() == 'i.mirkin@yandex.ru' && $_GET['panel'] != 'no'):?>
	<div class="row"><div id="panel"><br><br><? $APPLICATION->ShowPanel(); ?></div></div>
	<?endif?>
