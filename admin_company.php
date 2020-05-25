<?php  
	require "includes/db.php";
	require "includes/db_conect.php";
	include "includes/function.php";
?>

<?php  
	// 	Принимаем запрос и определяем его в функцию для ...
	//	Определяет, была ли установлена переменная значением, отличным от NULL
	if ( isset( $_POST['new_val_login'] ) ) {	
		//	Применяем функцию обнавления login
		if ( update_company_login() ) {
			// 	Проверка в консоли
			exit( "It is ok_ 2" );
		} else {
			exit( "Error_ 2" );
		}
	} 

	if ( isset( $_POST['new_val_email'] ) ) {	
		//	Применяем функцию обнавления login
		if ( update_company_email() ) {
			// 	Проверка в консоли
			exit( "It is ok" );
		} else {
			exit( "Error" );
		}
	} 


	if ( isset( $_POST['new_val_password'] ) ) {	
		//	Применяем функцию обнавления login
		if ( update_company_password() ) {
			// 	Проверка в консоли
			exit( "It is ok _ 3" );
		} else {
			exit( "Error _ 3" );
		}
	}
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

	<?php if ( isset( $_SESSION['logged_admin'] ) ) : ?>		<!--Если компания зарегестрирован то выполняется-->
	<?php 
		$id = $_SESSION['logged_admin']->id;
	?>

	<div class="pos-f-t">
	  <div class="collapse" id="navbarToggleExternalContent">
	    <div class="bg-dark p-4">

			<div class="d-flex align-items-center">
					
				<div class="dropdown">

					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
				  		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Управление пользователя
					</button>

					<div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item btn btn-secondary" href="users.php">Управление users</a>
						<a class="dropdown-item btn btn-secondary" href="admin_company.php">Управление company</a>
						<a class="dropdown-item btn btn-secondary" href="admin_admin.php">Управление admin</a>
					</div>

				</div>

				<div class="dropdown">

					<button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="dropdownMenuButton"
				  		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Управление категориями
					</button>

					<div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
						<a href="add_category.php" class="dropdown-item btn btn-secondary">Добавить категорию</a>
						<a href="category.php" class="dropdown-item btn btn-secondary">Управление категориями</a>
					</div>

				</div>

				<div class="dropdown">

					<button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="dropdownMenuButton"
				  		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Управление товарами
					</button>

					<div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
						<a href="add_products.php" class="dropdown-item btn btn-secondary">Добавить товар</a>
						<a href="products.php" class="dropdown-item btn btn-secondary">Управление товарами</a>
					</div>

				</div>

				<div class="dropdown">

					<button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="dropdownMenuButton"
				  		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Управление запросами
					</button>

					<div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
						<a href="add_inquiries.php" class="dropdown-item btn btn-secondary">Добавить запрос</a>
						<a href="inquiries.php" class="dropdown-item btn btn-secondary">Управление запросами</a>
					</div>

				</div>

			</div>

	    </div>
	  </div>
	  <nav class="navbar navbar-dark bg-dark mb-2">
	  	<div>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
			<a href="admin.php" class="btn btn-secondary ml-2">Главное меню</a>
		</div>
	    <?php 
	    	if ( $result = mysqli_query( $link, "SELECT * FROM admin WHERE id = $id " ) ) {
				while( $row = mysqli_fetch_assoc( $result ) ){
					echo  '<h1 class="text-secondary">' . $row['login'] . '</h1>';
				}				 
	    	}	
	    ?> 	<!--Выводим из базы данных пользователя-->
	    <a class="btn btn-secondary" href="log_out.php">Выйти</a> 	<!--Выход из аккаунта-->
	  </nav>
	</div>

	<table class="table table-striped table-dark">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">id</th>
	      <th scope="col">company</th>
	      <th scope="col">email</th>
	      <th scope="col">password</th>
	      <th scope="col">date</th>
	      <th scope="col">DEL</th>
	    </tr>
	  </thead>
	  <tbody>

		<?php  
		//	 Выполняем запрос к базе данных
		if ($result = mysqli_query( $link, 'SELECT * FROM companies ORDER BY id' ) ) {
			// Извлекает результирующий ряд в виде ассоциативного массива
			 while( $row = mysqli_fetch_assoc( $result ) ){
			 	//	Подщтьываем количество строк
			 	$number++;
			 	echo 	
			 		'<tr>' .
				 	 	'<th scope="row">' . $number . '</th>' .
				 	 	'<td>' . $row['id'] . '</td>' .
				 	 	'<td><div class="edit_company" data-id="' . $row['id']. '" name="login" contenteditable>' . $row['company'] . '</div></td>' .
				 	 	'<td><div class="edit_company_email" data-id="' . $row['id']. '" name="email" contenteditable>' . $row['email'] . '</div></td>' .
				 	 	'<td><div class="edit_company_password" data-id="' . $row['id']. '" name="password" contenteditable>' . 
				 	 		mb_substr( $row['password'], 0, 10, 'UTF-8' ) . '...' . '</div></td>' .
				 	 	'<td>' . $row['date'] . '</td>' .
				 	 	'<th><div><a class="btn btn-danger" href="?del=' . $row['id'] . ' ">Удалить</a></div></th>' .
		        	'</tr>';
			    }
			    	if ( isset( $_GET['del'] ) ) {
						$id = $_GET['del'];
						//	Делаем запрос к бд на изменения login по id
						$query = " DELETE FROM companies WHERE id = $id ";
						//	Выполняем данный запрос
						$res  = mysqli_query( $link, $query );
						echo '<div class="alert alert-danger d-flex justify-content-center" role="alert"><h3>Вы успешно удалили компанию с id' . $id  . '</h3></div>';
						//header("Refresh:0;  url=users.php");
						echo '<div class="text-center m-3"><a class="btn btn-warning" href="admin_company.php">Close helper</a></div>';
						
					}
			    //	Освобождаем память, занятую результатами запроса
				mysqli_free_result( $result );
			}
			//  Закрывает ранее открытое соединение с базой данных
			mysqli_close( $link );
		?>

	  </tbody>
	</table>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/script_get_users.js"></script>

	<?php else : ?>		<!--Иначе выполняется от компанмй-->

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

	<?php endif; ?>		<!--Закрытие условия компанмй-->
</body>
</html>