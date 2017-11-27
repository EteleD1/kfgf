<?php
require("boot.php"); // Inkludera boot.php där all vår "standardkod" finns

if(isset($_POST["persnr"])) { // Kollar ifall $_POST["username"] finns. Och ifall den finns (skickat från formuläret) så vet vi att "password" också finns
	$ok = false;
	$namn = $_POST["namn"]; // Användarnamn och lösenord för enklare hantering
	$adress = $_POST["adress"];
	$Ptele = $_POST["Ptele"];
	$Atele = $_POST["Atele"];
	$persnr = $_POST["persnr"];
	$plats = $_POST["plats"];
	$kön = $_POST["kön"];
	$hobby = $_POST["hobby"];
	$ok = true; // Kontrollvariabel som vi använder senare
	$ok = sql::set("INSERT INTO userinfo(namn, adress, Ptele, Atele, persnr, plats, kön, hobby) VALUES(\"".$namn."\", \"".$adress."\", \"".$Ptele."\", \"".$Atele."\", \"".$persnr."\", \"".$plats."\", \"".$kön."\", \"".$hobby."\");");
	if($ok) {
	echo "Ny medlem registrerad!";
	} else {
		echo "Något gick fel!";
	}

	
}
?>
<h1>Registrering av ny medlem</h1>

<form action="medreg.php" method="POST">
	<p></p>
	<select name="plats">
	  <option value="Barbacka">Barbacka</option>
	  <option value="Degeberga">Degeberga</option>
	  <option value="Fjälkinge">Fjälkinge</option>
	  <option value="Näsby">Näsby</option>
	  <option value="Tollarp">Tollarp</option>
	  <option value="Tullen">Tullen</option>
	  <option value="Vilan">Vilan</option>
	  <option value="Åhus">Åhus</option>
	  <option value="Öllsjö">Öllsjö</option>
	  <option value="Österäng">Österäng</option>
	</select><br><br>
	<select name="kön">
	  <option value="Man">Man</option>
	  <option value="Kvinna">Kvinna</option>
	  <option value="Annat">Annat</option>
	</select><br><br>
	<input type="text" name="namn" placeholder="Namn" required><br><br>
	<input type="text" name="adress" placeholder="Adress" required><br><br>
	<input type="text" name="Ptele" placeholder="Ptele"><br><br>
	<input type="text" name="Atele" placeholder="Atele"><br><br>
	<input type="text" name="persnr" placeholder="Personnummer" required><br><br>
	<textarea name="hobby" rows="4" cols="50" placeholder="Hobbies för 18+"></textarea><br><br>
	<input type="submit" value="Registrera">
</form>