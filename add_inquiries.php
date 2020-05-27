<?php  
	require "includes/db.php";
	require "includes/db_conect.php";
	include "includes/admin_add_inquiries.php";

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

	<div class="container mt-2" >

		<div class="form-group">
			<h1>Добавление запрса</h1>
		</div>

		<form class="" id="emailForm" method="POST" style="margin-bottom: 20px;">

			<div class="form-group">
			  <select name="id_product" class="form-control">
			    <option selected class="form-control" >Выберите товар</option>
				    <?php  
				    	if ( $result = mysqli_query( $link, 'SELECT * FROM products ORDER BY id' ) ) {
							// Извлекает результирующий ряд в виде ассоциативного массива
							while( $row = mysqli_fetch_assoc( $result ) ){
				    			echo '<option class="form-control" value=" ' .  $row['id'] .  ' ">' . $row['product_name'] . '</option>';
				    		}
						}
				    ?>
			  </select>
			</div>

			<div class="form-group">
			  <select name="id_users" class="form-control">
			    <option selected class="form-control">Выберите пользователя</option>
				    <?php  
				    	if ( $result = mysqli_query( $link, 'SELECT * FROM users ORDER BY id' ) ) {
							// Извлекает результирующий ряд в виде ассоциативного массива
							while( $row = mysqli_fetch_assoc( $result ) ){
				    			echo '<option class="form-control">' . $row['login'] . '</option>';
				    		}
						}
				    ?>
			  </select>
			</div>

			<div class="form-group">
				<textarea class="form-control" placeholder="Введите описание проблемы" type="text" name="description" value="<?php echo @$data['description']; ?>" rows="3"></textarea>
			</div>

			<div class="form-group">
				<button type="submit" id="button" name="b_inquiries" class="btn btn-primary">Отправить запрос</button>		
				<a class="btn btn-warning" href="inquiries.php">Редактировать запрос</a>
			</div>

			<div class="form-group">
				<a class="btn btn-secondary" href="admin.php">Вернуться на главную</a>
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