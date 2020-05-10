<?php

	//	Обновление данных для пользователя
	function update_users() {
		global $link;
		//$users = R::dispense( 'users' );
		$value = mysqli_real_escape_string( $link, $_POST['new_val'] );
		$id = (int)$_POST['id'];
		$query = "UPDATE users SET login = '$value' WHERE id = '$id' ";
		//$res = mysqli_affected_rows( $link, $query );
		//mysqli_free_result($link, $query );
		$res  = mysqli_query($link, $query);
		if ( mysqli_affected_rows( $link ) ) return true;
			else return false; 


		//$users = R::dispense( 'users' );
		//$value = $_POST['new_val'];
		//
		//$users->login = $value;
		//$query = R::getAll("UPDATE `users` SET `login` = '$value' WHERE id = 'id'" );
		//$query  = R::exec('UPDATE users SET login = $value WHERE id = $id');
		//$res = R::store( $query );

		//$query = " UPDATE users SET login = $value WHERE id = $id ";

		//$res = mysqli_affected_rows( $db, $query );
		//if ( mysqli_affected_rows( $db ) ) return true;
		//	else return false; 
		//if ( mysqli_affected_rows() )

	}
?>





