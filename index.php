<?php
require("boot.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>KFGF</title>
	<meta charset="UTF-8">
</head>
<body>


<? if(isset($_SESSION['user'])): ?>
	Du är inloggad som <?= $_SESSION['user']['name'] ?><br>
	Behörighet: <?= $_SESSION['user']['typ'] ?><br><br>
	
	<? if($_SESSION['user']['typ'] == "Admin"): ?>
		<a href="reg.php">Registrera ny medlem</a>
		<br>
	<? endif; ?>

	<a href="logout.php">Logga ut</a>

<? else: ?>
	<form action="login.php" method="POST">
		<input type="text" name="username" placeholder="Användarnamn"><br>
		<input type="password" name="password" placeholder="Lösenord"><br>
		<input type="submit" value="Logga in">
	</form>
	<br>

<? endif; ?>

	

	
</body>
</html>