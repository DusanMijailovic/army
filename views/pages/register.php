<?php

$genders = getAllFromTable('gender', $conn);
?>

<div class="container mt-4">
 <div class="row">
   <div class="col-lg-6 offset-lg-3 mt-5">
    <div id="successMessage" class="alert invisible" role="alert">
      <p class="text-center" id="msg"></p>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Ime i prezime</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Unesite ime i prezime" />
      <small id="nameError" class="form-text text-danger"></small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email adresa</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Unesite email" />
      <small id="emailError" class="form-text text-danger"></small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Lozinka</label>
      <input type="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Unesite lozinku">
      <small id="passwordError" class="form-text text-danger"></small>

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Potvrda lozinke</label>
      <input type="password" class="form-control" id="confPass" placeholder="Potvrda lozinke">
      <small id="confirmPasswordError" class="form-text text-danger"></small>
    </div>
    <div class="form-group">
      <label>Pol</label> <br>
      <?php foreach ($genders as $gender) : ?>
        <input type="radio" id="gender" name="gender" value=" <?= $gender->genderID ?>"> <?= $gender->gender ?>
      <?php endforeach;?>
    </div>
    <button id="registerBtn" class="btn btn-dark-green text-white my-4   font-weight-light">Registracija</button>
  </div>
</div>
</div>