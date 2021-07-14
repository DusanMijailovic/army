<?php
@session_start();
require_once '../modules/functions.php';
require_once '../config/connection.php';

$page = "";
require 'views/fixed/head.php'; 
require 'views/fixed/nav.php'; 
require 'views/fixed/sidebar.php'; 

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    
    switch ($page) {
     case 'role':
     require 'views/pages/role.php'; 
     break;
     case 'visits':
      require 'views/pages/visits.php'; 
      break;
     case 'menu':
     require 'views/pages/menu.php'; 
     break;
     case 'post':
     require 'views/pages/post.php'; 
     break;
     case 'gender':
     require 'views/pages/gender.php'; 
     break;
     case 'comment':
     require 'views/pages/comment.php'; 
     break;
     case 'socialnetwork':
     require 'views/pages/socialnetwork.php'; 
     break;
     case 'contact':
     require 'views/pages/contact.php'; 
     break;
     case 'question':
     require 'views/pages/question.php'; 
     break;
     case 'suggestion':
     require 'views/pages/suggestion.php'; 
     break;
     case '403':
     require_once "../views/pages/403.php";
     break;
     case '404':
     require_once "../views/pages/404.php";
     break;
     default:
     require_once 'views/pages/user.php';
     break;
   }
 }  


 require 'views/fixed/footer.php'; 
