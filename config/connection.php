<?php
	require_once "config.php";
	
	//recordAccessToPages();

try {
    $conn = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE . ';charset=utf8', USERNAME, PASSWORD);
   	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Greška!: " . $e->getMessage();  
}


function recordAccessToPages() {
	$open = fopen(LOG_FAJL, "a");
	$write = basename($_SERVER["REQUEST_URI"]) . "\t" . date("d.m.Y H:i:s"
   ) . "\t" . $_SERVER["REMOTE_ADDR"] . "\n";
	fwrite($open, $write);
	fclose($open);
   }

function logErrors($error) {
	$open = fopen(ERRORS_FILE, "a");
	$write = $error . "\t" . date("d.m.Y H:i:s") . "\n";
	fwrite($open, $write);
	fclose($open);
   }