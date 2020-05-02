<?php  
	require "includes/db.php";
	include "includes/admin_registration.php";
?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

	<?php if ( isset( $_SESSION['logged_admin'] ) ) : ?>		<!--Если компания зарегестрирован то выполняется-->

	<div class="container mt-2">
		<div class="form-group">
			<h1>Форма Admin регистрации</h1>
		</div>
		<form action="" id="emailForm" method="POST">
			<div class="form-group">
				<input class="form-control" id="login_1" placeholder="Введите login"  
					type="text" name="login_1" value="<?php echo @$data['login_1']; ?>">
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
			</div>
			<div class="form-group">
				<a class="btn btn-secondary" href="admin.php">Вернуться в Admin панель</a>
			</div>
		</form>
	</div>

	<div class="jumbotron jumbotron-fluid form-group h-100" style="margin: 0px; padding-top: 0px; padding-bottom: 0px;">
		<div class="d-flex flex-row bd-highlight mb-3 form-group">
			<img src="includes/image/logo_2.png">
			<div class="d-flex align-items-center"><h1 class="form-group" style="font-size: 90px;">Kkhemiri QRcode</h1></div>
		</div>
	</div>

	<?php else: ?>

	<div class="jumbotron jumbotron-fluid form-group mb-0 p-0">
		<div class="justify-content-center mb-0 form-group d-flex">
			<div class="d-flex align-items-center">
				<img src="includes/image/logo_2.png" class="mx-auto d-block col-4 m-lg-0">
				<h1 style="font-size: 90px;">Kkhemiri QRcode</h1>
			</div>
		</div>
	</div>

	<div class="pos-f-t">
	  <div class="collapse" id="navbarToggleExternalContent">
	    <div class="bg-dark p-4">
			<div class="d-flex align-items-center">
				<div class="dropdown">
					<a href="/" class="btn btn-secondary">Вернутся на главную</a>
				</div>
			</div>
	    </div>
	  </div>
	  <nav class="navbar navbar-dark bg-dark">
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
	     	<span class="navbar-toggler-icon"></span>
	    </button>
	    <div>
	    	<a class="btn btn-secondary" href="company.php">Предприятие</a>
	    	<a class="btn btn-secondary" href="users_signup.php">Регистрация</a>
	    	<a class="btn btn-secondary" href="users_login.php">Вход</a>
		</div>
	  </nav>
	</div>

		<h1 class="d-flex justify-content-center mt-5">У вас нет прав на данную страницу</h1>

	<?php endif; ?>

</body>
</html>