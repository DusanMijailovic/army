      </div>
    </div>
    <footer class="sticky-footer">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright © Army Blog</span>
        </div>
      </div>
    </footer>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="admin/assets/js/sb-admin.js"></script>
<?php
     switch ($page) {
     case 'user':
   echo '<script src="assets/js/user.js"></script>';
     break;
       case 'role':
   echo '<script src="assets/js/role.js"></script>';
     break;
     case 'menu':
     echo '<script src="assets/js/menu.js"></script>';
     break;
     case 'post':
     echo '<script src="assets/js/post.js"></script>';
     break;
     case 'gender':
     echo '<script src="assets/js/gender.js"></script>'; 
     break;
     case 'comment':
     echo '<script src="assets/js/comment.js"></script>';
     break;
     case 'socialnetwork':
     echo '<script src="assets/js/socialnetwork.js"></script>'; 
     break;
     case 'contact':
     echo '<script src="assets/js/contact.js"></script>';
     break;
     case 'question':
    echo '<script src="assets/js/question.js"></script>';
     break;
     case 'suggestion':
    echo '<script src="assets/js/answer.js"></script>';
     break;
   }
 

?>
</body>
</html>