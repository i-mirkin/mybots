<?
global $USER;
if ($USER->IsAuthorized()) //Если пользователь авторизован
{
$rsUser = CUser::GetByID($USER->GetID()); //$USER->GetID() - получаем ID авторизованного пользователя и сразу же его поля
$arUser = $rsUser->Fetch();
//$arResult["PERSONAL_PHOTO_HTML"] = CFile::ShowImage($arUser["PERSONAL_PHOTO"], 150, 150, "border=0", "", true); //$arUser["PERSONAL_PHOTO"] - тут находится id аватарки, здесь мы получим HTML-код для вывода нужного изображения
}
if($arUser["PERSONAL_PHOTO"] > 0) $PERSONAL_PHOTO_SRC = CFile::GetFileArray($arUser["PERSONAL_PHOTO"])["SRC"];
else $PERSONAL_PHOTO_SRC = "/assets/images/personal-no-photo.jpg";
?>


<!--div class="row">
	<div class="col s12">
		<div class="personal-photo" style="background-image: url(<?=$PERSONAL_PHOTO_SRC?>)"></div>
		<div class="personal-name"><a href="/personal/private/" title="Изменить личные данные" class="underline"><?=(CUser::GetFirstName())?CUser::GetFirstName():CUser::GetLogin()?></a></div>
	</div>
</div-->

<div class="row">
	<div class="col s6 m6 l3">
	<a href="/personal/private/" title=""><div class="icon-block block-small center z-depth-1">
		<div class="icon  primary-text"><i class="mdi mdi-human-handsdown"></i></div>
		<div class="title ">Личные данные</div>
	</div></a>
	</div>

	<!--
	<div class="col s6 m6 l3">
	<a href="/personal/subscribe/" title=""><div class="icon-block block-small center z-depth-1">
		<div class="icon  primary-text"><i class="mdi mdi-cards-variant"></i></div>
		<div class="title ">Подписки</div>
	</div></a>
	</div>
	-->
	
	<div class="col s6 m6 l3">
		<a href="/personal/results/" title="">
			<div class="icon-block block-small center z-depth-1">
				<div class="icon  primary-text"><i class="mdi mdi-chart-bar-stacked"></i></div>
				<div class="title ">Результаты тестов</div>
			</div>
		</a>
	</div>
	
	<div class="col s6 m6 l3">
		<a href="/tests/" title="">
			<div class="icon-block block-small center z-depth-1">
				<div class="icon  primary-text"><i class="mdi mdi-bulletin-board"></i></div>
				<div class="title">Пройти тест</div>
			</div>
		</a>
	</div>

	<div class="col s6 m6 l3">
	<a href="/?logout=yes" title=""><div class="icon-block block-small center z-depth-1">
		<div class="icon  primary-text"><i class="mdi mdi-exit-to-app"></i></div>
		<div class="title ">Выйти</div>
	</div></a>
	</div>
</div>
		
<?if(false):?>
	<a href="/personal/orders/" class="list-group-item list-group-item-action bg-light">Текущие заказы</a>
	<a href="/personal/private/" class="list-group-item list-group-item-action bg-light">Личные данные</a>
	<a href="/personal/orders/?filter_history=Y" class="list-group-item list-group-item-action bg-light">История заказов</a>
	<a href="/personal/profiles/" class="list-group-item list-group-item-action bg-light">Профили заказов</a>
	<a href="/personal/cart/" class="list-group-item list-group-item-action bg-light">Корзина</a>
	<a href="/personal/subscribe/" class="list-group-item list-group-item-action bg-light">Подписки</a>
	<br>
	<a href="/?logout=yes" class="list-group-item list-group-item-action bg-light">Выйти</a>
<?endif?>