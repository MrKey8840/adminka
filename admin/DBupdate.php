<?php

include "../connect.php";

session_start();

if(isset($_POST['change_content'])){
	mysqli_query($mysql, "UPDATE content SET header='".$_POST['header']."' WHERE id = ".$_POST['id']);
	mysqli_query($mysql, "UPDATE content SET text='".$_POST['text']."' WHERE id = ".$_POST['id']);
	mysqli_query($mysql, "UPDATE content SET description='".$_POST['description']."' WHERE id = ".$_POST['id']);
}
if(isset($_POST['header']) and empty($_POST['change_content']) and empty($_POST['add_content'])){
	mysqli_query($mysql, "UPDATE page SET header='".$_POST['header']."' WHERE id = 1");
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
if(isset($_POST['add_content'])){
	$query = "INSERT INTO content(header, description, text) VAlUES ('".$_POST['header']."','".$_POST['description']."', '".$_POST['text']."')";
	mysqli_query($mysql, $query);
}

header('Location: ../admin');
?>