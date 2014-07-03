<?php
session_start();
if(isset($_SESSION['myusername']) == FALSE){
header("location:index.php");
}


include "/style/header.php";
include "./menu.php";
include "config.php";

$myusername = $_SESSION['myusername'];



mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
	
   $result = mysql_query("SELECT * FROM game WHERE name='$myusername'");
   
   while($row = mysql_fetch_array($result)) {
	$freeby = $row['freeby'];
	$_SESSION['freeby'] = $freeby;
	}
?>
	<div id="error">
	<div id="ad">
	<div id="ad2">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Exiled news footer ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-6447534936694273"
     data-ad-slot="8157278947"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</div>
	</div>
	</div>
	
	
<?php include "/style/footer.php"?>