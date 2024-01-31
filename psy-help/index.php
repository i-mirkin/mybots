<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Помощь психолога");
$APPLICATION->SetPageProperty("title", "Услуги психолога дистанционно и очно, запись на прием к психологу осуществляется через форму обратной связи.");
// <div ..-bg  /div>
// <div container
// <div section
?>



<div class="row">
	<div class="col s12">
		<h1 class="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>
		
		<p>Для записи к психологу используйте <a href="#modal-callback" class="underline modal-trigger" title="Записаться к психологу" data-act="callback" data-action="Записаться к психологу">форму обратной связи</a>.</p>
		
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>