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
<div id="content">
	<?php $content = mysqli_query($mysql, "SELECT * FROM content");
	foreach ($content as $key => $value) { ?>
		<div class="link_article">
			<h4><a href="<?php echo 'page?id='.$value['id'] ?>"><?php echo $value['header'] ?></a></h4>
			<p><?php echo $value['description'] ?></p>
		</div>
	<?php } ?>
</div>

<div id="basement">
	<p>
		<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT phone FROM page WHERE id = 1"))[0]; ?>
		<br>
		<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT email FROM page WHERE id = 1"))[0]; ?>
		<br>
		<a href="admin" target="_blank">К админке</a>
	</p>
</div>

</body>
</html>