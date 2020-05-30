<?php 
/*	Форма добавления категорий	*/

// 	Записываем глобальный массив из регестрационной формы в data
$data = $_POST;

//	Если нажата кнопка то проверям условия
if ( isset( $data['b_inquiries'] ) ) {

	//	Запись ошибок в массив
	$errors = array();

	// 	trim убирает все пробелы 
	if ( trim( $data['id_product'] ) == 'Выберите товар' ) {
		$errors[] = 'Вы не выбрали товар! Выберите товар!';
	}

	// 	trim убирает все пробелы 
	if ( trim( $data['id_users'] ) == 'Выберите пользователя' ) {
		$errors[] = 'Вы не выбрали пользователя! Выберите пользователя!';
	}	

		// 	trim убирает все пробелы 
	if ( trim( $data['description'] ) == '' ) {
		$errors[] = 'Описание товара не введено! Введите описания товар!';
	}

	//	Получаем длину строки для проверки
	if ( mb_strlen( trim( $data['description'] ) ) < 5 ) {
		$errors[] = 'Описание товара должено быть не мение 5 символов! Повторите попытку!';
	}

	if ( mb_strlen( trim( $data['description'] ) ) > 200 ) {
		$errors[] = 'Описание товара не должен превышать 200 символов! Повторите попытку!';
	}

	//	Если все условия выполняются то
	// 	empty - Проверяет, пуста ли переменная
	if ( empty( $errors) ){	

		//	Передаем название таблицы inquiries
		$inquiries = R::dispense( 'inquiries' );
		
		// Выпонлняем запрос на поиск компании и если она есть то берем id  и заносим id в базу
		$products = mysqli_query( $link, " SELECT id FROM products WHERE id  = '" . $data['id_product'] .  "' " );
		$row = mysqli_fetch_assoc( $products );
		$inquiries->id_product =  $row['id'];

		$users = mysqli_query( $link, " SELECT id FROM users WHERE login = '" . $data['id_users'] . "' " );
		$row = mysqli_fetch_assoc( $users );
		$inquiries->id_users = $row['id'];

		$inquiries->description = $data['description'];

		// 	Cохраняем объект $categories в таблице 
		R::store( $inquiries );
		echo '<div class="alert alert-success d-flex justify-content-center" role="alert"><h3> Вы успешно отправили запрос! </h3></div><hr>';
	} else {
		//	Вывод ошибок 
		// array_shift — Извлекает первый элемент массива
		echo '<div class="alert alert-danger d-flex justify-content-center" role="alert"><h3>' . array_shift( $errors ) . '</h3></div>';
	}
}

?>