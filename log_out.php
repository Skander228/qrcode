<?php 

require "includes/db.php";

/*Форма выхода из аккауна*/

unset( $_SESSION['logged_user'] );
unset( $_SESSION['logged_company'] );

header( 'Location: /' );

?>