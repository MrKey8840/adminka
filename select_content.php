<?php

session_start();

if(isset($_POST['1'])){
	$_SESSION['cnt'] = 1;
}
if(isset($_POST['2'])){
	$_SESSION['cnt'] = 2;
}
if(isset($_POST['3'])){
	$_SESSION['cnt'] = 3;
}

echo "<script type='text/javascript'>window.location.replace('index.php')</script>";

?>