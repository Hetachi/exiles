<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}

include "./style/header.php";
include "./menu.php";
include "config.php";

if(isset($_SESSION['infight']) == TRUE) {
header("location:p2.php");
}

$myusername = $_SESSION['myusername'];

	 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game WHERE name='$myusername'");
   
   while($row = mysql_fetch_array($result)) {
   }

   
   
   echo ' <div id="error">
Sveicināts '.$myusername.'!</br>   
<form action="fighting.php">
 Vai vēlaties cīnīties pret datora kontrolētu pretinieku?</br>
     <input type="submit" value="Jā!, parādiet manu pretinieku!">
</form>
</br>
Bet varbūt vēlies cīnīties pret kādu citu spēlētāju?<br/>
Ievadi sava pretinieka precīzu vārdu!<br/>
<form action="p1.php">
<input name="p2" type="text" id="p2"></td>
	<input type="submit" value="Izaicināt!">
</form>
</div>';




include "./style/footer.php";
?>

