(function ($) {
    "use strict";

    $(document).ready(function() {
        $("#updateForm").on("submit",function(e){
            e.preventDefault();
            let modelId = $('#modelId').val();
            $('#updateButton').text('Updating...');
            $.post({
                url: updateURL + modelId,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                error: function(response) {
                    console.log(response);
                    let htmlContent = prepareMessage(response);
                    displayErrorMessage(htmlContent);
                    $('#updateButton').text('Update');
                },
                success: function (response) {
                    console.log(response);
                    displaySuccessMessage(response.success);
                    if ($.fn.DataTable.isDataTable('#dataListTable')) {
                        $('#dataListTable').DataTable().ajax.reload();
                        $('#updateForm')[0].reset();
                        $("#editModal").modal('hide');
                    }
                    $('#updateButton').text('Update');
                }
            });
        });
    });
})(jQuery);
