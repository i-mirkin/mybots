<?
function landAppeared($in) {
	// https://testometrika.com/
	$rights = array(
	'В середине XVIII века',
	'Кант',
	'Лаплас',
	'С мощного взрыва',
	'Через 400-600 млн лет после образования планеты',
	);
	
	// получаем список вопросов из js-файла
	$questions = array();
	$file = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."js".DIRECTORY_SEPARATOR."test.land-appeared.js";
	$fh = fopen($file, "r+");
	if($fh){
		$contents = fread($fh, filesize($file));
		fclose($fh);
		preg_match_all("/question: '(.*?)'/ums", $contents, $matches, PREG_SET_ORDER);
		foreach($matches as $key=>$val) $questions[$key] = $val[1];
	}
		
	$R = 0;
	foreach ($in as $key => $answer) {
		if($answer == $rights[$key]) {
			$R++;
			$DATA['RESULT_FULL'] .= ($key+1).". ".$questions[$key]." <b class='right-answer'>".$answer."</b><br>";
		}
		
		else {
			$DATA['RESULT_FULL'] .= ($key+1).". ".$questions[$key]." <b class='wrong-answer'>".$answer."</b> - <b class='right-answer'>".$rights[$key]."</b><br>";
		}
	}

	
	$DATA['RESULT_INTEGRAL'] = round(10*$R/count($rights), 2);
	$DATA['RESULT_SHORT'] = 'Правильных ответов — <b>'.$R.' из '.count($rights).'</b>.';
	
	$DATA['RESULT_FULL'] .= 'Правильных ответов — <b>'.$R.' из 5</b>. <br>';
	if($R >= 5 ) $DATA['RESULT_FULL'] .= 'Ваш результат <b>выше среднего</b>.<br>';
	elseif($R >= 3 && $R <= 4 ) $DATA['RESULT_FULL'] .= 'Ваш результат <b>средний</b>.<br>';
	elseif($R <= 2 ) $DATA['RESULT_FULL'] .= 'Ваш результат <b>ниже среднего уровня</b>. Вы можете почитать материал <a href="/blog/land-appeared/" title="Как появилась Земля?">Как появилась Земля?</a> в нашем <a href="/blog/" title="Блог обо всём">блоге</a><br>';
	
	return $DATA;
};

