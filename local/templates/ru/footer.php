<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
global $USER;
?>

	
	<div class="addbutton">
		<a href="#modal-choose-item" class="waves-effect waves-light btn-floating btn primary-bg z-depth-3 modal-trigger">
			<i class="mdi mdi-plus"></i>
		</a>
	</div>
	
	<div id="modal-choose-item" class="modal bottom-sheet modal-custom" tabindex="0" style="z-index: 1003; display: none; opacity: 0; bottom: -100%;">
		<div class="modal-content section-narrow">
					<h4 class="bot-20 sec-tit">Добавить запись</h4>
					
			
				<div class="row mb-0">
					<div class="col s3 m6 l3">
						<a href="#modal-add-item" class="modal-trigger icon-block block-small center z-depth-1" data-type="goal" data-act="add-item" data-action="Добавить цель">
							<div class="icon  primary-text"><i class="mdi mdi-target"></i></div>
							<div class="title ">Цель</div>
						</a>
					</div>

					<div class="col s3 m6 l3">
						<a href="#modal-add-item" class="modal-trigger icon-block block-small center z-depth-1" data-type="reminder" data-act="add-item" data-action="Добавить напоминание">
							<div class="icon  primary-text"><i class="mdi mdi-alarm-check"></i></div>
							<div class="title ">Напоминание</div>
						</a>
					</div>

					<div class="col s3 m6 l3">
						<a href="#modal-add-item" class="modal-trigger icon-block block-small center z-depth-1" data-type="task" data-act="add-item"  data-action="Добавить задачу">
							<div class="icon  primary-text"><i class="mdi mdi-check-outline"></i></div>
							<div class="title ">Задача</div>
						</a>
					</div>

					<div class="col s3 m6 l3">
						<a href="#modal-add-item" class="modal-trigger icon-block block-small center z-depth-1" data-type="event" data-act="add-item"  data-action="Добавить мероприятие">
							<div class="icon  primary-text"><i class="mdi mdi-calendar-edit"></i></div>
							<div class="title ">Мероприятие</div>
						</a>
					</div>

				</div>
		</div>
		<div class="modal-footer ">
			<button type="button" class="modal-close waves-effect waves-red btn-flat">Отмена</button>
		</div>
  </div>
	
	
	<div id="modal-callback" class="modal bottom-sheet modal-custom" tabindex="0" style="z-index: 1003; display: none; opacity: 0; bottom: -100%;">
		<div class="modal-content section-narrow">
					
					<button type="button" class="modal-close waves-effect waves-red btn-flat"><i class="mdi mdi-close"></i></button>
					
					<!-- by button data-action="Добавить цель" -->
					<h4 class="bot-20 sec-tit">Записаться к психологу</h4>
					
						<form class="action">
							<!-- for required fields class="required" -->
							<input type="hidden" name="act" value="callback"> <!-- by button data-act="add-item" -->
							<input type="hidden" name="email" value="<?=$USER->GetEmail()?>">
							<input type="hidden" name="login" value="<?=$USER->GetLogin()?>">
					
							<div class="modal-inputs">
							
								<div class="row">
								<div class="input-field col s12">
									<input id="name-callback" name="name" type="text" class="validate">
									<label for="name-callback">Ваше имя</label>
								</div>
								</div>
								
								<div class="row">
								<div class="input-field col s12">
									<input id="contact-callback" name="contact" type="text" class="validate required">
									<label for="contact-callback">Контакты для связи</label>
								</div>
								</div>
								
								
								<div class="row">
								<div class="input-field col s12">
									<textarea id="message-callback" name="message" class="materialize-textarea validate"></textarea>
									<label for="message-callback">Описание проблемы</label>
								</div>
								</div>
							
							</div>
							
							<div class="row">
								<div class="input-field col s12 notification">
									
								</div>
							</div>
							
							<input type="submit" value="Отправить" class="waves-effect waves-light btn red lighten-2">
							
							<div class="form-result"></div>
							<div class="form-loading" style="display: none;">Загрузка ...</div>
						
						</form>	
						
			</div>
			<div class="modal-footer ">
			
		</div>
  </div>

	
	<div id="modal-add-item" class="modal bottom-sheet modal-custom" tabindex="0" style="z-index: 1003; display: none; opacity: 0; bottom: -100%;">
		<div class="modal-content section-narrow">
					<h4 class="bot-20 sec-tit">Добавить запись</h4>
					
					<?if($USER->IsAuthorized()):?>
					
						<form class="action">
							
							<input type="hidden" name="act" value="add-item">
							<input type="hidden" name="id" value="">
							<input type="hidden" name="type" value="">
							<input type="hidden" name="user" value="<?=$USER->GetID()?>">
					
							<div class="modal-inputs">
							
							<div class="row">
							<div class="input-field col s12">
								<input id="name" name="name" type="text" class="validate required">
								<label for="name">Название</label>
							</div>
							</div>
							
							<div class="row">
							<div class="input-field col s12">
								<textarea id="detail" name="detail" class="materialize-textarea validate"></textarea>
								<label for="detail">Содержание</label>
							</div>
							</div>
							
							
							<div class="row row-term hide">
							<div class="input-field col s12">
								<i class="mdi mdi-calendar-range prefix"></i>
								<input type="text" id="term" name="term" class="datepicker">
								<label for="term">Срок (дата)</label>
							</div>
							</div>
							
							<div class="row row-term-time hide">
							<div class="input-field col s12">
								<i class="mdi mdi-clock-outline prefix"></i>
								<input type="text" id="term-time" name="term-time" class="timepicker">
								<label for="term-time">Срок (время)</label>
							</div>
							</div>
							
							<div class="row row-freq hide">
							<div class="input-field col s12">
								<input type="text" id="freq" name="freq" class="validate required" value="60">
								<label for="freq">Частота выполнения (мин.)</label>
							</div>
							</div>
							
							</div>
							
							<div class="row">
							<div class="input-field col s12 notification">
								
							</div>
							</div>
							
							
							
							<input type="submit" value="Отправить" class="waves-effect waves-light btn red lighten-2">
							
							<div class="form-result"></div>
							<div class="form-loading" style="display: none;">Загрузка ...</div>
						
						</form>	
					
					<?else:?>	
					
					<div class="add-item-warning">
						Для добавления записи необходимо <a href='/login/' title='Войти'>войти</a> или <a href='/reg/'  title='Зарегистрироваться'>зарегистрироваться</a>
					</div>
					
					<?endif?>
						
			</div>
			
			<div class="modal-footer ">
				<button type="button" class="modal-close waves-effect waves-red btn-flat">Отмена</button>
			</div>
  </div>


	<?if (preg_match('/^\/about/', $APPLICATION->GetCurPage(true))): ?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"carousel-pop",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "12",
		"IBLOCK_TYPE" => "clinli",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "TIMESTAMP_X",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
	);?>
	<?endif?>

	<?if(!$isIndex):?>
	</div> <!-- /container -->
	</div>	<!-- /section -->
	<?endif?>


	<!-- Боковое меню -->
	<ul id="slide-personal" class="sidenav sidesettings ">
    <li class="menulinks">
      <ul class="collapsible">
				<!-- Menu Personal Start-->
				<li class="sep-wrap"><div class="divider"></div></li>
				<li class="sh-wrap"><div class="subheader">
					Кабинет пользователя 
					[<?=$USER->GetEmail()?>]
				</div></li>
				
				<li class="lvl1 ">
					<div class="waves-effect menu-item-row">
						<i class="mdi  mdi-account-outline"></i>
						<a href="/personal/private/" title="Личные данные"><span class="title">Личные данные</span></a>                        
					</div>
				</li>
				
				<li class="lvl1  site_mode">
					<div class="waves-effect menu-item-row">
						<i class="mdi mdi-chart-bar-stacked"></i>
						<a href="/personal/results/" title="Результаты тестов"><span class="title">Результаты тестов</span></a>                       
					</div>
				</li>
				<li class="lvl1  site_mode">
					<div class="waves-effect menu-item-row">
						<i class="mdi mdi-note-multiple"></i>
						<a href="/tests/" title="Пройти тест"><span class="title">Пройти тест</span>  </a>                        
					</div>
				</li>
				<li class="lvl1  site_mode">
					<div class="waves-effect menu-item-row">
						<i class="mdi mdi-exit-to-app"></i>
						<a href="/?logout=yes" title="Выйти"><span class="title">Выйти</span>  </a>                        
					</div>
				</li>
				<li class="lvl1  site_mode">
					<div class="waves-effect menu-item-row">
						<i class="mdi mdi-format-list-checks"></i>
						<a href="/personal/items/" title="Мои записи"><span class="title">Мои записи</span>  </a>                        
					</div>
				</li>
				<li class="lvl1  site_mode">
					<div class="waves-effect menu-item-row">
						<i class="mdi mdi-format-list-checkbox"></i>
						<a href="/personal/mybot/"><span class="title">Мои Бот-записи</span>  </a>                        
					</div>
				</li>
				
				<!-- Menu Personal End-->
      </ul>
    </li>
  </ul>

	<footer class="page-footer center social-colored ">
		<div class="container footer-content">
			<div class="row mb-0">
				
				<div class="">
					<p class="text">Психологические тесты онлайн</p>
				</div>
				
				<div class="link-wrap">
					<ul class="social-wrap">
						<li class="social">
							<a title="CLINLI - группа во Вконтакте" href="https://vk.com/clinli24" target="_blank" class="socail-text-link">
								<img src="/assets/images/icons/vk.svg" style="max-width: 24px;" alt="CLINLI - группа во Вконтакте">
							</a>
							<!--a title="CLINLI - аккаунт в Инстаграм" href="https://www.instagram.com/clinli24/"><i class="mdi mdi-instagram"></i></a-->
						</li>
					</ul>
				</div>
				
			</div>
		</div>

		<div class="footer-copyright">
			<div class="container">
				&copy; Copyright <a href="//imirkin.ru" target="_blank" title="Создание сайтов">Mirkin Studio</a>. All rights reserved.
			</div>
		</div>
	</footer>

	<div class="backtotop">
		<a class="btn-floating btn primary-bg">
			<i class="mdi mdi-chevron-up"></i>
		</a>
	</div>

	<div class="footer-menu circular">
		<ul>
				<li>
					<a href="/tests/" > <i class="mdi mdi-note-multiple"></i>
					<span>Тесты</span>
					</a>    
				</li>
		 
				<li>
					<a href="/blog/" > <i class="mdi mdi-book-open-page-variant"></i>
					<span>Блог</span>
					</a>    
				</li>
				
				<li>
					<a href="/" > <i class="mdi mdi-home-outline"></i>
					<span>Домой</span>
					</a>    
				</li>
				
				<li>
					<a href="/glossary/" > <i class="mdi mdi-format-list-bulleted-type"></i>
					<span>Словарь</span>
					</a>    
				</li>
				
				<li>
					<?if(!$USER->IsAuthorized()):?>
					<a href="/login/" > <i class="mdi mdi-human-handsdown"></i>
					<span>Войти</span>
					</a>
					<?else:?>
					<a href="#" data-target="slide-personal"  class="text-darken-1 sidenav-trigger"> <i class="mdi mdi-human-handsdown"></i>
					<span>Кабинет</span>
					</a>

					
					<?endif?>	
				</li>
				
		</ul>
	</div>
	
	
	<!-- Common modal m.b. bottom-sheet -->
	<div id="modal-order" class="modal modal-fixed-footer"> 
		
		<form class="action">
			<input type="hidden" name="action" class="form-action-value" value="">
			<input type="hidden" name="info" class="form-info-value" value="">
			<div class="modal-content ">
				
				<button type="button" class="modal-close waves-effect waves-green btn-flat"><i class="mdi mdi-close"></i></button>
				
				
				<h4 class="bot-20 sec-tit">Оставить заявку/задать вопрос </h4>
					<div class="row">
					<div class="input-field col s12">
						<i class="mdi mdi-account-outline prefix"></i>
						<input id="yourname" name="yourname" type="text" class="validate">
						<label for="yourname" class="">Ваше имя</label>
					</div>
					</div>

					<div class="row">
					<div class="input-field col s12">
						<i class="mdi mdi-email-outline prefix"></i>
						<input id="email" name="email" type="email" class="validate required" value="<?=(!empty($USER->GetEmail())) ? $USER->GetEmail() : ''?>"> 
						<label for="email">Email</label>
					</div>
					</div>

					<div class="row">
					<div class="input-field col s12">
						<i class="mdi mdi-phone prefix"></i>
						<input id="phone" name="phone" type="text" class="validate required">
						<label for="phone" class="">Телефон</label>
					</div>
					</div>

					<div class="row">
					<div class="input-field col s12">
						<i class="mdi mdi-pencil prefix"></i>
						<textarea id="message" name="message" class="materialize-textarea"></textarea>
						<label for="message" class="">Сообщение</label>
					</div>
					</div>
					
					<div class="mt-1"><span class="form-result"></span>
					<span class="form-loading" style="display: none;">Загрузка ...</span></div>
			</div>
			
			<div class="modal-footer">
				<input type="submit" name="submit" class="waves-effect waves-red btn-flat" value="Отправить">
			</div>
		</form>	
		
	</div>
	


	<!-- PWA Service Worker Code -->
	<!--script type="text/javascript">
	// This is the "Offline copy of pages" service worker
	// Add this below content to your HTML page, or add the js file to your page at the very top to register service worker
	// Check compatibility for the browser we're running this in
	if ("serviceWorker" in navigator) {
		if (navigator.serviceWorker.controller) {
			console.log("[PWA Builder] active service worker found, no need to register");
		} else {
			// Register the service worker
			navigator.serviceWorker
				.register("pwabuilder-sw.js", {
					scope: "./"
				})
				.then(function(reg) {
					console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
				});
		}
	}
	</script--> 

	
	<script src="/modules/materialize/materialize.js"></script>
	<script src="/modules/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="/assets/js/variables.js"></script>
	
	<script src="/assets/js/quiz.js?<?=time()?>"></script>

	<script>
		$(document).ready(function(){
			
			
			$(window).resize(function() {
				height();
			});
			
			function height(){
				var h = $(window).height() - $('.footer-menu').height() - $('.page-footer').outerHeight(true);
				if($('#main-container').outerHeight(true) < h) $('#main-container').css({'height': h});
			}
			
			height();
			
			$(".carousel-fullscreen.carousel-slider").carousel({
				fullWidth: true,
				indicators: true,
			}).css("height", $(window).height());
			setTimeout(autoplay, 8500);
			function autoplay() {
				$(".carousel-fullscreen.carousel-slider").carousel("next");
				setTimeout(autoplay, 8500);
			}
			
			$(".carousel-pop").carousel({
				dist: 0,
				numVisible: 3,
				indicators: true
			});
			setTimeout(autoplay, 8500);
			function autoplay() {
				$(".carousel-pop").carousel("next");
				setTimeout(autoplay, 8500);
			}
			
			var numVisible = 3;
			var windowWidth = $(window).width();
			if(windowWidth > 1600) numVisible = 5;
			//else if(windowWidth > 1200) numVisible = 3;
			$(".carousel-linked").carousel({
				dist: 0,
				numVisible: numVisible,
				indicators: true,
			});
			setTimeout(autoplay, 8500);
			function autoplay() {
				$(".carousel-linked").carousel("next");
				setTimeout(autoplay, 8500);
			}
			
			
			$(".datepicker").datepicker({
					autoClose: true,
					firstDay: 1,
					format: "dd.mm.yyyy",
					i18n: {
							months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
							monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Июл", "Июл", "Окт", "Ноя", "Дек"],
							weekdays: ["Понедельник","Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"],
							weekdaysShort: ["Пн","Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
							weekdaysAbbrev: ["П","В", "С", "Ч", "П", "С", "В"],
							cancel:'Отмена',
							clear:'Очистить',
							done:'Ok'
					}
			 });
				 
			 $(".timepicker").timepicker({
				 twelveHour: false,
			 });
			
		
			function clearForm(form){
				form.trigger('reset');
				form.find ('input:not([type="submit"]):not([type="hidden"]), textarea, select').each(function() {$(this).val('');});
				//form.find ('input:checkbox').each(function() {$(this).prop('checked', false);});
			}
			
			/* form action */
			$('form.action').submit(function(e) {
				e.preventDefault(); 
				var error = 0;
				var $form = $(this);
				$form.find('.form-result').html("");
				$(this).find ('input, textarea, select').each(function() {$(this).removeClass("error");})
				$(this).find('input, textarea, select').each(function() {	
					if($(this).hasClass('required')) if($(this).val() == "") {$(this).addClass("error"); error++;}
				});
				$(this).find ('input:checkbox').each(function() {	
					if($(this).hasClass('required')) if(!$(this).prop("checked")) {$(this).addClass("error"); error++;}
				});
				if(error > 0) {
					$form.find('.form-result').html("Заполните обязательные поля!");
					return; 
				}
							
				var http = new XMLHttpRequest(), f = this;
				http.open("POST", "/lib/callback.php", true);
				http.onreadystatechange = function() {
					if (http.readyState == 4 && http.status == 200) {
						//console.log("http.responseText  = " + http.responseText);
						DATA = JSON.parse(http.responseText);
						if(DATA.RESULT == "ok") {
							//console.log(DATA.AFTERACTION);
							$form.find('.form-result').html("<div class='result-success'>"+DATA.MESSAGE+"</div>").show();
							clearForm($form);
							//$form.find ('input, textarea, select').each(function() {$(this).val('');});
							if(document.location.pathname.match(/\/personal\/items/gi)) window.location.reload();
							if(DATA.AFTERACTION == "reload") window.location.reload();
						}
						else {
							$form.find('.form-result').html(DATA.MESSAGE).show(); 
							error ++; 
							return;
						}
					}
				}
				http.onerror = function() {
					$form.find('.form-result').html("<div class='result__error'>При отправке возникла ошибка</div>").show(); 
					error = true;		
				}
				http.send(new FormData(f));
			});
			/* form action end*/
			
			
		}); 
		
		$(".modal").modal();
		
		$(document).on('click touchstart', '.modal-trigger', function(){ 
		
			modalId = $(this).attr('href');
			//modalId = modalId.replace("#", "");
			if(typeof $(this).data('action') !== 'undefined' && $(this).data('action') !== null ) { // data('action') is title
				$(modalId).find('h4').html($(this).data('action')); 
			}
			if(typeof $(this).data('info') !== 'undefined' && $(this).data('info') !== null ) { // data('info') is info
				$(modalId).find('[name="info"]').val($(this).data('info'));
			}
			if(typeof $(this).data('message') !== 'undefined' && $(this).data('message') !== null ) { // data('message') is message
				$(modalId).find('[name="message"]').val($(this).data('message'));
				$(modalId).find('[name="message"]').prev('.mdi').addClass('active');
				$(modalId).find('[name="message"]').next('label').addClass('active');
				
			}
			if(typeof $(this).data('action') !== 'undefined' && $(this).data('action') !== null ) {
				$(modalId+" .form-action-value").val($(this).data('action'));
			}
			if(typeof $(this).data('act') !== 'undefined' && $(this).data('act') !== null ) {
				$(modalId).find('[name="act"]').val($(this).data('act'));
			}
			if(typeof $(this).data('type') !== 'undefined' && $(this).data('type') !== null ) {
				$(modalId).find('[name="type"]').val($(this).data('type'));
			}
			
			//показываем/скрываем ненужные поля для goal, task, reminder & event
			if(	$(this).data('type') == 'goal' || 
					$(this).data('type') == 'task' || 
					$(this).data('type') == 'reminder' ||
					$(this).data('type') == 'event' 
					
					) {
				$(modalId).find('.row-term, .row-term-time').each(function() {$(this).removeClass('hide');})
			}
			else if($(this).data('type') == 'botitem'){
				$(modalId).find('.row-freq').each(function() {$(this).removeClass('hide');})
			}
			else {
				$(modalId).find('.row-term, .row-term-time, .row-freq').each(function() {$(this).addClass('hide');})
			}
			
			
			console.log("modal-trigger data-act=" + $(this).data('act'));
			
			
			switch($(this).data('act')){
				case 'add-item':
					$(this).find ('input, textarea, select').each(function() {$(this).val('');});
				break;
				case 'remove-item':
					$(modalId).find('.modal-inputs').html('Вы уверены, что хотите удалить запись <b>' + $(this).data('name') + '</b>?');
					$(modalId).find('[name="id"]').val($(this).data('id'));	
				break;
				case 'edit-item':
					$(modalId).find('[name="id"]').val($(this).data('id'));	
					
					$(modalId).find('[name="name"]').val($('.item-name-'+$(this).data('id')).html());	
					$(modalId).find('[name="name"]').siblings('label').addClass('active');
					
					$(modalId).find('[name="detail"]').val($('.item-detail-'+$(this).data('id')).html());	
					$(modalId).find('[name="detail"]').siblings('label').addClass('active');
					
					//$(modalId).find('[name="id"]').val($(this).data('id'));	
				break;
			}
			
		});
		
		
		/*
		$('.modal-trigger').on('click', function(e) {
		});
		*/
		
		
		
		
	</script>
	
	
	<script>
		$("select").formSelect();
		if($(".collapsible").length){
			$(".collapsible").collapsible();
		}
		if($(".collapsible.expandable").length){
			$(".collapsible.expandable").collapsible({
				accordion: false
			});
		}    
	</script>

	<?//$APPLICATION->ShowProperty('chartJs')?>
	
	<script src="/modules/echarts/echarts.min.js"></script>
	<script src="/modules/echarts/chart-echarts.js"></script>
	
	<script src="/modules/app/init.js?<?=$v?>"></script>
	<script src="/modules/app/settings.js?<?=$v?>"></script>
	<script src="/modules/app/scripts.js?<?=$v?>"></script>
	
	<link href="/modules/fancybox/jquery.fancybox.min.css" rel="stylesheet" type="text/css" media="screen"/>
	<script src="/modules/fancybox/jquery.fancybox.min.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			$('.preloader-background').delay(10).fadeOut('slow');
		});
		
		$(document).ready(function(){
			$('.tooltipped').tooltip();
		});
	</script>
	
	

	
</body>

</html>