


// ====================OPEN MODAL====================

$(document).on("click", ".add_contact_inquiry", function () {
    var id=$(this).data('id');
    $.ajax({
        url: '../script/modal/contact_inquiry_addedit.php?id='+id,
        type: 'GET',
        dataType: 'html', 
        data: $(this).serialize(),
        success: function (data) {
                $("#contact_inquiryModalResponce").html(data);
                $('#contact_inquiry_model_open').modal('show');
            },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

// ========================================


// ====================MODAL-SUBMIT====================

    $(document).on("click", ".contact_inquiry_modal_submit", function () {
        // var id = $(this).data('id');
        var formData = $("#contact_inquiry_form").serialize();
        $.ajax({
            url: '/contact_inquiry_submit',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function (data) {
                if (data.message) {
                $('#contact_inquiry_model_open').modal('hide');
                var dataTable = $('#contact_inquiry_table').DataTable();
                dataTable.ajax.reload(null, false);
                $('#contact_inquiry_model_open').attr('aria-hidden', 'false');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

// ========================================



// ====================contact_inquiry_delete_onclick====================

    $(document).on("click", ".contact_inquiry_delete_onclick", function () {
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // User clicked confirm
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/delete_contact_inquiry/' + id,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        if (data.message) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                            });
                        }
                        loadDataTable();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });


// ========================================



// ====================LOAD-DATATABLE====================

$(document).ready(function () {
    $('#contact_inquiry_table').DataTable({
        "draw": 2,
        "paging": true,
        "ordering": true,
        "searching": true,
        "lengthChange": true,
        "pageLength": 10,
        "order": [[ 0, 'desc' ]],
        "info": true,

        "ajax": {
            "url": '../script/ajax/contact_inquiry.php',
            "type": 'POST',
            "data": function (d) {
                d.draw = d.draw || 1;
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "subject" },
            { "data": "message" },
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
