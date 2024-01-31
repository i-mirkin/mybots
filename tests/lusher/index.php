<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Цветовой тест Люшера");

$APPLICATION->SetPageProperty("title", "Пройти онлайн цветовой тест Люшера");
$APPLICATION->SetPageProperty("description", "Цветовой тест Люшера – это один из наиболее популярных психологических тестов, используемых для диагностики внутреннего стостояния человека.");
$APPLICATION->SetPageProperty("keywords", "люшера, цветовой, тесты, онлайн, тестирование, психологические, образовательные, школьные, бесплатно, быстро");

$APPLICATION->SetPageProperty("bodyClass", "test special-tooltip");
// <div ..-bg>  </div> in header
// <div container in header
// <div section in header
//http://www.test-lushera.ru/test/

/*
УБРАЛ
<b>Обратите внимание:</b> несколько раз нужно будет выбрать не симпатичный, а наоборот, неприятный цвет.<br>
<b>Следите за инструкциями!</b>
*/

?>


<h1 class="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>

		
<div class="blogs blog-view bot-0 test-single">
	
<div class="d-flex test-single-props">

<div class="d-flex test-single-prop">

</div>
</div>


<div class="test-single-detail">
<?
$rsItems = CIBlockElement::GetList(array(),array('IBLOCK_ID' => 13,'ID' => 229559), false, false, array('ID', 'DETAIL_TEXT', 'PROPERTY_INSTRUCTIONS'));
if($arItem = $rsItems->GetNext())	echo $arItem['DETAIL_TEXT'];
?>	
</div>

<div class="spacer"></div>


<?if(!empty($arItem['~PROPERTY_INSTRUCTIONS_VALUE']['TEXT'])):?>
<div class="test-instructions" style="background-color: #efebeb; padding: 15px;">
<h3>Инструкция</h3>
<?=$arItem['~PROPERTY_INSTRUCTIONS_VALUE']['TEXT']?>
</div>
<?endif?>


<div class="spacer"></div>
	
</div>


<?$APPLICATION->IncludeComponent("bitrix:main.include", "",	Array("AREA_FILE_SHOW" => "file", "PATH" => "/include/test-attention.php", "ID" => ""));?>


<a class="waves-effect waves-light btn-large bg-primary my-0 modal-trigger" href="#test-modal--lusher" id="start-test">Пройти тест</a>


<div class="spacer"></div>
<div class="divider"></div>
<div class="spacer"></div>




<div class="spacer"></div>
<div class="spacer"></div>
<a href="/tests/" title="Назад в раздел">Назад к тестам</a>
<div class="spacer"></div>

	</div>
</div>





<script type="text/javascript">

	$(document).ready(function() {
		// первые 4 серые 0-3
		// следующие 7 выбор 4-10 
		// следующие 30 парные 11-40
		// следующие 7 выбор 41-47
		// 48 sex
		// 49 age
		
		//3,0,2,1,7,6,5,4,3,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1		
		// серый синий зеленый красный желтый фиолетовый коричневый черный
		//  0     1       2       3      4         5         6        7
		
		$(".tooltipped").tooltip();
		$(".tooltipped-lusher-select-color").tooltip({
			html: "<div style='width:150px;'><h6 class='tooltip-title'>Выберите цвет</h6><p>Какой из этих цветов кажется вам наиболее симпатичным?</p></div>",
		});
		
		var choises = new Array();
		
		$("body").on("click", "#finish-test", function (e) {
			console.log("finish-test click");
			var sex = $('#sex').val()
			var age = $('#age').val()
			console.log('data: '+choises+","+sex+","+age);
			$.ajax({
				method: "POST",
				url: "/lib/quiz.php",
				data: {data: choises+","+sex+","+age, id: "229559", code: "lusher", name: "Тест Люшера"}
			})
			 .done(
				function( msg ) {
					console.log("msg1=" + msg);
					var msgArr = $.parseJSON(msg);
					$('#testplace').html("<div class='quiz-result-container'><div class='quiz-result'>"+msgArr['text']+"</div></div>");
				}
			 )
			 .fail((xhr, status) => console.log('error:', status));

		});
			
			
		$( "#start-test" ).click(function(e) {
			
			var colours = [
				['#94989b','#484848','#231f20','#acacac','#dcdcdc'],
				['#94989b','#014983','#017477','#eb1b31','#fee600','#d80081','#9d685a','#231f20'],
				['#014983','#fee600'],
				['#017477','#eb1b31'],
				['#014983','#017477'],
				['#eb1b31','#fee600'],
				['#014983','#eb1b31'],
				['#017477','#fee600'],
				['#014983','#4c7470'],
				['#006054','#d80081'],
				['#014983','#006054'],
				['#d80081','#4c7470'],
				['#014983','#d80081'],
				['#006054','#4c7470'],
				['#74704c','#788000'],
				['#017477','#445c00'],
				['#74704c','#017477'],
				['#445c00','#788000'],
				['#74704c','#445c00'],
				['#017477','#788000'],
				['#9d685a','#fc6000'],
				['#6c003c','#eb1b31'],
				['#9d685a','#6c003c'],
				['#eb1b31','#fc6000'],
				['#9d685a','#eb1b31'],
				['#6c003c','#fc6000'],
				['#b86c00','#fee600'],
				['#888400','#d86800'],
				['#b86c00','#888400'],
				['#d86800','#fee600'],
				['#b86c00','#d86800'],
				['#888400','#fee600'],
				['#94989b','#014983','#017477','#eb1b31','#fee600','#d80081','#9d685a','#231f20']
			];
			var cards = new Array();
			for(i=0;i<colours.length;i++) {
			 tpwidth=Math.floor(($('#testplace').width()/colours[i].length)*100)/100;
			 cards[i]='<div id=\'card\' style=\'height:100%\'>'
			 for(j=0;j<colours[i].length;j++) cards[i]+='<div class=\'color\' style=\'float:left; background-color:'+colours[i][j]+'; height:100%; width:'+tpwidth+'%\'><input type=\'hidden\' value=\''+j+'\'/></div>'
			 cards[i]+='</div>'
			};
			
			var cur_card = 0; cur_choise = 1;
			
			function choise(el,code,num){
			 $(el).remove();
			 $('#card').find('div.color').css('width',(Math.floor(($('#testplace').width())/(colours[num].length-cur_choise))-1)+'px');
			 choises.push(code);
			 console.log("choises = "+choises);
			 if(choises.length==48) echo_result();
			 if(cur_choise==colours[num].length-1) {
				cur_choise = 1;
				cur_card++;
				$('#card').html(cards[cur_card]).find('.color').click(function(){
				var code = $(this).children('input').val();
				choise($(this),code,cur_card);});
			 } 
			 else {
				cur_choise++;
			 }
			}
			
			function echo_result() { 
					//$('#workscreen').remove();
					
					finishStr =
					`
					<div class="w-100">
						<div class="row">
						<div class="input-field sel-wrap col s12 l6 offset-l3">
							<select name="sex" id="sex">
								<option value="" disabled>Укажите Ваш пол</option>
								<option value="Мужской" selected>Мужской</option>
								<option value="Женский">Женский</option>
							</select>
							<label>Пол</label>
						</div>
						</div>
						
						<br>
						
						<div class="row">
						<div class="input-field sel-wrap col s12 l6 offset-l3">
							<select name="age" id="age">
								<option value="" disabled>Укажите Ваш возраст</option>
									`;
									var selected="";
									for(i = 10; i <= 80; i++ ){
										if(i == 30) selected = 'selected';
										else selected = '';
										finishStr += '<option '+ selected +' value='+ i +'>'+ i +'</option>';	
									}
									finishStr +=
									`			
							</select>
							<label>Возраст</label>
						</div>
						</div>
						
						<div class="row">
							<div class="col s12 text-center">
								<a class="waves-effect waves-light btn-large bg-primary my-0" id="finish-test">Завершить</a>
							</div>
						</div>
						
						
					</div>
					`;
					
					$('#testtitle').html("");
					$('#testplace').html("");
					$('#testplace').prepend(finishStr);
					$('select').formSelect();
					console.log(choises);
				
			}
			
			
			$('#testplace').html(cards[cur_card]).find('.color').click(function(){
				var code = $(this).children('input').val();
				choise($(this),code,cur_card);
			});
			//echo_result();
		});
	});
</script>


<div id="test-modal--lusher" class="modal modal-test" >
	<style type="text/css" scoped>
		#testtitle {
		position: absolute;
		top: 60px;
		left: 30px;
		right: 30px;
		text-align: center;
		background: #ffffff5c;
		}
		#testtitle h2 {
		font-size: 1.2rem;
		margin: 0;
		font-weight: 700;
		color: #333;
		}
		#testtitle p {
    line-height: 1.3;
    font-size: 1rem;
		}
	</style>

	<div class="modal-content">
		<button type="button" class="modal-close waves-effect waves-green btn-flat right"><i class="mdi mdi-close-outline"></i></button>
		
		<div id="testtitle"><h2>Выберите цвет</h2><p>Какой из этих цветов кажется вам наиболее симпатичным?</p></div>
		
		<div id="testplace" style="width: 100%; height: 100%;" class="tooltipped-lusher-select-color" data-position="bottom">
			
		</div>
	</div>
</div>


</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>