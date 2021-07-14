<?php

$code = null;

if (isset($_POST['btnDelete'])) {
  $menuID = trim($_POST['id']);
require_once '../../../config/connection.php';
    

  $sql = 'DELETE FROM menu WHERE menuID = :id;';
  $stmt = $conn->prepare($sql);
  try {
    $stmt->execute(['id' => $menuID]);
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
