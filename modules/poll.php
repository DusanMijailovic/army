<?php
require_once '../config/connection.php';    

header("Content-Type: application/json");
$code = null;
$data = "";


if (isset($_POST['pollBtn'])) {
  $questionID = $_POST['questionID'];
  $answer = $_POST['answer'];
  $userID = $_POST['userID'];

  $sql = 'INSERT INTO statistics (suggestionID, questionID, userID) VALUES(:suggestionID,:questionID, :userID);';
  $stmt = $conn->prepare($sql);
  try {
    $stmt->execute([
      'suggestionID' => $answer,
      'questionID'  => $questionID,
      'userID'       => $userID      
    ]);
    if ($stmt->rowCount() === 1) {
      $code = 201;
      $data = 'Uspešno ste glasali!';     
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
echo json_encode($data);