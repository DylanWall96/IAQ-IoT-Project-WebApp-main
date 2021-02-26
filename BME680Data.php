<?php
require_once 'api/functions.php';

$db = new Functions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$temp = test_input($_POST["temp"]);
		$pres = test_input($_POST["pres"]);
		$hum = test_input($_POST["hum"]);
		$gas = test_input($_POST["gas"]);
		$score = test_input($_POST["score"]);
		$location = test_input($_POST["location"]);
		
		// Insert Data
		$result = $db->insertData($temp, $pres, $hum, $gas, $score, $location);
	
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


echo json_encode($db->getData()->fetch_assoc());
?>