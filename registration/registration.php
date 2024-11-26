<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST" action="form_reg.php">
	<?php if(isset($_SESSION['error'])){ ?>
		<font color="red"><?php echo $_SESSION['error'] ?></font><br>
	<?php unset($_SESSION['error']); } ?>
	Логин:<br>
	<input name="login"><br>
	Пароль:<br>
	<input type="password" name="password"><br>
	Повтоите пароль:<br>
	<input type="password" name="rpassword"><br>
	<input type="submit" value="Регистрация" name="register">
</form>

</body>
</html>