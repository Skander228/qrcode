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
		$users->password = md5( $data['password_1'] );
		R::store( $users );
		echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно зарегестрировались </h3></div><hr>';
	} else {
		echo '<div class="container mt-4" style="color: red;"><h3>' . array_shift( $errors ) . '</h3></div><hr>';
	}
}


/*Форма авторизации пользователя*/



if ( isset( $data['b_login'] ) ) {

	$error = array();

	$users = R::findOne( 'users', 'login = ?', array( $data['login_1'] ) );

	if ( $users ) {
		//Ощибка 32 мин работа с index авторизация первые 2 поля
		if ( md5( $data['password'] ) == $users->password ) {
			$_SESSION['logget_user'] = $users;
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