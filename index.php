<?php  
	require "includes/db.php";
	require "includes/db_conect.php";
	include "includes/function.php";

	/*git remote add origin git@github.com:Skander228/qrcode.git
	git push -u origin master*/
 
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

	<div class="jumbotron jumbotron-fluid form-group mb-0 p-0">
		<div class="justify-content-center mb-0 form-group d-flex">
			<div class="d-flex align-items-center">
				<img src="includes/image/logo_2.png" class="mx-auto d-block col-4 m-lg-0">
				<h1 style="font-size: 90px;">Kkhemiri QRcode</h1>
			</div>
		</div>
	</div>



<!--***********************************************************************************************************************************************************************************************************User*****************************************************************************************************************************************************************************************************************************************************-->

	<?php if ( isset( $_SESSION['logged_user'] ) ) : ?>		<!--Если пользователь зарегестрирован то выполняется-->
	
	<?php 
		$id = $_SESSION['logged_user']->id;
	?>
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
	    <?php 
	    	if ( $result = mysqli_query( $link, "SELECT * FROM users WHERE id = $id " ) ) {
				while( $row = mysqli_fetch_assoc( $result ) ){
					echo  '<h1 class="text-secondary">' . $row['login'] . '</h1>';
				}				 
	    	}	
	    ?> 	<!--Выводим из базы данных company-->
	    <a class="btn btn-secondary" href="log_out.php">Выйти</a> 	<!--Выход из аккаунта-->
	  </nav>
	</div>

	<div class="d-flex justify-content-between">
		<div class="jumbotron jumbotron-fluid mr-5 mt-5 ml-5 p-3">
			<div class="container row justify-content-center">
				<div class="d-flex justify-content-around mt-5">
					<?php 
						if ( $result = mysqli_query( $link, "SELECT * FROM users WHERE id = $id " ) ) {
							while( $row = mysqli_fetch_assoc( $result ) ){
								echo '<img class="rounded-circle" src=https://s.gravatar.com/avatar/' 
									. md5( $row['email'] ) . '?s=280&d=monsterid>';
							}				 
				    	}
					  
					?> <!--Добавляем изоображения пользователя через систему граватар, так же есть система оценок для определенной аудитории изночально стоит оценка G но так же их можно дополнить-->	
				</div>
				<div>
					<div class="line-group">
						
						<h2>Ваш login:</h2>
						<?php 
							if ( $result = mysqli_query( $link, "SELECT * FROM users WHERE id = $id " ) ) {
								while( $row = mysqli_fetch_assoc( $result ) ){
									echo '<div class="edit_login mb-3" data-id="' . $_SESSION['logged_user']->id . '" name="login" contenteditable><h2 class="text-primary">' .  $row['login'] . '</h2></div>';
								}				 
					    	}
					    ?><br>

						<h2>Ваш email:</h2>
						<?php 
							if ( $result = mysqli_query( $link, "SELECT * FROM users WHERE id = $id " ) ) {
								while( $row = mysqli_fetch_assoc( $result ) ){
									echo '<div class="edit_email mb-3" data-id="' . $_SESSION['logged_user']->id . '" name="login" contenteditable><h2 class="text-primary">' .  $row['email'] . '</h2></div>';
								}				 
					    	}
					    ?><br>

					    <h2>Ваш password:</h2>
						<?php 
							if ( $result = mysqli_query( $link, "SELECT * FROM users WHERE id = $id " ) ) {
								while( $row = mysqli_fetch_assoc( $result ) ){
									echo '<div class="edit_password mb-3" data-id="' . $_SESSION['logged_user']->id. '" name="login" contenteditable><h2 class="text-primary">' . mb_substr( $row['password'], 0, 10, 'UTF-8' )   . '...</h2></div>';
								}				 
					    	}
					    ?>
					
						<h3 class="mt-5 mb-4">Для редактирования аватар:</h3>
						<p class="m-2"><h4>1) Войдите в систему Gravatar</h4></p>
						<a href="https://wordpress.com/log-in/ru" class="btn btn-primary">Войти</a>
						<p class="m-2"><h4>2) Загрузите файл в системе Gravatar</h4></p>
						<a href="https://ru.gravatar.com/gravatars/new/computer" class="btn btn-primary">Выполнить</a>
					</div>
				</div>
			</div>
		</div>

		<div class="jumbotron jumbotron-fluid mr-5 mt-5 ml-5 p-3">
		 	<div class="container ">
		    	<h2>Не выходите из дома</h2>
		    	<br>
				<script type="text/javascript" src="//rf.revolvermaps.com/0/0/6.js?i=5qrqcdh9rhw&amp;m=7&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>

		  	</div>
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/script_get_users.js"></script>

	<?php else : ?>		<!--Иначе выполняется-->

	<div class="pos-f-t">
	  <div class="collapse" id="navbarToggleExternalContent">
	    <div class="bg-dark p-4">

			<div class="d-flex align-items-center">

				<div class="dropdown">

					<!--<button class="btn btn-secondary dropdown-toggle ml-3" type="button" id="dropdownMenuButton"
				  		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">XXXXX
					</button>-->

					<a href="admin.php" class="btn btn-secondary">Admin панель</a>

					<!--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

					</div>-->

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

	<div class="form-group container">
		<div class="d-flex justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
			<h1>Информационная страница</h1>
		</div>
		<div class="d-flex justify-content-center container">
			<p class="font-weight-normal">
				Данный сайт предоставляет Вам сканировать QRcode объекта и быстро информаровать нарушения целостности объекта. Данныя операция занимает не более 30 сек!
			</p>
		</div>
	</div>

	<?php endif; ?>		<!--Закрытие условия-->

<!--***********************************************************************************************************************************************************************************************************User*****************************************************************************************************************************************************************************************************************************************************-->
</body>
</html>