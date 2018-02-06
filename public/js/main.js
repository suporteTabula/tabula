$('.loupe-icon').click(function () {
    $('.search-mob').slideToggle('fast');
    $('.menu-links-mobile').hide()
});
$('.menu-icon').click(function () {
    $('.menu-links-mobile').slideToggle('fast');
    $('.search-mob').hide();
});
$('.hexagon').mouseenter(function () {
    $(this).find('p').stop(true, true).delay(50).fadeOut(100);
    $(this).find('.macro-icon').stop(true, true).delay(100).fadeIn(150);
});
$('.hexagon').mouseleave(function () {
    $(this).find('.macro-icon').stop(true, true).delay(50).fadeOut(100);
    $(this).find('p').stop(true, true).delay(100).fadeIn(150);
});

$('.carousel1, .carousel2, .carousel3').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        infinite: true,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        infinite: true,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});