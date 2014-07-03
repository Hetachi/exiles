<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}

include "config.php";

$myusername = $_SESSION['myusername'];

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game WHERE name='$myusername'");

   
   while($row = mysql_fetch_array($result)) {
   $hpmax = $row['max_hp'];
   $staminamax = $row['stamina_max'];
   $money = $row['money'];
   $crystals = $row['crystals'];
   }
		
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
				
		$rand2 = rand(0,100);
		$rand3 = rand(0,100);
		$rand = 1.5;
		$chancep = $agi + $rand2;
		$chanceai = $agioponent + $rand3;
		
		// damage AI
		$ten = 10;
		$twen = 30;
		$damageai = $stroponent * $rand;
		$damageaiten = $damageai - $ten;
		$roundeddmgai = round($damageai);
		$roundeddmgai2 = $roundeddmgai - $ten;
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
		$roundeddmgai3 = $roundeddmgai - $ten;
		$hpleftp = $hp - $roundeddmgai3;
		// end
		if ($stamina == 0) {
			header("location:fighting2.php");
		}
		else {
		if ($chancep > $chanceai) {
			  $healed = $vit + $twen;
			  $hphealed = $healed + $hp;
			  if ($hphealed > $hpmax) {
				$hphealed = $hpmax;
			  }
			  else {/* nothing changes*/}
			  	$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET hp='$hphealed' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				
				$agioponentnew = $agioponent;
				
				$staminanew2 = $stamina - $agioponentnew;
				$staminanew = $staminanew2 - $ten;

				
				if ($staminanew < 0) {
					$staminanew = 0;
								  	$conn = mysql_connect($host, $username,$password) or die (mysql_error());
									mysql_select_db($db_name,$conn);
									$sql = "UPDATE `$tbl_name`  SET stamina='$staminanew' WHERE name='$myusername'";
									$str = mysql_query ($sql,$conn) or die (mysql_error());
									$_SESSION['doged'] = 1;
									header("location:fighting2.php");
									
				}
				else {
								  	$conn = mysql_connect($host, $username,$password) or die (mysql_error());
									mysql_select_db($db_name,$conn);
									$sql = "UPDATE `$tbl_name`  SET stamina='$staminanew' WHERE name='$myusername'";
									$str = mysql_query ($sql,$conn) or die (mysql_error());
									$_SESSION['doged'] = 1;
									header("location:fighting2.php");
									
				}
		}
		
		else { 
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
		}