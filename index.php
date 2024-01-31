<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
global $APPLICATION;
$APPLICATION->SetTitle("Тесты онлайн – психологические, образовательные, IQ, тесты на эрудицию, память, знание языка - пройти онлайн тест бесплатно");

$APPLICATION->SetPageProperty("title", "Тесты онлайн – психологические, образовательные, IQ, тесты на эрудицию, память, знание языка - пройти онлайн тест бесплатно");
$APPLICATION->SetPageProperty("description", "Сотни самых попялрных психологических, образовательных, школьных тестов, тестов на эрудицию, память и многие другие можно пройти на сайту CLINLI.RU и получить точный результат бесплатно.");
$APPLICATION->SetPageProperty("keywords", "тесты, онлайн, тестирование, психологические, образовательные, школьные, бесплатно, быстро");

$APPLICATION->SetPageProperty("bodyClass", "isfullscreen");
$APPLICATION->SetPageProperty("containerClass", ""); 
?>


	<div class="carousel carousel-fullscreen carousel-slider walk_carousel">
		
		<div class="carousel-item">
			<div class="bg bg--ic1"></div>
			<div class="item-content left-align white-text">
				<div class="spacer-xlarge"></div>
				<h2 class="light white-text">Психологическое <a href="/tests/" class="underline" title="Перейти к тестам">тестирование</a> онлайн</h2>
				<h2 class="light white-text">Профотбор</h2>
				<h2 class="light white-text">Профориентация</h2>
				<h2 class="light white-text">Репетиторство <br> 
					Подготовка к школе, ЕГЭ, ОГЭ, поступлению в ВУЗы
				</h2>
				<br>
				
				<a href="/tests/" title="Психологические тесты онлайн" class="waves-effect waves-light btn-large amber">Перейтии к тестам</a>
			</div>
		</div>
		
		
		
		<div class="carousel-item">
			<div class="bg bg--ic1"></div>
			<div class="item-content left-align white-text">
				<div class="spacer-xlarge"></div>
				<div class="spacer-xlarge"></div>
				<h1>Психологические тесты онлайн</h1>
				<h2 class="light white-text">Хотите узнать свои сильные и слабые стороны, чтобы эффективно их использовать?</h2>
				<a href="/tests/" title="Психологические тесты онлайн" class="waves-effect waves-light btn-large pulse amber">Перейтии к тестам</a>
			</div>
		</div>
		
		<div class="carousel-item">
			<div class="bg bg--ic1"></div>
			<div class="item-content left-align white-text">
				<div class="spacer-xlarge"></div>
				<div class="spacer-xlarge"></div>
				<h2>Современные комплексное тестирование</h2>
				<h3 class="light white-text">отличный способ помочь самому себе</h3>
				<a href="/tests/" title="Психологические тесты онлайн" class="waves-effect waves-light btn-large pulse amber">Перейтии к тестам</a>
			</div>
		</div>
		
		<div class="carousel-item">
			<div class="bg bg--ic1"></div>
			<div class="item-content left-align white-text">
				<div class="spacer-xlarge"></div>
				<div class="spacer-xlarge"></div>
				<h2>Подробные результаты<br>
				и рекомендации от профессиональных психологов</h2>
				<a href="/tests/" title="Пройти тест оналйн" class="waves-effect waves-light btn-large pulse amber">Начать тестирование</a>
			</div>
		</div>
		
		<div class="carousel-item">
			<div class="bg bg--ic1"></div>
			<div class="item-content left-align white-text">
				<div class="spacer-xlarge"></div>
				<div class="spacer-xlarge"></div>
				<h2>Пройти тесты онлайн</h2>
				<h3 class="light white-text">профессиональные, психологические,<br> образовательные, тематические</h3>
			</div>
		</div>
		
		<div class="carousel-item">
			<div class="bg bg--ic2"></div>
			<div class="item-content left-align white-text">
				<div class="spacer-xlarge"></div>
				<div class="spacer-xlarge"></div>
				<h2>Узнай, чего тебе не хватает</h2>
				<h3 class="light white-text"> для реализации своих желаний</h3>
			</div>
		</div>
		<div class="carousel-item">
			<div class="bg bg--ic3"></div>
			<div class="item-content left-align white-text">
				<div class="spacer-xlarge"></div>
				<div class="spacer-xlarge"></div>
				<h2>Найди ответы</h2>
				<h3 class="light white-text">на вопросы, которые мешают развиваться</h3>
				<a href="/tests/" title="Выбрать тест" class="waves-effect waves-light btn-large pulse amber">Выбрать тест</a>
			</div>
		</div>
	</div>


<div class="spacer-xlarge"></div>

<div class="container section-index section-index-psy-tests">
  <div class="section">
		
		<div class="row">
		<div class="col xl8 offset-xl2">
			<h2 class="center sec-tit h5">Психологические тесты онлайн</h2>
			<p class="justify-align">Команда профессионалов подобрала для Вас тесты, которые широко используются в психодиагностической практике, в социальных исследованиях, индивидуальном тестировании. Психологические тесты можно <a href="/tests/" title="Пройти тесты онлайн">пройти онлайн</a> на сайте и получить подробные результаты. Мы расшифровали шкалы и графики, которые получаются в результате тестирования, так что Вам не понадобятся специальные знания в области психологии, чтобы понять результаты.</p>
			<p class="justify-align">В отдельных случаях, например, при проведении <strong>тестирования под конкретную задачу</strong>, мы рекомендуем обратиться к специалистам с соответствующим образованием и знаниями для получения наиболее объективного результата тестирования. </p>
		</div>
		</div>
		
		
		<div class="spacer-large"></div>
		
		<div class="tests-section-test-row row">
			<?php
			CModule::IncludeModule("iblock");
			$i=1;
			$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>13, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_POPULAR_VALUE"=>"Да"), false, false, Array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "PROPERTY_PICTURE", "PROPERTY_FILTER"));
			while($ar_res = $res->GetNext()):
			?>

			<?php if(++$i == 2 ): $i=0;?>
				</div>	<div class="tests-section-test-row row">
		  <?php endif?>
				<div class="col s12 m6 tests-section-test-container">
					<a href="<?=$ar_res['DETAIL_PAGE_URL']?>" class="tests-section-test">
						<!--img class="tests-section-test-thumb responsive-img" src="/upload/iblock/a18/a18cac148429c5b1ab4fabf7fc161940.jpg"-->
						<div class="tests-section-test-thumb"><img class="responsive-img" alt="<?=$ar_res['NAME']?>" src="<?=CFile::GetFileArray($ar_res["PROPERTY_PICTURE_VALUE"])["SRC"]?>"></div>
						<div class="tests-section-test-info">
							<h2 class="title"><?=$ar_res['NAME']?></h2>
							<p class="bot-0 text">
							<?=$ar_res['PREVIEW_TEXT']?>
							</p>
								<ul class="tests-section-test-props">
								<li>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="244 244 24 24" enable-background="new 244 244 24 24" xml:space="preserve">
									<g>
										<path fill="#F26126" d="M265.022,248.673H253.36c-0.32-0.953-1.222-1.641-2.28-1.641c-1.06,0-1.96,0.688-2.28,1.641h-1.82
											c-0.423,0-0.766,0.342-0.766,0.766c0,0.422,0.343,0.765,0.766,0.765h1.82c0.32,0.953,1.222,1.641,2.28,1.641
											c1.06,0,1.96-0.688,2.28-1.641h11.662c0.423,0,0.766-0.342,0.766-0.765C265.787,249.016,265.445,248.673,265.022,248.673
											L265.022,248.673z M251.079,250.313c-0.482,0-0.874-0.392-0.874-0.874c0-0.483,0.392-0.875,0.874-0.875s0.874,0.392,0.874,0.875
											C251.953,249.921,251.562,250.313,251.079,250.313z"></path>
										<path fill="#F26126" d="M265.022,255.234h-1.82c-0.32-0.952-1.222-1.64-2.28-1.64c-1.06,0-1.96,0.688-2.281,1.64h-11.661
											c-0.423,0-0.766,0.342-0.766,0.766s0.343,0.766,0.766,0.766h11.661c0.321,0.951,1.223,1.641,2.281,1.641s1.96-0.689,2.28-1.641
											h1.82c0.423,0,0.766-0.342,0.766-0.766S265.445,255.234,265.022,255.234z M260.921,256.875c-0.482,0-0.874-0.393-0.874-0.875
											c0-0.481,0.392-0.875,0.874-0.875c0.481,0,0.874,0.393,0.874,0.875C261.795,256.482,261.403,256.875,260.921,256.875z"></path>
										<path fill="#F26126" d="M265.022,261.795h-8.382c-0.32-0.953-1.221-1.641-2.28-1.641c-1.059,0-1.959,0.688-2.28,1.641h-5.101
											c-0.423,0-0.766,0.344-0.766,0.766c0,0.424,0.343,0.766,0.766,0.766h5.101c0.321,0.953,1.222,1.641,2.28,1.641
											c1.06,0,1.96-0.688,2.28-1.641h8.382c0.423,0,0.766-0.342,0.766-0.766C265.787,262.139,265.445,261.795,265.022,261.795z
											 M254.36,263.436c-0.482,0-0.874-0.393-0.874-0.875c0-0.48,0.392-0.875,0.874-0.875c0.483,0,0.875,0.395,0.875,0.875
											C255.235,263.043,254.843,263.436,254.36,263.436z"></path>
									</g>
									</svg>
									<?=$ar_res["PROPERTY_FILTER_VALUE"]?>
								</li>	
								
								<li>
							
								</li>
							</ul>
								<span class="btn btn-rounded mt-1">Пройти тест онлайн</span>
							<br>
							<br>
							
						</div>
						
					</a>
				</div>
		  <?php endwhile?>
		</div>
		
		<div class="center-align">
			<a href="/tests/" class="btn btn-rounded">Подробнее</a>
		</div>

		<div class="spacer-large"></div>
		
		
	</div>
</div>


<div class="container section-index">
  <div class="section">
		<div class="row"><div class="col xl8 offset-xl2"><h5 class="center sec-tit">Профотбор</h5>
		<p class="justify-align">Профессиональный отбор, профотбор - это комплекс мероприятий, направленных на выявление таких сотрудников, которые по своим моральным, психофизиологическим и психологическим качествам, состоянию здоровья и уровню общеобразовательной подготовки наиболее пригодны к профессиональной деятельности по конкретной специальности.</p>
		<div class="center-align">
			<a href="/professional-selection/" class="btn btn-rounded mt-1">Подробнее</a>
		</div></div></div>
		<div class="spacer-large"></div>
	</div>
</div>


<div class="container section-index">
  <div class="section">
		<div class="row">
		<div class="col xl8 offset-xl2">
		<h5 class="center sec-tit">Профориентация</h5>
		<p class="justify-align">Профессиональная ориентация, профориентация, выбор профессии или ориентация на профессию (лат. professio — род занятий и фр. orientation — установка) — система научно обоснованных мероприятий, направленных на подготовку молодёжи к выбору профессии (с учётом особенностей личности и потребностей народного хозяйства в кадрах), на оказание помощи молодёжи в профессиональном самоопределении и трудоустройстве.</p>
		<div class="center-align">
			<a href="/professional-orientation/" class="btn btn-rounded mt-1">Подробнее</a>
		</div>
		</div>
		</div>
		<div class="spacer-large"></div>
	</div>
</div>

<div class="container section-index">
  <div class="section">
		<div class="row">
		<div class="col xl8 offset-xl2">
		<h5 class="center sec-tit">Репетиторство</h5>
		<p class="justify-align">В нашей команде есть несколько репетиторов, которые готовы работать с Вами и Вашими детьми.</p>
		<div class="center-align">
			<a href="/professional-orientation/" class="btn btn-rounded mt-1">Подробнее</a>
		</div>
		</div>
		</div>
		<div class="spacer-large"></div>
	</div>
</div>

<div class="container section-index">
  <div class="section">
		<div class="row">
		<div class="col xl8 offset-xl2">
		<h5 class="center sec-tit">Система дистанционного обучения и тестирования</h5>
		<p class="justify-align">Удобный инструмент для организации дистанционного обучения и тестирования ваших учеников, студентов, респондентов.</p>
		<div class="center-align">
			<a href="/professional-orientation/" class="btn btn-rounded mt-1">Подробнее</a>
		</div>
		</div>
		</div>
		<div class="spacer-large"></div>
	</div>
</div>


<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>