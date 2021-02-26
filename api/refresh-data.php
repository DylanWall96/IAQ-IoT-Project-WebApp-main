<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



require_once 'api/functions.php';



$db = new Functions();



echo json_encode($db->getData()->fetch_assoc());

?>
