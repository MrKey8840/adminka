<?php include "connect.php"; session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php include "header.php"; ?>

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