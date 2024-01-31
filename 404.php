<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 Not Found");
$APPLICATION->SetPageProperty("bodyClass", "isfullscreen");
$APPLICATION->SetPageProperty("bgClass", "login-bg access-404");
$APPLICATION->SetPageProperty("containerClass", "login-area error-page");
?>
<div class="row center">

	<h1 class="white-text center error-code">404</h1>

	<div class="spacer"></div>
	<h3 class="welcome-tagline white-text center">Страница не найдена</h3>
	<div class="spacer"></div>
	<h6 class="white-text center">Страница, на которую Вы перешли не существует или удалена. <br>Мы проверим и всё исправим!</h6>
	<div class="spacer"></div>
	<div class="spacer"></div>
	
	<script>
			document.write('<a class="waves-light btn-large bg-primary" href="' + document.referrer + '">Назад</a>');
	</script>
	
	<div class="spacer"></div>
	
	<a href="/" class="underline bold" title="На главную «Психологические тесты»">Перейти на главную</a>
	<br>
	<a href="/tests/" class="underline bold" title="Список тестов">Перейти к тестам</a>
	
	
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>