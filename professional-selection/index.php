<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Профессиональный отбор кандидатов на работу");
$APPLICATION->SetPageProperty("title", "Сотни психологических диагностик, тестов для оценки личности, профессиональный аппарта для тестирования");
// <div ..-bg  /div>
// <div container
// <div section
?>

<h1 class="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>

<div class="row ui-mediabox blogs blog-view bot-0">
	<div class="col s12">
		<h2 class="title mb-3">Порядок работы</h2>
		<p>1. После <a href="/login/">регистрации</a> работодателю доступна возможность сформировать пакет диагностических методик (батарею тестов). Пакет диагностик может содержать тесты различного направления: <a href="/tests/filter/section-is-intellectual/apply/">интеллектуальные</a>, <a href="/tests/filter/section-is-personality-and-character/apply/">психологические</a>, <a href="/tests/filter/section-is-educational/apply/">образовательные</a>, <a href="/tests/filter/section-is-professional/apply/">профессиональные</a>.</p>
		<p>2. После формирования пакета диагностик, работодатель отправляет ссылку потенциальному работнику. По результатам тестов работодатель самостоятельно или с помощью специалистов сайта принимает решение о трудоустройстве, проводит дополнительное тестирование, в т.ч. обследование с использованием полиграфа.</p>
		<div class="spacer"></div>
		<div class="divider"></div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>