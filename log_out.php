<?php 

require "includes/db.php";

/*Форма выхода из аккауна*/

unset( $_SESSION['logged_user'] );

header( 'Location: /' );

?>