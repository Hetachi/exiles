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
	$hp=$row['hp'];
	$stamina=$row['stamina'];
	$str=$row['str'];
	$agi=$row['agi'];
	$vit=$row['vit'];
	$money = $row['money'];
	$_SESSION['hp'] = $hp;
	$_SESSION['str'] = $str;
	$_SESSION['agi'] = $agi;
	$_SESSION['vit'] = $vit;
	$_SESSION['stamina'] = $stamina;
	}
	
		
if (isset($_SESSION['$hpoponent']) == True) {

		if ($_SESSION['$hpoponent'] > 0) {
			
			if ($hp == 1) {
						echo '<div id="error"><p id="errorp">Tu esi zaudējis šo kauju, ej mājās un atpūties!</br></p><a href="./rest.php"><img src="./img/healer.png" alt="healer"></a></div>';
				unset($_SESSION['$hpoponent']);
				unset($_SESSION['$staminaoponent']);
				unset($_SESSION['$stroponent']);
				unset($_SESSION['$agioponent']);
				unset($_SESSION['$vitoponent']);
							}
		else {
		echo '<div id="content">
<h1 id="welcomefight">Sveicināts '. $myusername .' !</h1>
<div id="racepicfight">';

if ($_SESSION['race'] == "elf") {
echo '<img src="./img/elf.png" alt="elf">';
}
elseif ($_SESSION['race'] == "human") {
echo '<img src="./img/human.png" alt="human">';
}
else { 
echo '<img src="./img/orc.png" alt="orc">';
}

		echo '
		</div>
<div id="statsboxfight">
<div id= "currencyboxfight">
<p><img src="./img/money.gif" alt="money"> '.$_SESSION['money'].' <b>Nauda</b></p>
<p><img src="./img/crystals.gif" alt="crystals"> '. $_SESSION['crystals'].' <b>Kristāli</b></p>
</div>
<div id= "statsfight">
<p><img src="./img/health.gif" alt="money"> '. $_SESSION['hp'].'/'. $_SESSION['hp_max'].'  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> '. $_SESSION['stamina'].'/'.$_SESSION['stamina_max'].' <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> '. $_SESSION['str'].' <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> '. $_SESSION['agi'].' <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> '.$_SESSION['vit'].' <b>Veselība</b></p>
</div>
</div>
</div>

<h1 id="welcomeenemy">Tavs pretinieks ir '. $_SESSION['enemy'] .' !</h1>
<div id="racepicenemy">
<img src="./img/'.$_SESSION['enemyid'].'.png" alt="enemy">
</div>
<div id="statsboxenemy">
<div id= "statsenemy">
<p><img src="./img/health.gif" alt="money"> '. $_SESSION['$hpoponent'].'/'. $_SESSION['hpoponentmax'].'  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> '. $_SESSION['$staminaoponent'].'/'.$_SESSION['staminaoponentmax'].' <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> '. $_SESSION['$stroponent'].' <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> '. $_SESSION['$agioponent'].' <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> '.$_SESSION['$vitoponent'].' <b>Veselība</b></p>
</div>
</div>
<div id="startfight">
		</br></br><form action="fighting-heavy.php">
		<input type="submit" value="Mēģināt uzbrukt!">
		</form></br></br>
</div>
<div id="newenemy">
';
if ($_SESSION['agioponent'] > $_SESSION['stamina']) {
}
else{
if ($_SESSION['stamina'] == 0){
echo 'Tev nav pietiekoši daudz izturības punktu lai veiktu izvairīšanās manevru!';
}
else{
echo '<form action="fighting-dodge.php">
		<input type="submit" value="Mēģināt izvairīties no uzbrukuma!">
		</form>';
}
}
echo '
</div> '; 
					if (isset($_SESSION['doged']) == TRUE) {
					echo '<div id="error"><p id="errorp">Tu izvairijies no uzbrukuma, un paguvi atgūt pāris dzīvības punktus!</p></div>';
					unset ($_SESSION['doged']);
					}
					else {}
			}	
		}
		else {
				$random = rand(10,30) / 10;
				$moneytoadd = $random * $_SESSION['hpoponentmax'];
				$moneyadded = $money + $moneytoadd;
				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET money='$moneyadded' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				
				unset($_SESSION['$hpoponent']);
				unset($_SESSION['$staminaoponent']);
				unset($_SESSION['$stroponent']);
				unset($_SESSION['$agioponent']);
				unset($_SESSION['$vitoponent']);
				header("location:arena2.php");

		}
	}

else {
	if ($hpoponent > 0) {
		if ($hp == 1) {
			echo '<div id="error"><p id="errorp">Tu esi zaudējis šo kauju!</p></div>';
				unset($_SESSION['$hpoponent']);
				unset($_SESSION['$staminaoponent']);
				unset($_SESSION['$stroponent']);
				unset($_SESSION['$agioponent']);
				unset($_SESSION['$vitoponent']);
			
		}
		else {
		echo '<div id="content">
<h1 id="welcomefight">Sveicināts '. $myusername .' !</h1>
<div id="racepicfight">';

if ($_SESSION['race'] == "elf") {
echo '<img src="./img/elf.png" alt="elf">';
}
elseif ($_SESSION['race'] == "human") {
echo '<img src="./img/human.png" alt="human">';
}
else { 
echo '<img src="./img/orc.png" alt="orc">';
}

		echo '
		</div>
<div id="statsboxfight">
<div id= "currencyboxfight">
<p><img src="./img/money.gif" alt="money"> '.$_SESSION['money'].' <b>Nauda</b></p>
<p><img src="./img/crystals.gif" alt="crystals"> '. $_SESSION['crystals'].' <b>Kristāli</b></p>
</div>
<div id= "statsfight">
<p><img src="./img/health.gif" alt="money"> '. $_SESSION['hp'].'/'. $_SESSION['hp_max'].'  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> '. $_SESSION['stamina'].'/'.$_SESSION['stamina_max'].' <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> '. $_SESSION['str'].' <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> '. $_SESSION['agi'].' <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> '.$_SESSION['vit'].' <b>Veselība</b></p>
</div>
</div>
</div>

<h1 id="welcomeenemy">Tavs pretinieks ir '. $_SESSION['enemy'] .' !</h1>
<div id="racepicenemy">
<img src="./img/'.$_SESSION['enemyid'].'.png" alt="enemy">
</div>
<div id="statsboxenemy">
<div id= "statsenemy">
<p><img src="./img/health.gif" alt="money"> '. $_SESSION['$hpoponent'].'/'. $_SESSION['hpoponentmax'].'  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> '. $_SESSION['$staminaoponent'].'/'.$_SESSION['staminaoponentmax'].' <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> '. $_SESSION['$stroponent'].' <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> '. $_SESSION['$agioponent'].' <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> '.$_SESSION['$vitoponent'].' <b>Veselība</b></p>
</div>
</div>
<div id="startfight">
		</br></br><form action="fighting-heavy.php">
		<input type="submit" value="Mēģināt uzbrukt!">
		</form></br></br>
</div>
<div id="newenemy">

<form action="fighting-dodge.php">
		<input type="submit" value="Mēģināt izvairīties no uzbrukuma!">
		</form>

</div>


		'; 
				echo 
		'';
					if (isset($_SESSION['doged']) == TRUE) {
					echo '<p id="errorp">Tu izvairijies no uzbrukuma un atguvi pāris dzīvības punktus!</p>';
					unset ($_SESSION['doged']);
					}
					else {}
		echo
		'</br>';

		}
		
		}
		elseif ($hp == 1) {
			echo '<div id="error"><p id="errorp">Tev nav pietiekoši daudz dzīvības punktu lai sāktu jaunu kauju, atpūties!</p></div>';
		}
		else{
				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET hp='$hpleftp' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				//end
				header("location:fighting.php");
		}
		
		}
	include_once "./style/footer.php";
	
?>