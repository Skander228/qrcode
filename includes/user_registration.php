<?php 

/*	Форма егистрация пользователя	*/

// 	Записываем глобальный массив из регестрационной формы в data
$data = $_POST;

//	Если нажата кнопка то проверям условия
if ( isset( $data['b_signup'] ) ) {

	//	Запись ошибок в массив
	$errors = array();

	// 	trim убирает все пробелы 
	if ( trim( $data['login'] ) == '' ) {
		$errors[] = 'login не введен! Введите login!';
	}

	//	Получаем длину строки для проверки
	if ( mb_strlen( trim( $data['login'] ) ) < 4 ) {
		$errors[] = 'Login должен быть не менее 4 символов! Повторите попытку!';
	}

	if ( mb_strlen( trim( $data['login'] ) ) > 50 ) {
		$errors[] = 'Login не должен превышать 20 символов! Повторите попытку!';
	}

	if ( trim( $data['email'] ) == '' ) {
		$errors[] = 'Введите mail';
	}

	if ( $data['password_1']  == '') {
		$errors[] = 'Password не введен! Введите Password!';

	}

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

	/*	Из таблицы users берем все логины и подщитываем 
	сколько такиз логинов если больще 0 то */
	// count - Подсчитывает количество элементов массива или чего-либо в объекте
	if ( R::count( 'users', 'login = ?', array( $data['login'] ) ) > 0 ) {
		$errors[] = "Пользователь с таким login уже существует!";
	}

	if ( R::count( 'users', 'email = ?', array( $data['email'] ) ) > 0 ) {
		$errors[] = "Пользователь с таким email уже существует!";
	}

	//	Если все условия выполняются то
	// 	empty - Проверяет, пуста ли переменная
	if ( empty( $errors) ){	
		//	Передаем название таблицы users
		$users = R::dispense( 'users' );
		//	Вносим в базу данные пользователя
		$users->login = $data['login'];
		$users->email = $data['email'];
		// 	Щифруем пароль через password_hash
		$users->password = password_hash ( $data['password_1'], PASSWORD_DEFAULT );
		// 	Cохраняем объект $users в таблице 
		R::store( $users );
		//	Перенапровляем пользователя на сраницу аунтификации
		header ('Location: users_login.php');
        exit();
		//echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно зарегестрировались </h3></div><hr>';
	} else {
		//	Вывод ошибок 
		// array_shift — Извлекает первый элемент массива
		echo '<div class="alert alert-danger" role="alert"><h3>' . array_shift( $errors ) . '</h3></div>';
	}
}

?>