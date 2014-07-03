	<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}

include "config.php";

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

	if (isset($_SESSION['$hpoponent']) == TRUE) {
				
				unset($_SESSION['$hpoponent']);
				unset($_SESSION['$staminaoponent']);
				unset($_SESSION['$stroponent']);
				unset($_SESSION['$agioponent']);
				unset($_SESSION['$vitoponent']);
				
				header("location:rest.php");
				}
			else { header("location:index.php");}
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
				header("location:rest.php");
	
	}
	else { header("location:index.php");}
				?>