<?php
header('Content-Type: application/json');

$code = null;
/*-------------------------UPDATE---------------------------*/

if (isset($_POST['btnUpdate'])) {
	$roleID = trim($_POST['id']);
	$role = trim($_POST['role']);
	require_once '../../../config/connection.php';

	$sql = 'UPDATE role SET role = :role WHERE roleID = :id;';
	$stmt = $conn->prepare($sql);
	try {
		$stmt->execute([
			'role' => $role,
			'id' => $roleID
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
