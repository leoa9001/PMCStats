<!DOCTYPE html>

<html>
<head>
	<!-- Custom -->
	<link type = "text/css" rel = "stylesheet" href = "css/stylesheet.css"/>
</head>
<body>
	<h1> Super exciting website!</h1>
	<?php
	$data = array();
	$file = fopen("data/PlayerStatData.csv", "r");
	$count = 0;
	$numPlayers = 100;
	while (!feof($file)) {
				// $data[$count] = print_r(fgetcsv($file), true);
		$data[$count] = fgetcsv($file);
				// print_r(fgetcsv($file));
				// echo "</br></br>";
		$count++;
	}
	fclose($file);

	echo "Show more rows by commenting out code in index.php...";
	echo "<br>";
	echo "<table id = \"topPlayersTable\">";
	echo "<caption> Top ".$numPlayers." players stats.</caption>";
	
	
	// for ($i = 0; $i < count($data); $i++) {
	for ($i = 0; $i < $numPlayers + 1; $i++) {
		echo "<tr>";
		for ($j = 0; $j < count($data[0]); $j++) {
			echo "<td>";
			echo $data[$i][$j];
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>"
	?>
</body>
</html>
