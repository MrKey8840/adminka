<?php

try{
	$mysql = mysqli_connect('localhost', 'root', 'root', 'ter');
}
catch(Expection $e){
	$mysql = mysqli_connect('MySQL-8.2', 'root', '', 'ter');
}

?>