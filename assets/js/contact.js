
window.onload = function () {
	let button = document.querySelector("#contactBtn");
	button.addEventListener("click", contact);
}

function contact() {
	let fullName = document.querySelector("#fullName").value;
	let email = document.querySelector("#email").value;
	let content = document.querySelector("#message").value;

	let fullNameError = document.querySelector("#fullNameHelp");
	let emailError = document.querySelector("#emailHelp");
	let contentError = document.querySelector("#contentHelp");

	let fullNameTrue = true;
	let emailTrue = true;
	let contentTrue = true;

	let reName = /^[A-Z][a-z]{2,15}\s[A-Z][a-z]{2,15}$/;
	let reEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;


	if (fullName) {
		if (!reName.test(fullName)) {
			fullNameError.textContent = "Ime nije ispravno!";
			fullNameTrue = false;
		}
	} else {
		fullNameError.textContent = "Polje za ime ne sme biti prazno!";
		fullNameTrue = false;
	}

	if (email) {
		if (!reEmail.test(email)) {
			emailError.textContent = "Email nije ispravan!";
			emailTrue = false;
		}
	} else {
		emailError.textContent = "Polje za email ne sme biti prazno!";
		emailTrue = false;
	}


	if (!content) {
		contentError.textContent = 'Polje za poruku ne sme biti prazno!';
		contentTrue = false;
	}


	if (fullNameTrue && emailTrue && contentTrue) {
		fullNameError.textContent = "";
		emailError.textContent = "";
		contentError.textContent = "";
		
		$.ajax({
			url: "modules/contact.php",
			method: "POST",
			dataType: "json",
			data: {
				contactBtn: "send",
				fullName, email, content
			},
			success: function (data) {
				document.querySelector("#fullName").value = "";
				document.querySelector("#email").value = "";
				document.querySelector("#message").value = "";

				let msgAlert = document.querySelector('#successMsg');
				let message = document.querySelector('#msg');

				msgAlert.classList.remove('invisible');
				msgAlert.classList.add('alert-success');
				message.textContent = data;
				setTimeout(function() {
					msgAlert.classList.add('invisible')	
				} , 1500);
			},
			error: function (err, status, statusText) {
				let msgAlert = document.querySelector('#successMessage');
				let message = document.querySelector('#msg');
				switch (err.status) {
					case 409:
						msgAlert.classList.remove('invisible');
						msgAlert.classList.add('alert-warning');
						message.textContent = 'Email nije dostupan!';
						break;
					case 422:
						msgAlert.classList.remove('invisible');
						msgAlert.classList.add('alert-warning');
						message.textContent = 'Greške';
						break;
				}
			}
		})
	} else {
		console.log("Ima gresaka");
	}
}