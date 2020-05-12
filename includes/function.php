<?php

	//	Обновление данных пользователя(LOGIN) для Admin
	function update_users_login() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		// 	Запрос с script_get_users.js
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_login'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения login по id
		$query = " UPDATE users SET login = '$value' WHERE id = '$id' ";
		//	Выполняем данный запрос
		$res  = mysqli_query( $link, $query );
		/*	Получает число строк, затронутых предыдущей операцией MySQL
		затронута 1 строка должен вернуть 1 иначе 0 */
		if ( mysqli_affected_rows( $link ) ) {
			return true;
		}	else {
			return false; 
		}
			
	}


	//	Обновление данных пользователя(email) для Admin
	function update_users_email() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		// 	Запрос с script_get_users.js
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_email'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения login по id
		$query = " UPDATE users SET email = '$value' WHERE id = '$id' ";
		//	Выполняем данный запрос
		$res  = mysqli_query( $link, $query );
		/*	Получает число строк, затронутых предыдущей операцией MySQL
		затронута 1 строка должен вернуть 1 иначе 0 */
		if ( mysqli_affected_rows( $link ) ) {
			return true;
		}	else {
			return false; 
		}
			
	}


		//	Обновление данных пользователя(email) для Admin
	function update_users_password() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		// 	Запрос с script_get_users.js
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, password_hash ( $_POST['new_val_password'], PASSWORD_DEFAULT ) );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения login по id
		$query = " UPDATE users SET password = '$value' WHERE id = '$id' ";
		//	Выполняем данный запрос
		$res  = mysqli_query( $link, $query );
		/*	Получает число строк, затронутых предыдущей операцией MySQL
		затронута 1 строка должен вернуть 1 иначе 0 */
		if ( mysqli_affected_rows( $link ) ) {
			return true;
		}	else {
			return false; 
		}
			
	}


?>





