<?php 

/*Форма егистрация пользователя*/

$data = $_POST;

if ( isset( $data['b_signup'] ) ) {

	$errors = array();

	if ( trim( $data['login'] ) == '' ) {
		$errors[] = 'Введите login';
	}

	if ( trim( $data['email'] ) == '' ) {
		$errors[] = 'Введите mail';
	}

	if ( mb_strlen( $data['password_1'] ) < 6 || mb_strlen( $data['password_1'] ) > 50 ) {
		$errors[] = 'Введите password';
	}

	if ( $data['password_1']  != $data['password_2'] ) {
		$errors[] = "Password не совпадает";
	}

	if ( R::count( 'users', 'login = ?', array( $data['login'] ) ) > 0 ) {
		$errors[] = "Пользователь с таким login уже существует!";
	}

	if ( R::count( 'users', 'email = ?', array( $data['email'] ) ) > 0 ) {
		$errors[] = "Пользователь с таким email уже существует!";
	}

	if ( empty( $errors) ){	
		$users = R::dispense( 'users' );
		$users->login = $data['login'];
		$users->email = $data['email'];
		//Проверить 
		$users->password = password_hash ( $data['password_1'], PASSWORD_DEFAULT );
		R::store( $users );
		echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно зарегестрировались </h3></div><hr>';
	} else {
		echo '<div class="container mt-4" style="color: red;"><h3>' . array_shift( $errors ) . '</h3></div><hr>';
	}
}

?>