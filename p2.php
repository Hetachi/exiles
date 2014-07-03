<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}

		if (isset($_SESSION['infight']) == FALSE){
		$one = 1;
		$_SESSION['infight'] = $one;
		}
		
include "./style/header.php";
include "./menu.php";
include "config.php";

$myusername=$_SESSION['myusername'];
$p2=$_SESSION['p2'];

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game WHERE name='$myusername'");
   
   while($row = mysql_fetch_array($result)) {
	$_SESSION['hp'] = $row['hp'];
	$_SESSION['max_hp'] = $row['max_hp'];
	$_SESSION['stamina'] = $row['stamina'];
	$_SESSION['race'] = $row['race'];
	$_SESSION['stamina_max'] = $row['stamina_max'];
	$_SESSION['str'] = $row['str'];
	$_SESSION['agi'] = $row['agi'];
	$_SESSION['vit'] = $row['vit'];
	$_SESSION['points'] = $row['points'];
	$_SESSION['money'] = $row['money'];
	$_SESSION['pvp'] = $row['pvp'];
   }

   
   
   mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game WHERE name='$p2'");
   
   while($row = mysql_fetch_array($result)) {
   	$_SESSION['hpp2'] = $row['hp'];
	$_SESSION['max_hpp2'] = $row['max_hp'];
	$_SESSION['racep2'] = $row['race'];
	$_SESSION['staminap2'] = $row['stamina'];
	$_SESSION['stamina_maxp2'] = $row['stamina_max'];
	$_SESSION['strp2'] = $row['str'];
	$_SESSION['agip2'] = $row['agi'];
	$_SESSION['vitp2'] = $row['vit'];
	$_SESSION['pointsp2'] = $row['points'];
	$_SESSION['moneyp2'] = $row['money'];
	$_SESSION['pvpp2'] = $row['pvp'];
   }
if ($myusername == $p2) {
	echo '<div id="error"><p id="errorp">Tu nevari uzbrukt pats sev!</p></div> ';
}
elseif ($_SESSION['hpp2'] == 0) {
	header("location:pvpwin.php");
}
elseif ($_SESSION['hp'] == 0) {
	header("location:pvploss.php");
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

<h1 id="welcomeenemy">Tavs pretinieks ir '. $_SESSION['p2'] .' !</h1>
<div id="racepicfightp2">';

if ($_SESSION['racep2'] == "elf") {
echo '<img src="./img/elf.png" alt="elf">';
}
elseif ($_SESSION['racep2'] == "human") {
echo '<img src="./img/human.png" alt="human">';
}
else { 
echo '<img src="./img/orc.png" alt="orc">';
}

		echo '
</div>
<div id="statsboxenemy">
<div id= "statsenemy">
<p><img src="./img/health.gif" alt="money"> '. $_SESSION['hpp2'].'/'. $_SESSION['max_hpp2'].'  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> '. $_SESSION['staminap2'].'/'.$_SESSION['stamina_maxp2'].' <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> '. $_SESSION['strp2'].' <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> '. $_SESSION['agip2'].' <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> '.$_SESSION['vitp2'].' <b>Veselība</b></p>
</div>
</div>
<div id="startfight">
		</br></br><form action="pvph.php">
		<input type="submit" value="Mēģināt uzbrukt!">
		</form></br></br>
</div>
<div id="newenemy">

';
if ($_SESSION['agip2'] > $_SESSION['stamina']) {
}
else{
if ($_SESSION['stamina'] == 0){
echo 'Tev nav pietiekoši daudz izturības punktu lai veiktu izvairīšanās manevru!';
}
else{
echo '<form action="pvpd.php">
		<input type="submit" value="Mēģināt izvairīties no uzbrukuma!">
		</form>';
}
}
					if (isset($_SESSION['doged']) == TRUE) {
					echo '<p id="errorp">Tu izvairijies no uzbrukuma, un paguvi atgūt pāris dzīvības punktus!</p>';
					unset ($_SESSION['doged']);
					}
					else {}
echo '
</div> '; 


	}


   
include "./style/footer.php";
?>