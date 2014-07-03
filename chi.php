<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}

include "./style/header.php";
include "menu.php";
include "./config.php";


$myusername = $_SESSION['myusername'];

	 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game WHERE name='$myusername'");
   
   while($row = mysql_fetch_array($result)) {
	$staminamax = $row['stamina_max'];
	$hp = $row['hp'];
	$stamina = $row['stamina'];
	$hpmax = $row['max_hp'];
   }
?>
<?php 

$chicost = $_SESSION['chicost'];
$chiheal = $_SESSION['chiheal'];


if ($stamina > 0) {
	if ($hp < $hpmax) {
	$staminaleft = $stamina - $chicost;
	$hpnew = $hp + $chiheal;
				if ($staminaleft < 0) {
						echo '<div id="error"><p id="errorp">Tu esi pārāk novārdzis lai spētu sevi dziedināt, pagaidi līdz tavi izturības punkti atgriežas un tad mēģini vēlreiz! </p></br></div>';
						include_once "menu.php";
				}
				else {
				if ($hp > $hpmax) {
						header("location:rest.php");
				}
				else {
				if ($hpnew > $hpmax) {
					$hpnew = $hpmax;
				}
				else {/*nothing changes*/}
				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET stamina='$staminaleft' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				
				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET hp='$hpnew' WHERE name='$myusername'";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				
				unset($_SESSION['chicost']);
				unset($_SESSION['chiheal']);
				
				header("location:rest.php");
			}
			}
		}
		else { 
			echo '<div id="error"><p id="errorp">Tu neesi ievainots! </br></p></div>';
			}
}
else {
	echo '<div id="error"><p id="errorp">Tev nav pietiekoši daudz izturības punktu!</br></p></div>';

}







	include_once "./style/footer.php";

?>