<?php

header('Content-Type: application/json');

$code = null;

if (isset($_POST['btnInsert'])) {
  $suggestion = trim($_POST['suggestion']);
  
  require_once '../../../config/connection.php';

  $sql = "INSERT INTO suggestion(suggestion, questionID) VALUES (:suggestion, 1)";
  $stmt = $conn->prepare($sql);
  try {
    $stmt->execute([
      'suggestion' => $suggestion
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