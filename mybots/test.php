<?php

global $arTask;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;

Loader::includeModule("iblock");
Loader::includeModule("sale");


include 'functions.php';
define('TOKEN', '6182608551:AAFxnBByp__y12vg7GeBbJz1SR5y-UkEaSk');
define('DEBUG', true);


$chat_id = 525697558;
$name = 525697558;

//echo date('d.m.Y h:i:s');

//use Datetime;


$now = new DateTime(); // текущее время на сервере
echo $now->format('h:i');
if($now->format('h:i') == '01:50') echo 'ok';

$date = DateTime::createFromFormat("d.m.Y h:i:s", '31.01.2024 00:28:00');

$interval = $now->diff($date); // получаем разницу в виде объекта DateInterval
echo $interval->y, "\n"; // кол-во лет
echo $interval->d, "\n"; // кол-во дней
echo $interval->h, "\n"; // кол-во часов
echo $interval->i, "\n"; // кол-во минут
echo $interval->w, "\n"; // кол-во недель


$startDateTime = '31.01.2024 00:22:00';
//$nowDateTime = date('d.m.Y h:i:s');
$nowDateTime = '31.01.2024 00:28:00';
$days = dayDiff($nowDateTime, $startDateTime); // разница в днях
$week = floor (($days - 1) / 7) + 1;

$rsItems = CIBlockElement::GetList(
    [],
    ['IBLOCK_ID' => 28, 'ACTIVE' => 'Y', 'PROPERTY_AGREEMENT_VALUE' => 'Да'],
    false,
    false,
    ['ID', 'NAME', 'PROPERTY_AGREEMENT_DATETIME']
);
while($arItem = $rsItems->GetNext()) {
    /*
    $startDateTime = $arItem['PROPERTY_AGREEMENT_DATETIME_VALUE'];
    //$nowDateTime = date('d.m.Y h:i:s');
    $nowDateTime = '31.01.2024 00:28:00';
    $days = dayDiff($nowDateTime, $startDateTime); // разница в днях
    $week = floor (($days - 1) / 7) + 1;
    */

    $start = DateTime::createFromFormat('d.m.Y H:i:s', '29.10.2023 01:06:21');
    $now = new DateTime();
    $now = DateTime::createFromFormat('d.m.Y h:i:s', '30.10.2023 02:06:21');

    $interval = DateTime::createFromFormat('d.m.Y', $start->format('d.m.Y'))->diff(DateTime::createFromFormat('d.m.Y', $now->format('d.m.Y')));
    $days = $interval->d;
    echo $days;
    //echo $interval->format('%R%a days');;
    $weeks = floor($days / 7);




}
