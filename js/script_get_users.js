$( function() {

	var oldVal, newVal, id;



	//Запрос на Login

	// Блокируем клавишу Enter для избежания бага
	$( '.edit_login' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_login' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное login 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину 
		if ( newVal.length > 3 && newVal.length < 20 ) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'users.php',
					type: 'POST',
					data: { new_val_login: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						alert( 'Обновите страницу для проверки редактирования login. Если login не будет изменен то такой login уже существует.' );
					}, 
					//	Если запрос не дощел то 
					error: function() {
						alert( 'Error!' );
					}
				} );
			} else {
				// Проверка в консоли
				console.log( "Значеник не изменено" );
				alert( 'Значение не изменено' );
			}
		} else {
			alert( 'Login должен быть не менее 4 символов и не больше 20 ! Повторите попытку!' );
			console.log( 'Login должен быть не менее 4 символов! Повторите попытку!' );
		}
	});



	//Запрос на Email

		// Блокируем клавишу Enter для избежания бага
	$( '.edit_email' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_email' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное login 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину 
		if ( newVal.length > 4 ) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'users.php',
					type: 'POST',
					data: { new_val_email: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						alert( 'Обновите страницу для проверки редактирования email. Если email не будет изменен то такой login уже существует.' );
					}, 
					//	Если запрос не дощел то 
					error: function() {
						alert( 'Error!' );
					}
				} );
			} else {
				// Проверка в консоли
				console.log( "Значеник не изменено" );
				alert( 'Значение не изменено' );
			}
		} else {
			alert( 'Email должен быть не менее 4 символов! Повторите попытку!' );
		}
	});


	//Запрос на Password

			// Блокируем клавишу Enter для избежания бага
	$( '.edit_password' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_password' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное login 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину
		if ( newVal.length > 5) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'users.php',
					type: 'POST',
					data: { new_val_password: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						alert( 'Значение изменено' );
					}, 
					//	Если запрос не дощел то 
					error: function() {
						alert( 'Error!' );
					}
				} );
			} else {
				// Проверка в консоли
				console.log( "Значеник не изменено" );
				alert( 'Значение не изменено' );
			}
		} else {
			alert( 'Password должен быть не менее 6 символов! Повторите попытку!' );
		}
	});
} );