<?php
header('Content-Type: application/json');

$code = null;

if (isset($_POST['btnUpdate'])) {
	$genderID = trim($_POST['id']);
	$gender = trim($_POST['gender']);
	require_once '../../../config/connection.php';

	$query = 'UPDATE gender SET gender = :gender WHERE genderID = :id;';
	$stmt = $conn->prepare($query);
	try {
		$stmt->execute([
			'gender' => $gender,
			'id' => $genderID
		]);

		if ($stmt->rowCount() === 1) {
			$code = 204;
		} 
	} catch(PDOException $e) {
	logErrors($e->getMessage());

		echo $e->getMessage();
		$code = 500;
	}
}
http_response_code($code);
