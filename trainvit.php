<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}


// TRAINING VIT:

include "/style/header.php";
include "./menu.php";
include "config.php";

			$myusername = $_SESSION['myusername'];
			$vit = $_SESSION['vit'];
			$moneystart = $_SESSION['moneystart'];
			$hp_max = $_SESSION['hp_max'];
			
			$statpoint = 10;
			$newhp_max = $vit * $statpoint;
			
			$cost = 10;
			$cost2 = 15;
			$cost3 = 20;
			
			$vitadd = 1;
			
			$vitcost = $vit * $cost3;
			
			$vitadded = $vit + $vitadd;
			
			$statdefault = 5;
			
			$moneydec = $vitcost;
			
			$moneyleft = $moneystart - $moneydec;
			
			
			if ($moneyleft > 0){
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name`  SET vit='$vitadded' WHERE name='$myusername'";
			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name`  SET max_hp='$newhp_max' WHERE name='$myusername'";
			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name` SET money='$moneyleft' WHERE name='$myusername'";
 			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			header("Location: training.php");                  
			exit();  
								}
		    else { 
				echo '<div id="error"><p id="errorp">Tev nav pietiekoši daudz naudas lai trenētu veselību!</p></div>';
				include_once "menu.php";
			}
		include "/style/footer.php"
?>