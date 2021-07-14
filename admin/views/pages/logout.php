<?php
@session_start();
require_once '../../../modules/functions.php';
if (adminLoggedIn()) {
	unset($_SESSION['user']);
	session_destroy();
	header('Location: ../../../index.php?page=login');
} 