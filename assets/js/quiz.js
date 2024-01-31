/*
1. вывести квиз на страницу +
2. обработчики кликов на кнопки +
3. переход к следующему вопросу +
4. валидация (нельзя не заполнить какой-то вопрос) +
5. добавление к отправке +
5.1. сбор данных +
6. отправка данных +

*/

const quizTemplate = (data = [], dataLength, options, hideNum = false) => {
	const {number, question} = data;
	const {nextBtnText} = options;
	const {prevBtnText} = options;
	const answers = data.answers.map(item => {
		return `
		
			<label class="quiz-question__label">
				<input type="${item.type}" data-valid="false" class="quiz-question__answer" name="${data.number}" ${item.type == 'text' ? 'placeholder="Введите ответ"' : ''} value="${item.type === 'text' ? '' : item.value != null ? item.value : item.answer}">
				<span>${item.answer}</span>
			</label>

		`;
	});
	
	return `
	
		<div class="quiz__content">
			<div class="quiz__questions">${hideNum == true ? '' : number + 1 + ' из ' + dataLength}  </div>
			<div class="quiz-question">
				<h3 class="quiz-question__title">${question}</h3>
				<div class="quiz-question__answers">
					${answers.join('')}
				</div>
				<div class="quiz-question__btns"><button type="button" class="quiz-question__btn" data-next-btn>${nextBtnText}</button></div>
			</div>
		</div>
	
	`;
};


// const quiz = document.querySelector('.quiz');
// quiz.innerHTML = quizTemplate(quizData[0], quizData.length);

class Quiz {
	constructor(selector, data, options) {
		
		this.$el = document.querySelector(selector);
		this.type = data.type; // type - тип подсчета, м.б. valuessum, т.е. суммирование значений
		this.hideNum = data.hideNum; // hideNum - скрывать ли номера
		this.data = data.questions;
		this.params = JSON.stringify(data.params) ; // ex. sex: 'male' 
		this.options = options;
		this.counter = 0;
		this.dataLength = this.data.length;
		this.resultArray = [];
		this.tmp = {};
		this.init();
		this.events();
		console.log(this.hideNum);
		//console.log(this.options);
	}
	


	init() {
		console.log('init!');
		this.counter = 0;
		this.$el.innerHTML = quizTemplate(quizData.questions[this.counter], this.dataLength, this.options, this.hideNum);
	}

	events() {
		this.$el.addEventListener('click', (e) => {
			
			if (e.target == document.querySelector('[data-next-btn]')) {
				this.addToSend();
				this.nextQuestion();
			}
			if (e.target == document.querySelector('[data-prev-btn]')) {
				//this.addToSend();
				this.prevQuestion();
			}

			if (e.target == document.querySelector('[data-send]')) {
				this.addToSend();
				this.send();
			}
		});

		this.$el.addEventListener('change', (e) => {
			if (e.target.tagName == 'INPUT') {
				
				console.log("this.counter="+this.counter+" this.options.idQuiz="+this.options.idQuiz);
				
				let elements = this.$el.querySelectorAll('input');
				elements.forEach(el => el.classList.remove('error'));
				
				if (e.target.type !== 'checkbox' && e.target.type !== 'radio') {
					let elements = this.$el.querySelectorAll('input');

					elements.forEach(el => el.checked = false);
				}

				this.tmp = this.serialize(this.$el);
			}
		});
	}

	nextQuestion() {
		if (this.valid()) {
			console.log('next question!');
			if (this.counter + 1 < this.dataLength) {
				this.counter++;
				this.$el.innerHTML = quizTemplate(quizData.questions[this.counter], this.dataLength, this.options, this.hideNum);

				if (this.counter + 1 == this.dataLength) {
					this.$el.insertAdjacentHTML('beforeend', `<div class="quiz-question__btns"><button type="button" class="quiz-question__btn quiz-question__btn--data-send" data-send>${this.options.sendBtnText}</button></div>`);
					this.$el.querySelector('[data-next-btn]').remove();
				}
			}
			this.$el.querySelector(this.options.btnsClass).insertAdjacentHTML('afterbegin', `<button type="button" class="quiz-question__btn" data-prev-btn>${this.options.prevBtnText}</button>`);
		}
	}
	
	prevQuestion() {
		console.log('prev question!');
		if (this.counter > 0) {
			this.counter--;
			this.$el.innerHTML = quizTemplate(quizData.questions[this.counter], this.dataLength, this.options, this.hideNum);

			if (this.counter > 0) {
				this.$el.querySelector(this.options.btnsClass).insertAdjacentHTML('afterbegin', `<button type="button" class="quiz-question__btn" data-prev-btn>${this.options.prevBtnText}</button>`);
			}
			
			//console.log(this.resultArray);
		}
	}

	valid() {
		let isValid = false;
		let elements = this.$el.querySelectorAll('input');
		elements.forEach(el => {
			switch(el.type) {
				case 'text':
					(el.value) ? isValid = true : el.classList.add('error');
				case 'checkbox':
					(el.checked) ? isValid = true : el.classList.add('error');
				case 'radio':
					(el.checked) ? isValid = true : el.classList.add('error');
			}
		});

		return isValid;
	}

	addToSend() {
		//this.resultArray.push(this.tmp);
		this.resultArray[this.counter] = this.tmp;
		console.log(this.resultArray)
	}

	send() {
		if(this.valid()) {
			console.log('send!');
			let form = this.$el;

			let elements = this.$el.querySelectorAll('input');
			elements.forEach(el => el.classList.remove('error'));

			const formData = new FormData();

			for(let item of this.resultArray) {
				for (let obj in item) {
					formData.append(obj, item[obj].substring(0, item[obj].length - 1))
				}
			}

			var object = {};
			formData.forEach(function(value, key){
				object[key] = value;
			});
			
			/* this.params = JSON.stringify(data.params) !!! */
			object['params'] = this.params;
			
			var json = JSON.stringify(object);
			
			console.log("json=");
			console.log(json);
			
			/* original send variant
			const response = fetch('/local/ajax/quiz.php', {
				method: 'POST',
				body: formData
			});
			*/
			
			console.log({data: json, type: this.type, id: this.options.idTest, code: this.options.codeTest, name: this.options.nameTest, options: this.options.optionsTest, variant: this.options.variantTest});
			
			$.ajax({
				method: "POST",
				url: "/lib/quiz.php",
				data: {data: json, type: this.type, id: this.options.idTest, code: this.options.codeTest, name: this.options.nameTest, options: this.options.optionsTest, variant: this.options.variantTest}
			})
			 .done(
				function( msg ) {
					console.log("msg1=" + msg);
					var msgArr = $.parseJSON(msg);
					form.innerHTML = "<div class='quiz-result'>"+msgArr['text']+"</div>";
				}
			 )
			 .fail((xhr, status) => console.log('error:', status));
			
		}
	}

	serialize(form) {
		let field, s = {};
		let valueString = '';
		if (typeof form == 'object' && form.nodeName == "FORM") {
			let len = form.elements.length;
			for (let i = 0; i < len; i++) {
				field = form.elements[i];
				
				if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {
					if (field.type == 'select-multiple') {
						for (j = form.elements[i].options.length - 1; j >= 0; j--) {
							if (field.options[j].selected)
								s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
						}
					} else if ((field.type != 'checkbox' && field.type != 'radio' && field.value) || field.checked) {
						valueString += field.value + ',';
						
						s[field.name] = valueString;
						
						
					}
				}
			}
		}
		return s
	}
}

