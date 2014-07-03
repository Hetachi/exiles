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
		// enemy stat randomizer start
		$strenemy = rand(-5,10);
		$agienemy = rand(-5,10);
		$vitenemy = rand(-5,10);
		$henemy = rand(-100,200);
		$senemy = rand(-100,200);
		//echo 'Debug stat randomizer '.$henemy.'!';
		// enemy stat randomizer end
		

	
	if (isset($_SESSION['$hpoponent']) == TRUE) {
		if ($_SESSION['$hpoponent'] > 0){
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
		</br><form action="fighting2.php">
		<input type="submit" value="Sākt kauju!">
		</form></br>
</div>
<div id="newenemy">
		Par <b>1</b> <img src="./img/crystals.gif" alt="crystals"> kristālu variet atrast jaunu ienaidnieku, vai jūs to vēlaties?!
		<form action="newenemy.php">
		<input type="submit" value="Es vēlos jaunu ienaidnieku!">
		</form>

</div>


		'; 
		

		}
		else {
			$random = rand(10,30) / 10;
			$moneyadded = $money * $random;
				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET money='$moneyadded' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				
				unset($_SESSION['$hpoponent']);
				unset($_SESSION['$staminaoponent']);
				unset($_SESSION['$stroponent']);
				unset($_SESSION['$agioponent']);
				unset($_SESSION['$vitoponent']);
		}
	}
	else {
	// If hp is 0 then...	
	if ($hp == 0 ) {
		echo ' <div id="error"><p id="errorp"> Tu esi pārāk ievainots lai cīnītos ar kādu!</p><a href="./rest.php"><img src="./img/healer.png" alt="healer"></a></div>
		';
		
		
	}
	// If stamina is 0 then....
	elseif ($stamina == 0) {
		echo ' <div id="error"><p id="errorp">Tev nav pietiekoši daudz Izturības punkti, pagaidi līdz tie atlādēsies!</p><a href="./rest.php"><img src="./img/healer.png" alt="healer"></a></div>
		';
		echo include_once "menu.php";
	}
	// If everything is okay then summon enemy!
	else {

		// Start calculation of enemy stats
		$hpoponent = $hp + $henemy;
		$staminaoponent = $stamina + $senemy;
		$stroponent =	$str + $strenemy;
		$agioponent =	$agi + $agienemy;
		$vitoponent = $vit + $vitenemy;
		$hpoponentmax = $hpoponent;
		$staminaoponentmax = $staminaoponent;
		if ($hpoponent < 0) {
			$hpoponent = -$hpoponent;
		}
		else {/*Nothing here*/}
		if ($staminaoponent < 0) {
			$staminaoponent = -$staminaoponent;
		}
		else {/*Nothing here*/}
		if ($hpoponentmax < 0) {
			$hpoponentmax = -$hpoponentmax;
		}
		else {/*Nothing here*/}
		if ($staminaoponentmax < 0) {
			$staminaoponentmax = -$staminaoponentmax;
		}
		else {/*Nothing here*/}
		// Sets the stats for session
		if ( isset($_SESSION['$hpoponent']) == TRUE) {
			header("location:fighting2.php");
		}
		else {
		$_SESSION['$hpoponent'] = $hpoponent;
		$_SESSION['$staminaoponent'] = $staminaoponent;
		$_SESSION['$stroponent'] = $stroponent;
		$_SESSION['$agioponent'] = $agioponent;
		$_SESSION['$vitoponent'] = $vitoponent;
		
		$_SESSION['hpoponentmax'] = $hpoponentmax;
		$_SESSION['staminaoponentmax'] = $staminaoponentmax;
		// enemy stat calc end //
		}
		// Generate new enemy name
			$myArray = array('Trolis','Bruņinieks','Šamanis','Meža kuilis','Pīķnesis','Kentaurs','Burvis','Ērglis','Tīģeris','Wilks','Hiēna','Vampīrs','Wilkacis','Strēlnieks','Paukotājs','Harpija','Bandīts','Akmens milzis','Zaglis','Demonu Suns','Demons','Natpazīstams','Spoks','Barbars','Pūķis','Kobra','Tumsas Pavēlnieks','Mūmija','Medūza','Milzu skorpions','Milzis');
			$myArray2 = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','16','18','19','20','21','22','23','24','25','26','27','28','29','30');
			$pickenemy = rand(0,30);
			$_SESSION['enemy'] = $myArray[$pickenemy];
			$_SESSION['enemyid'] = $myArray2[$pickenemy];
		// end generate name
//-----------------------------------------------------------//
		// Debug echo enemy stats!
/*		echo 'Debug echo enemy stats calculated:
			</br>
			'.$hpoponent.'</br>
			'.$staminaoponent.'</br>
			'.$agioponent.'</br>
			'.$vitoponent.'</br>
		';
	*/
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
		</br><form action="fighting2.php">
		<input type="submit" value="Sākt kauju!">
		</form></br>
</div>
<div id="newenemy">
		Par <b>1</b> <img src="./img/crystals.gif" alt="crystals"> kristālu variet atrast jaunu ienaidnieku, vai jūs to vēlaties?!
		<form action="newenemy.php">
		<input type="submit" value="Es vēlos jaunu ienaidnieku!">
		</form>

</div>

		';
		
	}
}
include "./style/footer.php";
 ?>
