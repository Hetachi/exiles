<?php
include "./style/header.php";

session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}

include "./config.php";


$myusername = $_SESSION['myusername'];


echo '';


mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$number1 = 1;
   $result = mysql_query("SELECT * FROM game ORDER BY money DESC ");
   echo '<table class="toplist"><tr><td>#</td><td><a href="top.php">Username</a></td><td><a href="toppoints.php">Points</a></td><td><a href="topmoney.php">Money</a></td><td><a href="tophealth.php">Health</a></td><td><a href="topjoindate.php">Join Date</a></td></tr><ol>';
   while($row = mysql_fetch_array($result)) {
   
   $test = $row['name'];
   $sad = $row['money'];
   $dsa = $row['hp'];
   $joindate = substr($row['joindate'],0,16);
	$points = $row['points'];
 
   echo '<tr><td>'.$number1.'.</td><td>'.$test.'</td><td>'.$points.'</td><td>'.$sad.'</td><td>'.$dsa.'</td><td>'.$joindate.'</td></tr>';
   $number1++;
   
   }
	echo '</ol></table>';
	include_once "./style/footer.php";
?>