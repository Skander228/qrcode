<?php 
/*	Форма добавления категорий	*/

// 	Записываем глобальный массив из регестрационной формы в data
$data = $_POST;

//	Если нажата кнопка то проверям условия
if ( isset( $data['b_product'] ) ) {

	//	Запись ошибок в массив
	$errors = array();

	// 	trim убирает все пробелы 
	if ( trim( $data['name_product'] ) == '' ) {
		$errors[] = 'Товар не введен! Введите товар!';
	}

	//	Получаем длину строки для проверки
	if ( mb_strlen( trim( $data['name_product'] ) ) < 2 ) {
		$errors[] = 'Товар должен быть не мение 2 символов! Повторите попытку!';
	}

	if ( mb_strlen( trim( $data['name_product'] ) ) > 40 ) {
		$errors[] = 'Товар не должен превышать 40 символов! Повторите попытку!';
	}

		// 	trim убирает все пробелы 
	if ( trim( $data['description'] ) == '' ) {
		$errors[] = 'Описание товара не введено! Введите описания товар!';
	}

	//	Получаем длину строки для проверки
	if ( mb_strlen( trim( $data['description'] ) ) < 2 ) {
		$errors[] = 'Описание товара должено быть не мение 2 символов! Повторите попытку!';
	}

	if ( mb_strlen( trim( $data['description'] ) ) > 300 ) {
		$errors[] = 'Описание товара не должен превышать 300 символов! Повторите попытку!';
	}

			// 	trim убирает все пробелы 
	if ( trim( $data['location'] ) == '' ) {
		$errors[] = 'Место нахождения товара не введено! Введите место нахождения товар!';
	}

	//	Получаем длину строки для проверки
	if ( mb_strlen( trim( $data['location'] ) ) < 3 ) {
		$errors[] = 'Локация товара должена быть не мение 3 символов! Повторите попытку!';
	}

	if ( mb_strlen( trim( $data['location'] ) ) > 300 ) {
		$errors[] = 'Локация товара не должен превышать 300 символов! Повторите попытку!';
	}

	// 	trim убирает все пробелы 
	if ( trim( $data['id_company'] ) == '' ) {
		$errors[] = 'Вы не выбрали компанию! Выберите компанию!';
	}

	// 	trim убирает все пробелы 
	if ( trim( $data['id_category'] ) == '' ) {
		$errors[] = 'Вы не выбрали категорию для товара! Выберите категорию!';
	}

	//	Если все условия выполняются то
	// 	empty - Проверяет, пуста ли переменная
	if ( empty( $errors) ){	
		//	Передаем название таблицы products
		$products = R::dispense( 'products' );
		$products->product_name = $data['name_product'];
		$products->description = $data['description'];
		$products->location = $data['location'];
		$products->id_company = $data['id_company'];
		$products->id_category = $data['id_category'];
		// 	Cохраняем объект $categories в таблице 
		R::store( $products );
		echo '<div class="alert alert-success d-flex justify-content-center" role="alert"><h3> Вы успешно добавили категорию! </h3></div><hr>';
	} else {
		//	Вывод ошибок 
		// array_shift — Извлекает первый элемент массива
		echo '<div class="alert alert-danger d-flex justify-content-center" role="alert"><h3>' . array_shift( $errors ) . '</h3></div>';
	}
}

?>