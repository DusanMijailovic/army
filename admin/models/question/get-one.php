<?php 

header("Content-Type: application/json");

require_once '../../../config/connection.php';

$code = null;
$data = "";

if (isset($_GET['btnEdit'])) {
	$questionID = trim($_GET['id']);

	$sql = "SELECT * FROM question WHERE questionID = :id";
	$stmt = $conn->prepare($sql);
	try {
		$stmt->execute(['id' => $questionID]);
		$data = $stmt->fetch();
	} catch (PDOException $e) {
	logErrors($e->getMessage());

		echo $e->getMessage();
		$code = 500;
	}
}

http_response_code($code);
echo json_encode($data);