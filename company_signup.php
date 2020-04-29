<?php  
	require "includes/db.php";
	include "includes/company_registration.php";
?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="container mt-2">
		<div class="form-group">
			<h1>Форма регистрации</h1>
		</div>
		<form action="" id="emailForm" method="POST">
			<div class="form-group">
				<input class="form-control" id="company" placeholder="Введите наименование предприятия"  
					type="text" name="company" value="<?php echo @$data['company']; ?>">
			</div>
			<div class="form-group">
				<input class="form-control" id="email" placeholder="Введите email предприятия" 
					type="email" name="email" value="<?php echo @$data['email']; ?>">
			</div>
			<div class="form-group">
				<input class="form-control" id="password_1" placeholder="Введите password"
			 		type="password" name="password_1" value="<?php echo @$data['password_1']; ?>">
			</div>
			<div class="form-group">
				<input class="form-control" id="password_2" placeholder="Повторите password" 
					type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
			</div>
			<div class="form-group">
				<button type="submit" id="button" name="b_signup" class="btn btn-primary">Зарегистрироваться</button>	
				<a class="btn btn-secondary" href="company_login.php">Авторизация</a>
			</div>
			<div class="form-group">
				<a class="btn btn-secondary" href="/">Вернуться на главную</a>
			</div>
		</form>
	</div>

	<div class="jumbotron jumbotron-fluid form-group h-100" style="margin: 0px; padding-top: 0px; padding-bottom: 0px;">
		<div class="d-flex flex-row bd-highlight mb-3 form-group">
			<img src="includes/image/logo_2.png">
			<div class="d-flex align-items-center"><h1 class="form-group" style="font-size: 90px;">Kkhemiri QRcode</h1></div>
		</div>
	</div>

</body>
</html>