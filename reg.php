<?php
require("boot.php"); // Inkludera boot.php där all vår "standardkod" finns
createHeader("kfgf");
?>
<h1>Registrering</h1>

<form action="doreg.php" method="POST">
	<p>Användartyp</p>
	<p>Fritidsledare<input type="radio" name="typ" value="Fritidsledare"></p>
	<p>Verksamhetschef<input type="radio" name="typ" value="Verksamhetschef"></p>
	<p>Föreståndare<input type="radio" name="typ" value="Föreståndare"></p>
	<p>Admin<input type="radio" name="typ" value="Admin"></p>
	<input type="text" name="mail" placeholder="E-post" required><br>
	<br>
	<input type="text" name="username" placeholder="Användarnamn" required><br><br>
	<input type="password" name="password" placeholder="Lösenord" required><br><br>
	<input type="submit" value="Registrera">
</form>