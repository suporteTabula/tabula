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
        maxSlides: 4,
        moveSlides: 4,
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

$(document).ready(function () {
    $(".sections-buttons a button").click(function () {
        $(this).addClass("button-selected");
        $("button").not(this).removeClass("button-selected");
        console.log("oi")
    });
});

$(document).ready(function () {
    $("#data").click(function () {
        $("#panel-2, #panel-3, #panel-4, #panel-5, #panel-6").slideUp(500);
        $("#panel-1").delay(200).slideDown(500)
    });
    $("#courses").click(function () {
        $("#panel-1, #panel-3, #panel-4, #panel-5, #panel-6").slideUp(500);
        $("#panel-2").delay(200).slideDown(500)
    });
    $("#taught").click(function () {
        $("#panel-1, #panel-2, #panel-4, #panel-5, #panel-6").slideUp(500);
        $("#panel-3").delay(200).slideDown(500)
    });
    $("#create").click(function () {
        $("#panel-1, #panel-2, #panel-3, #panel-5, #panel-6").slideUp(500);
        $("#panel-4").delay(200).slideDown(500)
    });
    $("#payment").click(function () {
        $("#panel-1, #panel-2, #panel-3, #panel-4, #panel-6").slideUp(500);
        $("#panel-5").delay(200).slideDown(500)
    });
    $("#teacher").click(function () {
        $("#panel-1, #panel-2, #panel-3, #panel-4, #panel-5").slideUp(500);
        $("#panel-6").delay(200).slideDown(500)
    });
});

var card = new Card({
    // a selector or DOM element for the form where users will
    // be entering their information
    form: 'form', // *required*
    // a selector or DOM element for the container
    // where you want the card to appear
    container: '.card-wrapper', // *required*

    formSelectors: {
        numberInput: 'input#number', // optional — default input[name="number"]
        expiryInput: 'input#expiry', // optional — default input[name="expiry"]
        cvcInput: 'input#cvc', // optional — default input[name="cvc"]
        nameInput: 'input#name' // optional - defaults input[name="name"]
    },

    width: 200, // optional — default 350px
    formatting: true, // optional - default true

    // Strings for translation - optional
    messages: {
        validDate: 'valid\ndate', // optional - default 'valid\nthru'
        monthYear: 'mm/yyyy', // optional - default 'month/year'
    },

    // Default placeholders for rendered fields - optional
    placeholders: {
        number: '•••• •••• •••• ••••',
        name: 'Full Name',
        expiry: '••/••',
        cvc: '•••'
    },

    masks: {
        cardNumber: '•' // optional - mask card number
    },

    // if true, will log helpful messages for setting up Card
    debug: false // optional - default false
});


$(document).ready(function() {
    if($("input.macro-main__checkbox").is(':checked')){
        $(".macro-sub__item").show();
        alert("checou")
    } else {
        $(".macro-sub__item").hide();
    }

});

$('.main-carousel').flickity({
    // options
    cellAlign: 'center',
    contain: true

});