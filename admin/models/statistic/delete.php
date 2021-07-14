<?php

$code = null;


if (isset($_POST['btnDelete'])) {
  $code = 202;
  $statisticsID = trim($_POST['id']);
  require_once '../../../config/connection.php';
  

  $sql = 'DELETE FROM statistics WHERE statisticsID = :id;';
  $stmt = $conn->prepare($sql);
  try {
    $stmt->execute(['id' => $statisticsID]);
    if ($stmt->rowCount() === 1) {
      $code = 204;
      $data = 'Broj glasova uspešno obrisan!';     
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
