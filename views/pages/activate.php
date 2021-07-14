<?php
if(isset($_GET['active'])) {
	$token = $_GET['active'];
	$sql = 'UPDATE user SET active = 1 WHERE token = ?;';
  try {
    executeNonGet($sql, [$token]);
  } catch(PDOException $e) {
   echo $e->getMessage();
  }
} else {
	header('Location: index.php');
}

?>

<div class="container my-5">
	<div class="jumbotron mt-4 bg-transparent">
		<h1 class="text-center font-weight-light">Uspešno ste verifikovali Vaš nalog! Da biste mogli da koristite usluge sajta, morate se prijaviti!</h1>		
	</div>
</div>
