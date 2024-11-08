<?php
include 'connect.php';
if($_POST['content']){
	mysqli_query($mysql, 'UPDATE page SET content="'.$_POST['content'].'" WHERE id = 1');
}
echo "<script>window.location.href='admin.php';</script>";
exit;
?>