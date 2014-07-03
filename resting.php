<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}



include "./style/header.php";
include "./config.php";
				include "menu.php";

$myusername = $_SESSION['myusername'];


	 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game WHERE name='$myusername'");
   
   while($row = mysql_fetch_array($result)) {
	$crystalsleft = $row['crystals'];
	$max_hp = $row['max_hp'];
	$max_stamina = $row['stamina_max'];
	$hp = $row['hp'];
   }
?>


<?php
	$restcost = 10;
	$crystalsleft2 = $crystalsleft - $restcost;
			if ($hp == $max_hp) {
				echo '<div id="error"><p id="errorp">Tu jau esi pilnībā atpūties, es nevēlos tevi apkrāpt!</p></div>';

			}
			else {
			if ($crystalsleft > 0){
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name`  SET hp='$max_hp' WHERE name='$myusername'";
			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name`  SET stamina='$max_stamina' WHERE name='$myusername'";
			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name` SET crystals='$crystalsleft2' WHERE name='$myusername'";
 			$str = mysql_query ($sql,$conn) or die (mysql_error());
			
			
			header("Location: rest.php");                  
			
								}
		    else { 
				echo '<div id="error"><p id="errorp">Tev nav pietiekoši daudz kristālu lai to izdarītu, iegūsti vairāk kristālus <a href="./buy.php">ŠEIT</a!</p></div>';
				
			}
		}
include "./style/footer.php";
?>