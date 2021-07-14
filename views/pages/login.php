<div class="container mt-5">
 <div class="row">
   <div class="col-lg-6 offset-lg-3 mt-5">
      <?php if (isset($_SESSION['noUser'])) : ?>
    <div class="alert alert-warning mt-3" role="alert"><?= $_SESSION['noUser'] ?></div>
    <?php unset($_SESSION['noUser']); ?>
    
  <?php endif; ?>

  <form action="modules/login.php" method="POST" onsubmit="return login();">
  <div class="form-group">
    <label for="email">Email adresa</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Uneti email">
    <small id="emailError" class="form-text text-danger"></small>
  </div>
  <div class="form-group">
    <label for="password">Lozinka</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Lozinka">
    <small id="passwordError" class="form-text text-danger"></small>
  </div>
  <button type="submit" name="loginBtn" class="btn btn-dark-green my-3 text-white btn-login   font-weight-light">Prijava</button>
</form>
</div>
   </div>
 </div>

<?php if (isset($_SESION['errors'])) : ?>
    <?php echo '<ul>'; ?>
  <?php foreach ($_SESION['errors'] as $error) : ?>
    <?php echo "<li> $error </li>"; ?>
  <?php endforeach; ?>
  <?php echo '</ul>'; ?>
  <?php unset($_SESION['errors']); ?>
<?php endif; ?>