<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}
include "./config.php";

if(isset($_SESSION['infight']) == FALSE) {
header("location:arena.php");
}
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
//1st player
$p1 = $_SESSION['myusername'];
$hp = $_SESSION['hp'];
$hp_max = $_SESSION['hp_max'];
$stamina = $_SESSION['stamina'];
$max_stamina = $_SESSION['max_stamina'];
$str = $_SESSION['str'];
$agi = $_SESSION['agi'];
$vit = $_SESSION['vit'];

//2nd player
$p2 = $_SESSION['p2'];
$hp2 = $_SESSION['hpp2'];
$hp_max2 = $_SESSION['hp_maxp2'];
$stamina2 = $_SESSION['staminap2'];
$max_stamina2 = $_SESSION['max_staminap2'];
$str2 = $_SESSION['strp2'];
$agi2 = $_SESSION['agip2'];
$vit2 = $_SESSION['vitp2'];


		$rand2 = rand(0,100);
		$rand3 = rand(0,100);
		$rand = 1.5;
		$chancep1 = $agi + $rand2;
		$chancep2 = $agi2 + $rand3;
		
		// damage AI
		$ten = 10;
		$twen = 30;
		$damagep2 = $str2 * $rand;
		$damagep2ten = $damagep2 - $ten;
		$roundeddmgp2 = round($damageai);
		$roundeddmgp22 = $roundeddmgai - $ten;
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
		$roundeddmgp23 = $roundeddmgp2 - $ten;
		$hpleftp = $hp - $roundeddmgp23;
		// end
		if ($stamina == 0) {
			header("location:p2.php");
		}
		else {
		if ($chancep > $chancep2) {
			  $healed = $vit + $twen;
			  $hphealed = $healed + $hp;
			  if ($hphealed > $hp_max) {
				$hphealed = $hp_max;
			  }
			  else {/* nothing changes*/}
			  	$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET hp='$hphealed' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				
				$agi2new = $agi2;
				
				$staminanew2 = $stamina - $agi2new;
				$staminanew = $staminanew2 - $ten;

				
				if ($staminanew < 0) {
					$staminanew = 0;
								  	$conn = mysql_connect($host, $username,$password) or die (mysql_error());
									mysql_select_db($db_name,$conn);
									$sql = "UPDATE `$tbl_name`  SET stamina='$staminanew' WHERE name='$myusername'";
									$str = mysql_query ($sql,$conn) or die (mysql_error());
									$_SESSION['doged'] = 1;
									header("location:p2.php");
									
				}
				else {
								  	$conn = mysql_connect($host, $username,$password) or die (mysql_error());
									mysql_select_db($db_name,$conn);
									$sql = "UPDATE `$tbl_name`  SET stamina='$staminanew' WHERE name='$myusername'";
									$str = mysql_query ($sql,$conn) or die (mysql_error());
									$_SESSION['doged'] = 1;
									header("location:p2.php");
									
				}
		}
		
		else { 
			if ($hpleftp < 0) {
			
					$conn = mysql_connect($host, $username,$password) or die (mysql_error());
					mysql_select_db($db_name,$conn);
					$sql = "UPDATE `$tbl_name`  SET hp='0' WHERE name='$myusername'";
					$str = mysql_query ($sql,$conn) or die (mysql_error());
					//end
					header("location:p2.php");
					
			}
			else{
				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET hp='$hpleftp' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				//end
				header("location:p2.php");
				
			}
		}
		}
