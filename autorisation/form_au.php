<?php

include "../connect.php";

session_start();

if(isset($_POST['autorisation'])){
	if(isset($_POST['login']) && isset($_POST['password'])){
		$login = mysqli_real_escape_string($mysql, $_POST['login']);
		$password = sha1(mysqli_real_escape_string($mysql, $_POST['password'])); 
		$id = mysqli_fetch_array(mysqli_query($mysql, 'SELECT id FROM users WHERE login="'.$login.'" AND password="'.$password.'"'))[0];
		if(empty($id)){
			$_SESSION['error'] = "Неверные данные";
			header('Location: ../autorisation');
			exit;
		}
		$_SESSION['user_id'] = $id;
		$role = mysqli_fetch_array(mysqli_query($mysql, "SELECT role FROM users WHERE id = ".$id))[0];
		$_SESSION['user_role'] = $role;
		if($role == 'admin'){
			header('Location: ../admin');
			exit;
		}
	}
	header('Location: ../');
	exit;
}

?>