window.onload = function () {
	var buttonDelete = document.querySelectorAll('.delete-btn');
	for(var i=0; i < buttonDelete.length; i++) {
		buttonDelete[i].addEventListener('click', deleteSuggestion);
	}
}

function deleteSuggestion() {
	var id = this.dataset.id;
	var parent = this;

	$.ajax({
		url: 'delete/suggestionDelete.php',
		method: 'POST',
		data : { deleteBtn: 'delete', suggestionID: id },
		dataType: "json",
		success: function(data) {
			console.log(data);
			parent.parentElement.parentElement.style.display = 'none';
		},
		error: function(xhr, status,err) {
			console.log(xhr);
		}

	});
}


