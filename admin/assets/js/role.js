$(document).ready(function() {

    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        let id = $(this).data('id');


        $.ajax({
            url: 'models/role/get-one.php', 
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
                url: 'models/role/update.php',
                method: 'POST',
                data: {
                    btnUpdate: true,
                    id: id,
                    role: $("#role").val()
                },
                dataType: 'json',
                success: function(data) {

                    clearForm();

                    refreshRoleView();
                }, 
                error: function(err, status, statusText) {
                    console.log(err);
                    console.log(status);
                }
            });      
        } else {

            $.ajax({
                url: 'models/role/insert.php',
                method: 'POST',
                data: {
                    btnInsert: true,
                    role: $("#role").val()
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data.success);
                    
                    clearForm();

                    refreshRoleView();
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
            url: 'models/role/delete.php',
            method: 'POST',
            data: {
                btnDelete: true,
                id: id
            },
            dataType: 'json',
            success: function(data) {
                refreshRoleView();
            }, 
            error: function(err, status, statusText) {
                console.log(err);
                console.log(status);
            }
        });
    });
});



function fillForm(data) {
    $("#hdnID").val(data.roleID);
    $("#role").val(data.role);
    $("#insert-update-btn").html("Update");
}


function clearForm() {
    $('#hdnID').val('');
    $("#role").val('');
    $("#insert-update-btn").html("Insert");
}


function refreshRoleView() {

    $.ajax({
        url: 'models/role/get-all.php',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            printRole(data);
        }, 
        error: function(err, status, statusText) {
            console.log(err);
            console.log(status);
        }
    });
}

function printRole(data) {
    let html = "";
    for(let role of data) {
        html += `
        <tr>
        <td>${ role.roleID }</td>
        <td>${ role.role }</td>
        <td> 
        <button class="btn btn-primary edit-btn" data-id="${ role.roleID }">Edit</button>
        <button class="btn btn-danger delete-btn" data-id="${ role.roleID }">Delete</button>
        </td>
        </tr>
        `;
    }
    $(".roles").html(html);
}