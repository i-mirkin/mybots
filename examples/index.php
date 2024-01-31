<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты психологического тестирования - примеры");
$APPLICATION->SetPageProperty("title", "Примеры профессиональной обработки результатов");
// <div ..-bg  /div>
// <div container
// <div section
?>





<div class="row ui-mediabox blogs blog-view bot-0">
		<div class="col s12 l8 offset-l2">
		
		
		<h1 class="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>
		
		<p>Результаты валидируются и перепроверяются несколько раз группой специалистов, Вы получаете точные результаты психологических и других проходимых на сайте тестов.</p>
		
		<p>Посмотрите результаты некоторых тестов:</p>
		<br>			
					
					<?
					//свойства теста
					$rsTests = CIBlockElement::GetList(
					array(),
					array(
						'IBLOCK_ID' => 13,
						//'ID' => 103716,
						[
							"LOGIC" => "OR",
							["!PROPERTY_RESULT_SAMPLE" => false],
							["!PROPERTY_RESULT_SAMPLE_IMG" => false]
						]
					), 
					false, 
					false, 
					array(
						'IBLOCK_ID', 
						'ID', 
						'NAME', 
						'CODE', 
						'DETAIL_PAGE_URL', 
						'PROPERTY_RESULT_SAMPLE',
						//'PROPERTY_RESULT_SAMPLE_IMG', //с этим параметром тест с 3 картинками в свойстве выбирается 3 раза
					)
					);
					
					while($arTest = $rsTests->GetNext()):
					?>
					
						<a href="/examples/<?=$arTest['CODE']?>/" class="underline" title="Пример обработки результатов <?=$arTest['NAME']?>"><?=$arTest['NAME']?></a><br>
					
					<?endwhile;?>

				<div class="spacer"></div>
				<div class="divider"></div>
		</div>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>