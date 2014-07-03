<?php 



include "./config.php";
			

				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET stamina=`stamina_max`";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				//end
				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET hp=`hp_max`";
				$str = mysql_query ($sql,$conn) or die (mysql_error());


?>

USE `test` UPDATE `game`  SET hp='max_hp';
USE `test` UPDATE `game`  SET stamina='stamina_max';