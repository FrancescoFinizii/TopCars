$(window).on("load", function() {
    let pageTitle = document.title;
    $(".client-navbar-link").each(function() {
        if ($(this).data("title") === pageTitle) {
            $(this).addClass('active');
        }
    });
})
