<?php 

header("Content-Type: application/json");

require_once '../../../config/connection.php';

$code = null;
$data = "";

if (isset($_GET['btnEdit'])) {
	$genderID = trim($_GET['id']);

	$sql = "SELECT * FROM gender WHERE genderID = :id";
	$stmt = $conn->prepare($sql);
	try {
		$stmt->execute(['id' => $genderID]);
		$data = $stmt->fetch();
	} catch (PDOException $e) {
	logErrors($e->getMessage());

		echo $e->getMessage();
		$code = 500;
	}
}

http_response_code($code);
echo json_encode($data);