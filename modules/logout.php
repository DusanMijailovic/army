<?php
@session_start();
require_once 'functions.php';

if (userLoggedIn()) {
	unset($_SESSION['user']);
	session_destroy();
	header('Location: ../index.php?page=login');
}