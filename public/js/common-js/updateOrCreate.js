(function ($) {
    "use strict";
    $(document).ready(function() {
        let updateOrCreate = (submitButtonName, updateOrCreateURL, formData) => {
            $(`#${submitButtonName}`).text('Submitting...');
            $.post({
                url: updateOrCreateURL,
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                error: function(response) {
                    console.log(response);
                    let htmlContent = prepareMessage(response);
                    displayErrorMessage(htmlContent);
                    $(`#${submitButtonName}`).text('Submit');
                },
                success: function(response) {
                    console.log(response);
                    displaySuccessMessage(response.success);
                    $(`#${submitButtonName}`).text('Submit');
                }
            });
        }
    });

})(jQuery);
