<?php

 $pageCount = 0;

 $sql = "SELECT COUNT(*) AS postCount FROM post";
 try {
 	$num = executeQueryOneRow($sql);
 	$num = $num->postCount;
 	$num = ceil($num/3);
 } catch (PDOException $e) {
	logErrors($e->getMessage());

 	echo $e->getMessage();
 }


 if(isset($_SESSION['link'])){
 	$pageCount = $_SESSION['link'];
 	$pageCount = $pageCount * 3;
 }

 $sql = "SELECT * FROM post LIMIT " . $pageCount . ",3";
 try {
 	$posts = executeQuery($sql);
 } catch(PDOException $e) {
	logErrors($e->getMessage());
 	echo $e->getMessage();
 }