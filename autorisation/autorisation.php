<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Вход</title>
</head>
<body>

<?php
if(isset($_SESSION['error'])){ ?>
	<font color="red"><?php echo $_SESSION['error']; ?></font>
<?php unset($_SESSION['error']); } ?>
<form method="POST" action="form_au.php">
	<input name="login"><br>
	<input type="password" name="password"><br>
	<input type="submit" value="Вход" name="autorisation">
</form>

</body>
</html>