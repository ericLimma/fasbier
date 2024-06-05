$(document).ready(function () {
    $('.cardapio-links a').on('click', function (e) {
        e.preventDefault();

        var targetSection = $(this).attr('href');
        var offset = $(targetSection).offset().top - 110;

        $('html, body').animate({
            scrollTop: offset
        }, 500);
    });

    $('#btnVoltarAoTopo').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });
});