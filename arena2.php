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
   }

   
   
   echo ' <div id="error">
Sveicināts '.$myusername.'!</br>
<p id="winner">Apsveicu tu vinēji kauju!</p>
<form action="fighting.php">
 Vai vēlaties cīnīties pret datora kontrolētu pretinieku?</br>
     <input type="submit" value="Jā!, parādiet manu pretinieku!">
</form></div>';




include "./style/footer.php";
?>

