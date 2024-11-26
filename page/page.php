<?php include "../connect.php"; session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
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

<div style="padding: 5px; margin: 5px; border: 1px solid black;">
	<?php $content = mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM content WHERE id = ".$_GET['id'])); 
	if(empty($content)){echo "Такой страницы нет";} ?>

	<h2 align="center"><?php echo $content['header']; ?></h2>
	<p><?php echo $content['text'] ?></p>
</div>

<div style="padding: 5px;">
	<h3>Коментарии</h3>
	<?php
		$coments = mysqli_query($mysql, "SELECT * FROM coment WHERE id = ".$_GET['id']);
		if(is_array($coments) || is_object($coments)) {
		foreach ($coments as $key => $value) { ?>
			<div>
				<h4><?php echo $coments['user']; ?></h4>
				<p><?php echo $coments['text']; ?></p>
			</div>
		<?php }
		}
		else{
			echo "Комментариев нет";
		} ?>
</div>

<div id="basement">
	<p>
		<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT phone FROM page WHERE id = 1"))[0]; ?>
		<br>
		<?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT email FROM page WHERE id = 1"))[0]; ?>
		<br>
		<a href="../../admin" target="_blank">К админке</a>
	</p>
</div>

</body>
</html>