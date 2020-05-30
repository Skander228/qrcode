<?php  
	require "includes/db.php";
	require "includes/db_conect.php";
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

	<?php if ( isset( $_SESSION['logged_company'] ) ) : ?>		<!--Если компания зарегестрирован то выполняется-->
	<?php 
		$id = $_SESSION['logged_company']->id;
		$company = $_SESSION['logged_company']->company;
	?>

	<div class="pos-f-t">
	  <div class="collapse" id="navbarToggleExternalContent">
	    <div class="bg-dark p-4">

			<div class="d-flex align-items-center">
					
				<div class="dropdown">

					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
				  		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Управление товарами
					</button>

					<div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item btn btn-secondary" href="add_product_company.php">Добавить товар</a>
						<a class="dropdown-item btn btn-secondary" href="edit_product_company.php">Редактировать товар</a>
					</div>

					<a class="btn btn-secondary" href="company_inquiries.php">Управление запросам</a>
					<a class="btn btn-secondary" href="add_qrcode.php">Генерировать QR_CODE</a>

				</div>

			</div>

	    </div>
	  </div>
	  <nav class="navbar navbar-dark bg-dark mb-2">
	  	<div>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <a href="company.php" class="btn btn-secondary ml-2">Главное меню</a>
		</div>
	    <?php 
	    	if ( $result = mysqli_query( $link, "SELECT * FROM companies WHERE id = $id " ) ) {
				while( $row = mysqli_fetch_assoc( $result ) ){
					echo  '<h1 class="text-secondary">' . $row['company'] . '</h1>';
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
	      <th scope="col">Наименование товара</th>
	      <th scope="col">Место нахождения</th>
	      <th scope="col">Описания проблемы</th>
	      <th scope="col">Дата</th>
	      <th scope="col">Имя пользователя</th>
	      <th scope="col">DEL</th>
	    </tr>
	  </thead>
	  <tbody>

		<?php  
		//	 Выполняем запрос к базе данных
		if ($result = mysqli_query( $link, "SELECT * FROM products WHERE id_company = $id" ) ) {
			// Извлекает результирующий ряд в виде ассоциативного массива
			while( $row = mysqli_fetch_assoc( $result ) ){
			 	//	Подщтьываем количество строк
			 	

		 	 	if ( $result_1 = mysqli_query( $link, "SELECT * FROM inquiries WHERE id_product = '" . $row['id'] . "'" ) ) {
					// Извлекает результирующий ряд в виде ассоциативного массива
					while( $row_1 = mysqli_fetch_assoc( $result_1 ) ){
					 $number++;
						echo 
							'<tr>' .
		 	 				'<th scope="row">' . $number . '</th>' .
							'<td><div value=" ' . $row_1['id'] . ' ">' . $row['product_name'] . '</div></td>' .
							'<td><div value=" ' . $row_1['id'] . ' ">' . $row['location'] . '</div></td>' . 
							'<td><div value=" ' . $row_1['id'] . ' ">' . $row_1['description'] . '</div></td>' .
							'<td><div value=" ' . $row_1['id'] . ' ">' . $row_1['date'] . '</div></td>';

							if ( $result_2 = mysqli_query( $link, "SELECT * FROM users WHERE id = '" . $row_1['id_users'] . "'" ) ) {
								// Извлекает результирующий ряд в виде ассоциативного массива
								while( $row_2 = mysqli_fetch_assoc( $result_2 ) ){ 
									echo 
										'<td><div value=" ' . $row['id_users'] . ' ">' . $row_2['login'] . '</div></td>';
								}
								mysqli_free_result( $result_2 );
							}

						echo
							'<th><div><a class="btn btn-danger" href="?dell=' . $row_1['id'] . ' ">Удалить</a></div></th>' . 
							'</tr>';
					}
					mysqli_free_result( $result_1 );
				}
		        	
			}

	    	if ( isset( $_GET['dell'] ) ) {
				$id = $_GET['dell'];
				//	Делаем запрос к бд на изменения login по id
				$query = " DELETE FROM inquiries WHERE id = $id ";
				//	Выполняем данный запрос
				$res  = mysqli_query( $link, $query );
				echo '<div class="alert alert-danger d-flex justify-content-center" role="alert"><h3>Вы успешно удалили запрос</h3></div>';
				//header("Refresh:0;  url=users.php");
				echo '<div class="text-center m-3"><a class="btn btn-warning" href="company_inquiries.php">Close helper</a></div>';
				
			}
		    //	Освобождаем память, занятую результатами запроса
			mysqli_free_result( $result );
		}
		//  Закрывает ранее открытое соединение с базой данных
		mysqli_close( $link );
		?>


	  </tbody>
	</table>

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