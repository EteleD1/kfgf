<?php
require("sql.php");
function genName() {
	$fn = [
		"David",
		"Karl",
		"Kalle",
		"Nils",
		"Peter",
		"Petter",
		"Martin",
		"Freddy",
		"Fredrik",
		"Filip",
		"Joel",
		"Johan",
		"Johannes",
		"John",
		"M�rten"
	];
	$en = [
		"Andersson",
		"Nilsson",
		"Pettersson",
		"Persson",
		"Karlsson",
		"Fredriksson",
		"M�rtensson",
		"Karlkvist",
		"Ljung",
		"Bj�rkqvist",
		"Thorvald",
		"Wald�n",
		"S�rensen"
	];
	return $fn[rand(0, count($fn)-1)]." ".$en[rand(0, count($en)-1)];
}
function genAge() {
	if(rand(0, 1) == 0) {
		return "19".str_pad(rand(0, 99), 2, "0", STR_PAD_LEFT).str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT).str_pad(rand(1, 28), 2, "0", STR_PAD_LEFT)."-".rand(0,9).rand(0,9).rand(0,9).rand(0,9);
	} else {
		return "20".str_pad(rand(0, 17), 2, "0", STR_PAD_LEFT).str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT).str_pad(rand(1, 28), 2, "0", STR_PAD_LEFT)."-".rand(0,9).rand(0,9).rand(0,9).rand(0,9);
	}
}
function genGen() {
	$gen = [
		"Man",
		"Kvinna",
		"Annat"
	];
	return $gen[rand(0, count($gen)-1)];
}
function genPlace() {
	$p = [
		"Barbacka",
		"Degeberga",
		"Fj�lkinge",
		"N�sby",
		"Slottet",
		"Tollarp",
		"Tullen",
		"Vilan",
		"Vi m�ts",
		"�hus",
		"�llsj�",
		"�ster�ng"
	];
	return $p[rand(0, count($p)-1)];
}
for($c = 0; $c < 1000; $c++) {
	echo "rad ".$c."<br>";
	$ok = sql::set("INSERT INTO userinfo(namn, pnr, k�n, regplace) VALUES(\"".genName()."\", \"".genAge()."\", \"".genGen()."\", \"".genPlace()."\");");
	echo "<pre>";
	print_r($ok);
	echo "</pre>";
}
?>