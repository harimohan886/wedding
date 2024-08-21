(function ($) {
    "use strict";

    /* ..............................................
    Loader
    ................................................. */

    $(window).on('load', function () {
        $('.preloader').fadeOut();
        $('#preloader').delay(550).fadeOut('slow');
        $('body').delay(450).css({ 'overflow': 'visible' });
    });

    /* ..............................................
    Navbar Bar
    ................................................. */

    $('.navbar-nav .nav-link').on('click', function () {
        var toggle = $('.navbar-toggler').is(':visible');
        if (toggle) {
            $('.navbar-collapse').collapse('hide');
        }
    });

    /* ..............................................
    Fixed Menu
    ................................................. */

    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 50) {
            $('.top-header').addClass('fixed-menu');
        } else {
            $('.top-header').removeClass('fixed-menu');
        }
    });

    /* ..............................................
    ResponsiveSlides
    ................................................. */


    /* ..............................................
    TimeLine
    ................................................. */
    $('.timeLine').timeLine({
        mainColor: '#890025',
        opacity: '0.85',
        lineColor: '#890025'
    });



    /* ..............................................
    Gallery
    ................................................. */

    $(document).ready(function () {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function (item) {
                    return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                }
            }
        });
    });

    /* ..............................................
    Smooth Scroll
    ................................................. */

    $('a[href*="#"]:not([href="#"])').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 65,
                }, 1000);
                return false;
            }
        }
    });



}(jQuery));


// range
function updateSliderStyle(rangeElement) {
    var value = (rangeElement.value - rangeElement.min) / (rangeElement.max - rangeElement.min) * 100;
    rangeElement.style.background = `linear-gradient(to right, var(--primary) 0%, var(--primary) ${value}%, #fff ${value}%, #fff 100%)`;
}

// function updateSpanValue(rangeId, spanId) {
// 	var rangeElement = document.getElementById(rangeId);
// 	var spanElement = document.getElementById(spanId);
// 	spanElement.textContent = rangeElement.value;
// 	updateSliderStyle(rangeElement);
// }

// // Initialize span values and slider styles on page load
// window.onload = function () {
// 	updateSpanValue('budgetRange', 'budgetValue');
// 	updateSpanValue('guestsRange', 'guestsValue');
// 	updateSpanValue('roomsRange', 'roomsValue');
// };

// document.getElementById("budgetRange").oninput = function () {
// 	updateSpanValue('budgetRange', 'budgetValue');
// };

// document.getElementById("guestsRange").oninput = function () {
// 	updateSpanValue('guestsRange', 'guestsValue');
// };

// document.getElementById("roomsRange").oninput = function () {
// 	updateSpanValue('roomsRange', 'roomsValue');
// };


$(document).ready(function () {
    let currentIndex = 0;
    const figuresToShow = 4;
    const totalFigures = $('.snip1390').length;
    const figureWidth = $('.snip1390').outerWidth(true); // include margin
    let autoSlideInterval;

    function updateSlider() {
        $('.figure-container').css('transform', `translateX(-${currentIndex * figureWidth}px)`);
    }

    function nextSlide() {
        if (currentIndex < totalFigures - figuresToShow) {
            currentIndex++;
        } else {
            currentIndex = 0; // Loop back to the start
        }
        updateSlider();
    }

    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalFigures - figuresToShow; // Loop back to the end
        }
        updateSlider();
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 3000); // Change slide every 3 seconds
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    $('.next').click(function () {
        nextSlide();
        resetAutoSlide();
    });

    $('.prev').click(function () {
        prevSlide();
        resetAutoSlide();
    });

    $(".hover").mouseleave(function () {
        $(this).removeClass("hover");
    });

    // Start automatic sliding
    startAutoSlide();
});
