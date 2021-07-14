$(document).ready(function() {

    $(document).on('click', '.delete-btn', function(e) {
    	e.preventDefault();
    	let id = $(this).data('id');

    	$.ajax({
    		url: 'models/contact/delete.php',
    		method: 'POST',
    		data: {
    			btnDelete: true,
    			id: id
    		},
    		dataType: 'json',
    		success: function(data) {
    			refreshContactView();
    		}, 
    		error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });
    });
});


function refreshContactView() {

    $.ajax({
    	url: 'models/contact/get-all.php',
    	method: 'POST',
    	dataType: 'json',
    	success: function(data) {
    		printContact(data);
    	}, 
    	error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });
}

function printContact(data) {
	let html = "";
	for(let contact of data) {
		html += `
		<tr>
		<td>${ contact.contactID }</td>
		<td>${ contact.fullName }</td>
        <td>${ contact.email }</td>
        <td>${ contact.content }</td>
		<td> 
		<button class="btn btn-danger delete-btn" data-id="${ contact.contactID }">Delete</button>
		</td>
		</tr>
		`;
	}
	$(".contacts").html(html);
}