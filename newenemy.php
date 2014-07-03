<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}



if (isset($_SESSION['$hpoponent']) == TRUE) {
		

include "config.php";


		$myusername = $_SESSION['myusername'];


	 
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");

		$result = mysql_query("SELECT * FROM game WHERE name='$myusername'");
   
		while($row = mysql_fetch_array($result)) {
			$crystalsleft = $row['crystals'];
			
		if ($crystalsleft > 0) {
		$hundred = 1;
		$crystalsnew = $crystalsleft - $hundred;
				
		// unsets the enemy stats from session
		unset($_SESSION['$hpoponent']);
		unset($_SESSION['$staminaoponent']);
		unset($_SESSION['$stroponent']);
		unset($_SESSION['$agioponent']);
		unset($_SESSION['$vitoponent']);
		// has unset all stats from enemy session
		//removes 100 crystals
			$conn = mysql_connect($host, $username,$password) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "UPDATE `$tbl_name`  SET crystals='$crystalsnew' WHERE name='$myusername'";
			$str = mysql_query ($sql,$conn) or die (mysql_error());
		// end remove crystals
		
		// sens back to fighting and selects a new enemy
		header("location:fighting.php");
   }
   else {
	echo 'You do not have enough crystals to do this!!';
	sleep(180);
	header("location:fighting.php");
   }
	}
	
}
else {
	echo 'You do not have a selected an enemy!';
			header("location:fighting.php");
}