<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}


include "./style/header.php";
include "./menu.php";
include "config.php";

$myusername = $_SESSION['myusername'];

	 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
	
   $result = mysql_query("SELECT * FROM game WHERE name='$myusername'");
   
   while($row = mysql_fetch_array($result)) {
	$points = $row['max_hp'] + $row['stamina_max'] + $row['str'] + $row['agi'] + $row['vit'];
		$_SESSION['race'] = $row['race'];
	$hp=$row['hp'];
	$stamina=$row['stamina'];
	$str=$row['str'];
	$agi=$row['agi'];
	$vit=$row['vit'];
			$stamina_max = $row['stamina_max'];
	$_SESSION['stamina_max'] = $stamina_max;

				$hp_max = $row['max_hp'];
					$_SESSION['hp_max'] = $hp_max;
	$_SESSION['money'] = $row['money'];
	$_SESSION['hp'] = $hp;
	$_SESSION['str'] = $str;
	$_SESSION['agi'] = $agi;
	$_SESSION['vit'] = $vit;
	$_SESSION['stamina'] = $stamina;
	$_SESSION['crystals'] = $row['crystals'];
	if (isset($_SESSION['points']) == FALSE) {
	$_SESSION['points'] = $points;
	
	}
	else {/*nothing*/}
	}

	if ($_SESSION['points'] == $points) {
	//do nothing
	}
	else {
	   		$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name`  SET points='$points' WHERE name='$myusername'";
			$str = mysql_query ($sql,$conn) or die (mysql_error());
	}
?>

<div id="content">
<h1 id="welcome">Sveicināts <?php echo $myusername;?> !</h1>
<div id="racepic">
<?php
if ($_SESSION['race'] == "elf") {
echo '<img src="./img/elf.png" alt="elf">';
}
elseif ($_SESSION['race'] == "human") {
echo '<img src="./img/human.png" alt="human">';
}
else { 
echo '<img src="./img/orc.png" alt="orc">';
}
?>
</div>
<div id="statsbox">
<div id= "currencybox">
<p><img src="./img/money.gif" alt="money"> <?php echo $_SESSION['money'];?> <b>Nauda</b></p>
<p><img src="./img/crystals.gif" alt="crystals"> <?php echo $_SESSION['crystals'];?> <b>Kristāli</b></p>
</div>
<div id= "stats">
<p><img src="./img/health.gif" alt="money"> <?php echo $_SESSION['hp'];?>/<?php echo $_SESSION['hp_max'];?>  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> <?php echo $_SESSION['stamina'];?>/<?php echo $_SESSION['stamina_max'];?> <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> <?php echo $_SESSION['str'];?> <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> <?php echo $_SESSION['agi'];?> <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> <?php echo $_SESSION['vit'];?> <b>Veselība</b></p>
</div>
</div>
</div>
<?php include "./style/footer.php"?>