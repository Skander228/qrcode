<?php  
	require "includes/db.php";

	/*git remote add origin git@github.com:Skander228/qrcode.git
	git push -u origin master*/
 
?>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<?php if ( isset( $_SESSION['logged_user'] ) ) : ?>
		<h1>Авторизован!</h1> 
		<?php echo  $_SESSION['logged_user']->login; ?>
		<a href="log_out.php">Выйти</a>
	<?php else : ?>
		<a href="users_signup.php">Регистрация</a><br>
		<a href="users_login.php">Авторизация</a><br>
		<a href="registration_company.php">Регистрация дял организаций</a>
	<?php endif; ?>
</body>
</html>