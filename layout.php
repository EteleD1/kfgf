<?php
function createHeader($title) { // Vår funktion för att skriva ut all vår första kod och ändrar titeln beroende på argumentet i funktionen
	echo <<<OUT
<!DOCTYPE html><!-- Doctype för vår hemsida berättar för webbläsaren att vi använder oss utav HTML5-kod -->
<html>
	<head>
		<title>
	{$title}
</title>
		<meta charset="UTF-8"><!-- Meta charset ställer in vår teckenkodning för sidan så att bl a åäö fungerar som vi vill att de ska. Kräver dock att vi alltid sparar våra filer med samma teckenkodning. -->
		<link rel="stylesheet" href="lekt1.css"><!-- Länkar in vår CSS -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- ställer in skalan för hemsidan så att saker skalas som lite större på mindre enheter för bl a läsbarhet -->
	</head>
	<body>
OUT;
function createFooter() { // Skriver ut footern på hemsidan
	echo <<<OUT
		</div>
	</body>
</html>
OUT;
}
?>