//Отслеживаем нажатия кнопки
$("#button").on("click", function(){
	//Передача параметров на js
	var login = $("#login").val().trim();
	var email = $("#email").val().trim();
	var password_1 = $("#password_1").val();
	var password_2 = $("#password_2").val();


	//Защита ввода 
	if (login.length < 4) {
		$("#errorMass").text("Введите login!");
		return false;
	} else if (email == "") {
		$("#errorMass").text("Введите email!");
		return false;
	} else if (password_1 == "") {
		$("#errorMass").text("Введите password!");
		return false;
	} else if (password_2 == "") {
		$("#errorMass").text("Введите password!");
		return false;
	} else if (password_1 != password_2) {
		$("#errorMass").text("Пароли не совпадают!");
		return false;
	}

	//Убираем ощибку
	$("#errorMass").text("");

	//Параметры передачи 
	$.ajax({
		url: 'ajax/email.php',
		type: 'POST',
		cache: false,
		data: { 'login': login, 'email': email, 'password_1': password_1, 'password_2': password_2 },
		dataType: 'html',
		beforeSend: function() {
			$("#button").prop("disabled", true);
		},
		success: function(data) {
			if (!data) {
				alert("Error");
			} else {
				$("#emailForm").trigger("reset");
			}
			$("#button").prop("disabled", false);
		}
	});

});