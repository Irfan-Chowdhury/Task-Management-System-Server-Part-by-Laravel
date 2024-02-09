(function ($) {
    "use strict";

    $(document).on("click", ".delete", function (e) {
        e.preventDefault();
        let modelId = $(this).data("id");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.get({
                    url: destroyURL + modelId,
                    error: function (response) {
                        console.log(response);
                        let htmlContent = prepareMessage(response);
                        displayErrorMessage(htmlContent);
                    },
                    success: function (response) {
                        console.log(response);
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        );
                        $('#dataListTable').DataTable().ajax.reload();
                    }
                });
            }
        })
    });

})(jQuery);
