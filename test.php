<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}

$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="game"; // Table name 


$myusername = $_SESSION['myusername'];

	 echo 'Welcome '.$myusername.'!</br>';
	 echo 'You have: </br>';
	 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game WHERE name='$myusername'");
   
   while($row = mysql_fetch_array($result)) {
    echo $row['money'].' coins </br>';
	echo $row['crystals']. ' crystals </br>';
	echo '<b>Your stats are: </b></br>';
	echo 'Health: '.$row['hp'].' / '.$row['max_hp'];
	echo '</br>Stamina: '.$row['stamina'].' / '.$row['stamina_max'];
	echo '</br>Strenght: '.$row['str'];
	echo '</br>Agility: '.$row['agi'];
	echo '</br>Vitality: '.$row['agi'].'</br>';
echo '</br></br></br></br></br>----------------------------------------------TESTING STARTED---------------------------</br>';
	}

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

   $result = mysql_query("SELECT * FROM game ");
   echo 'Username	Money	Health<br/>';
   while($row = mysql_fetch_array($result)) {
   
   $test = $row['name'];
   $sad = $row['money'];
   $dsa = $row['hp'];
 
   echo $test.' '.$sad.' '.$dsa.'<br/>';
   
   }


?>
<html>
<body>
<button onclick="money()">Sort by money</button>
<button onclick="hp()">Sort by health</button>
<p id="text"> radasdasf </p>
<script>
function money(){
 document.getElementById('text').innerHTML="<?php echo $sad ?>"; 
   }

</script>
</body>
</html>