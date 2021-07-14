<?php

$code = null;

if (isset($_POST['btnDelete'])) {
  $contactID = trim($_POST['id']);
require_once '../../../config/connection.php';
    

  $sql = 'DELETE FROM contact WHERE contactID = :id;';
  $stmt = $conn->prepare($sql);
  try {
    $stmt->execute(['id' => $contactID]);
    if ($stmt->rowCount() === 1) {
      $code = 204;
    } else {
      $code = 500;
    }
  } catch(PDOException $e) {
	logErrors($e->getMessage());

    echo $e->getMessage();
    $code = 500;
  }
}



http_response_code($code);
