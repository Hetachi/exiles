<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}
?>
