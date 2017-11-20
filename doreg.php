<?php
require("boot.php"); // Inkludera boot.php där all vår "standardkod" finns
$ok = false;
if(isset($_POST["username"])) { // Kollar ifall $_POST["username"] finns. Och ifall den finns (skickat från formuläret) så vet vi att "password" också finns
	$user = strtolower($_POST["username"]); // Användarnamn och lösenord för enklare hantering
	$pass = $_POST["password"];
	$mail = $_POST["mail"];
	$typ = $_POST["typ"];
	$ok = true; // Kontrollvariabel som vi använder senare
	$ok = sql::set("INSERT INTO users(username, password, mail, typ) VALUES(\"".$user."\", \"".crypt($pass, "kfgf15")."\", \"".$mail."\", \"".$typ."\");");
	if($ok) {
	header("Location: index.php?message=".urlencode("Användaren har blivit registrerad."));
	}
}
if($ok == false) {
	header("Location: index.php?message=".urlencode("Användaren kunde inte registreras")); // Ifall det inte gick att registrera användaren så skickas han tillbaka till startsidan
}
?>