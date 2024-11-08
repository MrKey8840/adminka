<?php

include 'connect.php';

session_start();


if(empty($_SESSION['is_admin'])){
	echo "<form method='POST' action='redir.php'><input name='login' placeholder='логин'><br><input type='password' name='password' placeholder='пароль'><br><input type='submit' value='Войти'></form>";
	exit;
}

echo '<link rel="stylesheet" type="text/css" href="styles.css">
<script type="text/javascript" src="scripts.js"></script>
<div id="adminpage">
<div id="menuadmin">
	<form method="POST" action="adminpage.php"><button type="submit" name="content">Контент</button></form>
	<form method="POST" action="adminpage.php"><button type="submit" name="header">Заголовок</button></form>
	<form method="POST" action="adminpage.php"><button type="submit" name="menu">Меню</button></form>
	<form method="POST" action="adminpage.php"><button type="submit" name="basement">Подвал</button></form>
	<form method="POST" action="redir.php"><button type="submit" name="ex">Выход</button></form>
</div>&nbsp
<div>';

if(empty($_SESSION['adminpage'])){
	echo "<h1>Контент</h1>
	<form  method='POST' action='DBupdate.php'>
	<textarea name='content' placeholder='Контент'>";
	echo mysqli_fetch_array(mysqli_query($mysql, "SELECT content FROM page WHERE id = 1"))[0];
	echo "</textarea><br>
	<input type='submit' value='Сохранить'></form>";
}
elseif($_SESSION['adminpage'] == 'content'){
	if(empty($_SESSION['content_page'])){
		$_SESSION['content_page'] = 1;
	}
	echo "<div style='display: flex;'><form method='POST' action='content_page.php'><button class='content_btn' name='content_page_1'>Контент 1</button></form>&nbsp
	<form method='POST' action='content_page.php'><button class='content_btn' name='content_page_2'>Контент 2</button></form>&nbsp
	<form method='POST' action='content_page.php'><button class='content_btn' name='content_page_3'>Контент 3</button></form></div>
	<button onclick='bold()'><b>Ж</b></button><button onclick='italic()'><i>К</i></button><button onclick='underline()'><u>Ч</u></button>
	<button onclick='color(0)' style='background-color: red; color: red;'>К</button>
	<button onclick='color(1)' style='background-color: blue; color: blue;'>К</button>
	<button onclick='color(2)' style='background-color: purple; color: purple;'>К</button>
	<button onclick='color(3)' style='background-color: green; color: green;'>К</button>
	<button onclick='color(4)' style='background-color: brown; color: brown;'>К</button>
	<form  method='POST' action='DBupdate.php'>
	<textarea name='content' placeholder='Контент' id='textarea'>";
	echo mysqli_fetch_array(mysqli_query($mysql, "SELECT content FROM page WHERE id = ".$_SESSION['content_page']))[0];
	echo "</textarea><br>
	<input type='submit' value='Сохранить'></form>";}
elseif ($_SESSION['adminpage'] == 'header'){
	$header = mysqli_fetch_array(mysqli_query($mysql, "SELECT header FROM page WHERE id = 1"))[0];
	echo "<h1>Заголовок</h1>
	<form method='POST' action='DBupdate.php'>
	<input name='header' placeholder='Заголовок' value='$header'><br>
	<input type='submit' value='Сохранить'>
	</form>";
}
elseif ($_SESSION['adminpage'] == 'menu'){
	$text1 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 1 "))[0];
	$text2 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 2 "))[0];
	$text3 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 3 "))[0];
	$link1 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 1 "))[0];
	$link2 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 2 "))[0];
	$link3 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 3 "))[0];
	echo "<h1>Меню</h1>
	<form method='POST' action='DBupdate.php'>
	<input name='link1' placeholder='Ссылка 1' value='$link1'><input name='text1' placeholder='Текст ссылки 1' value='$text1'><br>
	<input name='link2' placeholder='Ссылка 2' value='$link2'><input name='text2' placeholder='Текст ссылки 2' value='$text2'><br>
	<input name='link3' placeholder='Ссылка 3' value='$link3'><input name='text3' placeholder='Текст ссылки 3' value='$text3'><br>
	<input type='submit' value='Сохранить'>
	</form>";
}
elseif ($_SESSION['adminpage'] == 'basement'){
	$phone = mysqli_fetch_array(mysqli_query($mysql, "SELECT phone FROM page WHERE id = 1 "))[0];
	$email = mysqli_fetch_array(mysqli_query($mysql, "SELECT email FROM page WHERE id = 1 "))[0];
	echo "<h1>Подвал</h1>
	<form  method='POST' action='DBupdate.php'>
	<input name='phone' placeholder='Телефон' value='$phone'><br>
	<input name='email' placeholder='Почта' value='$email'><br>
	<input type='submit' value='Сохранить'></form>";
}

echo "</div></div>";
?>
