<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О проекте CLINLI");
$APPLICATION->SetPageProperty("title", "Сотни психологических диагностик, тестов для оценки личности, профессиональный аппарта для тестирования");
// <div ..-bg  /div>
// <div container
// <div section
?>

<h1 class="pagetitle"><?$APPLICATION->ShowTitle();?></h1>

</div>
</div>

<div class="container">
<div class="section">


<div class="row ui-mediabox blogs blog-view bot-0">
		<div class="col s12">
		<?
			//echo __DIR__;
			//echo $_SERVER['DOCUMENT_ROOT'];
			$file = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."js".DIRECTORY_SEPARATOR."test.test-of-financial-literacy.js";
			$fh = fopen($file, "r+");
			if($fh){
				$contents = fread($fh, filesize($file));
				fclose($fh);
				echo $contents;
				preg_match_all("/question: '(.*?)'/ums", $contents, $matches, PREG_SET_ORDER);
				foreach($matches as $key=>$val) {
					echo $val[1];
					echo "<br><br>";
				}
			}
			else {
				echo "error reading";
			}
		?>
		
				
		</div>
</div>

	


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>