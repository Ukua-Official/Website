$(window).scroll(() => {
    if ($(window).scrollTop() > 200) $('.scrollToTopButton').addClass("show")
    else $('.scrollToTopButton').removeClass("show")
});

$('.scrollToTopButton').click(() => {
    $('html, body').animate({
        scrollTop: 0
    }, 700);
    return false;
});