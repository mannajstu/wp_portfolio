jQuery(document).ready(function($) {
    $("span.menu").click(function() {
        $("ul.nav1").slideToggle(300, function() {
            // Animation complete.
        });
    });
});