<?php include "connect.php"; session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1 id="h" align="center">
	<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT header FROM page WHERE id = 1"))[0]; ?>
</h1>

<div id="header">
	<p>
		<?php

		$text1 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 1 "))[0];
		$text2 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 2 "))[0];
		$text3 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 3 "))[0];
		$link1 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 1 "))[0];
		$link2 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 2 "))[0];
		$link3 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 3 "))[0];

		echo "<a href='$link1'>$text1</a> <a href='$link2'>$text2</a> <a href='$link3'>$text3</a>"
		?>
	</p>
</div>
<div style="display: flex">
	<form method="POST" action="select_content.php"><button name="1">Контент 1</button></form>
	<form method="POST" action="select_content.php"><button name="2">Контент 2</button></form>
	<form method="POST" action="select_content.php"><button name="3">Контент 3</button></form>
</div>
<div id="content">
	<?php
	if(empty($_SESSION['cnt'])){$_SESSION['cnt'] = 1;}
	echo mysqli_fetch_array(mysqli_query($mysql, "SELECT content FROM page WHERE id = ".$_SESSION['cnt']))[0];
	?>
</div>

<div id="basement">
	<p>
		<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT phone FROM page WHERE id = 1"))[0]; ?>
		<br>
		<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT email FROM page WHERE id = 1"))[0]; ?>
		<br>
		<a href="admin.php" target="_blank">К админке</a>
	</p>
</div>

</body>
</html>