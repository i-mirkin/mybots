(function($){
 

			$(document).ready(function(){
				
				if($('.parallax').length){
						$('.parallax').parallax();
				}
				
				
				//страница бота осознанности
				URL_ACT = 'https://clinli.ru/fulllife/action.php';
				
				if ($('#btn-join').length) {
						
					$( "#btn-join" ).click(function() {
						 $('#result').html('');
						//if($('#bname').val() == undefined) $('#bname').append('Введите имя'); // если поле совсем не существует
						// for textfield use if( !this.value )
						if(!$('#name-join').val()) {$('#result').append('Введите имя'); return;}
						if(!$('#email-join').val()) {$('#result').append('Введите E-mail'); return;}
						if(!$('#password-join').val()) {$('#result').append('Введите пароль'); return;}
						
						
						/*
						//fetch json
						fetch('https://httpbin.org/post', {
							method: 'POST',
							headers: {
								'Accept': 'application/json',
								'Content-Type': 'application/json'
							},
							body: JSON.stringify({a: 1, b: 'Textual content'})
						});

						fetch(URL_ACT, {
							method: 'post',  
							headers: {  
								"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
							},  
							body: 'bname=' + $('#bname').val() + '&bemail='+ $('#bemail').val() + '&bpassword='+ $('#bpassword').val();
						}
						*/
						
						$.ajax({
							type: "POST",
							url: "/fulllife/action.php",
							data: 'act=useradd&name=' + $('#name-join').val() + '&email='+ $('#email-join').val() + '&password='+ $('#password-join').val(),
							success: function(answer){
								data = JSON.parse(answer); // на выходе объект: data.result data.message
								//$('#bresult').append(JSON.stringify(answer)); /* на выходе строка \"result\":\"ok\",\"message\":\"\\u0417\\u0430\\*/
								//$('#bresult').append(JSON.stringify(data)); // на выходе строка {"result":"ok","message":"Запись успешно внесена"} */
								$('#result').append(data.result +' '+ data.message); // на выходе строка {"result":"ok","message":"Запись успешно внесена"} */
								//if(data.reload == 1) location.reload(); // если пришел парметрр reload перезагружаем
								if(data.result == 'ok') $('#step-pay, #section-already-paid').show();
							}
						});
					}); //$( "#btn-join" ).click
					
				} //if ($('#btn-join').length)
					
				$( "#btn-pay-confirm" ).click(function() {
					console.log('pay-time'+$('#pay-time').val());
					$.ajax({
						type: "POST",
						url: "/fulllife/action.php",
						data: 'act=payconfirm&pay-time='+ $('#pay-time').val(),
						success: function(answer){
							data = JSON.parse(answer); // на выходе объект: data.result data.message
							$('#result').append(data.result +' '+ data.message); // на выходе строка {"result":"ok","message":"Запись успешно внесена"} */
						}
					});
				}); //$( "#btn-pay-confirm" ).click
				
				
				
				
				
				
			
			
  }); // end of document ready
})(jQuery);

function openFileDialog(id) {
    $(".personal-photo-input-container input").click();
}
