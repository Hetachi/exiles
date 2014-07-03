<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}
include "./style/header.php";
include "./menu.php";
include "config.php";

if(isset($_SESSION['infight']) == TRUE) {
$p1 = $_SESSION['myusername'];
$hp = $_SESSION['hp'];
$hp_max = $_SESSION['hp_max'];
$stamina = $_SESSION['stamina'];
$max_stamina = $_SESSION['stamina_max'];
$str = $_SESSION['str'];
$agi = $_SESSION['agi'];
$vit = $_SESSION['vit'];
$money = $_SESSION['money'];
$pvp = $_SESSION['pvp'];

//2nd player
$p2 = $_SESSION['p2'];
$hp2 = $_SESSION['hpp2'];
$hp_max2 = $_SESSION['max_hpp2'] ;
$stamina2 = $_SESSION['staminap2'];
$max_stamina2 = $_SESSION['stamina_maxp2'] ;
$str2 = $_SESSION['strp2'];
$agi2 = $_SESSION['agip2'];
$vit2 = $_SESSION['vitp2'];
$moneyp2 = $_SESSION['moneyp2'];
$pvpp2 = $_SESSION['pvpp2'];



mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

if ($hp2 == 0) {
	$random = rand(10,30) / 10;
	$moneytoadd = $hp_max2 * $random;
	$moneyadded = $money + $moneytoadd;
	$moneywon = $moneytoadd;
	
		$conn = mysql_connect($host, $username,$password) or die (mysql_error());
		mysql_select_db($db_name,$conn);
		$sql = "UPDATE `$tbl_name`  SET money='$moneyadded' WHERE name='$p1'";
		$str = mysql_query ($sql,$conn) or die (mysql_error());
		$one = 1;
		$pvpadded = $pvp + $one;
		$conn = mysql_connect($host, $username,$password) or die (mysql_error());
		mysql_select_db($db_name,$conn);
		$sql = "UPDATE `$tbl_name`  SET pvp='$pvpadded' WHERE name='$p1'";
		$str = mysql_query ($sql,$conn) or die (mysql_error());
		
			if (isset($_SESSION['infight']) == TRUE) {
   	unset($_SESSION['hpp2']);
	unset($_SESSION['max_hpp2']);
	unset($_SESSION['racep2'] );
	unset($_SESSION['staminap2'] );
	unset($_SESSION['stamina_maxp2']);
	unset($_SESSION['strp2']);
	unset($_SESSION['agip2']) ;
	unset($_SESSION['vitp2']);
	unset($_SESSION['pointsp2']);
	unset($_SESSION['infight']);
	

	echo '
	<div id="win">
		<p id="winp">
		Apsveicu tu esi vinējis!
		</p>
		<p id="winp">
		Un ieguvi '.$moneywon.' <img src="./img/money.gif" alt="money"> naudu!
		</p>
	</div>
	';

	}
		}
}
else {
header("location:arena.php");
}
include "./style/footer.php";
?>