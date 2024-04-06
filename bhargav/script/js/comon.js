$(document).on("click", ".contact_submit", function () {
    $(this).prop('disabled', true);
    var formData = $("#contact_form").serialize();
    formData += "&actionType=contactAdd";
    $.ajax({
        url: '../script/ajax/contact.php',
        type: 'POST',
        dataType: 'json',
        data: formData,
        success: function (data) {
            if (data.msgcode = 1) {
                alert(data.message);
                $("#contact_form")[0].reset();
                $(".contact_submit").prop('disabled', false);
                // console.log(data.message);
                // $("#contact_responce").html('<p style="color: #ffffff; font-size: 16px;">Thank You!</p>');
                //     Toast.fire({
                //     icon: "success",
                //     title: "Contact Us successfully"
                // });
                $("#contact_form")[0].reset();
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


$(document).on("click", ".getCategory", function () {
    var categoryId = $(this).data('id');
    $.ajax({
        url: '../script/ajax/portfolio.php',
        type: 'POST',
        dataType: 'json',
        data: { categoryId : categoryId},
        success: function (data) {
            if (data.msgcode = 1) {
                $('.galleryImage').html(data.gallery);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
    return false;
});


document.addEventListener('DOMContentLoaded', function () {
    var filters = document.querySelectorAll('#portfolio-flters li');
    filters.forEach(function (filter) {
        filter.addEventListener('click', function () {
            filters.forEach(function (f) {
                f.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });
});