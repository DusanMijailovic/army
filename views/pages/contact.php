<div class="container mt-5">
	<div class="row">
		<div class="col-lg-6 offset-lg-3 mt-4">
			<div id="successMsg" class="alert invisible" role="alert">
      <p class="text-center" id="msg"></p>
      </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustom01" class="">Ime i prezime</label>
      <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Ime i prezime" required />
      <small id="fullNameHelp" class="form-text text-danger"></small>
    </div>
  </div>
  <div class="form-row">
	<div class="col-md-12">
		<label for="validationCustom02">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email adresa" required />
      <small id="emailHelp" class="form-text text-danger"></small>
	</div>
  </div>
  <div class="form-group mt-4">
  	<label for="">Vaša poruka</label>
    <textarea id="message" name="message" class="form-control"></textarea>
    <small id="contentHelp" class="form-text text-danger"></small>
  </div>
  <button class="btn btn-dark-green text-white my-4   font-weight-light" id="contactBtn" name="contactBtn">Pošalji</button>

		</div>
	</div>
</div>