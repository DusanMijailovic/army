$(document).ready(function() {

    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        let id = $(this).data('id');


        $.ajax({
            url: 'models/socialnetwork/get-one.php', 
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
                url: 'models/socialnetwork/update.php',
                method: 'POST',
                data: {
                    btnUpdate: true,
                    id: id,
                    href: $("#href").val(),
                    icon: $("#icon").val()
                },
                dataType: 'json',
                success: function(data) {

                    clearForm();

                    refreshSocialsView();
                }, 
                error: function(err, status, statusText) {
                    console.log(err);
                    console.log(status);
                }
            });      
        } else {

            $.ajax({
                url: 'models/socialnetwork/insert.php',
                method: 'POST',
                data: {
                    btnInsert: true,
                    href: $("#href").val(),
                    icon: $("#icon").val()
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data.success);
                    
                    clearForm();

                    refreshSocialsView();
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
            url: 'models/socialnetwork/delete.php',
            method: 'POST',
            data: {
                btnDelete: true,
                id: id
            },
            dataType: 'json',
            success: function(data) {
                refreshSocialsView();
            }, 
            error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });
    });
});



function fillForm(data) {
    $("#hdnID").val(data.socialNetworkID);
    $("#href").val(data.href);
    $("#icon").val(data.icon);
    $("#insert-update-btn").html("Update");
}


function clearForm() {
    $('#hdnID').val('');
    $("#href").val('');
    $("#icon").val('');
    $("#insert-update-btn").html("Insert");
}


function refreshSocialsView() {

    $.ajax({
        url: 'models/socialnetwork/get-all.php',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            printSocials(data);
        }, 
        error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });
}

function printSocials(data) {
    let html = "";
    for(let socials of data) {
        html += `
        <tr>
        <td>${ socials.socialNetworkID }</td>
        <td>${ socials.href }</td>
        <td>${ socials.icon }</td>
        <td> 
        <button class="btn btn-primary edit-btn" data-id="${ socials.socialNetworkID }">Edit</button>
        <button class="btn btn-danger delete-btn" data-id="${ socials.socialNetworkID }">Delete</button>
        </td>
        </tr>
        `;
    }
    $(".socials").html(html);
}