<?php  
	require "includes/db.php";
	require "includes/db_conect.php";
	include "includes/user_authorization.php";

?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container mt-2" >
		<div class="form-group">
			<h1>Добавление товара</h1>
		</div>
		<form class="" id="emailForm" method="POST" style="margin-bottom: 20px;">

			<div class="form-group">
				<input class="form-control" id="name_product" placeholder="Введите название товара"  
					type="text" name="login_1" value="<?php echo @$data['login_1']; ?>">
			</div>

			<div class="form-group">
				<input class="form-control" id="description" placeholder="Введите описание товара"  
					type="text" name="login_1" value="<?php echo @$data['login_1']; ?>">
			</div>

			<div class="form-group">
				<input class="form-control" id="location" placeholder="Введите место нахождения товара"  
					type="text" name="login_1" value="<?php echo @$data['login_1']; ?>">
			</div>

		    <div class="form-group">
			  <select id="id_company" class="form-control">
			    <option selected>Выберите компанию</option>
				    <?php  
				    	if ($result = mysqli_query( $link, 'SELECT * FROM companies ORDER BY id' ) ) {
							// Извлекает результирующий ряд в виде ассоциативного массива
							while( $row = mysqli_fetch_assoc( $result ) ){
				    			echo '<option>' . $row['company'] . '</option>';
				    		}
						}
				    ?>
			  </select>
			</div>

			<div class="form-group">
			  <select id="id_category" class="form-control">
			    <option selected>Выберите категорию</option>
				    <?php  
				    	if ($result = mysqli_query( $link, 'SELECT * FROM categories ORDER BY id' ) ) {
							// Извлекает результирующий ряд в виде ассоциативного массива
							while( $row = mysqli_fetch_assoc( $result ) ){
				    			echo '<option>' . $row['category_name'] . '</option>';
				    		}
				    		mysqli_free_result( $result );
						}
						mysqli_close( $link );
				    ?>
			  </select>
			</div>

			 <div class="form-group">
				<button type="submit" id="button" name="b_product" class="btn btn-primary">Добавить товар</button>		
				<a class="btn btn-warning" href="products.php">Редактировать товар</a>
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

</body>
</html>