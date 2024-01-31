<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты покупки");
global $USER;
CModule::IncludeModule("iblock");

$mrh_pass1 = "fmiHr4H98PpYVtM8wJg0"; // work
//$mrh_pass1 = "FSPDb7M5s6cXQU0Gw5GB"; // test
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$crc = strtoupper($_REQUEST["SignatureValue"]);
$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1"));
?>




	<?if ($my_crc != $crc):?>
		
		<h1 class="pagetitle">Ошибка при совершении покупки</h1>

		<div class="card contactus">
		<div class="row ">

			<div class="col s12 pad-0">
				<h5 class="bot-20 sec-tit  ">Ошибка контрольной суммы. Сообщите об ошибке через форму обратной связи.</h5>  
				<div>
					Если Вы произвели оплату и получили данное сообщение, напишите нам через   
					<a data-action="Ошибка при оплате" href="#modal-order" class="underline modal-trigger" data-message="Ошибка при оплате <?=$_REQUEST['InvId']?>">форму обратной связи</a>.
				</div>
			</div>

		</div>
		</div>

	<?else:?>
	
	
		<?
		// отмечаем тест как оплаченный
		$prop['PAID_RESULT'] = array('VALUE' => 229);
		CIBlockElement::SetPropertyValuesEx($_REQUEST['InvId'], 11, $prop);
		?>
		
		<?if(!$USER->IsAuthorized()): // если разлогинился ?>
			<h1 class="pagetitle">Требуется авторизация</h1>

				<div class="card contactus">
				<div class="row ">

					<div class="col s12 pad-0">
						<h5 class="bot-20 sec-tit  ">Оплата успешно прошла!</h5>  
						<div>
							Ваши результаты сформированы в Личном кабинете сайта. Для просмотра <a href="/login/" title="Вход на сайт">войдите</a> на сайт. 
						</div>
					</div>

				</div>
			</div>
		<?else:?>
		
			<?
			// уведомление на почту
			global $USER;
			$email = $USER->GetEmail();
			//EXTENDED_RESULT_ALLOWED
			$SITE_ID = 'ps';
			$EVENT_TYPE = 'EXTENDED_RESULT_ALLOWED';
			$arFeedForm = array(
			"EMAIL" => $email,
			"BODY" => "Доступ к расширенным результатам тестирования разрешен. <br> <a href='https://clinli.ru/personal/results/".$_REQUEST['InvId']."/'>https://clinli.ru/personal/results/".$_REQUEST['InvId']."/</a>",
			);
			$result = CEvent::Send($EVENT_TYPE, $SITE_ID, $arFeedForm );
			?>
		
			<h1 class="pagetitle">Спасибо за покупку!</h1>

			<div class="card contactus">
			<div class="row ">

				<div class="col s12 pad-0">
					<h5 class="bot-20 sec-tit">Оплата прошла!</h5>  
					<div>
						
						
						<script>
							var count = 5;
							setInterval(function(){
									count--;
									document.getElementById('countDown').innerHTML = count;
									if (count == 0) {
											window.location = "https://clinli.ru/personal/results/<?=$_REQUEST['InvId']?>/#extended"; 
									}
							},1000);
						</script>
						Через несколько секунд Вы будете пренаправлены на страницу с результатами теста.
						<div id="countDown"></div>
						
						Если перенаправление не прошло автоматически, перейдите к оплаченным результатм теста по <a href="https://clinli.ru/personal/results/<?=$_REQUEST['InvId']?>/#extended" class="underline">ссылке</a>.
					</div>
				</div>

			</div>
			</div>

	<?endif?>

<?endif // IsAuthorized ?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>