// pagination
(function($){
    $.fn.extend({
        MyPagination: function(options) {
            var defaults = {
                fadeSpeed: 400
            };
            var options = $.extend(defaults, options);

            var objContent = $(this);

            var fullPages = new Array();
            var subPages = new Array();
            var height = 0;
            var lastPage = 1;
            var paginatePages;

            init = function() {
                objContent.children().each(function(i){
                    if (height + this.clientHeight > options.height) {
                        fullPages.push(subPages);
                        subPages = new Array();
                        height = 0;
                    }

                    height += this.clientHeight;
                    subPages.push(this);
                });

                if (height > 0) {
                    fullPages.push(subPages);
                }

                $(fullPages).wrap("<div class='page'></div>");

                objContent.children().hide();

                paginatePages = objContent.children();

                showPage(lastPage);

                showPagination($(paginatePages).length);
            };

            updateCounter = function(i) {
                $('#page_number').html(i);
            };

            showPage = function(page) {
                i = page - 1;
                if (paginatePages[i]) {

                    $(paginatePages[lastPage]).fadeOut(options.fadeSpeed);
                    lastPage = i;
                    $(paginatePages[lastPage]).fadeIn(options.fadeSpeed);

                    updateCounter(page);
                }
            };

            showPagination = function(numPages) {
                var pagins = '';
                for (var i = 1; i <= numPages; i++) {
                    pagins += '<li><a href="#" onclick="showPage(' + i + '); return false;">' + i + '</a></li>';
                }
                $('.pagination li:first-child').after(pagins);
            };

            init();

            $('.pagination #prev').click(function() {
                showPage(lastPage);
            });
            // и "Следующая страница"
            $('.pagination #next').click(function() {
                showPage(lastPage+2);
            });

        }
    });
})(jQuery);


jQuery(window).load(function() {
    $('#content').MyPagination({height: 500, fadeSpeed: 400});
});


// adaptive menu
    $(document).ready(function(){
        $('.open-menu').click(function(){
            $('.full_menu').slideDown();
        });
        $('.close_menu').click(function(){
            $('.full_menu').hide();
        });
    });


// Active menu
    $('document').ready(function() {
        $('.main-menu li a').each(function() {
            if ('http://848633.forcecrm.web.hosting-test.net/'+$(this).attr('href') == window.location.href)
            {
                $(this).addClass('active');
            }
        });
    });


// Change photo in product-item
$('#large img').attr('src', $('#mini img:first').attr('data-large'));
$('#mini img:first').addClass('active');

$('#mini img').click(function() {
    var $large = $(this).attr('data-large');
    $('#mini img').removeClass('active');
    $('#large').hide();
    $('#large img').attr('src', $large);
    $('#large').fadeIn();
    $(this).addClass('active');
});

//popup
$(document).ready(function() {
    $('#popup').click( function(event){
        event.preventDefault();
        $('#overlay').fadeIn(400,
            function(){
                $('#modal_form')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 200);
            });
    });

    $('#modal_close, #overlay').click( function(){
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,
                function(){
                    $(this).css('display', 'none');
                    $('#overlay').fadeOut(400);
                }
            );
    });
});


// submit
function SendMessage () {
    var pes = document.getElementById('good');
    pes.innerHTML = '<img width="20px" src="images/ok.svg">' + 'Вы подписались';
};

function SendCall () {
    var call = document.getElementById('ph');
    call.innerHTML = '<img width="20px" src="images/ok.svg">' + 'Спасибо за запрос';
};

// Slider
jQuery(document).ready(function($) {
    $('.fadeOut.owl-carousel.owl-theme').owlCarousel({
        items: 1,
        animateOut: 'fadeOut',
        dots: false,
        loop: true,
        speed:1000,
        autoplay: 2000,
        autoplayTimeout: 3000,
        margin: 10
    });
});

