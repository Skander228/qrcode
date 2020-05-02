<?php 

/*Форма авторизации пользователя*/

$data = $_POST;

//	Поверка на нажатися конпокм 
if ( isset( $data['button'] ) ) {

	//	Запись ошибок в массив
	$error = array();

	//	Ищем один объект login из login_1 
	$admin = R::findOne( 'admin', 'login = ?', array( $data['login'] ) );

	// Если найден то выпоняем код
	if ( $admin ) {
		//  Проверяем, соответствует ли пароль хешу
		if ( password_verify( $data['password'], $admin->password ) ) {
			/*	Записываем пользователя в глобальный массив $_SESSION 
			которому на страницы будут доступен определенный фонкционал	*/
			$_SESSION['logged_admin'] = $admin;
			//	Перенапровляем на сраницу главную страницу
			header ('Location: admin.php');
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
		echo '<div class="alert alert-danger d-flex justify-content-center" role="alert""><h3>' . array_shift( $error ) . '</h3></div>';
	}
}

?>