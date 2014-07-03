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


$rand1 = rand(-10,10);
$randp2 = rand(-10,10);
$rand2 = rand(0,100);
$rand3 = rand(0,1);
$rand4 = rand(0,10) / 10;
$rand5 = rand(0,50);
$ten = 10;
//p1 damage
$dmg2 = $str + $rand1;
$dmg = round($dmg2);
//p2 damage
$dmgp21 = $strp2 + $randp2;
$dmgp2 = round($dmgp21);
//--------------------------//
//p1 hp left after attack
if ($rand3 == 0) {
$dmg = $dmg + $ten;
}
else {
$dmgp2 = $dmgp2 + $ten;
}
$hpleft = $hp - $dmgp2;
//p2 hp left after attack
$hpleftp2 = $hp2 - $dmg;
//--------------------------//

	if ($hpleft <=0) {
		$hpleft = 0;
	}
	if ($hpleftp2 <=0) {
		$hpleftp2 = 0;
	}
		$conn = mysql_connect($host, $username,$password) or die (mysql_error());
		mysql_select_db($db_name,$conn);
		$sql = "UPDATE `$tbl_name`  SET hp='$hpleft' WHERE name='$p1'";
		$str = mysql_query ($sql,$conn) or die (mysql_error());
		
		$conn = mysql_connect($host, $username,$password) or die (mysql_error());
		mysql_select_db($db_name,$conn);
		$sql = "UPDATE `$tbl_name`  SET hp='$hpleftp2' WHERE name='$p2'";
		$str = mysql_query ($sql,$conn) or die (mysql_error());
		//end
		header("location:p2.php");
	
