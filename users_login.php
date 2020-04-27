<?php  
	require "includes/db.php";
	include "includes/user_authorization.php";

?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container mt-4">
		<h1>Форма авторизации</h1><br>
		<form action="" id="emailForm" method="POST">
			<input class="form-control" id="login" placeholder="Введите login"  
			type="text" name="login_1" value="<?php echo @$data['login_1']; ?>"><br>
			<input class="form-control" id="password_1" placeholder="Введите password"
			 type="password" name="password" value="<?php echo @$data['password']; ?>"><br>
			<hr>
			<button type="submit" id="button" name="b_login" class="btn btn-success">Авторизоваться</button>		
			<a class="btn btn-success" href="/">Вернутся на главную</a>
			<a class="btn btn-success" href="/users_signup.php">Зарегистрироваться</a>		
		</form>
	</div>
</body>
</html>