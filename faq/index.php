<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ответы на вопросы");
$APPLICATION->SetPageProperty("title", "Услуги психолога дистанционно и очно, запись на прием к психологу осуществляется через форму обратной связи.");
// <div ..-bg  /div>
// <div container
// <div section
?>



<div class="row">
	<div class="col s12">
		<h1 class="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>
		
		
		
		<h2>Задать вопрос</h2>
		
		
		<?php
		$componentCommentsParams = array(
			'ELEMENT_ID' => 321757,
			'ELEMENT_CODE' => '',
			'IBLOCK_ID' => 24,
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
			'BLOG_URL' => 'faq_comments',
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
			'questions',
			$componentCommentsParams,
			$component,
			array('HIDE_ICONS' => 'Y')
		);
	?>
		
		
	</div>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>