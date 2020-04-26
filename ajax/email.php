<?php 
	$login = $_POST['login'];
	$email = $_POST['email'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];

	$skany = "skany2@mail.ru";
	//
	$subject = "=?utf-8?B?".base64_encode("Сообщение с сайта")."?=";
	//
	$headers = "From: $mail\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

	//
	$success = mail("kkhemiriskander@gmail.com", $massage, $login ,$headers);
	echo $success;
?>