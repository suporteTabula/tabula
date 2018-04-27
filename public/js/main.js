$(".icon-open").click(function () {
    $(this).hide();
    $(".icon-closed").show()
    $(".offscreen-menu").animate({
        top: "50px"
    });
});
$(".icon-closed").click(function () {
    $(this).hide();
    $(".icon-open").show()
    $(".offscreen-menu").animate({
        top: "-80vh"
    });
});
$(document).ready(function () {
    $('.slider').bxSlider({
        mode: "horizontal",
        preloadImages: "all",
        responsive: true,
        maxSlides: 4,
        minSlides: 1,
        moveSlides: 1,
    });
});

$(document).ready(function() {
    $(".macro-indv").mouseenter(function(){
        $(this).find('p').hide();
        $(this).find('#macroicon').delay(200).show();
    });
    $(".macro-indv").mouseleave(function(){
        $(this).find('#macroicon').hide();
        $(this).find('p').delay(100).show(0);
    })
});

$(document).ready(function() {
    $(".macro-indv-pc").mouseenter(function(){
        $(this).find('p').hide();
        $(this).find('#macroicon').delay(200).show();
    });
    $(".macro-indv-pc").mouseleave(function(){
        $(this).find('#macroicon').hide();
        $(this).find('p').delay(100).show();
    })
});

$(document).ready(function() {
    $("#open-class").click(function() {
        $(".offscreen-course-content").css({"left": "0vw", "transition": "200ms", "width": "30vw"});
        $(this).hide()
        $("#close-class").show();
        if($(window).width()< 500) {
            $(".offscreen-course-content").css({"left": "0vw", "transition": "200ms", "width": "80vw"});
        }
        else if ($(window).width() > 501 && $(window).width() < 750) {
            $(".offscreen-course-content").css({"left": "0vw", "transition": "200ms", "width": "50vw"});
        } 
        else if ($(window).width() > 750){
            $(".offscreen-course-content").css({"left": "0vw", "transition": "200ms", "width": "30vw"});
        }
    });
    $("#close-class").click(function() {
        $(".offscreen-course-content").css({"left": "-100vw", "transition": "200ms"});
        $(this).hide();
        $("#open-class").show();
    })
});