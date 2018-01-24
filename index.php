<?php
include("func.php");
$url = "customers.json";
$data = file_get_contents($url);
$latdublin = 53.339428;
$longdublin = -6.257664;
$characters = json_decode($data);

$a=array();

//check if is empty
if ($characters) {
	foreach ($characters as $character) {
		//Calculate de distance to the office of Dublin
		$distance = distanceCalculation($latdublin, $longdublin, $character->latitude, $character->longitude);
		if ($distance < 100) {
			//save it
			$a[$character->user_id] = $character->name;
		}
	}


	ksort($a);
	echo "Iduser => Name <br>";
	foreach ($a as $clave => $valor) {
	    echo "{$clave} => {$valor} <br>";
	}
} 

?>