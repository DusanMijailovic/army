$(document).ready(function() {

	$(document).on('click', '.edit-btn', function(e) {
		e.preventDefault();

        let id = $(this).data('id');


        $.ajax({
        	url: 'models/post/get-one.php', 
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
        		url: 'models/post/update.php',
        		method: 'POST',
        		data: {
        			btnUpdate: true,
        			id: id,
        			title: $("#title").val(),
                    body: $("#body").val(),
                    src: $("#src").val(),
                    alt: $("#alt").val(),
                    time: $("#time").val()
                },
                dataType: 'json',
                success: function(data) {

                 clearForm();

                 refreshPostView();
             }, 
             error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });      
        } else {

        	$.ajax({
        		url: 'models/post/insert.php',
        		method: 'POST',
        		data: {
        			btnInsert: true,
        			title: $("#title").val(),
                    body: $("#body").val(),
                    src: $("#src").val(),
                    alt: $("#alt").val(),
                    time: $("#time").val()
                },
                dataType: 'json',
                success: function(data) {
                 console.log(data.success);
                 
                 clearForm();

                 refreshPostView();
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
    		url: 'models/post/delete.php',
    		method: 'POST',
    		data: {
    			btnDelete: true,
    			id: id
    		},
    		dataType: 'json',
    		success: function(data) {
    			refreshPostView();
    		}, 
    		error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });
    });
});



function fillForm(data) {
	$("#hdnID").val(data.postID);
	$("#title").val(data.title);
    $("#body").val(data.body);
    $("#src").val(data.imageSrc);
    $("#alt").val(data.imageAlt);
    $("#time").val(data.time);
    $("#insert-update-btn").html("Update");
}


function clearForm() {
	$("#hdnID").val('');
    $("#title").val('');
    $("#body").val('');
    $("#src").val('');
    $("#alt").val('');
    $("#time").val('');
    $("#insert-update-btn").html("Insert");
}


function refreshPostView() {

    $.ajax({
    	url: 'models/post/get-all.php',
    	method: 'POST',
    	dataType: 'json',
    	success: function(data) {
    		printPost(data);
    	}, 
    	error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });
}

function printPost(data) {
	let html = "";
	for(let post of data) {
		html += `
		<tr>
		<td>${ post.postID }</td>
		<td>${ post.title }</td>
        <td>${ post.body }</td>
        <td>${ post.imageSrc }</td>
        <td>${ post.imageAlt }</td>
        <td>${ post.time }</td>
        <td> 
        <button class="btn btn-primary edit-btn" data-id="${ post.postID }">Edit</button>
        <button class="btn btn-danger delete-btn" data-id="${ post.postID }">Delete</button>
        </td>
        </tr>
        `;
    }
    $(".post").html(html);
}