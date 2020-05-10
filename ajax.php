<?php
	require "includes/db_conect.php";
 
if (isset($_POST['login'])) {

    $column = $_POST['login'];
    $newValue = $_POST['value'];    
    $id = $_POST['pk'];
    echo "$id" ;
    //$sql = "UPDATE `users` SET $column = $newValue WHERE `id` = $id";
    mysqli_query($link, "UPDATE `users` SET `login` = '$newValue' WHERE `id` = '$id' ");
}