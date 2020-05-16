<?php 
	require "includes/db.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	
	<div class="jumbotron jumbotron-fluid form-group mb-0 p-0">
		<div class="justify-content-center mb-0 form-group d-flex">
			<div class="d-flex align-items-center">
				<img src="includes/image/logo_2.png" class="mx-auto d-block col-4 m-lg-0">
				<h1 style="font-size: 90px;">Kkhemiri QRcode</h1>
			</div>
		</div>
	</div>


<!--***********************************************************************************************************************************************************************************************************Company**************************************************************************************************************************************************************************************************************************************************-->
	
	<?php if ( isset( $_SESSION['logged_company'] ) ) : ?>		<!--Если компания зарегестрирован то выполняется-->

	<div class="pos-f-t">
	  <div class="collapse" id="navbarToggleExternalContent">
	    <div class="bg-dark p-4">
			<!--Вставить компаненты от открывающейся понели-->
	    </div>
	  </div>
	  <nav class="navbar navbar-dark bg-dark">
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <?php echo  '<h1 class="text-secondary">' . $_SESSION['logged_company']->company . '</h1>'; ?> 	<!--Выводим из базы данных company-->
	    <a class="btn btn-secondary" href="log_out.php">Выйти</a> 	<!--Выход из аккаунта-->
	  </nav>
	</div>

	<?php else : ?>		<!--Иначе выполняется от компанмй-->

	<div class="pos-f-t">
	  <div class="collapse" id="navbarToggleExternalContent">
	    <div class="bg-dark p-4">

			<div class="d-flex align-items-center">

					
				<div class="dropdown">

					<a href="admin.php" class="btn btn-secondary">Admin панель</a>

				</div>

			</div>

	    </div>
	  </div>
	  <nav class="navbar navbar-dark bg-dark">
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
	     	<span class="navbar-toggler-icon"></span>
	    </button>
	    <div>
	    	<a class="btn btn-secondary" href="index.php">Пользователь</a>
	    	<a class="btn btn-secondary" href="company_signup.php">Регистрация</a>
	    	<a class="btn btn-secondary" href="company_login.php">Вход</a>
		</div>
	  </nav>
	</div>
	
	<div class="form-group container">
		<div class="d-flex justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
			<h1>Информационная страница предприятий</h1>
		</div>
		<div class="d-flex justify-content-center container">
			<p class="font-weight-normal">
				Данный сайт предоставляет предприятиям заполнять, удалять, редактировать в базе информацию о технике которую вы обслуживате предоставляя ее пользлвателям. Пользоватли могут отосласть вам информацию о неполадках техники, которую вам необходимо починить или же заменить!
				Все присходит в режиме онлайн. Вашей работай является отслеживать данные запросы и решать необходимые проблемы!  
			</p>
		</div>
	</div>

	<?php endif; ?>		<!--Закрытие условия компанмй-->
</body>
</html>