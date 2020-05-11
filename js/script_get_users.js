$( function() {

	var oldVal, newVal, id;

	// Блокируем клавишу Enter для избежания бага
	$( '.edit' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное login 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Если стараня переменная не равна новой то 
		if ( newVal != oldVal ) {
			//	Отправляем обозначенный запрос запрос 
			$.ajax ( {
				url: 'users.php',
				type: 'POST',
				data: { new_val: newVal, id: id },
				//	Если запрос прошел успешно то принимаем ответ в переменную (res)
				success: function( res ) {
					// Проверка в консоли
					console.log( res );
				}, 
				//	Если запрос не дощел то 
				error: function() {
					alert( 'Error!' );
				}
			} );
		} else {
			// Проверка в консоли
			console.log( "Значеник не изменено" );
		}
	});

} );