<?php
header('Content-Type: application/json');

include '/Applications/XAMPP/xamppfiles/htdocs/AirQualityProject/api/config.php';
//include '/var/www/html/AirQualityProject/api/config.php';

$query = "SELECT Timestamp, temp FROM BME where location='Bedroom' GROUP BY date(Timestamp), round(HOUR(Timestamp)), round(minute(Timestamp)) order by Timestamp DESC LIMIT 120";
$statement = $db->prepare ( $query );
$statement->execute ();
$result = $statement->get_result ();

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

echo json_encode($data);
?>