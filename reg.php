<?php
require("boot.php"); // Inkludera boot.php där all vår "standardkod" finns
?>
<h1>Registrering</h1>

<form action="doreg.php" method="POST">
	<p>Användartyp</p>
	<p>Fritidsledare<input type="radio" name="typ" value="Fritidsledare"></p>
	<p>Verksamhetschef<input type="radio" name="typ" value="Verksamhetschef"></p>
	<p>Föreståndare<input type="radio" name="typ" value="Föreståndare"></p>
	<p>Admin<input type="radio" name="typ" value="Admin"></p>
	<input type="text" name="mail" placeholder="E-post"><br>
	<br>
	<input type="text" name="username" placeholder="Användarnamn"><br>
	<input type="password" name="password" placeholder="Lösenord"><br>
	<input type="submit" value="Registrera">
</form>