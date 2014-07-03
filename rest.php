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
	$staminamax = $row['stamina_max'];
	$_SESSION['hp'] = $row['hp'];
	$_SESSION['stamina'] = $row['stamina'];
   }


include "./config.php";

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
if (isset($_SESSION['chicost']) == FALSE) {
$chirand = rand(10,30);
$chiper = rand(5,20) / 10;
$chiperr = round($chiper);
$chicost =  $chirand * $chiperr;

$_SESSION['chicost'] = $chicost;
$rand2 = rand(0,30);
$chiheal = $chirand +$rand2;
$_SESSION['chiheal'] = $chiheal;
header("location:rest.php");
}
else{
?>
<div id="content">
<h1 id="welcome">Sveicināts <?php echo $myusername;?> !</h1>
<div id="racepic">
<img src="./img/healer.png" alt="healer">
</div>
<div id="statsboxheal">
<div id= "currencyboxheal">
<p><img src="./img/money.gif" alt="money"> <?php echo $_SESSION['money'];?> <b>Nauda</b></p>
<p><img src="./img/crystals.gif" alt="crystals"> <?php echo $_SESSION['crystals'];?> <b>Kristāli</b></p>
</div>
<div id= "statsheal">
<p><img src="./img/health.gif" alt="money"> <?php echo $_SESSION['hp'];?>/<?php echo $_SESSION['hp_max'];?>  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> <?php echo $_SESSION['stamina'];?>/<?php echo $_SESSION['stamina_max'];?> <b>Izturība</b></p>
<a href="./chi.php"><img src="./img/train.jpg" onmouseover="this.src='./img/trainover.jpg'" onmouseout="this.src='./img/train.jpg'" /></a>	<?php echo $_SESSION['chicost'];?> <img src="./img/stamina.gif" alt="money"> Tu vari izmantot savu iekšējo spēku lai atgūtu <?php echo $_SESSION['chiheal']; ?> dzīvības punktus!</p>
<a href="./resting.php"><img src="./img/train.jpg" onmouseover="this.src='./img/trainover.jpg'" onmouseout="this.src='./img/train.jpg'" /></a> Vai arī par 10 <img src="./img/crystals.gif" alt="money"> kristāliem es tev palīdzēšu izveseļoties pilnībā!</p>
</div>
</div>
</div>
<?php
}
}
 include "/style/footer.php";?>