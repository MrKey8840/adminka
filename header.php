<style type="text/css">
	#header{
		padding-left: 5px;
		padding-right: 5px; 
		display: flex;
		justify-content: space-between;
		height: 70px;
		width: 99.3%;
		background-color: gray;
		line-height: 70px;
	}
	#header div{
		text-align: center;
		font-size: 25px;
		color: white;
	}
	#header a{
		text-decoration: none;
		color: white;
	}
</style>
<?php include "connect.php"; session_start(); ?>
<div id="header">
	<div><?php echo mysqli_fetch_array(mysqli_query($mysql, "SELECT header FROM page WHERE id = 1"))[0]; ?></div>
	<div>
	<?php

	$links = mysqli_query($mysql, "SELECT * FROM menu");
	foreach ($links as $key => $value) { ?>
		<a href="<?php echo $value['link']; ?>"><?php echo $value['text']; ?></a>
	<?php } ?>
	</div>
	<div style="display: flex; align-items: center;">
		<?php if(empty($_SESSION['user_id'])) { ?>
			<form action="autorisation"><button>Вход</button></form><form action="registration"><button>Регистрация</button></form>
		<?php }
		else {
			$user = mysqli_fetch_array(mysqli_query($mysql, "SELECT login FROM users WHERE id = ".$_SESSION['user_id']))[0]; ?>
			<p><?php echo $user; ?></p><form><button>Выход</button></form>
		<?php } ?>
	</div>
</div>