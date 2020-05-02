<?php 

require "includes/db.php";

/*Форма выхода из аккауна*/

unset( $_SESSION['logged_user'] );
unset( $_SESSION['logged_company'] );
unset( $_SESSION['logged_admin'] );

header( 'Location: /' );

?>