<?php 

/*Форма авторизации company*/

$data = $_POST;

//	Поверка на нажатися конпокм 
if ( isset( $data['button'] ) ) {

	//	Запись ошибок в массив
	$error = array();

	//	Ищем один объект email из email
	$companies = R::findOne( 'companies', 'email = ?', array( $data['email'] ) );

	// Если найден то выпоняем код
	if ( $companies ) {
		//  Проверяем, соответствует ли пароль хешу
		if ( password_verify( $data['password'], $companies->password ) ) {
			/*	Записываем company в глобальный массив $_SESSION 
			которому на страницы будут доступен определенный фонкционал	*/
			$_SESSION['logged_company'] = $companies;
			//	Перенапровляем на сраницу company страницу
			header ('Location: company.php');
        	exit();
			//echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно авторизовались </h3></div><hr>';
		} else {
			$error[] = 'Неверно введен password!';
		}
	} else {
		$error[] = 'Пользователь с таким email не найден!';
	}

	/*	Вывод ошибок 
	 	array_shift — Извлекает первый элемент массива */
	if ( !empty($error) ) {
		echo '<div class="alert alert-danger d-flex justify-content-center" role="alert""><h3>' . array_shift( $error ) . '</h3></div>';
	}
}

?>