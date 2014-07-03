<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}



include "config.php";

$myusername = $_SESSION['myusername'];

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


		
		$hpoponent = $_SESSION['$hpoponent'];
		$staminaoponent = $_SESSION['$staminaoponent'];
		$stroponent = $_SESSION['$stroponent'];
		$agioponent = $_SESSION['$agioponent'];
		$vitoponent = $_SESSION['$vitoponent'];
		
		$hpoponentmax = $_SESSION['hpoponentmax'];
		$staminaoponentmax = $_SESSION['staminaoponentmax'];
		
		$hp = $_SESSION['hp'];
		$str = $_SESSION['str'];
		$agi = $_SESSION['agi'];
		$vit = $_SESSION['vit'];
		$stamina = $_SESSION['stamina'];
			// end setting stats //
				
		$rand2 = rand(-10,10);
		$rand3 = rand(-10,10);
		
		$rand = 1.5;
		$heavyp = $rand2 + $agi;
		$lightp = rand(0,5);
		$dogep = rand(0,5);
		
		$heavyai = $rand3 + $agioponent;
		$lightai = rand(0,5);
		$dogeai = rand(0,5);
		
		$ten = 10;
		
		// damage AI
		$damageai = $stroponent * $rand;
		$damageaiten = $damageai + $ten;
		$roundeddmgai = round($damageai);
		//end
		// damage Player
		$damagep = $str * $rand;
		//$roundeddmgp = round($damagepten);
		$roundeddmgp = round($damagep);
		//end
		// dmg taken from player to AI
		//$hpleftai = $hpoponent - $roundeddmgp;
		// end
		// dmg taken from Ai to player
		$hpleftp = $hp - $roundeddmgai;
		// end
		
		if ($heavyp > $heavyai) {
			//dmg deal and save to AI	
				$damagepten = $damagep + $ten;
				$roundeddmgp = round($damagepten);
				$hpleftai = $hpoponent - $roundeddmgp;
				
			$_SESSION['$hpoponent'] = $hpleftai;
			//end
			if ($hpleftp < 0) {
			
					$conn = mysql_connect($host, $username,$password) or die (mysql_error());
					mysql_select_db($db_name,$conn);
					$sql = "UPDATE `$tbl_name`  SET hp='0' WHERE name='$myusername'";
					$str = mysql_query ($sql,$conn) or die (mysql_error());
					//end
					header("location:fighting2.php");
			}
			else{
				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET hp='$hpleftp' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				//end
				header("location:fighting2.php");
			}
		}
		else {
			$damagep = $str * $rand;
			$roundeddmgp = round($damagep);
			$hpleftai = $hpoponent - $roundeddmgp;
			
		$_SESSION['$hpoponent'] = $hpleftai;
		
			if ($hpleftp < 0) {
			
					$conn = mysql_connect($host, $username,$password) or die (mysql_error());
					mysql_select_db($db_name,$conn);
					$sql = "UPDATE `$tbl_name`  SET hp='1' WHERE name='$myusername'";
					$str = mysql_query ($sql,$conn) or die (mysql_error());
					//end
					header("location:fighting2.php");
			}
			else{
				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET hp='$hpleftp' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				//end
				header("location:fighting2.php");
		}
		}

	?>