$(document).ready(function() {

	$(document).on('click', '.edit-btn', function(e) {
		e.preventDefault();

        let id = $(this).data('id');


        $.ajax({
        	url: 'models/question/get-one.php', 
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
          url: 'models/question/update.php',
          method: 'POST',
          data: {
             btnUpdate: true,
             id: id,
             question: $("#question").val()
         },
         dataType: 'json',
         success: function(data) {

             clearForm();

             refreshQuestionView();
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
    		url: 'models/question/delete.php',
    		method: 'POST',
    		data: {
    			btnDelete: true,
    			id: id
    		},
    		dataType: 'json',
    		success: function(data) {
    			refreshQuestionView();
    		}, 
    		error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });
    });
});



function fillForm(data) {
	$("#hdnID").val(data.questionID);
	$("#question").val(data.question);
}


function clearForm() {
	$('#hdnID').val('');
	$("#question").val('');
}


function refreshQuestionView() {

    $.ajax({
    	url: 'models/question/get-all.php',
    	method: 'POST',
    	dataType: 'json',
    	success: function(data) {
    		printQuestion(data);
    	}, 
    	error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });
}

function printQuestion(data) {
	let html = "";
	for(let question of data) {
		html += `
		<tr>
		<td>${ question.questionID }</td>
		<td>${ question.question }</td>
		<td> 
		<button class="btn btn-primary edit-btn" data-id="${ question.questionID }">Edit</button>
		<button class="btn btn-danger delete-btn" data-id="${ question.questionID }">Delete</button>
		</td>
		</tr>
		`;
	}
	$(".questions").html(html);
}