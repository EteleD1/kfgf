<?php
require("boot.php");

if(isset($_GET["regplace"])) { // Alla isset nedan t.o.m rad 48 kollar om en getvariabel är vald och då ändras sättet hemsidan söker information.
	$b18 = " AND NOW() > ADDDATE(STR_TO_DATE(SUBSTR(userinfo.pnr, 1, 8), \"%Y%m%d\"), INTERVAL 18 YEAR)";
	$a18 = " AND NOW() <= ADDDATE(STR_TO_DATE(SUBSTR(userinfo.pnr, 1, 8), \"%Y%m%d\"), INTERVAL 18 YEAR)";
	if(isset($_GET["age"])) {
		if($_GET["age"] == "Ungdom") {
			$b18 = " AND NOW() < ADDDATE(STR_TO_DATE(SUBSTR(userinfo.pnr, 1, 8), \"%Y%m%d\"), INTERVAL 18 YEAR)";
		} elseif($_GET["age"] == "18+") {
			$a18 = " AND NOW() >= ADDDATE(STR_TO_DATE(SUBSTR(userinfo.pnr, 1, 8), \"%Y%m%d\"), INTERVAL 18 YEAR)";
		} else {
			$b18 = "";
			$a18 = "";
		}
	}


	if ($_GET["filtertype"] == 0) {
		$tid = "userinfo.datum";
		$pre = "userinfo.";
	} else {
		$tid = "events.ts";
		$pre = "";
	}

	$order = "regplace";
	$regplace = "";
	if(isset($_GET["regplace"])) {
		if($_GET["regplace"] != "Alla") {
			$regplace = " AND ".$pre."regplace = \"".$_GET["regplace"]."\"";
		}
	}
	$gen = "";
	if(isset($_GET["gen"])) {
		if($_GET["gen"] != "Alla") {
			$gen = " AND ".$pre."gen = \"".$_GET["gen"]."\"";
		}
	}
	$datefilter = false;
	$day = "";
	$month = "";
	$year = "";
	if($_GET["day"] == "") {
		if(isset($_GET["month"])) {
			if($_GET["month"] != "00") {
				$month = " AND MONTH(".$tid.") = \"".$_GET["month"]."\"";
				$datefilter = true;
			}
		}
		if(isset($_GET["year"])) {
			$year = " AND YEAR(".$tid.") = \"".$_GET["year"]."\"";
			$datefilter = true;
		}
	} else {
		$year = " AND year = \"".substr($_GET["day"], 0, 4)."\"";
		$month = " AND month = \"".substr($_GET["day"], 5, 2)."\"";
		$day = " AND day = \"".substr($_GET["day"], 8, 2)."\"";
		$datefilter = true;
	}
	$departure = "";
	if(isset($_GET["departure"])) {
		if($_GET["departure"] != "") {
			if ($_GET["departure"] == "Innan kl: 5") {
				$departure = " AND HOUR(".$tid.") < 17";	
			} elseif ($_GET["departure"] == "Efter kl: 5") {
				$departure = " AND HOUR(".$tid.") >= 17";
			}
		}
	}
if ($_GET["filtertype"] == 0) {
	$data = sql::get("SELECT COUNT(*) AS c FROM userinfo WHERE 1 = 1 ".$b18.$a18.$regplace.$gen.$year);
} else {
	$data = sql::get("SELECT COUNT(*) AS c FROM userinfo INNER JOIN events ON userinfo.id = events.uid WHERE 1 = 1 ".$b18.$a18.$regplace.$gen.$month.$year.$day.$departure);
}
	echo "<br>Resultat: ".$data[0]["c"]."<br>";
}
?>

<a href="#" onclick="include_checks(this);">Klicka här för att söka efter medlemmars närvaro</a>
<form action="" method="GET">
	<select name="regplace">
	<?php
	$regplaces = [
		"Alla",
		"Barbacka",
		"Degeberga",
		"Fjälkinge",
		"Näsby",
		"Tollarp",
		"Tullen",
		"Vilan",
		"Vi möts",
		"Åhus",
		"Öllsjö",
		"Österäng"
	];
	foreach($regplaces as $regplace) {
		$selected = "";
		if(isset($_GET["regplace"])) {
			if($regplace == $_GET["regplace"]) {
				$selected = " selected";
			}
		}
		echo "<option value=\"".$regplace."\"".$selected.">".$regplace."</option>";
	}
	?>
	</select>
	<select name="gen">
	<?php
	$gens = [
		"Alla",
		"Man",
		"Kvinna",
		"Annat"
	];
	foreach($gens as $gen) {
		$selected = "";
		if(isset($_GET["gen"])) {
			if($gen == $_GET["gen"]) {
				$selected = " selected";
			}
		}
		echo "<option value=\"".$gen."\"".$selected.">".$gen."</option>";
	}
	?>
	</select>
	<select name="age">
	<?php
	$ages = [
		"Alla",
		"18+",
		"Ungdom"
	];
	foreach($ages as $age) {
		$selected = "";
		if(isset($_GET["age"])) {
			if($age == $_GET["age"]) {
				$selected = " selected";
			}
		}
		echo "<option value=\"".$age."\"".$selected.">".$age."</option>";
	}
	?>
	</select>
	<select name="year">
	  <?php
	  $start = 2018;
	  $end = date("Y");
	  for($c = $start; $c <= $end; $c++) {
	  	$selected = "";
		if(isset($_GET["year"])) {
			if($c == $_GET["year"]) {
				$selected = " selected";
			}
		}
	  	echo "<option value=\"".$c."\"".$selected.">".$c."</option>";
	  }
	  ?>
	</select>
	<span id="event"<?php
	if(isset($GET_["filtertype"])) {
		if ($filtertype == 0) {
			echo " style=\"display:none;\"";
		} else {
			echo " style=\"display:inline;\"";
		}
	}	 
	 ?>>
		<select name="month">
		<?php
		$months = [
			"Hela året",
			"Januari",
			"Februari",
			"Mars",
			"April",
			"Maj",
			"juni",
			"juli",
			"Augusti",
			"September",
			"Oktober",
			"November",
			"December"
		];
		foreach($months as $k => $month) {
			$selected = "";
			if(isset($_GET["month"])) {
				if(str_pad($k, 2, "0", STR_PAD_LEFT) == $_GET["month"]) {
					$selected = " selected";
				}
			}
			echo "<option value=\"".str_pad($k, 2, "0", STR_PAD_LEFT)."\"".$selected.">".$month."</option>";
		}
		?>
		</select>
		<?php
		$val = "";
		if(isset($_GET["day"])) {
			$val = " value=\"".$_GET["day"]."\"";
		}
		?>
		<input type="date" name="day" id="dag"<?php echo $val; ?> min="2018-01-01" max="<?php echo date("Y-m-d"); ?>">
		<select name="departure">
		<?php
		$departures = [
			"Hela dagar",
			"Innan kl: 5",
			"Efter kl: 5"
		];
		foreach($departures as $departure) {
			$selected = "";
			if(isset($_GET["departure"])) {
				if($departure == $_GET["departure"]) {
					$selected = " selected";
				}
			}
			echo "<option value=\"".$departure."\"".$selected.">".$departure."</option>";
		}
		?>
		</select>
	</span>
	<input type="hidden" name="filtertype" id="filtertype" value="0">
	<input type="submit" value="Sök">
</form>

<script>
function include_checks(o) {
	var e = document.getElementById("event");
       if(e.style.display == 'inline') {
          e.style.display = 'none';
      	  o.innerText = "Klicka här för att söka efter medlemmars närvaro";
      	  document.getElementById("filtertype").value = 0;
       } else {
          e.style.display = 'inline';
      	  o.innerText = "Klicka här för att söka efter medlemmar";
      	  document.getElementById("filtertype").value = 1;
      	}
}
</script>