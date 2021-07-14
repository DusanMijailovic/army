<?php
header('Content-Type: application/json');

$code = null;

if (isset($_POST['btnUpdate'])) {
	$questionID = trim($_POST['id']);
	$question = trim($_POST['question']);
	require_once '../../../config/connection.php';

	$query = 'UPDATE question SET question = :question WHERE questionID = :id;';
	$stmt = $conn->prepare($query);
	try {
		$stmt->execute([
			'question' => $question,
			'id' => $questionID
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
