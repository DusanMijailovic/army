<?php
@session_start();
header("Content-type: application/json");
$code = null;

if(isset($_POST['sendBtn'])){
    $link = $_POST['link'];
    $_SESSION['link'] = $link;
    $code = 200;
}

http_response_code($code);
