<?
// Database Connection
include '/Applications/XAMPP/xamppfiles/htdocs/AirQualityProject/api/config.php';
//include '/var/www/html/IAQIOT/api/config.php';


// get Users
$query = "SELECT * FROM IoT.BME";
if (!$result = mysqli_query($db, $query)) {
	exit(mysqli_error($db));
}

$sensor = array();
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$sensor[] = $row;
	}
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=SensorData.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Timestamp', 'Temperature', 'Pressure', 'Humidity' , 'Gas', 'Score' , 'Location'));

if (count($sensor) > 0) {
	foreach ($sensor as $row) {
		fputcsv($output, $row);
	}
}
?>
