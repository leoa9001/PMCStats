<?php

$playersName = $_GET['name'];

if(file_exists("../stats/".$playersName)){
	header("Location: ../stats/".$playersName."/index.html");
	return;
}



$playerData = array();
$dataFile = fopen("../data/PlayerStatData.csv", "r");
$colIndices = fgetcsv($dataFile);

// "Statname" => index map.
$colNames = array();

for($i = 0; $i < count($colIndices);$i++){
	$colNames[$colIndices[$i]] = $i;
}

// Loading the rest of the data
$count = 0;
$nameIndex = $colNames["Name"];
$playerFound = false;
while(!feof($dataFile)){
	$playerData = fgetcsv($dataFile);

	if($playerData[$nameIndex]==$playersName){
		$playerFound = true;
		break;
	}

}



if(!$playerFound){
	echo "<h1> AINT NO PLAYA</h1>";
	return;
}

// mkdir("../stats/".$playersName,770);

// $siteFile = fopen("../stats/".$playersName."/index.html", "w");

// fwrite($siteFile, "<h1>This be the playa".$siteFile."</h1>");





for($i = 0; $i < count($colIndices);$i++){
	echo "<p>". $colIndices[$i].": ".$playerData[$i]."</p>";
}







?>