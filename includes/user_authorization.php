<?php 

/*Форма авторизации пользователя*/

$data = $_POST;

//	Поверка на нажатися конпокм 
if ( isset( $data['b_login'] ) ) {

	//	Запись ошибок в массив
	$error = array();

	//	Ищем один объект login из login_1 
	$users = R::findOne( 'users', 'login = ?', array( $data['login_1'] ) );

	// Если найден то выпоняем код
	if ( $users ) {
		//  Проверяем, соответствует ли пароль хешу
		if ( password_verify( $data['password'], $users->password ) ) {
			/*	Записываем пользователя в глобальный массив $_SESSION 
			которому на страницы будут доступен определенный фонкционал	*/
			$_SESSION['logged_user'] = $users;
			//	Перенапровляем на сраницу главную страницу
			header ('Location: /');
        	exit();
			//echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно авторизовались </h3></div><hr>';
		} else {
			$error[] = 'Неверно введен password!';
		}
	} else {
		$error[] = 'Пользователь с таким logoin не найден!';
	}

	/*	Вывод ошибок 
		array_shift — Извлекает первый элемент массива	*/
	if ( !empty( $error ) ) {
		echo '<div class="alert alert-danger" role="alert""><h3>' . array_shift( $error ) . '</h3></div>';
	}
}

?>