<?php  

/*Регистрация пользователя*/
$data = $_POST;

if ( isset( $data['button'] ) )
{
	$errors = array();

	if ( trim( $data['login'] ) == '' )
	{
		$errors[] = 'Введите login';
	} 
	
	if ( trim( $data['email'] ) == '' )
	{
		$errors[] = 'Введите mail';
	}
	
	if ( mb_strlen($data['password_1'] ) < 6 || mb_strlen( $data['password_1'] ) > 50 )
	{
		$errors[] = 'Введите password';
	}

	if ( $data['password_1'] != $data['password_2'] )
	{
		$errors[] = "Password не совпадает";
	} 
	if ( empty($errors) )
	{	
		$users = R::dispense('users');
		$users->login = $data['login'];
		$users->email = $data['email'];
		$users->password = $data['password_1'];
		R::store($users);
		good();
	} else 
	{
		echo '<div class="container mt-4" style="color: red;"><h3>' . array_shift($errors) . '</h3></div><hr>';
	}
}











function good() 
{
	 echo '<div class="container mt-4" style="color: green;"><h3> Вы успешно зарегестрировались </h3></div><hr>';
}

?>