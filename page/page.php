<?php include "../connect.php"; session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>

<?php include "../header.php"; ?>

<div style="padding: 5px; margin: 5px; border: 1px solid black;">
	<?php $content = mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM content WHERE id = ".$_GET['id'])); 
	if(empty($content)){echo "Такой страницы нет"; } ?>

	<h2 align="center"><?php echo $content['header']; ?></h2>
	<p><?php echo $content['text'] ?></p>
</div>

<div style="padding: 5px;">
	<h3>Коментарии</h3>
	<?php
		$coments = mysqli_query($mysql, "SELECT * FROM coments WHERE id = ".$_GET['id']);
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