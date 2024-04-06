


// ====================OPEN MODAL====================

$(document).on("click", ".add_gallery", function () {
    var id=$(this).data('id');
    $.ajax({
        url: '../script/modal/gallery_addedit.php?id='+id,
        type: 'GET',
        dataType: 'html', 
        data: $(this).serialize(),
        success: function (data) {
                $("#galleryModalResponce").html(data);
                $('#gallery_model_open').modal('show');
            },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

// ========================================


// ====================MODAL-SUBMIT====================

    $(document).on("click", ".gallery_modal_submit", function () {
        // var id = $(this).data('id');
        // var formData = $("#gallery_form").serialize();
        // formData += "&actionType=galleryAddEdit";

        var formData = new FormData($("#gallery_form")[0]);
formData.append('actionType', 'galleryAddEdit');

        $.ajax({
            url: '../script/ajax/gallery.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,  // Important: prevent jQuery from processing the data
    contentType: false,
            success: function (data) {
                if (data.msgcode = 1) {
                    console.log(data.message);
                $('#gallery_model_open').modal('hide');
                var dataTable = $('#gallery_table').DataTable();
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



// ====================gallery_delete_onclick====================

    $(document).on("click", ".gallery_delete_onclick", function () {
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
            url: '../script/ajax/gallery.php/' + id,
            type: 'POST',
            dataType: 'json',
            data: {
                actionType: 'gallery_delete', // Add the actionType here
                id: id
            },
            success: function (data) {
                if (data.msgcode=1) {
                    swal("Poof! Your Record Has Been Deleted!", {
                        icon: "success",
                      });
                    var dataTable = $('#gallery_table').DataTable();
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
    $('#gallery_table').DataTable({
        "draw": 2,
        "paging": true,
        "ordering": true,
        "searching": true,
        "lengthChange": true,
        "pageLength": 10,
        "order": [[ 0, 'desc' ]],
        "info": true,

        "ajax": {
            "url": '../script/ajax/gallery.php',
            "type": 'POST',
            "data": function (d) {
                d.actionType="galleryList";
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
