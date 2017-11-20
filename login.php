<?php
require("boot.php"); // Inkludera boot.php där all vår "standardkod" finns
$ok = false;
if(isset($_POST["username"])) { // Kollar ifall $_POST["username"] finns. Och ifall den finns (skickat från formuläret) så vet vi att "password" också finns
	$user = strtolower($_POST["username"]); // Användarnamn och lösenord för enklare hantering
	$pass = $_POST["password"];
	$userdata = sql::get("SELECT username, typ FROM users WHERE username = \"".$user."\" AND password = \"".crypt($pass, "kfgf15")."\";");
	if(count($userdata) > 0) {
		$_SESSION["user"] = ["name" => $userdata[0]["username"], "typ" => $userdata[0]["typ"]];
		$ok = true;
	} else {
		$ok = false;
	}
	if($ok) {
		header("Location: index.php?message=".urlencode("Du har loggat in."));
	}
}
if($ok == false) {
	header("Location: index.php?message=".urlencode("Fel användarnamn eller lösenord")); // Ifall användaren inte blev inloggad så skickas hen tillbaka med ett felmeddelande i GET-variabeln "message"
}
?>