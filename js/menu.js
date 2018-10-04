jQuery(document).ready(function($) {
    $("span.menu").click(function() {
        $("ul.nav1").slideToggle(300, function() {
            // Animation complete.
        });
    });

    $(window).resize(function() {

        
        if ($(window).width() > 640) {
            $('#navp').css({
                'display': 'block',
            });


        }
        else{
        	$('#navp').css({
                'display': 'none',
            });
        }

    });
});