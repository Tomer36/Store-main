$(document).on('click', '.update', function (e) {
    var id = $(this).attr("data-id");
    var family = $(this).attr("data-family");
    $('#id_u').val(id);
    $('#family_u').val(family);
});

$(document).on('click', '#update', function (e) {
    var data = $("#update_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "family-member-update.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#editEmployeeModal').modal('hide');
                alert('Data updated successfully !');
                location.reload();
            }
            else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});
