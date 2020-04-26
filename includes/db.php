<?php 

require "rb/rb-mysql.php";

R::setup('mysql:host=127.0.0.1;dbname=qrcode', 'root', 'root');

if ( !R::testConnection() ) 
{
	exit('Error');
}

?>