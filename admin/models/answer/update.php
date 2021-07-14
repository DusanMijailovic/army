<?php
header('Content-Type: application/json');

$code = null;

if (isset($_POST['btnUpdate'])) {
	$suggestionID = trim($_POST['id']);
	$suggestion = trim($_POST['suggestion']);
	require_once '../../../config/connection.php';

	$sql = 'UPDATE suggestion SET suggestion = :suggestion WHERE suggestionID = :id;';
	$stmt = $conn->prepare($sql);
	try {
		$stmt->execute([
			'suggestion' => $suggestion,
			'id' => $suggestionID
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
