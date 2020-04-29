<?php 

require "rb/rb-mysql.php";

//	Подключение к бд локально
R::setup('mysql:host=127.0.0.1;dbname=qrcode', 'root', 'root');

//	Подключение к бд на сервере
//R::setup('mysql:host=127.0.0.1;dbname=a331798_qrcode', 'a331798_qrcode', 'New228Skander');

//	Начало сессии для вывода информации если пользователь зареган
session_start();


//	Провекрка на подключения к базе данных
if ( !R::testConnection() ) 
{
	exit('Нет подключения к базе данных!!!');
}

?>