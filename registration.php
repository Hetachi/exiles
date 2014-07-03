<html>
<FORM ACTION="register.php" METHOD=post>
<p>Username:</p><input name="regname" type="text" size"20"></input>
<p>E-mail:</p><input name="email" type="text" size"20"></input>
<p>Password:</p><input name="regpass1" type="password" size"20"></input>
<p>Repeat Password:</p><input name="regpass2" type="password" size"20"></input>

<p>Choose your race! </p>
<form name="input" action="game.php" method="post">
<select name="race">
  <option value="human">Human</option>
  <option value="orc">Orc</option>
  <option value="elf">Elf</option>
</select>
</br>
</br>
<input type="submit" value="Register me!"></input>
</FORM>
</html>
