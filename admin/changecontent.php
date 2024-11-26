<?php

include '../connect.php';
session_start();

if($_SESSION['user_role'] != 'admin'){
	header('Location: ../autorisation');
	exit;
}
if(empty($_POST['delete']) and empty($_POST['change']) and empty($_POST['add_content'])){
	header('Location: ../admin');
	exit;
}
if(isset($_POST['delete'])){
	mysqli_query($mysql, "DELETE FROM content WHERE id=".$_POST['id']);
	header('Location: ../admin');
	exit;
} ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="../scripts.js"></script>
<?php if(isset($_POST['add_content'])){ ?>
	<h1>Добавить</h1>
	<button onclick='bold()'><b>Ж</b></button><button onclick='italic()'><i>К</i></button><button onclick='underline()'><u>Ч</u></button>
		<button onclick='color(0)' style='background-color: red; color: red;'>К</button>
		<button onclick='color(1)' style='background-color: blue; color: blue;'>К</button>
		<button onclick='color(2)' style='background-color: purple; color: purple;'>К</button>
		<button onclick='color(3)' style='background-color: green; color: green;'>К</button>
		<button onclick='color(4)' style='background-color: brown; color: brown;'>К</button><br>
	<form method="POST" action="DBupdate.php">
		<input name="header" placeholder="Заголовок"><br>
		<input name="description" placeholder="Описание"><br>
		<textarea name="text" placeholder="Текст" id="textarea"></textarea><br>
		<input type="submit" name="add_content" value="Добавить">
	</form>
<?php }
if(isset($_POST['change'])) { 
	$header = mysqli_fetch_array(mysqli_query($mysql, "SELECT header FROM content WHERE id = ".$_POST['id']))[0];
	$text = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM content WHERE id = ".$_POST['id']))[0];
	$description = mysqli_fetch_array(mysqli_query($mysql, "SELECT description FROM content WHERE id = ".$_POST['id']))[0]; ?>
	<h1>Изменить</h1>
	<button onclick='bold()'><b>Ж</b></button><button onclick='italic()'><i>К</i></button><button onclick='underline()'><u>Ч</u></button>
		<button onclick='color(0)' style='background-color: red; color: red;'>К</button>
		<button onclick='color(1)' style='background-color: blue; color: blue;'>К</button>
		<button onclick='color(2)' style='background-color: purple; color: purple;'>К</button>
		<button onclick='color(3)' style='background-color: green; color: green;'>К</button>
		<button onclick='color(4)' style='background-color: brown; color: brown;'>К</button>
	<form method="POST" action="DBupdate.php">
		<input type="hidden" name="id" value=<?php echo $_POST['id'] ?>>
		<input name="header" value="<?php echo $header; ?>" placeholder="Заголовок"><br>
		<input name="description" placeholder="Описание" value=<?php echo $description; ?>><br>
		<textarea name="text" placeholder="Текст" id="textarea"><?php echo $text; ?></textarea><br>
		<input type="submit" name="change_content" value="Сохранить">
	</form>
<?php } ?>