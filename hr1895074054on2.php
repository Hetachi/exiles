<?php 



include "./config.php";
			

				$conn = mysql_connect($host, $username,$password) or die (mysql_error());
				mysql_select_db($db_name,$conn);
				$sql = "UPDATE `$tbl_name`  SET stamina=`stamina`+10 WHERE stamina < stamina_max - 10";
				$str = mysql_query ($sql,$conn) or die (mysql_error());
				//end
				header("location:fighting2.php");


?>