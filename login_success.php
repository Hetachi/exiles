<?php
session_start();
if(isset($_SESSION['myusername'])){
header("location:game.php");
}

else {
	echo 'Stupid error';
}
?>
