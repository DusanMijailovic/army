<?php
header("Content-Type: application/json");
$code = null;
$data = "";

if (isset($_POST['commentBtn'])) {
  $comment = $_POST['comment'];
  $post = $_POST['postID'];
  $ready = true;

  if(empty($comment)) {
    $ready = false;
  }

  if ($ready) {
    require_once '../config/connection.php';
    $user = intval($_POST['userID']);    
		$sql = 'INSERT INTO comment(comment, userID, postID) VALUES(:comment, :userID, :postID);';
		$stmt = $conn->prepare($sql);
		try {
			$stmt->execute([
        'comment' => $comment,
        'userID'  => $user,
        'postID'  => $post		  
       ]);
       if ($stmt->rowCount() === 1) {
          $code = 201;       
       } else {
        $code = 500;
       }
    } catch(PDOException $e) {
      logErrors($e->getMessage());
      echo $e->getMessage();
      $code = 500;
    }
  }
}
http_response_code($code);
echo json_encode($data);

