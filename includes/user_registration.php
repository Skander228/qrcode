<?php 

/*Форма егистрация пользователя*/

//
$data = $_POST;

if ( isset( $data['b_signup'] ) ) {

	$errors = array();

	if ( trim( $data['login'] ) == '' ) {
		$errors[] = 'login не введен! Введите login!';
	}

	if ( mb_strlen( trim( $data['login'] ) ) < 4 ) {
		$errors[] = 'Login должен быть не менее 4 символов! Повторите попытку!';
	}

	if ( mb_strlen( trim( $data['login'] ) ) > 50 ) {
		$errors[] = 'Login не должен превышать 20 символов! повторите попытку!';
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

	if (  mb_strlen( $data['password_1'] ) > 50 ) {
		$errors[] = 'Password не должен превышать 20 символов! повторите попытку!';
	}

	if ( $data['password_1']  != $data['password_2'] ) {
		$errors[] = "Password не совпадает! Повторите попытку!";
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
		$users->password = password_hash ( $data['password_1'], PASSWORD_DEFAULT );
		R::store( $users );
		header ('Location: users_login.php');
        exit();
		//echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно зарегестрировались </h3></div><hr>';
	} else {
		echo '<div class="alert alert-danger" role="alert"><h3>' . array_shift( $errors ) . '</h3></div>';
	}
}

?>