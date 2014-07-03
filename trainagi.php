<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}


// TRAINING AGI:

include "/style/header.php";
include "./menu.php";
include "config.php";

			$myusername = $_SESSION['myusername'];
			$agi = $_SESSION['agi'];
			$moneystart = $_SESSION['moneystart'];
			$stamina_max = $_SESSION['stamina_max'];
			
			$statpoint = 10;
			$newsta_max = $agi * $statpoint;
			
			$cost = 10;
			$cost2 = 15;
			
			$agiadd = 1;
			
			$agicost = $agi * $cost2;
			
			$agiadded = $agi + $agiadd;
			
			$statdefault = 5;
			
			$moneydec = $agicost;
			
			$moneyleft = $moneystart - $moneydec;
			
			
			if ($moneyleft > 0){
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name`  SET agi='$agiadded' WHERE name='$myusername'";
			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name`  SET stamina_max='$newsta_max' WHERE name='$myusername'";
			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name` SET money='$moneyleft' WHERE name='$myusername'";
 			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			header("Location: training.php");                  
			exit();  
								}
		    else { 
				echo '<div id="error"><p id="errorp">Tev nav pietiekoši daudz naudas lai trenētu veiklību!</p></div>';
				include_once "menu.php";
			}
		include "/style/footer.php"
?>
