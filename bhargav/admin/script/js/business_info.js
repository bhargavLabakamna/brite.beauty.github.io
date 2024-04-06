// ====================MODAL-SUBMIT====================

$(document).on("click", ".business_info_submit", function () {
    $("#business_info_form").validate({
        submitHandler: function(form) {
        var formData = new FormData($("#business_info_form")[0]);
        formData.append('actionType', 'business_infoAddEdit');

        $.ajax({
            url: '../script/ajax/business_info.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#business_info_model_open').modal('hide');
                if (data.msgcode = 1) {
                    console.log(data.message);
                $('#business_info_model_open').modal('hide');
                var dataTable = $('#business_info_table').DataTable();
                dataTable.ajax.reload();
                $.notify({
                    message: "fgfggdgdd"
                }, {
                    type: 'success',
                    delay: 3000
                });
                }
                else{
                    console.log("Ajax Not Recived");
                    alert("Somthing Went Wrong");
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        return false;
    }
    });
});

// ========================================



// ====================business_info_delete_onclick====================

    $(document).on("click", ".business_info_delete_onclick", function () {
        var id = $(this).data('id');
  
        swal({
            title: "Are You Sure?",
            text: "Once Deleted, You Will Not Be Able To Recover This Record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
        $.ajax({
            url: '../script/ajax/business_info.php/' + id,
            type: 'POST',
            dataType: 'json',
            data: {
                actionType: 'business_info_delete', // Add the actionType here
                id: id
            },
            success: function (data) {
                if (data.msgcode=1) {
                    swal("Poof! Your Record Has Been Deleted!", {
                        icon: "success",
                      });
                    var dataTable = $('#business_info_table').DataTable();
                    dataTable.ajax.reload();
                }
                else{
                    alert("Somthing Went Wrong");
                }
                // loadDataTable();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    } else {
        swal("Your Records Is Safe!");
      }
    });
          
    });


// ========================================



// ====================LOAD-DATATABLE====================

$(document).ready(function () {
    $('#business_info_table').DataTable({
        "draw": 2,
        "paging": true,
        "ordering": true,
        "searching": true,
        "lengthChange": true,
        "pageLength": 10,
        "order": [[ 0, 'desc' ]],
        "info": true,

        "ajax": {
            "url": '../script/ajax/business_info.php',
            "type": 'POST',
            "data": function (d) {
                d.actionType="business_infoList";
                d.draw = d.draw || 1;
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "status" },
            { "data": "created_at" },
            { "data": "action" },
        ],
        "language": {
        },
        "initComplete": function (settings, json) {
            console.log("DataTables has been fully initialized.");
        }
    });
});


// ========================================
