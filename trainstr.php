<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}	

include "/style/header.php";
include "./menu.php";
include "config.php";

			$myusername = $_SESSION['myusername'];
			$str = $_SESSION['str'];
			$moneystart = $_SESSION['moneystart'];
			
			$cost = 10;
			
			$stradd = 1;
			
			$strcost = $str * $cost;
			
			$stradded = $str + $stradd;
			
			$statdefault = 5;
			
			$moneydec = $strcost;
			
			$moneyleft = $moneystart - $moneydec;
			
			
			if ($moneyleft > 0){
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name`  SET str='$stradded' WHERE name='$myusername'";
			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name` SET money='$moneyleft' WHERE name='$myusername'";
 			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			header("Location: training.php");                  
			exit();  
								}
		    else { 
				echo '<div id="error"><p id="errorp">Tev nav pietiekoši daudz naudas lai trenētu spēku!</p></div>';
				include_once "menu.php";
			}
		
	
	include "/style/footer.php"
	
?>