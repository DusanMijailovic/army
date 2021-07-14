<?php

function getAllFromTable($table, $conn) {
	$sql = "SELECT * FROM $table;";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}


function executeQuery($sql){
	global $conn;
	return $conn->query($sql)->fetchAll();
}

function executeQueryOneRow($sql){
	global $conn;
	return $conn->query($sql)->fetch();
}


function executeOneRow($sql, array $params){
	global $conn;
	$stmt = $conn->prepare($sql);
	$stmt->execute($params);
	return $stmt->fetch();
}

function executeAll($sql, $params){
	global $conn;
	$stmt = $conn->prepare($sql); 
	$stmt->execute([$params]);
	return $stmt->fetchAll();
}

function executeNonGet($sql, array $params) {
	global $conn;
	$stmt = $conn->prepare($sql);
	$stmt->execute($params);
}


function dd($element) {
	echo "<pre>";
	print_r($element);
	echo "</pre>";
}

function userLoggedIn() {
	return (isset($_SESSION['user'])  && $_SESSION['user']->role === 'User') ? true : false;
}

function adminLoggedIn() {
	return (isset($_SESSION['user'])  && $_SESSION['user']->role === 'Admin') ? true : false;
}

function getAuthor()
{
 return executeQuery("SELECT * FROM author");
}

function pageTraffic()
{
 	$array = [];
	$sum = 0;
 	$naslovna = 0;
 	$autor = 0;
 	$kontakt = 0;
 	$login = 0;
	$register = 0;
	 
 	$last_day = strtotime("1 day ago");
	$file = file(LOG_FAJL);
 	if (count($file)) {
 	foreach ($file as $row) {
 	$parts = explode("\t", $row);
 
 	$url = explode(".php", $parts[0]);

 	$page = explode("&", $url[1]);

	if (strtotime($parts[1]) >= $last_day) {
	switch ($page[0]) {
	case "?page=home":
	$naslovna++;
	$sum++;
	break;
	case "?page=o%20autoru":
	$autor++;
	$sum++;
	break;
	case "?page=kontakt":
	$kontakt++;
	$sum++;
	break;
	case "?page=login":
	$login++;
	$sum++;
	break;
	case "?page=register":
	$register++;
	$sum++;
	break;
	default:
	$naslovna++;
	$sum++;
	break;
	}
	}
	}
	if ($sum > 0) {
	$array["naslovna"] = round($naslovna * 100 / $sum, 2);
	$array["autor"] = round($autor * 100 / $sum, 2);
	$array["kontakt"] = round($kontakt * 100 / $sum, 2);
	$array["login"] = round($login * 100 / $sum, 2);
	$array["register"] = round($register * 100 / $sum,
	2);
	
	}
	}
 	return $array;
}



