<?php
function createHeader($title) { // Vår funktion för att skriva ut all vår första kod och ändrar titeln beroende på argumentet i funktionen
?>
<!DOCTYPE html><!-- Doctype för vår hemsida berättar för webbläsaren att vi använder oss utav HTML5-kod -->
<html>
	<head>
		<title>
	{$title}
</title>
		<meta charset="UTF-8"><!-- Meta charset ställer in vår teckenkodning för sidan så att bl a åäö fungerar som vi vill att de ska. Kräver dock att vi alltid sparar våra filer med samma teckenkodning. -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- ställer in skalan för hemsidan så att saker skalas som lite större på mindre enheter för bl a läsbarhet -->
		<link rel="stylesheet" href="css/custom.css"><!-- Länkar in vår CSS -->		
	</head>
	<body>

	<? if(isset($_SESSION['user'])): ?>
	Du är inloggad som <?= $_SESSION['user']['name'] ?><br>
	Behörighet: <?= $_SESSION['user']['typ'] ?><br><br>
	
	<? if($_SESSION['user']['typ'] == "Admin"): ?>
		<a href="reg.php">Registrera ny medlem</a>
		<br>
	<? endif; ?><!--End session, user, typ-->
	<a href="medreg.php">Registrera nya medlemmar</a><br>
	<a href="logout.php">Logga ut</a>

	<? else: ?>
	<form action="login.php" method="POST">
		<input type="text" name="username" placeholder="Användarnamn"><br>
		<input type="password" name="password" placeholder="Lösenord"><br>
		<input type="submit" value="Logga in">
	</form>
	<br>

	<? endif; ?><!--End isset user-->
<?php
}
function createFooter() { // Skriver ut footern på hemsidan
?>
		</div>
	</body>
</html>
<?php
}
?>