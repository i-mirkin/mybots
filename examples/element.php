<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// <div ..-bg  /div>
// <div container
// <div section
?>




	<div class="row ">
			<div class="col s12 l8 offset-l2">
			
			<h1 class="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>
					
					<?
					//свойства теста
					$rsTests = CIBlockElement::GetList(
					array(),
					array(
						'IBLOCK_ID' => 13,
						'CODE' => $_GET['CODE'],
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
						'PROPERTY_RESULT_SAMPLE_IMG', 
					)
					);
					$arTest = $rsTests->GetNext();
					
					$APPLICATION->SetTitle("Пример результатов ".$arTest['NAME']);
					$APPLICATION->SetPageProperty("title", "Пример профессиональной обработки результатов ".$arTest['NAME']);
					$APPLICATION->SetPageProperty("description", "Пример валидированных готовых результатов после прохождения на сайте".$arTest['NAME']);
					?>
					
					
					
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
								<a href="<?=$img_src?>" data-fancybox="gallery" data-caption="Пример результатов" >
									<img src="<?=$img_src?>" class="responsive-img d-block" style="max-width: 29%;"/>
								</a>
							<?endforeach?>
					
					<?elseif(!empty($arTest["~PROPERTY_RESULT_SAMPLE_VALUE"]["TEXT"])): // если картинок нет и заполнена текстовая часть, отображаем текстовое содержимое?>
							<div class='personal-RESULT__full'>
								<?=$arTest["~PROPERTY_RESULT_SAMPLE_VALUE"]["TEXT"]?>	
							</div>
					<?endif?>		

					<div class="spacer"></div>
					<div class="divider"></div>
					<div class="spacer"></div>
					
					<a href="/examples/" title="Назад"  class="btn-large">Назад</a>
					
			</div>
	</div>


	

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>