function login() {
	let email = document.querySelector('#email').value;
	let password = document.querySelector('#password').value;

	let passwordError = document.querySelector('#passwordError');
	let emailError = document.querySelector('#emailError');

	let rePassword = /^[a-z0-9]{8,}$/;
	let reEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

	let emailTrue = true;
	let passwordTrue = true;

	if (password) {
		if (!rePassword.test(password)) {
			passwordError.textContent = 'Lozinka nije ispravna!';
			passwordTrue = false;
		}
	} else {
		passwordError.textContent = 'Polje za lozinku ne sme biti prazno!';
		passwordTrue = false;
	}

	if (email) {
		if (!reEmail.test(email)) {
			emailError.textContent = 'Email nije ispravan!';
			emailTrue = false;
		}
	} else {
		emailError.textContent = 'Polje za email ne sme biti prazno!';
		emailTrue = false;
	}

	if (emailTrue && passwordTrue) {
		return true;
	} else {
		return false;
	}
}

