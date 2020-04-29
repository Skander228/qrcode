<?php 

/*Форма егистрация пользователя*/

$data = $_POST;

if ( isset( $data['b_signup'] ) ) {

	$errors = array();

	if ( trim( $data['company'] ) == '' ) {
		$errors[] = 'Введите company';
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

	if ( R::count( 'companies', 'company = ?', array( $data['company'] ) ) > 0 ) {
		$errors[] = "Пользователь с таким company уже существует!";
	}

	if ( R::count( 'companies', 'email = ?', array( $data['email'] ) ) > 0 ) {
		$errors[] = "Пользователь с таким email уже существует!";
	}

	if ( empty( $errors) ){	
		$companies = R::dispense( 'companies' );
		$companies->company = $data['company'];
		$companies->email = $data['email'];
		$companies->password = password_hash ( $data['password_1'], PASSWORD_DEFAULT );
		R::store( $companies );
		header ('Location: company_login.php');
        exit();
		//echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно зарегестрировались </h3></div><hr>';
	} else {
		echo '<div class="alert alert-danger" role="alert"><h3>' . array_shift( $errors ) . '</h3></div>';
	}
}

?>