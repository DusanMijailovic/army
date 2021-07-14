<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../source/Exception.php';
require '../source/PHPMailer.php';
require '../source/SMTP.php';
require_once '../config/connection.php';
header("Content-Type: application/json");
$code = null;
$data = "";

if (isset($_POST["registerBtn"])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPass = $_POST['confirmPass'];
	$gender = isset($_POST['selectedGender']) ? $_POST['selectedGender'] : null;

	$errors = [];


	$reName = '/^[A-Z][a-z]{2,15}\s[A-Z][a-z]{2,15}$/';
  $rePassword = '/^[a-z0-9]{8,}$/';


  if ($name) {
   if (!preg_match($reName, $name)) {
    array_push($errors, 'Ime nije ispravnog formata!');  
  }
} else {
  array_push($errors, 'Polje za ime ne sme biti prazno!');
}


if ($email) {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, 'Email nije ispravanog formata!');
  }
} else {
  array_push($errors, 'Polje za email ne sme biti prazno!');
}


if ($password) {
  if (!preg_match($rePassword, $password)) {
    array_push($errors, 'Lozinka ne može da sadrži manje od 8 karaktera!');

  }
} else {
  array_push($errors, 'Polje za lozinku ne sme biti prazno!');
}


if ($confirmPass !== $password) {
  array_push($errors, "Lozinke se ne poklapaju!");
} 

if (empty($gender)) {
 array_push($errors, "Morate izabrati pol!");
}

if (count($errors) > 0) {
 $data = $errors; 
 $code = 422;
} else {
  $secrPassword = md5($password);
  $date = time();
  $token = bin2hex(random_bytes(60));
  $sql = 'INSERT INTO user(fullName, email, password, roleID, token) VALUES (:fullName, :email, :password, 2, :token);';
  $stmt = $conn->prepare($sql);
  try {
   $stmt->execute([
     'fullName' => $name,
     'email'    => $email,
     'password' => $secrPassword,
     'token'   => $token
   ]);
   if ($stmt->rowCount() === 1) {
    $code = 201;
    $data = 'Uspešno ste se registrovali. Aktivacioni link je poslat na Vaš email!';
    $mail = new PHPMailer(true);                              
    try {
      
      $mail->SMTPDebug = 0;                                 
      $mail->isSMTP();                                      
      $mail->Host = 'smtp.gmail.com'; 
      $mail->SMTPAuth = true;
      $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );                           
     $mail->Username = 'auditorne.php@gmail.com';               
     $mail->Password = 'Sifra123';                  
     $mail->SMTPSecure = 'tls';                            
     $mail->Port = 587;                                


                    $mail->setFrom('auditorne.php@gmail.com', 'Registraciona forma');//auditorne.php@gmail.com
                    $mail->addAddress($email);     

                    $mail->isHTML(true);                                 
                    $mail->Subject = 'Aktivirajte svoj nalog';
                    $href = "http://localhost:8080/armyblog/index.php?page=activate&active=" . $token;
                    $mail->Body = 'Da bi ste aktivirali svoj nalog kliknite na <a href="' . $href . '">ovaj</a> link';

                    $mail->send();
                  } catch (Exception $e) {
	                  logErrors($e->getMessage());

                    echo $e->getMessage();
                  }

                } else {
                  $code = 500;
                }

              } catch (PDOException $e) {
                $data  = 'Email nije dostupan!';
               $code = 409;

                logErrors($data);
               echo $e->getMessage();
             }
           }
         }
         http_response_code($code); 
         echo json_encode($data); 
