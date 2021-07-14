$(document).ready(function () {

	$(document).on('click', '.delete-btn', function(e) {
		e.preventDefault();

		let id = $(this).data('id');

		$.ajax({
			url: 'models/user/delete.php',
			method: 'POST',
			data: {
				btnDelete: true,
				id: id
			},
			dataType: 'json',
			success: function(data) {
				refreshUserView();
			},
			error: function(err, status, statusText) {
				console.log(err);
				console.log(status);
			}
		});
	});
});


function refreshUserView() {
	$.ajax({
		url: 'models/user/get-all.php',
		method: 'POST',
		dataType: 'json',
		success: function(data) {
			printUser(data);
		}, 
		error: function(err, status, statusText) {
			console.log(err);
			console.log(status);
		}
	});
}


function printUser(data) {
	let html = '';
	for(let user of data) {
		html += `<tr>
		<td>${ user.userID }</td>
		<td>${ user.fullName }</td>
		<td>${ user.email }</td>
		<td>${ user.registerDate }</td>
		<td>

		<button type="button" class="btn btn-danger delete-btn" data-id="${ user.userID }">Delete</button>
		</td>
		</tr>
		`;
	}
	$('.user').html(html);
}

