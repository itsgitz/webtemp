<?php
	header("Content-Type: application/json; charset=UTF-8");
	$servername = "localhost";
	$username = "sensor";
	$password = "P4ssword";
	$dbname = "sensor";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// get data from mysql database
	$sql = "SELECT * FROM `sensor_dc_log` ORDER BY `log_time` DESC LIMIT 1";
	//$result = $conn->query($sql);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	// create json file format
	$sensor = new stdClass();
	$sensor->suhu = $row["temperature"];
	$sensor->kelembaban = $row["humidity"];
	$myJson = json_encode($sensor);

	echo $myJson;

	$conn->close();
?>
