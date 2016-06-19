<?php
/*
Should check if stuff exists
Does the player head loading thing requesting
*/

function grab_image($url,$saveto){
    $ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($saveto)){
        unlink($saveto);
    }
    $fp = fopen($saveto,'x');
    fwrite($fp, $raw);
    fclose($fp);
}

grab_image("http://mcskinsearch.com/download/rio9001", "../img/heads/rio9001.png");

$rect = array("x" => 8, "y" => 8, "width" => 8, "height" => 8);

$img = imagecrop(imagecreatefrompng("../img/heads/rio9001.png"), $rect);
imagepng($img, "../img/Heads/rio9001.png");


/*
Rest
*/


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

mkdir("../stats/".$playersName,0770);

// $siteFile = fopen("../stats/".$playersName."/index.html", "w");

// fwrite($siteFile, "<h1>This be the playa".$siteFile."</h1>");





for($i = 0; $i < count($colIndices);$i++){
	echo "<p>". $colIndices[$i].": ".$playerData[$i]."</p>";
}






?>