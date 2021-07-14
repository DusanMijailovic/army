<?php

@session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../source/Exception.php';
require '../source/PHPMailer.php';
require '../source/SMTP.php';
require_once '../config/connection.php';

if (isset($_POST['loginBtn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $errors = [];

  $rePassword = '/^[a-z0-9]{8,}$/';

  if ($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, 'E-mail nije ispravan!');
    }
  } else {
    array_push($errors, 'Polje za email ne sme biti prazno!');
  }
  
  if ($password) {
    if (!preg_match($rePassword, $password)) {
      array_push($errors, 'Lozinka nije ispravna!');
    }
  } else {
    array_push($errors, 'Polje za lozinku ne sme biti prazno!');
  }

  if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
  } else {
    $scrPassword = md5($password);
    $sql = 'SELECT * 
    FROM user u INNER JOIN role r 
    ON u.roleID = r.roleID
    WHERE email = :email AND password = :password AND active = 1;';
    $stmt = $conn->prepare($sql);
    try {
      $stmt->execute([
       'email' => $email,
       'password' => $scrPassword
     ]);
      if ($stmt->rowCount() === 1) {
        $user = $stmt->fetch();
        $_SESSION['user'] = $user;
        $role = $_SESSION['user']->role;
        switch ($role) {
          case 'User':
          header('Location: ../index.php?page=naslovna');
          break;
          case 'Admin':
          header('Location: ../admin/admin.php?page=user');
          break;
        }
      } else {
        header('Location: ../index.php?page=login');
        $_SESSION['noUser'] = 'Neuspešno logovanje! Poslat vam je email kako biste pokušali ponovo.';
        logErrors($_SESSION['noUser']);
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
                                
    
    
                        $mail->setFrom('auditorne.php@gmail.com', 'Neuspesno logovanje');//auditorne.php@gmail.com
                        $mail->addAddress($email);     
    
                        $mail->isHTML(true);                                 
                        $mail->Subject = 'Neuspesno logovanje';
                        $href = "http://localhost:8080/armyblog/index.php?page=login";
                        $mail->Body = 'Neuspesno logovanje. Pokusajte ponovo klikom na <a href="' . $href . '">link</a> link';
    
                        $mail->send();
                      } catch (Exception $e) {
                        logErrors($e->getMessage());
                        echo $e->getMessage();
                      }

      }
    } catch (PDOException $e) {
      logErrors($e->getMessage());
      echo $e->getMessage();
    }       
  }
}

