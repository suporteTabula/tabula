$(".icon-open").click(function () {
    $(this).hide();
    $(".icon-closed").show()
    $(".offscreen-menu").animate({

        top: "0px",
        left: "-8px"

    });
});
$(".icon-closed").click(function () {
    $(this).hide();
    $(".icon-open").show()
    $(".offscreen-menu").animate({
        top: "-80vh",
        left: "-10px"
    });
});
$(document).ready(function () {
    // $('.slider').bxSlider({
    //     mode: "horizontal",
    //     preloadImages: "all",
    //     maxSlides: 4,
    //     moveSlides: 4,
    // });
    //capture the switcher trigger and assign a function to it.
				 //capturar o gatilho do switcher e atribuir uma função a ele.

                $(document).on("click", 'a.switcher', function(e) { 


                 var theid = $(this).attr("id");
                 var theproducts = $("ul#courses");
                 var classNames = $(this).attr('class').split(' ');

                 if($(this).hasClass("active")) {
						// if currently clicked button has the active class
						// then we do nothing!
						return false;
					} else {
						// otherwise we are clicking on the inactive button
						// and in the process of switching views!

						if(theid == "gridview") {
							$(this).addClass("active");
							$("#listview").removeClass("active");							
							$("#listview").children("img").attr("src","/images/list-view.png");
							//Restore the card layout to these divs
							$.each( $('ul#courses'), function(i, left) {

                              $('#course-card', left).each(function() {
                                 $(this).addClass("course-card");
                                 $(this).removeClass("course-card-list");
                             });
                              $('#course-card-desc', left).each(function() {
                                 $(this).addClass("course-card__description");
                                 $(this).removeClass("course-card-desc-list");
                             });
                              $('#course-card-price', left).each(function() {
                                 $(this).addClass("course-card__price");
                                 $(this).removeClass("course-card-price-list");
                             });
                          });

							var theimg = $(this).children("img");
							theimg.attr("src","/images/grid-view-active.png");

							// remove the list class and change to grid
							theproducts.removeClass("list");
							theproducts.addClass("grid");
						}					
						else if(theid == "listview") {
							$(this).addClass("active");							
							$("#gridview").removeClass("active");								
							$("#gridview").children("img").attr("src","/images/grid-view.png");

							//Remove the card layout to these divs
							$.each( $('ul#courses'), function(i, left) {
                              $('#course-card', left).each(function() {
                                 $(this).removeClass("course-card");
                                 $(this).addClass("course-card-list");
                             });
                              $('#course-card-desc', left).each(function() {
                                 $(this).removeClass("course-card__description");
                                 $(this).addClass("course-card-desc-list");
                             });
                              $('#course-card-price', left).each(function() {
                                 $(this).removeClass("course-card__price");
                                 $(this).addClass("course-card-price-list");
                             });
                          })		
							var theimg = $(this).children("img");
							theimg.attr("src","/images/list-view-active.png");

							// remove the grid view and change to list
							theproducts.removeClass("grid")
							theproducts.addClass("list");	
						}
					}
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
        $("#panel-4").delay(200).slideDown(500);

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

$(document).ready(function(){
    $("#create").click(function(){
        $("#hide").slideDown();
    });
    /*$("#course-teacher").click(function(){
        dateAjax();
    });*/

});

//Funcão ajax para enviar requisição
/*function dateAjax(){
    $.ajax({
        url: '{{url(('/userPanel/course/store'))}}',
        type: 'POST',
        data: {
            name: name,
            desc: desc,
            category_id: category_id,
            price: price,
            thumb_img: thumb_img,
            featured: featured,
        },
        beforeSend: function() {
            console.log('teste');
        },
        success: function(){
            console.log('deu certo');
            /*var result = $.parseJSON(data);
            $('#cliques_rede').html(result.cliques_rede);
            $('#cliques_foto_insta').html(result.cliques_foto_insta);
            $('#cliques_link').html(result.cliques_link);
            $('#total_cabecalho').html(result.total_cabecalho);

            $('#data_inicial').html(result.data_inicial);
            $('#data_final').html(result.data_final);


            console.log(result.link);                    
        }
    });
}
*/
/*
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
*/