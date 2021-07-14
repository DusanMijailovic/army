<?php
header('Content-Type: application/json');

$code = null;
/*-------------------------UPDATE---------------------------*/

if (isset($_POST['btnUpdate'])) {
	$postID = trim($_POST['id']);
	$title = trim($_POST['title']);
	$body = trim($_POST['body']);
	$src = trim($_POST['src']);
	$alt = trim($_POST['alt']);
	$time = trim($_POST['time']);

	require_once '../../../config/connection.php';

	$sql = 'UPDATE post SET title = :title, body = :body, imageSrc = :src, imageAlt = :alt, time = :time WHERE postID = :id;';
	$stmt = $conn->prepare($sql);
	try {
		$stmt->execute([
			'title' => $title,
			'body' => $body,
			'src' => $src,
			'alt' => $alt,
			'time' => $time,
			'id' => $postID
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
