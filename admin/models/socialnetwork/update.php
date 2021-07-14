<?php
header('Content-Type: application/json');

$code = null;
/*-------------------------UPDATE---------------------------*/

if (isset($_POST['btnUpdate'])) {
  $socialNetworkID = trim($_POST['id']);
  $href = trim($_POST['href']);
  $icon = trim($_POST['icon']);
  require_once '../../../config/connection.php';

  $sql = 'UPDATE socialnetwork SET href = :href, icon = :icon WHERE socialNetworkID = :id;';
  $stmt = $conn->prepare($sql);
  try {
    $stmt->execute([
      'href' => $href,
      'icon'=> $icon,
      'id' => $socialNetworkID
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
