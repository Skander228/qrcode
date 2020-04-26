<?php  
	require "includes/db.php";
	include "includes/main.php";
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
		<h1>Форма регистрации</h1><br>
		<form id="emailForm" method="POST">
			<input class="form-control" id="login" placeholder="Введите login"  
			type="text" name="login" value="<?php echo @$data['login']; ?>"><br>
			<input class="form-control" id="email" placeholder="Введите email" 
			type="email" name="email" value="<?php echo @$data['email']; ?>"><br>
			<input class="form-control" id="password_1" placeholder="Введите password"
			 type="password" name="password_1" value="<?php echo @$data['password_1']; ?>"><br>
			<input class="form-control" id="password_2" placeholder="Повторите password" 
			type="password" name="password_2" value="<?php echo @$data['password_2']; ?>"><br>
			<!--<div id="errorMass" class="p-3 mb-2 bg-danger text-white"></div>-->
			<hr>
			<button type="submit" id="button" name="button" class="btn btn-success">Зарегистрироваться</button>		
		</form>
	</div>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/form.js"></script>-->
</body>
</html>