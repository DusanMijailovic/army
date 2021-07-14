$(document).ready(function() {

	$(document).on('click', '.edit-btn', function(e) {
		e.preventDefault();

        let id = $(this).data('id');


        $.ajax({
        	url: 'models/answer/get-one.php', 
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



    $("#insert-update-btn").click(function() {

    	let id = $('#hdnID').val();

        if(id !== '') {

        	$.ajax({
        		url: 'models/answer/update.php',
        		method: 'POST',
        		data: {
        			btnUpdate: true,
        			id: id,
        			suggestion: $("#suggestion").val()
        		},
        		dataType: 'json',
        		success: function(data) {

        			clearForm();

        			refreshAnswerView();
        		}, 
        		error: function(err, status, statusText) {
                    console.log(err);
                    console.log(status);
                }
            });      
        } else {

        	$.ajax({
        		url: 'models/answer/insert.php',
        		method: 'POST',
        		data: {
        			btnInsert: true,
        			suggestion: $("#suggestion").val()
        		},
        		dataType: 'json',
        		success: function(data) {
        			console.log(data.success);
        			
        			clearForm();

        			refreshAnswerView();
        		}, 
        		error: function(err, status, statusText) {
                    console.log(err);
                    console.log(status);
                }
            });     
        }
    });

    $(document).on('click', '.delete-btn', function(e) {
    	e.preventDefault();
    	let id = $(this).data('id');

    	$.ajax({
    		url: 'models/answer/delete.php',
    		method: 'POST',
    		data: {
    			btnDelete: true,
    			id: id
    		},
    		dataType: 'json',
    		success: function(data) {
    			refreshAnswerView();
    		}, 
    		error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });
    });
});



function fillForm(data) {
	$("#hdnID").val(data.suggestionID);
	$("#suggestion").val(data.suggestion);
	$("#insert-update-btn").html("Update");
}


function clearForm() {
	$('#hdnID').val('');
	$("#suggestion").val('');
	$("#insert-update-btn").html("Insert");
}


function refreshAnswerView() {

    $.ajax({
    	url: 'models/answer/get-all.php',
    	method: 'POST',
    	dataType: 'json',
    	success: function(data) {
    		printAnswer(data);
    	}, 
    	error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });
}

function printAnswer(data) {
	let html = "";
	for(let suggestion of data) {
		html += `
		<tr>
		<td>${ suggestion.suggestionID }</td>
		<td>${ suggestion.suggestion }</td>
		<td> 
		<button class="btn btn-primary edit-btn" data-id="${ suggestion.suggestionID }">Edit</button>
		<button class="btn btn-danger delete-btn" data-id="${ suggestion.suggestionID }">Delete</button>
		</td>
		</tr>
		`;
	}
	$(".suggestions").html(html);
}