(function ($) {
    "use strict";

    $("#submitForm").on("submit",function(e){
        e.preventDefault();
        $('#submitButton').text('Saving...');
        $.post({
            url: storeURL,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            error: function(response) {
                console.log(response);
                let htmlContent = prepareMessage(response);
                displayErrorMessage(htmlContent);
                $('#submitButton').text('Save');

            },
            success: function (response) {
                console.log(response);
                displaySuccessMessage(response.success);
                $('#dataListTable').DataTable().ajax.reload();
                $('#submitForm')[0].reset();
                $("#createModal").modal('hide');
                $('#submitButton').text('Save');
            }
        });
    });

})(jQuery);




// let htmlContent = '<div class="alert alert-danger">';
// let htmlContent = '';
// if(response.responseJSON.errorMsg) {
//     htmlContent += '<p class="text-danger">' + response.responseJSON.errorMsg + '</p>';
// }else {
//     let dataValues = Object.values(response.responseJSON.errors);
//     for (let count = 0; count < dataValues.length; count++) {
//         htmlContent += '<p class="text-danger">' + dataValues[count] + '</p>';
//     }
// }
// htmlContent += '</div>';


// $('#displayErrorMessage').fadeIn("slow");
// $('#displayErrorMessage').html(html);
// setTimeout(function() {
//     $('#displayErrorMessage').fadeOut("slow");
// }, 3000);




// $('#generalResult').fadeIn("slow");
// $('#generalResult').addClass('alert alert-success').html(response.success);
// setTimeout(function() {
//     $('#generalResult').fadeOut("slow");
// }, 3000);
