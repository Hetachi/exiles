<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}

include "./style/header.php";
include "./menu.php";
include "./config.php";


$myusername = $_SESSION['myusername'];

	 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game WHERE name='$myusername'");
   
   while($row = mysql_fetch_array($result)) {
	$hp = $row['hp'];
	$hp_max = $row['max_hp'];
	$str = $row['str'];
	$agi = $row['agi'];
	$vit = $row['vit'];
	$stamina = $row['stamina'];
	$stamina_max = $row['stamina_max'];
	$moneystart = $row['money'];
	$crystals = $row['crystals'];
	$_SESSION['money'] = $row['money'];
	$_SESSION['hp'] = $hp;
	$_SESSION['hp_max'] = $hp_max;
	$_SESSION['str'] = $str;
	$_SESSION['agi'] = $agi;
	$_SESSION['vit'] = $vit;
	$_SESSION['moneystart'] = $moneystart;
	$_SESSION['crystals'] = $crystals;
	$_SESSION['stamina'] = $stamina;
	$_SESSION['stamina_max'] = $stamina_max;
	}
?>


<?php // TRAINING STR:
if (isset($_SESSION['$hpoponent']) == TRUE || isset($_SESSION['infight']) == TRUE){
	echo '<div id="content"><div id="error">Izskatās ka tu jau esi izaicinājis pretinieku, vai vēlies bēgt no kaujas?
			<form action="runaway.php">
		<input type="submit" value="Jā">
		</form>
		
			<form action="fighting2.php">
		<input type="submit" value="Nē">
		</form></div></div>';
}
			else {

$one = 1;
$cstr = $one + $str;
$cagi = $one + $agi;
$cvit = $one + $vit;
$_SESSION['cstr'] = $cstr;
$_SESSION['cagi'] = $cagi;
$_SESSION['cvit'] = $cvit;

$coststr = 10;
$costagi = 15;
$costvit = 20;

$cost1 = $coststr * $cstr;
$cost2 = $costagi * $cagi;
$cost3 = $costvit * $cvit;		
$_SESSION['cost1'] = $cost1;
$_SESSION['cost2'] = $cost2;
$_SESSION['cost3'] = $cost3;
?>
<div id="content">
<h1 id="welcome">Sveicināts <?php echo $myusername;?> !</h1>
<div id="racepic">
<?php
if ($_SESSION['race'] == "elf") {
echo '<img src="./img/training.png" alt="elf">';
}
elseif ($_SESSION['race'] == "human") {
echo '<img src="./img/training.png" alt="human">';
}
else { 
echo '<img src="./img/training.png" alt="orc">';
}

?>
</div>
<div id="statsboxtrain">
<div id= "currencyboxtrain">
<p><img src="./img/money.gif" alt="money"> <?php echo $_SESSION['money'];?> <b>Nauda</b> </p>
<p><img src="./img/crystals.gif" alt="crystals"> <?php echo $_SESSION['crystals'];?> <b>Kristāli</b></p>
</div>
<div id= "statstrain">
<p><img src="./img/health.gif" alt="money"> <?php echo $_SESSION['hp'];?>/<?php echo $_SESSION['hp_max'];?>  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> <?php echo $_SESSION['stamina'];?>/<?php echo $_SESSION['stamina_max'];?> <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> <?php echo $_SESSION['str'];?> <b> Spēks</b>	<a href="./trainstr.php"><img src="./img/train.jpg" onmouseover="this.src='./img/trainover.jpg'" onmouseout="this.src='./img/train.jpg'" /></a>	<?php echo $_SESSION['cost1'];?> <img src="./img/money.gif" alt="money"> | Stiprāk sitīsiet pretiniekiem!</p>
<p><img src="./img/agi.gif" alt="money"> <?php echo $_SESSION['agi'];?> <b> Veiklība</b>	<a href="./trainagi.php"><img src="./img/train.jpg" onmouseover="this.src='./img/trainover.jpg'" onmouseout="this.src='./img/train.jpg'" /></a>	<?php echo $_SESSION['cost2'];?> <img src="./img/money.gif" alt="money"> | Būsiet izturīgās un lielāka iespeja izvairīties no uzbrukuma!</p>
<p><img src="./img/vit.gif" alt="money"> <?php echo $_SESSION['vit'];?> <b>Veselība</b>	<a href="./trainvit.php"><img src="./img/train.jpg" onmouseover="this.src='./img/trainover.jpg'" onmouseout="this.src='./img/train.jpg'" /></a>	<?php echo $_SESSION['cost3'];?> <img src="./img/money.gif" alt="money"> | Vairāk dzīvības punkti!</p>
</div> 
</div>
</div>
<?php
}
include "./style/footer.php";
?>
