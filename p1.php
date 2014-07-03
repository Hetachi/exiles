<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}

include "config.php";

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("Cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");



// username and password sent from form 
$p2=$_GET['p2']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($p2);
$myusername = mysql_real_escape_string($p2);
$sql="SELECT * FROM $tbl_name WHERE name='$p2'";
$result=mysql_query($sql);


$_SESSION['p2'] = $p2;

   mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game WHERE name='$p2'");
   
   while($row = mysql_fetch_array($result)) {
   	$_SESSION['hpp2'] = $row['hp'];
	$_SESSION['max_hpp2'] = $row['max_hp'];
	$_SESSION['racep2'] = $row['race'];
	$_SESSION['staminap2'] = $row['stamina'];
	$_SESSION['stamina_maxp2'] = $row['stamina_max'];
	$_SESSION['strp2'] = $row['str'];
	$_SESSION['agip2'] = $row['agi'];
	$_SESSION['moneyp2'] = $row['money'];
	$_SESSION['vitp2'] = $row['vit'];
	$_SESSION['pointsp2'] = $row['points'];
   }
 
if ($_SESSION['hpp2'] == $_SESSION['max_hpp2'] && $_SESSION['staminap2'] == $_SESSION['stamina_maxp2'] && $_SESSION['pointsp2'] > 400) {
if (isset($_SESSION['p2']) == TRUE) {
header("location:p2.php");
}
}
else {
include "./style/header.php";
include "./menu.php";
echo '<div id="error"><p id="errorp">Tavs pretinieks ir pārāk vājš priekš tevis!</p></div>';
include "./style/footer.php";
}
?>