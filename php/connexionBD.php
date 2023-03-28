<?php
	function connectToDb() {
		try {
			$conn = new PDO("mysql:host=bino1jjljg7soefvrjiq-mysql.services.clever-cloud.com;dbname=bino1jjljg7soefvrjiq", "utwbhpnykdwthejb", "q9Ddj5miAPLOf4nBLJlM");
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

?>

