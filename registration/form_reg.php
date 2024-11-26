<?php

include "../connect.php";

session_start();

if(isset($_POST['register'])){
	if(empty($_POST['login']) or empty($_POST['password']) or empty($_POST['rpassword'])){
		$_SESSION['error'] = "Поля пустые";
		header("Location: ../registration");
		exit;
	}
	if($_POST['password'] != $_POST['rpassword']){
		$_SESSION['error'] = "Пароли не совпадают";
		header('Location: ../registration');
		exit;
	}
	$login = mysqli_real_escape_string($mysql, $_POST['login']);
	$password = sha1(mysqli_real_escape_string($mysql, $_POST['password']));
	mysqli_query($mysql, "INSERT INTO users(login, password, role) VALUES ('$login', '$password', 'user')");
	header('Location: ../');
	exit;
}

?>