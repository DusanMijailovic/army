$(document).ready(function() {

    $(document).on('click', '.delete-btn', function(e) {
    	e.preventDefault();
    	let id = $(this).data('id');

    	$.ajax({
    		url: 'models/comment/delete.php',
    		method: 'POST',
    		data: {
    			btnDelete: true,
    			id: id
    		},
    		dataType: 'json',
    		success: function(data) {
    			refreshCommentView();
    		}, 
    		error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });
    });
});


function refreshCommentView() {

    $.ajax({
    	url: 'models/comment/get-all.php',
    	method: 'POST',
    	dataType: 'json',
    	success: function(data) {
    		printComment(data);
    	}, 
    	error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });
}

function printComment(data) {
	let html = "";
	for(let comment of data) {
		html += `
		<tr>
		<td>${ comment.commentID }</td>
		<td>${ comment.comment }</td>
        <td>${ comment.created_at }</td>
		<td> 
		<button class="btn btn-danger delete-btn" data-id="${ comment.commentID }">Delete</button>
		</td>
		</tr>
		`;
	}
	$(".comments").html(html);
}