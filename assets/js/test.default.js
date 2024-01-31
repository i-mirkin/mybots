/*
var json = {
	"locale": "ru",
	title: "Тест",
	showProgressBar: "bottom",
	showTimerPanel: "bottom",
	//maxTimeToFinishPage: 10,
	maxTimeToFinish: 120,
	firstPageIsStarted: true,
	startSurveyText: "Начать",
	//goNextPageAutomatic: true, 
	//showNavigationButtons: false,
	pages: [
		{ questions: [ {type: "html", html: "Время на опрос 2 мин." } ] },
		{ questions: [{type: 'radiogroup',  name: '1', title: 'Я люблю читать научно-техническую литературу', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '2', title: 'У меня хороший аппетит', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '3', title: 'По утрам я обычно встаю свежим и отдохнувшим', choices: ['Да', 'Нет']}]},
	],
	completedHtml: "<h4>Тест завершен!</h4>"
};
*/
var json = {
	"locale": "ru",
	title: "Тест",
	showProgressBar: "bottom",
	//showTimerPanel: "bottom",
	//maxTimeToFinishPage: 10,
	//maxTimeToFinish: 120,
	firstPageIsStarted: true,
	startSurveyText: "Начать",
	goNextPageAutomatic: true, 
	
	//showNavigationButtons: false,
	pages: [
		{ questions: [ {type: "html", html: "Вам будет предъявлена целая серия разных утверждений. Оценивая каждое из них не тратьте много времени на раздумья. Наиболее естественна первая непосредственная реакция.<br> Внимательно вчитывайтесь в текст, дочитывая до конца каждое утверждение и оценивая его как верное или неверное по отношению к Вам. Старайтесь отвечать искренно, иначе Ваши ответы будут распознаны как недостоверные и опрос придется повторить.<br> Разбирайтесь с опросником как бы наедине с самим собой - «Какой я на самом деле?». <strong>Тогда Вам будет интересна интерпретация полученных данных.</strong>" } ] },
		{ questions: [{type: 'radiogroup',  name: '1', title: 'Я люблю читать научно-техническую литературу', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '2', title: 'У меня хороший аппетит', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '3', title: 'По утрам я обычно встаю свежим и отдохнувшим', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '4', title: 'Думаю, что мне понравилась бы работа библиотекаря', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '5', title: 'Малейший шум меня будит', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '6', title: 'Я люблю читать в газетах заметки о преступлениях', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '7', title: 'Мои руки и ноги обычно достаточно теплые', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '8', title: 'Моя повседневная жизнь полна событий, интересующих меня', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '9', title: 'Моя работоспособность не хуже, чем была раньше', choices: ['Да', 'Нет']}]},
		{ questions: [{type: 'radiogroup',  name: '10', title: 'Я часто ощущаю «комок» в горле', choices: ['Да', 'Нет']}]},
	],
	completedHtml: "<h4>Тест завершен!</h4>"
};