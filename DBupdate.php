<?php

include "connect.php";

if(isset($_POST['header'])){
	mysqli_query($mysql, "UPDATE page SET header='".$_POST['header']."' WHERE id = 1");
}
if(isset($_POST['content'])){
	mysqli_query($mysql, "UPDATE page SET content='".$_POST['content']."' WHERE id = 1");	
}
if(isset($_POST['phone'])){
	mysqli_query($mysql, "UPDATE page SET phone='".$_POST['phone']."' WHERE id = 1");
}
if(isset($_POST['email'])){
	mysqli_query($mysql, "UPDATE page SET email='".$_POST['email']."' WHERE id = 1");
}
if(isset($_POST['text1'])){
	mysqli_query($mysql, "UPDATE menu SET text='".$_POST['text1']."', link='".$_POST['link1']."' WHERE id = 1");
}
if(isset($_POST['text2'])){
	mysqli_query($mysql, "UPDATE menu SET text='".$_POST['text2']."', link='".$_POST['link2']."' WHERE id = 2");
}
if(isset($_POST['text3'])){
	mysqli_query($mysql, "UPDATE menu SET text='".$_POST['text3']."', link='".$_POST['link3']."' WHERE id = 3");
}

echo "<script>window.location.replace('admin.php')</script>";
?>