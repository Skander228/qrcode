<?php  
	require "includes/config.php";
?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container mt-4">
	<h1>Форма регистрации</h1><br>
	<form action=".php" method="POST">
		<input class="form-control" placeholder="Введите наименование компании"  type="text" name="login"><br>
		<input class="form-control" placeholder="Введите email" type="text" name="email"><br>
		<input class="form-control" placeholder="Введите password" type="password" name="password"><br>
		<input class="form-control" placeholder="Повторите password" type="password" name="password"><br>
		<hr>
		<button type="button" name="button2" class="btn btn-success">Зарегистрироваться</button>
	</form>
	</div>
</body>
</html>