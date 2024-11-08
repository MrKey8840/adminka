<?php

session_start();

if(isset($_POST['content_page_1'])){
	$_SESSION['content_page'] = 1;
}
elseif(isset($_POST['content_page_2'])){
	$_SESSION['content_page'] = 2;
}
elseif(isset($_POST['content_page_3'])){
	$_SESSION['content_page'] = 3;
}

echo "<script type='text/javascript'>window.location.replace('admin.php')</script>";

?>