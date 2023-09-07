$(window).on("load", function() {
    let pageTitle = document.title;
    $(".staff-nav-link").each(function() {
        if ($(this).data("title") === pageTitle) {
            $(this).addClass('active');
        }
    });
})
