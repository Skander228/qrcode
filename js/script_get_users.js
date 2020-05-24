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
						window.location.reload();
						alert( 'Если login не будет изменен то такой login уже существует.' );
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
			window.location.reload();
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
						window.location.reload();
						alert( 'Если email не будет изменен то такой email уже существует.' );
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
			window.location.reload();
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
		if ( newVal.length > 5 && newVal.length < 20 ) {
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
						window.location.reload();
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
				alert( 'Password должен быть не менее 6 символов и не больше 20! Повторите попытку!' );
			}
		} else {
			window.location.reload();
			alert( 'Password должен быть не менее 6 символов! Повторите попытку!' );
		}
	});



	//Запрос на company

		// Блокируем клавишу Enter для избежания бага
	$( '.edit_company' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_company' ).focus( function() {
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
					url: 'admin_company.php',
					type: 'POST',
					data: { new_val_login: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
						alert( 'Если company не будет изменен то такой company уже существует.' );
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
			alert( 'company должен быть не менее 4 символов и не больше 20 ! Повторите попытку!' );
			window.location.reload();
			console.log( 'Login должен быть не менее 4 символов! Повторите попытку!' );
		}
	});



	//Запрос на Email

		// Блокируем клавишу Enter для избежания бага
	$( '.edit_company_email' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_company_email' ).focus( function() {
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
					url: 'admin_company.php',
					type: 'POST',
					data: { new_val_email: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
						alert( 'Если email не будет изменен то такой email уже существует.' );
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
			window.location.reload();
			alert( 'Email должен быть не менее 4 символов! Повторите попытку!' );
		}
	});


	//Запрос на Password

			// Блокируем клавишу Enter для избежания бага
	$( '.edit_company_password' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_company_password' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное login 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину
		if ( newVal.length > 5 && newVal.length < 20) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'admin_company.php',
					type: 'POST',
					data: { new_val_password: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
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
			window.location.reload();
			alert( 'Password должен быть не менее 5 символов и не больше 20! Повторите попытку!' );
		}
	});






	//Запрос на admin

		// Блокируем клавишу Enter для избежания бага
	$( '.edit_admin' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_admin' ).focus( function() {
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
					url: 'admin_admin.php',
					type: 'POST',
					data: { new_val_login: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
						alert( 'Если login не будет изменен то такой login уже существует.' );
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
			window.location.reload();
			console.log( 'Login должен быть не менее 4 символов! Повторите попытку!' );
		}
	});


	//Запрос на Password

			// Блокируем клавишу Enter для избежания бага
	$( '.edit_admin_password' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_admin_password' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное login 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину
		if ( newVal.length > 5 && newVal.length < 20) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'admin_admin.php',
					type: 'POST',
					data: { new_val_password: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
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
			window.location.reload();
			alert( 'Password должен быть не менее 6 символов и не больше 20! Повторите попытку!' );
		}
	});





	//Запрос на category

			// Блокируем клавишу Enter для избежания бага
	$( '.edit_category' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_category' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное category 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину
		if ( newVal.length > 2 && newVal.length < 20) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'category.php',
					type: 'POST',
					data: { new_val_category: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
						alert( 'Если категория не будет изменена то такая категория уже существует.' );
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
			window.location.reload();
			alert( 'Категория должна содеражать не мение 3 символов и не более 20! Повторите попытку!' );
		}
	});





		//Запрос на products

			// Блокируем клавишу Enter для избежания бага
	$( '.edit_product_name' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_product_name' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное category 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину
		if ( newVal.length > 1 && newVal.length < 30) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'products.php',
					type: 'POST',
					data: { new_val_products: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
						alert( 'Товар успешно изменен.' );
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
			window.location.reload();
			alert( 'Товар должен содеражать не мение 2 символов и не более 30! Повторите попытку!' );
		}
	});


	//Запрос на products_description

			// Блокируем клавишу Enter для избежания бага
	$( '.edit_product_description' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_product_description' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное category 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину
		if ( newVal.length > 1 && newVal.length < 300) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'products.php',
					type: 'POST',
					data: { new_val_products_description: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
						alert( 'Описание успешно изменен.' );
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
			window.location.reload();
			alert( 'Описание должен содеражать не мение 2 символов и не более 300! Повторите попытку!' );
		}
	});

		//Запрос на products edit_product_location

			// Блокируем клавишу Enter для избежания бага
	$( '.edit_product_location' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_product_location' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное category 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину
		if ( newVal.length > 1 && newVal.length < 100) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'products.php',
					type: 'POST',
					data: { new_val_products_location: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
						alert( 'Локация успешно изменена.' );
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
			window.location.reload();
			alert( 'Локация должен содеражать не мение 2 символов и не более 100! Повторите попытку!' );
		}
	});

			//Запрос на products edit_id_company_product

			// Блокируем клавишу Enter для избежания бага
	$( '.edit_id_company_product' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_id_company_product' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное category 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину
		if ( newVal.length >= 1 && newVal.length < 4) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'products.php',
					type: 'POST',
					data: { new_val_id_company_product: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
						alert( 'Id успешно изменено.' );
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
			window.location.reload();
			alert( 'Id должен содеражать не мение 1 символа и не более 4! Повторите попытку!' );
		}
	});

	//Запрос на products edit_id_company_product

			// Блокируем клавишу Enter для избежания бага
	$( '.edit_id_categoty_product' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	//	Если фокус на классе edit то 
	$( '.edit_id_category_product' ).focus( function() {
		//	Записываем в переменную oldVal обозначенное значение
		oldVal = $( this ).text();
		//	Присваеваем id значение равное category 
		id = $( this ).data( 'id' );
		//	Если вокус изменен то  
	} ).blur( function() {
		//	Переменной newVal присваевается значение установленное в таблице
		newVal = $( this ).text();
		//	Проверяем новое значение на длину
		if ( newVal.length >= 1 && newVal.length < 4) {
			//	Если стараня переменная не равна новой то 
			if ( newVal != oldVal ) {
				//	Отправляем обозначенный запрос запрос 
				$.ajax ( {
					url: 'products.php',
					type: 'POST',
					data: { new_val_id_category_product: newVal, id: id },
					//	Если запрос прошел успешно то принимаем ответ в переменную (res)
					success: function( res ) {
						// Проверка в консоли
						console.log( res );
						window.location.reload();
						alert( 'Id успешно изменено.' );
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
			window.location.reload();
			alert( 'Id должен содеражать не мение 1 символа и не более 4! Повторите попытку!' );
		}
	});

} );