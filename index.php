<?php include "connect.php"; ?>
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

<div id="content">
	<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT content FROM page WHERE id = 1"))[0]; ?>
</div>

<div id="basement">
	<p>
		<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT phone FROM page WHERE id = 1"))[0]; ?>
		<br>
		<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT email FROM page WHERE id = 1"))[0]; ?>
	</p>
</div>

</body>
</html>