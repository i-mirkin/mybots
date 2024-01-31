<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Словарь терминов");
$APPLICATION->SetPageProperty("title", "Словарь основных психологических терминов");
$APPLICATION->SetPageProperty("description", "Словарь основных психологических терминов");
$APPLICATION->SetPageProperty("keywords", "глоссарий, термины, словарь, психология, определение");

$APPLICATION->SetPageProperty("bodyClass", "test");
// <div ..-bg  /div>
// <div container
// <div section
?>


<h1 class="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>

<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "-"
	),
	false,
	Array('HIDE_ICONS' => 'Y')
);?>

</div>
</div>

<div class="container">
<div class="section">

<?
if(!empty($_GET['l'])) {
	$GLOBALS['arrGlossaryFilter'] = array('ACTIVE' => 'Y', 'NAME' => $_GET['l']."%");
	$APPLICATION->SetPageProperty("title", "Психологический словарь - слова на букву «".$_GET['l']."»");
	$APPLICATION->SetPageProperty("description", "Слова психологической тематики на букву «".$_GET['l']."»");
	$APPLICATION->SetPageProperty("keywords", "психология, термины, слова, словарь");
	
}

$APPLICATION->IncludeComponent(
	"bitrix:news",
	"glossary",
	Array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COLOR_NEW" => "3E74E6",
		"COLOR_OLD" => "C0C0C0",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array("",""),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array("",""),
		"DETAIL_SET_CANONICAL_URL" => "Y",
		"DISPLAY_AS_RATING" => "rating",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"FORUM_ID" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "15",
		"IBLOCK_TYPE" => "clinli",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array("",""),
		"LIST_PROPERTY_CODE" => array("",""),
		"MESSAGES_PER_PAGE" => "10",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"NUM_DAYS" => "30",
		"NUM_NEWS" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"PERIOD_NEW_TAGS" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"REVIEW_AJAX_POST" => "Y",
		"SEF_FOLDER" => "/glossary/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("detail"=>"#ELEMENT_CODE#/","news"=>"","rss"=>"rss/","rss_section"=>"#SECTION_ID#/rss/","search"=>"search/","section"=>""),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_LINK_TO_FORUM" => "Y",
		"SORT_BY1" => "NAME",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"TAGS_CLOUD_ELEMENTS" => "150",
		"TAGS_CLOUD_WIDTH" => "100%",
		"URL_TEMPLATES_READ" => "",
		"USE_CAPTCHA" => "Y",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arrGlossaryFilter",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "Y",
		"USE_SEARCH" => "Y",
		"USE_SHARE" => "N",
		"YANDEX" => "N"
	)
);?>

 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>