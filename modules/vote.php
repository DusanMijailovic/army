<?php 


try {
	$sql = "SELECT COUNT(*) AS totalNumber FROM statistics";
	$total = executeQuery($sql);
	
} catch (PDOException $e) {
	logErrors($e->getMessage());

	echo $e->getMessage();
}


$sql = "SELECT COUNT(*) AS numberG FROM statistics WHERE suggestionID = ?";
try {
	$number = executeAll($sql, $suggestion->suggestionID);
} catch(PDOException $e) {
	logErrors($e->getMessage());

	echo $e->getMessage();
}


$percentage = intval($number[0]->numberG) / intval($total[0]->totalNumber) * 100;


$sql = "SELECT * FROM statistics WHERE userID = ?";
try {
	
	$voted = executeOneRow($sql, [$_SESSION['user']->userID]);
} catch(PDOException $e) {
	logErrors($e->getMessage());

	echo $e->getMessage();
}

