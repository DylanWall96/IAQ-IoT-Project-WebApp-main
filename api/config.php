<?php

/* Computational reproducibility - 
In order for this to work, change these parameters to your own db parameters */

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "IoT");

//Create Connection
$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

//Check Connection
if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}
?>
