<?php

header('Content-Type: application/json');

$code = null;

if (isset($_POST['btnInsert'])) {
  $title = trim($_POST['title']);
  $body = trim($_POST['body']);
  $src = trim($_POST['src']);
  $alt = trim($_POST['alt']);
  $time = trim($_POST['time']);
  
  require_once '../../../config/connection.php';

  $sql = "INSERT INTO post(title, body, imageSrc, imageAlt, time) VALUES (:title, :body, :src, :alt, :time)";
  $stmt = $conn->prepare($sql);
  try {
    $stmt->execute([
      'title' => $title,
      'body' => $body,
      'src' => $src,
      'alt' => $alt,
      'time' => $time
    ]);

    if ($stmt->rowCount() === 1) {
      $code = 201;
      echo json_encode(["success"=> "Uspešno kreirano!"]);
    } 
  } catch(PDOException $e) {
	logErrors($e->getMessage());

    echo $e->getMessage();
    $code = 500;
  }
}

http_response_code($code);