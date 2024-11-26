<style type="text/css">
	#header{
		padding-left: 5px;
		padding-right: 5px; 
		display: flex;
		justify-content: space-between;
		height: 70px;
		width: 100%;
		background-color: gray;
	}
	#header div{
		position: relative;
		border: 1px solid black;
		text-align: center;
		font-size: 25px;
		color: orange;
		text-decoration: none;
	}
</style>
<div id="header">
	<div>Животные</div>
	<div>
	<p>
	<?php
	include "connect.php";

	$text1 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 1 "))[0];
	$text2 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 2 "))[0];
	$text3 = mysqli_fetch_array(mysqli_query($mysql, "SELECT text FROM menu WHERE id = 3 "))[0];
	$link1 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 1 "))[0];
	$link2 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 2 "))[0];
	$link3 = mysqli_fetch_array(mysqli_query($mysql, "SELECT link FROM menu WHERE id = 3 "))[0];

	echo "<a href='$link1'>$text1</a> <a href='$link2'>$text2</a> <a href='$link3'>$text3</a>";

	?>
	</p>
	</div>
	<div>124<form><button>4</button></form></div>
</div>