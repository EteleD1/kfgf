<?php
require("boot.php");
unset($_SESSION["user"]); // Radera variabeln som håller koll på ifall användaren är inloggad eller inte
session_destroy(); // Radera alla session-variabler
header("Location: index.php"); // Skicka tillbaka användaren till index.php
?>