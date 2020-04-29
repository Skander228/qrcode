<?php 

/*	Форма егистрация пользователя	*/

// 	Записываем глобальный массив из регестрационной формы в data
$data = $_POST;

//	Если нажата кнопка то проверям условия
if ( isset( $data['b_signup'] ) ) {

	//	Запись ошибок в массив
	$errors = array();

	// 	trim убирает все пробелы 
	if ( trim( $data['company'] ) == '' ) {
		$errors[] = 'Наименование компании не было введено! Повтоите попыку!';
	}

	//	Получаем длину строки для проверки
	if ( mb_strlen( trim( $data['company'] ) ) < 3 ) {
		$errors[] = 'Наименование компании должно содержать 3 и более символов! Повтоите попыку!';
	}

	if ( mb_strlen( trim( $data['company'] ) ) > 20 ) {
		$errors[] = 'Наименование компании должно содержать не более 20 символов! Повтоите попыку!';
	}

	if ( trim( $data['email'] ) == '' ) {
		$errors[] = 'Введите mail';
	}

	if ( $data['password_1'] == '') {
		$errors[] = 'Password не введен! Введите Password!';
	}

	//	Получаем длину строки для проверки
	if ( mb_strlen( $data['password_1'] ) < 6 ) {
		$errors[] = 'Password должен быть не менее 6 символов! Повторите попытку!';

	}

	if (  mb_strlen( $data['password_1'] ) > 20 ) {
		$errors[] = 'Password не должен превышать 20 символов! Повторите попытку!';
	}

	if ( $data['password_2'] == '' ) {
		$errors[] = 'Password не введен повторно! Введите Password!';
	}

	if ( $data['password_1']  != $data['password_2'] ) {
		$errors[] = "Password не совпадает! Повторите попытку!";
	}

	/*	Из таблицы companies берем все company и подщитываем 
	сколько такиз логинов если больще 0 то */
	// count - Подсчитывает количество элементов массива или чего-либо в объекте
	if ( R::count( 'companies', 'company = ?', array( $data['company'] ) ) > 0 ) {
		$errors[] = "Пользователь с таким company уже существует!";
	}

	if ( R::count( 'companies', 'email = ?', array( $data['email'] ) ) > 0 ) {
		$errors[] = "Пользователь с таким email уже существует!";
	}

	//	Если все условия выполняются то
	// 	empty - Проверяет, пуста ли переменная
	if ( empty( $errors) ){	
		//	Передаем название таблицы companies
		$companies = R::dispense( 'companies' );
		//	Вносим в базу данные company
		$companies->company = $data['company'];
		$companies->email = $data['email'];
		// 	Щифруем пароль через password_hash
		$companies->password = password_hash ( $data['password_1'], PASSWORD_DEFAULT );
		// 	Cохраняем объект $companies в таблице
		R::store( $companies );
		//	Перенапровляем на сраницу аунтификации
		header ('Location: company_login.php');
        exit();
		//echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно зарегестрировались </h3></div><hr>';
	} else {
		//	Вывод ошибок 
		// array_shift — Извлекает первый элемент массива
		echo '<div class="alert alert-danger" role="alert"><h3>' . array_shift( $errors ) . '</h3></div>';
	}
}

?>