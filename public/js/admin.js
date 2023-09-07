$(window).on("load", function() {
    let pageTitle = document.title;
    $(".admin-nav-link").each(function() {
        if ($(this).data("title") === pageTitle) {
            $(this).addClass('active');
        }
    });
})
