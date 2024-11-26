<?php

include '../connect.php';

session_start();
if(empty($_SESSION['user_id'])){
	header('Location: ../autorisation');
	exit;
}
$role = mysqli_fetch_array(mysqli_query($mysql, "SELECT role FROM users WHERE id = ".$_SESSION['user_id']))[0];
if($role != 'admin'){
	header('Location: .../autorisation');
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<title>Админка</title>
</head>
<body>

<div id="adminpage">
<div id="menuadmin">
	<form method="POST" action="admin_page.php"><button type="submit" name="admin_page_content">Контент</button></form>
	<form method="POST" action="admin_page.php"><button type="submit" name="admin_page_header">Заголовок</button></form>
	<form method="POST" action="admin_page.php"><button type="submit" name="admin_page_menu">Меню</button></form>
	<form method="POST" action="admin_page.php"><button type="submit" name="admin_page_basement">Подвал</button></form>
	<form method="POST" action="admin_page.php"><button type="submit" name="admin_page_exit">Выход</button></form>
</div>&nbsp
<div>
<?php if(empty($_SESSION['adminpage']) or $_SESSION['adminpage'] == 'content'){ ?>
	<h1>Контент</h1>
	<form method="POST" action="changecontent.php">
		<input type="submit" name="add_content" value="Добавить">
	</form>
	<?php $content = mysqli_query($mysql, "SELECT * FROM content");
	foreach ($content as $key => $value) { ?>
		<div class="page_content"><form method="POST" action="changecontent.php">
			<input type="hidden" name="id" value=<?php echo $value['id'] ?>>
			<h4><?php echo $value['header'] ?></h4>
			<input type="submit" name="change" value="Изменить">
			<input type="submit" name="delete" value="Удалить">
		</form></div>
<?php }
}
elseif ($_SESSION['adminpage'] == 'header'){
$header = mysqli_fetch_array(mysqli_query($mysql, "SELECT header FROM page WHERE id = 1"))[0]; ?>
	<h1>Заголовок</h1>
	<form method='POST' action='DBupdate.php'>
	<input name='header' placeholder='Заголовок' value=<? echo $header; ?>><br>
	<input type='submit' value='Сохранить'>
	</form>
<?php }
elseif ($_SESSION['adminpage'] == 'menu'){
	$text1 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 1 "))[0];
	$text2 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 2 "))[0];
	$text3 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 3 "))[0];
	$link1 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 1 "))[0];
	$link2 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 2 "))[0];
	$link3 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 3 "))[0]; ?>
	<h1>Меню</h1>
	<form method='POST' action='DBupdate.php'>
	<input name='link1' placeholder='Ссылка 1' value=<?php echo $link1; ?>><input name='text1' placeholder='Текст ссылки 1' value=<?php echo $text1; ?>><br>
	<input name='link2' placeholder='Ссылка 2' value=<?php echo $link2; ?>><input name='text2' placeholder='Текст ссылки 2' value=<?php echo $text2; ?>><br>
	<input name='link3' placeholder='Ссылка 3' value=<?php echo $link3; ?>><input name='text3' placeholder='Текст ссылки 3' value=<?php echo $text3; ?>><br>
	<input type='submit' value='Сохранить'>
	</form>
<?php }
elseif ($_SESSION['adminpage'] == 'basement'){ 
	$phone = mysqli_fetch_array(mysqli_query($mysql, "SELECT phone FROM page WHERE id = 1 "))[0];
	$email = mysqli_fetch_array(mysqli_query($mysql, "SELECT email FROM page WHERE id = 1 "))[0]; ?>
	<h1>Подвал</h1>
	<form  method='POST' action='DBupdate.php'>
	<input name='phone' placeholder='Телефон' value=<?php echo $phone; ?>><br>
	<input name='email' placeholder='Почта' value=<?php echo $email; ?>><br>
	<input type='submit' value='Сохранить'></form>
<?php } ?>

</body>
</html>