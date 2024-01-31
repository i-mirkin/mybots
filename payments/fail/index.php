<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка при совершении покупки");
global $USER;
?>

<h1 class="pagetitle">Ошибка при совершении покупки</h1>

<div class="card contactus">
<div class="row ">
<div class="col s12 pad-0"><h5 class="bot-20 sec-tit  ">Ошибка при совершении покупки</h5>  
<div>

Если Вы произвели оплату и получили данное сообщение, напишите нам через   
<a data-action="Ошибка при оплате" href="#modal-order" class="underline modal-trigger" data-message="Ошибка при оплате <?=$_REQUEST['InvId']?> <?=$USER->GetEmail()?>">форму обратной связи</a>.




</div>
</div>
</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>