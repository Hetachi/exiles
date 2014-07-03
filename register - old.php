<?php 

include "./orc.php";
include "./human.php";
include "./elf.php";
include "./config.php";
$money = 5000;
$crystals = 500;

$usernamel = strlen($_POST["regname"]);
$passwordl = strlen($_POST["regpass1"]);

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "SELECT * FROM game WHERE name = '" . mysql_real_escape_string($_POST['regname']) . "'";
    $result = mysql_query($sql) or die('error');
    $row = mysql_fetch_assoc($result);

if ($passwordl < 6) {
	echo 'Your password has to be at least 6 chracters long!';
}
elseif ($usernamel < 6) {
	echo 'Your username has to be atleast 6 characters long!';
}

elseif(mysql_num_rows($result)) {
      echo 'Username already taken!';
    }
else {
if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
if ($_POST["regname"] && $_POST["email"] && $_POST["regpass1"] && $_POST["regpass2"] ) {	

		if ($_POST["race"] == "human" && $_POST["regpass1"] == $_POST["regpass2"]) {
		$salt = "ripemd128";
		$_POST["regpass1"] = hash($salt,$_POST["regpass1"]);
		$_POST["regpass2"] = $_POST["regpass1"];
			$conn = mysql_connect($servername, $username) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "insert into game (name,password,email,race,hp,max_hp,stamina,stamina_max,str,agi,vit,money,crystals)values('$_POST[regname]','$_POST[regpass1]','$_POST[email]','human','$human_hp','$human_max_hp','$human_stamina','$human_stamina_max','$human_str','$human_agi','$human_vit','$money','$crystals')";
			$result = mysql_query ($sql,$conn) or die (mysql_error());
		}
		elseif ($_POST["race"] == "orc" && $_POST["regpass1"] == $_POST["regpass2"]) {
		$salt = "ripemd128";
		$_POST["regpass1"] = hash($salt,$_POST["regpass1"]);
		$_POST["regpass2"] = $_POST["regpass1"];
	
			$conn = mysql_connect($servername, $username) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "insert into game (name,password,email,race,hp,max_hp,stamina,stamina_max,str,agi,vit,money,crystals)values('$_POST[regname]','$_POST[regpass1]','$_POST[email]','orc','$orc_hp','$orc_max_hp','$orc_stamina','$orc_stamina_max','$orc_str','$orc_agi','$human_vit','$money','$crystals')";
			$result = mysql_query ($sql,$conn) or die (mysql_error());
		}
		elseif ($_POST["race"] == "elf" && $_POST["regpass1"] == $_POST["regpass2"]) {
		$salt = "ripemd128";
		$_POST["regpass1"] = hash($salt,$_POST["regpass1"]);
		$_POST["regpass2"] = $_POST["regpass1"];
			$conn = mysql_connect($servername, $username) or die (mysql_error());
			mysql_select_db($db_name,$conn);
			$sql = "insert into game (name,password,email,race,hp,max_hp,stamina,stamina_max,str,agi,vit,money,crystals)values('$_POST[regname]','$_POST[regpass1]','$_POST[email]','elf','$elf_hp','$elf_max_hp','$elf_stamina','$elf_stamina_max','$elf_str','$elf_agi','$human_vit','$money','$crystals')";
			$result = mysql_query ($sql,$conn) or die (mysql_error());
		}
		else { echo "ERROR NO RACE SELECTED!"; }

	echo "You have registered succesfully!";
	sleep(20);
	header("location:index.php");
	
	}	else {
				print"invaild data";
	}	
	}
	else {
		echo "Invalid email";
		}
		
		}
		
?>