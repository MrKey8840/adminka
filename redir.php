<?php

include 'connect.php';

session_start();

if($_POST['login'] && $_POST['password']){
	$role = mysqli_fetch_array(mysqli_query($mysql, 'SELECT role FROM users WHERE login="'.$_POST['login'].'" AND password="'.$_POST['password'].'"'))[0];
	if($role == 'admin'){
		$_SESSION['is_admin'] = true;
	}
}

if(isset($_POST['ex'])){
	unset($_SESSION['adminpage']);
	unset($_SESSION['is_admin']);
	unset($_POST['ex']);
}

echo "<script type='text/javascript'>window.location.replace('admin.php')</script>";

?>