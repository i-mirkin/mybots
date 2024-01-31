<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Версии и ход работы");
$APPLICATION->SetPageProperty("title", "Версии и ход работы над сайтом");
// header
// <div ..-bg  /div>
// <div container
// <div section
?>

<h1 class="pagetitle"><?$APPLICATION->ShowTitle();?></h1>


<div class="row ui-mediabox blogs blog-view bot-0">
	<div class="col s12">
	
	<ul>
	<li><h2>09.12.2022</h2></li>
	<li>В MMPI добавлены вопросы с уточнением пола обследуемого</li>
	<li>В расширенный MMPI добавлены Дополнительные шкалы, Способность к обучению, Шкала зрелости, Шкала «Контроль», Шкала «Соперничество», Шкала «Адвокатский тип личности», Шкала «Интеллектуальный коэффициент» </li>
	
	</ul>
	
	
		
		<div class="spacer"></div>
		<div class="divider"></div>
	</div>
</div>


<?
//footer
//</div> <!-- /container -->
//</div>	<!-- /section -->
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>