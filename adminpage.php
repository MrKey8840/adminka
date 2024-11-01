<?php

session_start();

if(isset($_POST['content'])){
	$_SESSION['adminpage'] = 'content';
}
elseif(isset($_POST['header'])){
	$_SESSION['adminpage'] = 'header';
}
elseif(isset($_POST['menu'])){
	$_SESSION['adminpage'] = 'menu';
}
elseif(isset($_POST['basement'])){
	$_SESSION['adminpage'] = 'basement';
}

echo "<script type='text/javascript'>window.location.replace('admin.php')</script>";

?>