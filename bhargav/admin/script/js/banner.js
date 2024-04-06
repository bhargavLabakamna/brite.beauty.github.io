


// ====================OPEN MODAL====================

$(document).on("click", ".add_banner", function () {
    var id=$(this).data('id');
    $.ajax({
        url: '../script/modal/banner_addedit.php?id='+id,
        type: 'GET',
        dataType: 'html', 
        data: $(this).serialize(),
        success: function (data) {
                $("#bannerModalResponce").html(data);
                $('#banner_model_open').modal('show');
            },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

// ========================================


// ====================MODAL-SUBMIT====================

    $(document).on("click", ".banner_modal_submit", function () {
        // var id = $(this).data('id');
        // var formData = $("#banner_form").serialize();
        // formData += "&actionType=bannerAddEdit";

        var formData = new FormData($("#banner_form")[0]);
        formData.append('actionType', 'bannerAddEdit');

        $.ajax({
            url: '../script/ajax/banner.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,  // Important: prevent jQuery from processing the data
            contentType: false,
            success: function (data) {
                $('#banner_model_open').modal('hide');
                if (data.msgcode = 1) {
                    console.log(data.message);
                $('#banner_model_open').modal('hide');
                var dataTable = $('#banner_table').DataTable();
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
    });

// ========================================



// ====================banner_delete_onclick====================

    $(document).on("click", ".banner_delete_onclick", function () {
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
            url: '../script/ajax/banner.php/' + id,
            type: 'POST',
            dataType: 'json',
            data: {
                actionType: 'banner_delete', // Add the actionType here
                id: id
            },
            success: function (data) {
                if (data.msgcode=1) {
                    swal("Poof! Your Record Has Been Deleted!", {
                        icon: "success",
                      });
                    var dataTable = $('#banner_table').DataTable();
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
    $('#banner_table').DataTable({
        "draw": 2,
        "paging": true,
        "ordering": true,
        "searching": true,
        "lengthChange": true,
        "pageLength": 10,
        "order": [[ 0, 'desc' ]],
        "info": true,

        "ajax": {
            "url": '../script/ajax/banner.php',
            "type": 'POST',
            "data": function (d) {
                d.actionType="bannerList";
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
