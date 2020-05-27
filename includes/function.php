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

		// Проверка на существования объекта
		$login = R::count( 'users', 'login = ?', array( $_POST['new_val_login'] ) );

		//	Если такого оебеъкта нет то выполняем
		if ( $login == 0 ) {
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

		//$email1 = mysql_real_escape_string( $_POST['new_val_email'] );
		//$regex = '^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$';
 		//if ( preg_match( $regex, $email1 ) ) {

			// Проверка на существования объекта
			$email = R::count( 'users', 'email = ?', array( $_POST['new_val_email'] ) );

			if ( $email == 0 ) {
				//	Делаем запрос к бд на изменения email по id
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
		//}
			
	}


		//	Обновление данных пользователя(password) для Admin
	function update_users_password() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		// 	Запрос с script_get_users.js
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, password_hash ( $_POST['new_val_password'], PASSWORD_DEFAULT ) );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
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





		//	Обновление данных пользователя(LOGIN) для Admin
	function update_company_login() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		// 	Запрос с script_get_users.js
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_login'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];

		// Проверка на существования объекта
		$login = R::count( 'companies', 'company = ?', array( $_POST['new_val_login'] ) );

		//	Если такого оебеъкта нет то выполняем
		if ( $login == 0 ) {
			//	Делаем запрос к бд на изменения login по id
			$query = " UPDATE companies SET company = '$value' WHERE id = '$id' ";
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
	}


	//	Обновление данных пользователя(email) для Admin
	function update_company_email() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		// 	Запрос с script_get_users.js
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_email'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];

		//$email1 = mysql_real_escape_string( $_POST['new_val_email'] );
		//$regex = '^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$';
 		//if ( preg_match( $regex, $email1 ) ) {

			// Проверка на существования объекта
			$email = R::count( 'companies', 'email = ?', array( $_POST['new_val_email'] ) );

			if ( $email == 0 ) {
				//	Делаем запрос к бд на изменения email по id
				$query = " UPDATE companies SET email = '$value' WHERE id = '$id' ";
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
		//}
			
	}


		//	Обновление данных пользователя(password) для Admin
	function update_company_password() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		// 	Запрос с script_get_users.js
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, password_hash ( $_POST['new_val_password'], PASSWORD_DEFAULT ) );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE companies SET password = '$value' WHERE id = '$id' ";
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






			//	Обновление данных пользователя(LOGIN) для Admin
	function update_admin_login() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		// 	Запрос с script_get_users.js
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_login'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];

		// Проверка на существования объекта
		$login = R::count( 'admin', 'login = ?', array( $_POST['new_val_login'] ) );

		//	Если такого оебеъкта нет то выполняем
		if ( $login == 0 ) {
			//	Делаем запрос к бд на изменения login по id
			$query = " UPDATE admin SET login = '$value' WHERE id = '$id' ";
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
	}

			//	Обновление данных пользователя(password) для Admin
	function update_admin_password() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		// 	Запрос с script_get_users.js
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, password_hash ( $_POST['new_val_password'], PASSWORD_DEFAULT ) );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE admin SET password = '$value' WHERE id = '$id' ";
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

				//	Обновление данных пользователя(category_name) для categories
	function update_category() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_category'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];

		// Проверка на существования объекта
		$categories = R::count( 'categories', 'category_name = ?', array( $_POST['new_val_category'] ) );

		if ( $categories == 0 ) {
			//	Делаем запрос к бд на изменения password по id
			$query = " UPDATE categories SET category_name = '$value' WHERE id = '$id' ";
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
	}




	//	Обновление данных пользователя(product_name) для products
	function update_product_name() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_products'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE products SET product_name = '$value' WHERE id = '$id' ";
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

		//	Обновление данных пользователя update_product_description
	function update_product_description() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_products_description'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE products SET description = '$value' WHERE id = '$id' ";
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

	//	Обновление данных пользователя update_product_location
	function update_product_location() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_products_location'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE products SET location = '$value' WHERE id = '$id' ";
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

	//	Обновление данных пользователя update_product_id_company
	function update_product_id_company() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_id_company_product'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE products SET id_company = '$value' WHERE id = '$id' ";
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

	//	Обновление данных пользователя(update_product_id_category)
	function update_product_id_category() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_id_category_product'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE products SET id_category = '$value' WHERE id = '$id' ";
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






	//	Обновление данных пользователя(update_inquiries_id_product)
	function update_inquiries_id_product() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_inquiries_id_product'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE inquiries SET id_product = '$value' WHERE id = '$id' ";
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

	//	Обновление данных пользователя(update_inquiries_id_users)
	function update_inquiries_id_users() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_inquiries_id_users'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE inquiries SET id_users = '$value' WHERE id = '$id' ";
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

		//	Обновление данных пользователя(update_inquiries_id_users)
	function update_inquiries_description() {
		//	Получаем видимость на соединение с базой данных
		global $link;
		/*	Экранирует специальные символы в строке для использования
		в SQL-выражении, используя текущий набор символов соединения*/
		$value = mysqli_real_escape_string( $link, $_POST['new_val_inquiries_description'] );
		//	Приводим к типу int
		$id = ( int )$_POST['id'];
		//	Делаем запрос к бд на изменения password по id
		$query = " UPDATE inquiries SET description = '$value' WHERE id = '$id' ";
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