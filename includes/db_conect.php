<?php
 
$link = mysqli_connect(
  'localhost',  
    'root',       
    'root',           
    'qrcode'
			);   /* База данных */
/*  'localhost',
	'a331798_qrcode',
	'New228Skander',	
	'a331798_qrcode'*/
 
if (!$link) {
    printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}