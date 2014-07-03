<html>
		

<div id="statsboxfight">
<div id= "currencyboxfight">
<p><img src="./img/money.gif" alt="money"> '.$_SESSION['money'].' <b>Nauda</b></p>
<p><img src="./img/crystals.gif" alt="crystals"> '. $_SESSION['crystals'].' <b>Kristāli</b></p>
</div>
<div id= "statsfight">
<p><img src="./img/health.gif" alt="money"> '. $_SESSION['hp'].'/'. $_SESSION['hp_max'].'  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> '. $_SESSION['stamina'].'/'.$_SESSION['stamina_max'].' <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> '. $_SESSION['str'].' <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> '. $_SESSION['agi'].' <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> '.$_SESSION['vit'].' <b>Veselība</b></p>
</div>

</div>

<h1 id="welcomeenemy">Tavs pretinieks ir '. $_SESSION['enemy'] .' !</h1>
<div id="racepicenemy">
<img src="./img/'.$_SESSION['enemy'].'.gif" alt="enemy">
</div>
<div id="statsboxenemy">
<div id= "statsenemy">
<p><img src="./img/health.gif" alt="money"> '. $_SESSION['hp'].'/'. $_SESSION['hp_max'].'  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> '. $_SESSION['stamina'].'/'.$_SESSION['stamina_max'].' <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> '. $_SESSION['str'].' <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> '. $_SESSION['agi'].' <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> '.$_SESSION['vit'].' <b>Veselība</b></p>
</div>
</div>
<div id="startfight">
		</br><form action="fighting2.php">
		<input type="submit" value="Sākt kauju!">
		</form></br>
</div>
<div id="newenemy">
		Par <b>1</b> <img src="./img/crystals.gif" alt="crystals"> kristālu variet atrast jaunu ienaidnieku, vai jūs to vēlaties?!
		<form action="newenemy.php">
		<input type="submit" value="Es vēlos jaunu ienaidnieku!">
		</form>

</div>



		</div>
<div id="statsboxfight">
<div id= "currencyboxfight">
<p><img src="./img/money.gif" alt="money"> '.$_SESSION['money'].' <b>Nauda</b></p>
<p><img src="./img/crystals.gif" alt="crystals"> '. $_SESSION['crystals'].' <b>Kristāli</b></p>
</div>
<div id= "statsfight">
<p><img src="./img/health.gif" alt="money"> '. $_SESSION['hp'].'/'. $_SESSION['hp_max'].'  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> '. $_SESSION['stamina'].'/'.$_SESSION['stamina_max'].' <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> '. $_SESSION['str'].' <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> '. $_SESSION['agi'].' <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> '.$_SESSION['vit'].' <b>Veselība</b></p>
</div>
</div>
</div>
</div>

<h1 id="welcomeenemy">Tavs pretinieks ir '. $_SESSION['enemy'] .' !</h1>
<div id="racepicenemy">
<img src="./img/'.$_SESSION['enemy'].'.gif" alt="enemy">
</div>
<div id="statsboxenemy">
<div id= "statsenemy">
<p><img src="./img/health.gif" alt="money"> '. $_SESSION['hp'].'/'. $_SESSION['hp_max'].'  <b>Dzīvība</b></p>
<p><img src="./img/stamina.gif" alt="money"> '. $_SESSION['stamina'].'/'.$_SESSION['stamina_max'].' <b>Izturība</b></p>
<p><img src="./img/str.gif" alt="money"> '. $_SESSION['str'].' <b>Spēks</b></p>
<p><img src="./img/agi.gif" alt="money"> '. $_SESSION['agi'].' <b>Veiklība</b></p>
<p><img src="./img/vit.gif" alt="money"> '.$_SESSION['vit'].' <b>Veselība</b></p>

</div>
</div>

</html>