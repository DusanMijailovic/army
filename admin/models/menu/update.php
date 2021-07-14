<?php
header('Content-Type: application/json');

$code = null;

if (isset($_POST['btnUpdate'])) {
	$menuID = trim($_POST['id']);
	$menu = trim($_POST['name']);
	require_once '../../../config/connection.php';

	$sql = 'UPDATE menu SET name = :name WHERE menuID = :id;';
	$stmt = $conn->prepare($sql);
	try {
		$stmt->execute([
			'name' => $menu,
			'id' => $menuID
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
