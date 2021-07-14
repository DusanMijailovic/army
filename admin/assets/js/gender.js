$(document).ready(function() {

	$(document).on('click', '.edit-btn', function(e) {
		e.preventDefault();

        let id = $(this).data('id');


        $.ajax({
        	url: 'models/gender/get-one.php', 
        	method: 'GET',
        	data: {
        		btnEdit: true, 
        		id: id
        	},
        	dataType: 'json', 
        	success: function(data) {

                fillForm(data);
            }, 
            error: function(err, status, statusText) {
            	console.log(err);
            	console.log(status);
            }
        });
    });



    $(document).on('click', '#update-btn', function() {

    	let id = $('#hdnID').val();


       $.ajax({
          url: 'models/gender/update.php',
          method: 'POST',
          data: {
             btnUpdate: true,
             id: id,
             gender: $("#gender").val()
         },
         dataType: 'json',
         success: function(data) {

             clearForm();

             refreshGenderView();
         }, 
         error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });      
   });

    $(document).on('click', '.delete-btn', function(e) {
    	e.preventDefault();
    	let id = $(this).data('id');

    	$.ajax({
    		url: 'models/gender/delete.php',
    		method: 'POST',
    		data: {
    			btnDelete: true,
    			id: id
    		},
    		dataType: 'json',
    		success: function(data) {
    			refreshGenderView();
    		}, 
    		error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });
    });
});



function fillForm(data) {
	$("#hdnID").val(data.genderID);
	$("#gender").val(data.gender);
}


function clearForm() {
	$('#hdnID').val('');
	$("#gender").val('');
}


function refreshGenderView() {

    $.ajax({
    	url: 'models/gender/get-all.php',
    	method: 'POST',
    	dataType: 'json',
    	success: function(data) {
    		printGender(data);
    	}, 
    	error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });
}

function printGender(data) {
	let html = "";
	for(let gender of data) {
		html += `
		<tr>
		<td>${ gender.genderID }</td>
		<td>${ gender.gender }</td>
		<td> 
		<button class="btn btn-primary edit-btn" data-id="${ gender.genderID }">Edit</button>
		<button class="btn btn-danger delete-btn" data-id="${ gender.genderID }">Delete</button>
		</td>
		</tr>
		`;
	}
	$(".genders").html(html);
}