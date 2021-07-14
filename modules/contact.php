<?php
require_once '../config/connection.php';
header("Content-Type: application/json");
$code = null;
$data = "";

if (isset($_POST["contactBtn"])) {
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$content = trim($_POST['content']);

	$errors = [];

	$reFullName = '/^[A-Z][a-z]{2,15}\s[A-Z][a-z]{2,15}$/';


	if ($fullName) {
		if (!preg_match($reFullName, $fullName)) {
			array_push($errors, 'Ime nije ispravno!');  
		}
	} else {
		array_push($errors, 'Polje za ime ne sme biti prazno!');
	}


	if ($email) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			array_push($errors, 'Email nije ispravan!');
		}
	} else {
		array_push($errors, 'Polje za email ne sme biti prazno!');
	}


	if (empty($content)) {
		array_push($errors, "Polje za poruku ne sme biti prazno!");
	}


	if (count($errors) > 0) {
		$data = $errors;
		$code = 422;
	} else {
		$sql = 'INSERT INTO contact(fullName, email, content) VALUES (:fullName, :email, :content);';
		$stmt = $conn->prepare($sql);
		try {
			$stmt->execute([
				'fullName' => $fullName,
				'email'    => $email,
				'content'  => $content
			]);
			if ($stmt->rowCount() === 1) {
				$code = 201;
				$data = 'Uspešno ste nas kontaktirali!';
			} else {
				$code = 500;
			}
		} catch (PDOException $e) {
			logErrors($e->getMessage());
			$code = 500;
		}
	}
}
http_response_code($code);
echo json_encode($data);