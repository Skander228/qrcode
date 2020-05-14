<?php  
	require "includes/db.php";
	include "includes/admin_authorization.php";
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
			<a href="admin_signup.php" class="btn btn-secondary">Admin регистрация</a>
			<a href="users.php" class="btn btn-secondary">Управления users</a>
			<!--Вставить компаненты от открывающейся понели-->
	    </div>
	  </div>
	  <nav class="navbar navbar-dark bg-dark">
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <?php echo  '<h1 class="text-secondary">' . $_SESSION['logged_admin']->login . '</h1>'; ?> 	<!--Выводим из базы данных пользователя-->
	    <a class="btn btn-secondary" href="log_out.php">Выйти</a> 	<!--Выход из аккаунта-->
	  </nav>
	</div>
	<h1 class="text-center mt-5">Admin панель</h1>
	
	

	<?php else : ?>		<!--Иначе выполняется от компанмй-->

	<div class="container mt-2" >
			<div class="form-group">
				<h1>Вход в Admin систему</h1>
			</div>
			<form class="" id="emailForm" method="POST" style="margin-bottom: 20px;">
				<div class="form-group">
				<input class="form-control" id="login" placeholder="Введите login"  
					type="text" name="login" value="<?php echo @$data['login']; ?>">
				</div>
				<div class="form-group">
				<input class="form-control" id="password_1" placeholder="Введите password"
				 	type="password" name="password" value="<?php echo @$data['password']; ?>">
				 </div>
				 <div class="form-group">
					<button type="submit" id="button" name="button" class="btn btn-primary">Войти</button>		
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

	<?php endif; ?>		<!--Закрытие условия компанмй-->

</body>
</html>