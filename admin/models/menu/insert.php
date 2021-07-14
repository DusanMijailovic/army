<?php

header('Content-Type: application/json');

$code = null;

if (isset($_POST['btnInsert'])) {
  $menu = trim($_POST['name']);
  
  require_once '../../../config/connection.php';

  $sql = "INSERT INTO menu(name) VALUES (:name)";
  $stmt = $conn->prepare($sql);
  try {
    $stmt->execute([
      'name' => $menu
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