<?php 

/*	Форма добавления категорий	*/

// 	Записываем глобальный массив из регестрационной формы в data
$data = $_POST;

//	Если нажата кнопка то проверям условия
if ( isset( $data['b_product'] ) ) {

	//	Запись ошибок в массив
	$errors = array();

	// 	trim убирает все пробелы 
	if ( trim( $data['category'] ) == '' ) {
		$errors[] = 'Категория не введена! Введите категорию!';
	}

	//	Получаем длину строки для проверки
	if ( mb_strlen( trim( $data['category'] ) ) < 3 ) {
		$errors[] = 'Категрия должна быть бльше 2 символов! Повторите попытку!';
	}

	if ( mb_strlen( trim( $data['category'] ) ) > 20 ) {
		$errors[] = 'Категория не должена превышать 20 символов! Повторите попытку!';
	}

	/*	Из таблицы categories берем все category_name и подщитываем 
	сколько такиз логинов если больще 0 то */
	// count - Подсчитывает количество элементов массива или чего-либо в объекте
	if ( R::count( 'categories', 'category_name = ?', array( $data['category'] ) ) > 0 ) {
		$errors[] = "Такая категория уже существует! Повторите попытку!";
	}

	//	Если все условия выполняются то
	// 	empty - Проверяет, пуста ли переменная
	if ( empty( $errors) ){	
		//	Передаем название таблицы categories
		$categories = R::dispense( 'categories' );
		//	Вносим в базу данные категорию
		$categories->category_name = $data['category'];
		// 	Cохраняем объект $categories в таблице 
		R::store( $categories );
		echo '<div class="alert alert-success d-flex justify-content-center" role="alert"><h3> Вы успешно добавили категорию! </h3></div><hr>';
	} else {
		//	Вывод ошибок 
		// array_shift — Извлекает первый элемент массива
		echo '<div class="alert alert-danger d-flex justify-content-center" role="alert"><h3>' . array_shift( $errors ) . '</h3></div>';
	}
}

?>