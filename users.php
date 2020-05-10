<?php  
	require "includes/db.php";
	require "includes/db_conect.php";
	include "includes/users_add.php";
?>

<?php  
	if ( isset( $_POST['new_val'] ) ) {
		
		if ( update_users() ) {
			exit("It is ok");
		} else {
			exit("Error");
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



<!-- 	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
    <script>
        $.fn.editable.defaults.mode = 'inline';
        $(document).ready(function() {
            $('.people-editable').editable();
            url: "ajax.php";
        });
    </script> -->
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

	<div class="pos-f-t">
	  <div class="collapse" id="navbarToggleExternalContent">
	    <div class="bg-dark p-4">
			<a href="admin_signup.php" class="btn btn-secondary">Admin регистрация</a>
			<a href="users.php" class="btn btn-secondary">Управления users</a>
			<!--Вставить компаненты от открывающейся понели-->
	    </div>
	  </div>
	  <nav class="navbar navbar-dark bg-dark mb-2">
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <?php echo  '<h1 class="text-secondary">' . $_SESSION['logged_admin']->login . '</h1>'; ?> 	<!--Выводим из базы данных пользователя-->
	    <a class="btn btn-secondary" href="log_out.php">Выйти</a> 	<!--Выход из аккаунта-->
	  </nav>
	</div>

	<table class="table table-striped table-dark">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">id</th>
	      <th scope="col">login</th>
	      <th scope="col">email</th>
	      <th scope="col">password</th>
	      <th scope="col">date</th>
	    </tr>
	  </thead>
	  <tbody>




	  		<?php  
			if ($result = mysqli_query($link, 'SELECT * FROM users ORDER BY id')) {
				 while( $row = mysqli_fetch_assoc($result) ){
				 	$number++;
				 	echo '<tr>' .
					 	 	'<th scope="row">' . $number . '</th>' .

					 	 	'<td><div class="edit" data-id="' . $row['id']. '" name="login" contenteditable>' . $row['login'] . '</div></td>' .

					        '<td>
					        	<a href="#" 
					        		class="people-editable" 
					        		data-name="id" 
					        		data-type="text" 
					        		data-title="Имя" 
					        		data-pk="' . $row['id'] . '" 
					        		data-url="ajax.php" >' . $row['id'] . 
					        	'</a>
					        </td>' .

					        '<td>
					        	<a href="#" 
						        	class="people-editable" 
						        	data-name="login" 
						        	data-type="text" 
						        	data-pk="' . $row['id'] . '" 
						        	data-url="ajax.php" >' . $row['login'] . 
					        	'</a>
					        </td>' .

					        '<td>
					        	<a href="#" 
					        		class="people-editable" 
					        		data-name="email" 
					        		data-type="text" 
					        		data-pk="' . $row['id'] . '" 
					        		data-url="ajax.php" >' . $row['email'] . 
					        	'</a>
					        </td>' .

					        '<td>
					        	<a href="#" 
						        	class="people-editable" 
						        	data-name="password" 
						        	data-type="text" 
						        	data-pk="' . $row['id'] . '" 
						        	data-url="ajax.php" >' . $row['password'] . 
					        	'</a>
					        </td>' .

					        '<td>
					        	<a href="#" 
					        		class="people-editable" 
					        		data-name="date" 
					        		data-type="text" 
					        		data-pk="' . $row['id'] . '" 
					        		data-url="ajax.php" >' . $row['date'] . 
					        	'</a>
					        </td>' .
				        '</tr>';
				    }
					mysqli_free_result($result);
				}
				mysqli_close($link);
			?>





	    <?php 
	    	/*$users = R::findCollection( 'users' );
	    	while ( $user = $users->next() ) {
	    		$number++;*/
	    ?>
		    	<tr>
		      	<?php //echo '<th scope="row">' . $number . '</th>' ;?>
		      	<?php //echo '<td>' . $user->id . '</td>' ;?>
		      	<?php //echo '<td><div class="edit" data-id="' . $user->id . '" name="login" contenteditable>' . $user->login . '</div></td>' ;?>
		      	<?php //echo '<td><div class="edit" data-id="' . $user->id . '" name="login" contenteditable>' . $user->email . '</div></td>' ;?>
		      	<?php //echo '<td><div class="edit" data-id="' . $user->id . '" name="login" contenteditable>' . 
		      	//mb_substr( $user->password, 0, 10, 'UTF-8' ) . '...' . '</div></td>' ;?>
		      	<?php //echo '<td>' . $user->date . '</td>' ;?>
		      	<?php //'<a class="btn btn-secondary">Error</a>' ?>
		    	</tr>
	    		
	      	<?php  //}?> 
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