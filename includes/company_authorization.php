<?php 

/*Форма авторизации пользователя*/

$data = $_POST;

if ( isset( $data['button'] ) ) {

	$error = array();

	$companies = R::findOne( 'companies', 'email = ?', array( $data['email'] ) );

	if ( $companies ) {
		if ( password_verify( $data['password'], $companies->password ) ) {
			$_SESSION['logged_company'] = $companies;
			header ('Location: company.php');
        	exit();
			//echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно авторизовались </h3></div><hr>';
		} else {
			$error[] = 'Неверно введен password!';
		}
	} else {
		$error[] = 'Пользователь с таким email не найден!';
	}

	if ( !empty($error) ) {
		echo '<div class="alert alert-danger" role="alert""><h3>' . array_shift( $error ) . '</h3></div>';
	}
}

?>