<?php
session_start();
if(isset($_SESSION['myusername']) == TRUE){
	session_destroy();
	echo "Logged out... returning to homepage...";
	header("location:index.php");
	}
else {
	echo 'There is no session...';
}
?>