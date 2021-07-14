$(document).ready(function() {

	$(document).on('click', '.edit-btn', function(e) {
		e.preventDefault();

        let id = $(this).data('id');


        $.ajax({
        	url: 'models/menu/get-one.php', 
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
        		url: 'models/menu/update.php',
        		method: 'POST',
        		data: {
        			btnUpdate: true,
        			id: id,
        			name: $("#name").val()
        		},
        		dataType: 'json',
        		success: function(data) {

        			clearForm();

        			refreshMenuView();
        		}, 
        		error: function(err, status, statusText) {
                    console.log(err);
                    console.log(status);
                }
            });      
        } else {

        	$.ajax({
        		url: 'models/menu/insert.php',
        		method: 'POST',
        		data: {
        			btnInsert: true,
        			name: $("#name").val()
        		},
        		dataType: 'json',
        		success: function(data) {
        			console.log(data.success);
        			
        			clearForm();

        			refreshMenuView();
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
    		url: 'models/menu/delete.php',
    		method: 'POST',
    		data: {
    			btnDelete: true,
    			id: id
    		},
    		dataType: 'json',
    		success: function(data) {
    			refreshMenuView();
    		}, 
    		error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });
    });
});



function fillForm(data) {
	$("#hdnID").val(data.menuID);
	$("#name").val(data.name);
	$("#insert-update-btn").html("Update");
}


function clearForm() {
	$('#hdnID').val('');
	$("#name").val('');
	$("#insert-update-btn").html("Insert");
}


function refreshMenuView() {

    $.ajax({
    	url: 'models/menu/get-all.php',
    	method: 'POST',
    	dataType: 'json',
    	success: function(data) {
    		printMenu(data);
    	}, 
    	error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });
}

function printMenu(data) {
	let html = "";
	for(let menu of data) {
		html += `
		<tr>
		<td>${ menu.menuID }</td>
		<td>${ menu.name }</td>
		<td> 
		<button class="btn btn-primary edit-btn" data-id="${ menu.menuID }">Edit</button>
		<button class="btn btn-danger delete-btn" data-id="${ menu.menuID }">Delete</button>
		</td>
		</tr>
		`;
	}
	$(".menu").html(html);
}