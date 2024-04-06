// ====================OPEN MODAL====================

$(document).on("click", ".add_category", function () {
    var id=$(this).data('id');
    $.ajax({
        url: '../script/modal/category_addedit.php?id='+id,
        type: 'GET',
        dataType: 'html', 
        data: $(this).serialize(),
        success: function (data) {
                $("#categoryModalResponce").html(data);
                $('#category_model_open').modal('show');
            },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

// ========================================


// ====================MODAL-SUBMIT====================

    $(document).on("click", ".category_modal_submit", function () {
        var formData = new FormData($("#category_form")[0]);
        formData.append('actionType', 'categoryAddEdit');

        $.ajax({
            url: '../script/ajax/category.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.msgcode = 1) {
                    console.log(data.message);
                $('#category_model_open').modal('hide');
                var dataTable = $('#category_table').DataTable();
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
    });

// ========================================



// ====================category_delete_onclick====================

    $(document).on("click", ".category_delete_onclick", function () {
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
            url: '../script/ajax/category.php/' + id,
            type: 'POST',
            dataType: 'json',
            data: {
                actionType: 'category_delete', // Add the actionType here
                id: id
            },
            success: function (data) {
                if (data.msgcode=1) {
                    swal("Poof! Your Record Has Been Deleted!", {
                        icon: "success",
                      });
                    var dataTable = $('#category_table').DataTable();
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
    $('#category_table').DataTable({
        "draw": 2,
        "paging": true,
        "ordering": true,
        "searching": true,
        "lengthChange": true,
        "pageLength": 10,
        "order": [[ 0, 'desc' ]],
        "info": true,

        "ajax": {
            "url": '../script/ajax/category.php',
            "type": 'POST',
            "data": function (d) {
                d.actionType="categoryList";
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
