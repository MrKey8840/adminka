<?php

session_start();

if(isset($_POST['admin_page_content'])){
	$_SESSION['adminpage'] = 'content';
	header('Location: ../admin');
	exit;
}
elseif(isset($_POST['admin_page_header'])){
	$_SESSION['adminpage'] = 'header';
	header('Location: ../admin');
	exit;
}
elseif(isset($_POST['admin_page_menu'])){
	$_SESSION['adminpage'] = 'menu';
	header('Location: ../admin');
	exit;
}
elseif(isset($_POST['admin_page_basement'])){
	$_SESSION['adminpage'] = 'basement';
	header('Location: ../admin');
	exit;
}
elseif(isset($_POST['admin_page_exit'])){
	unset($_SESSION['user_id']);
	unset($_SESSION['user_role']);
	unset($_SESSION['adminpage']);
	header('Location: ../autorisation');
	exit;
}

?>