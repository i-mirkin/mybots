<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Форум");
// <div ..-bg  /div>
// <div container
// <div section
?>
<h1 class="pagetitle"><?$APPLICATION->ShowTitle();?></h1>
</div>
</div>

<div class="container">
<div class="section">

 <?$APPLICATION->IncludeComponent(
	"bitrix:forum",
	"",
	Array(
		"AJAX_POST" => "N",
		"ATTACH_MODE" => array("NAME"),
		"ATTACH_SIZE" => "90",
		"CACHE_TIME" => "3600",
		"CACHE_TIME_FOR_FORUM_STAT" => "3600",
		"CACHE_TIME_USER_STAT" => "60",
		"CACHE_TYPE" => "A",
		"CHECK_CORRECT_TEMPLATES" => "N",
		"DATE_FORMAT" => "d.m.Y",
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",
		"EDITOR_CODE_DEFAULT" => "N",
		"FID" => array(),
		"FORUMS_PER_PAGE" => "10",
		"HELP_CONTENT" => "",
		"IMAGE_SIZE" => "500",
		"MESSAGES_PER_PAGE" => "10",
		"NAME_TEMPLATE" => "",
		"NO_WORD_LOGIC" => "N",
		"PAGE_NAVIGATION_TEMPLATE" => "forum",
		"PAGE_NAVIGATION_WINDOW" => "5",
		"PATH_TO_AUTH_FORM" => "",
		"RATING_ID" => array(),
		"RATING_TYPE" => "",
		"RESTART" => "N",
		"RSS_CACHE" => "1800",
		"RSS_COUNT" => "30",
		"RSS_TN_DESCRIPTION" => "",
		"RSS_TN_TITLE" => "",
		"RSS_TYPE_RANGE" => array("RSS1,RSS2,ATOM"),
		"RULES_CONTENT" => "",
		"SEF_FOLDER" => "/forum/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("active"=>"topic/new/","help"=>"help/","index"=>"index.php","list"=>"forum#FID#/","message"=>"messages/forum#FID#/message#MID#/#TITLE_SEO#","message_appr"=>"messages/approve/forum#FID#/topic#TID#/","message_move"=>"messages/move/forum#FID#/topic#TID#/message#MID#/","message_send"=>"user/#UID#/send/#TYPE#/","pm_edit"=>"pm/folder#FID#/message#MID#/user#UID#/#mode#/","pm_folder"=>"pm/folders/","pm_list"=>"pm/folder#FID#/","pm_read"=>"pm/folder#FID#/message#MID#/","pm_search"=>"pm/search/","profile"=>"user/#UID#/edit/","profile_view"=>"user/#UID#/","read"=>"forum#FID#/#TITLE_SEO#","rss"=>"rss/#TYPE#/#MODE#/#IID#/","rules"=>"rules/","search"=>"search/","subscr_list"=>"subscribe/","topic_move"=>"topic/move/forum#FID#/topic#TID#/","topic_new"=>"topic/add/forum#FID#/","topic_search"=>"topic/search/","user_list"=>"users/","user_post"=>"user/#UID#/post/#mode#/"),
		"SEND_MAIL" => "E",
		"SEO_USER" => "Y",
		"SEO_USE_AN_EXTERNAL_SERVICE" => "N",
		"SET_DESCRIPTION" => "N",
		"SET_NAVIGATION" => "N",
		"SET_PAGE_PROPERTY" => "N",
		"SET_TITLE" => "Y",
		"SHOW_AUTHOR_COLUMN" => "N",
		"SHOW_AUTH_FORM" => "Y",
		"SHOW_FIRST_POST" => "N",
		"SHOW_FORUMS" => "N",
		"SHOW_FORUM_ANOTHER_SITE" => "Y",
		"SHOW_FORUM_USERS" => "N",
		"SHOW_LEGEND" => "N",
		"SHOW_NAVIGATION" => "N",
		"SHOW_RATING" => "",
		"SHOW_STATISTIC_BLOCK" => array("STATISTIC,BIRTHDAY,USERS_ONLINE"),
		"SHOW_SUBSCRIBE_LINK" => "N",
		"SHOW_TAGS" => "Y",
		"SHOW_VOTE" => "Y",
		"THEME" => "orange",
		"TIME_INTERVAL_FOR_USER_STAT" => "10",
		"TMPLT_SHOW_ADDITIONAL_MARKER" => "",
		"TOPICS_PER_PAGE" => "10",
		"USER_FIELDS" => array("UF_FORUM_MES_URL_PRV,UF_TASK_COMMENT_TYPE"),
		"USER_PROPERTY" => array(""),
		"USE_LIGHT_VIEW" => "Y",
		"USE_NAME_TEMPLATE" => "N",
		"USE_RSS" => "Y",
		"VOTE_CHANNEL_ID" => "",
		"WORD_LENGTH" => "50",
		"WORD_WRAP_CUT" => "23"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>