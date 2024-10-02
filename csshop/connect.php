<?php
try {
	$pdo = new PDO("mysql:host=localhost;dbname=sec1_9;charser=utf8", "Wstd9", "zz4WobU4");
} catch (PDOException $e) {
	echo "เกิดข้อผิดพลาด : ".$e->getMessage();
}
?>