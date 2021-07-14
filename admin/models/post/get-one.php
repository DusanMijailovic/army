<?php 

header("Content-Type: application/json");

require_once '../../../config/connection.php';

$code = null;
$data = "";

if (isset($_GET['btnEdit'])) {
	$postID = trim($_GET['id']);

	$sql = "SELECT * FROM post WHERE postID = :id";
	$stmt = $conn->prepare($sql);
	try {
		$stmt->execute(['id' => $postID]);
		$data = $stmt->fetch();
	} catch (PDOException $e) {
	logErrors($e->getMessage());

		echo $e->getMessage();
		$code = 500;
	}
}

http_response_code($code);
echo json_encode($data);