;(function ($) {
    $(document).ready(function () {
        $(".uniqueclass .notice-dismiss").on("click", function () {

            $.post(wpan101.ajaxurl, {
                action: "dismissnotice",
                dismiss: 1,
                nonce: wpan101.nonce
            }, function (data) {
            });
        });

    });
})(jQuery);