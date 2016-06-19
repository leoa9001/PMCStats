<?php
/*
Checks if stuff exists
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


/*
the generalized version is lower in the script

grab_image("http://mcskinsearch.com/download/rio9001", "../img/heads/rio9001.png");

$rect = array("x" => 8, "y" => 8, "width" => 8, "height" => 8);

$img = imagecrop(imagecreatefrompng("../img/heads/rio9001.png"), $rect);
imagepng($img, "../img/Heads/rio9001.png");



*/
/*
Rest
*/


$playersName = $_GET['name'];

if(file_exists("../stats/players/".$playersName)){
	header("Location: ../stats/players/".$playersName."/index.html");
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

fclose($dataFile);



if(!$playerFound){
	echo "<h1> AINT NO PLAYA</h1>";
	return;
}

grab_image("http://mcskinsearch.com/download/".$playersName, "../img/player heads/".$playersName.".png");

$rect = array("x" => 8, "y" => 8, "width" => 8, "height" => 8);

$img = imagecrop(imagecreatefrompng("../img/player heads/".$playersName.".png"), $rect);
imagepng($img, "../img/player heads/".$playersName.".png");




//Making of the website and folders.
mkdir("../stats/players/".$playersName, 0700);

$siteFile = fopen("../stats/players/".$playersName."/index.html", "w");

fwrite($siteFile, "<h1>This be the playa ".$playersName."</h1>");


/*
    Should replaces this with EOD and actual player's site construction.
*/
for($i = 0; $i < count($colIndices);$i++){
    fwrite($siteFile, "<p>". $colIndices[$i].": ".$playerData[$i]." and index of: ".strval($i)."</p>");
}

fclose($siteFile);

//finally redirecet
header("Location: ../stats/players/".$playersName."/index.html");






?>