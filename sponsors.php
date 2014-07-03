
<?php include "./style/header.php";?>
<?php include "./style/menufront.php";?>
<div id="login">
<form name="form1" method="post" action="checklogin.php">
	<h2 id="ienakt">Ienākt:</h2>
	<p>Tavs lietotāj vārds:</p>

	<input name="myusername" type="text" id="myusername"></td>

	<p>Tava parole: </p>

	<input name="mypassword" type="password" id="mypassword"></td>
		</br>
		</br>
	<button id="reg" type="submit" name="Submit" value="Ienākt">Ienākt</button>
</form>
<h2 id="ienakt"> Reģistrācija: </h2>

<FORM ACTION="register.php" METHOD=post>
<p>Izvēlies savu vārdu:</p><input name="regname" type="text" size"20"></input>
<p>Ievadi savu e-pasta adresi:</p><input name="email" type="text" size"20"></input>
<p>Izvēlies savu paroli:</p><input name="regpass1" type="password" size"20"></input>
<p>Atkārto savu paroli:</p><input name="regpass2" type="password" size"20"></input>

<p>Izvēlies savu rasi! </p>
<form name="input" action="game.php" method="post">
<select name="race">
  <option value="human">Cilvēks: Sāk ar vairāk dzīvību</option>
  <option value="orc">Orks: Ir stiprāks nekā pārējie</option>
  <option value="elf">Elfs: Ir vairāk izturības punkti</option>
</select>
</br>
</br>
<button id="reg" type="submit" value="Reģistrēties!">Reģistrēties!</button>
</FORM>
</div>

<div id="news">
<div id="news2">
<h1 id="jaunumi">Sponsori</h1>
<div id ="news3">
<h2 id="newsh">Exile.lv</h3>
<p id="newsp">
Plīdz mums ar spēles hostošanu un publicitātes nodrošināšanu!
</p>
<hr id="newshr">
<p id="newsfooter">
Rakstijis: Exiles. Publicēts: 2014.06.10. - 18:11
</p>
</div>
</div>
</div>
<?php include "./style/footer.php";?>