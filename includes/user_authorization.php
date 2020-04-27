<?php 

/*Форма авторизации пользователя*/

$data = $_POST;

if ( isset( $data['b_login'] ) ) {

	$error = array();

	$users = R::findOne( 'users', 'login = ?', array( $data['login_1'] ) );

	if ( $users ) {
		//Ощибка 32 мин работа с index авторизация первые 2 поля
		if ( password_verify( $data['password'], $users->password ) ) {
			$_SESSION['logged_user'] = $users;
			echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно авторизовались </h3></div><hr>';
		} else {
			$error[] = 'Неверно введен password!';
		}
	} else {
		$error[] = 'Пользователь с таким logoin не найден!';
	}

	if ( !empty($error) ) {
		echo '<div class="container mt-4" style="color: red;"><h3>' . array_shift( $error ) . '</h3></div><hr>';
	}
}

?>