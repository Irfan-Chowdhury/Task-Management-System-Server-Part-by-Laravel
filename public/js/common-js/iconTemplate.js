(function ($) {
    "use strict";

    $("ul#cms").siblings('a').attr('aria-expanded','true');
    $("ul#cms").addClass("show");
    $("ul#cms #cms-social-menu").addClass("active");

    // Icon Script
    var icon_list = $('#icons section').clone();
    $(document).on("click", ".icon", function() {
        $(this).parent().parent().find(".card-body").html(icon_list);
    });
    $(document).on("click", ".fa-hover a", function() {
        var icon = $(this).data('font-icon');
        $(this).closest('.collapse').parent().find(".icon").val('fa fa-'+icon);
        $(this).closest('.collapse').removeClass('show');
    });

})(jQuery);
