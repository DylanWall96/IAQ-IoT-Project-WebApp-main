<?php

class Functions
{

	private $conn;

	// constructor
	function __construct()
	{
		require 'conn.php';
		// connecting to database
		$db = new Connect();
		$this->conn = $db->connect();
	}

	// destructor
	function __destruct()
	{

	}

	public function getData(){
		$query = $this->conn->query("SELECT * FROM IoT.BME where location = 'Bedroom' order by Timestamp DESC");
		return $query;
	}
	
	public function getKitchenData(){
		$query = $this->conn->query("SELECT * FROM IoT.BME where location = 'Kitchen' order by Timestamp DESC");
		return $query;
	}
	
	
	public function insertData($temp, $pres, $hum, $gas, $score,$location) {
		$query = $this->conn->prepare ( "INSERT INTO IoT.BME (`temp`,`pres`,`hum`,`gas`,`score`,`location`) VALUES(?, ?, ?, ?,?,?)" );
		$query->bind_param ( "ssssss", $temp, $pres, $hum, $gas,$score,$location);
		$query->execute ();
		return $query;
	}
	
	
}

?>