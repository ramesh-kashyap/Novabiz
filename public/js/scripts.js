/*================
Template Name: Applex - Mobile App Landing Page Template
Description: Mobile App Landing Page Template
Version: 1.0
Author: https://www.templatemonster.com/authors/techeshta
=======================*/


// Table Of Content

//  1. Navbar
//  2. Wow
//  3. Popup Youtube Video
//  4. Testimonials
//  5. Counter Number
//  6. Back to Top
//  7. Header Logo and Bg
//  8. Menu on Click Scroll
//  9. Home Mobile Slider
//  10. Preloader
//  11. Text Animation
//  12. Form Submitting


/*---------------------------------------------------
    1. Navbar
----------------------------------------------------*/
$(document).ready(function() {
    $(window).scroll(function () {
        if ($(".navbar").offset().top > 0) {
            $(".navbar-fixed-top").addClass("navbar-pad-original");
        } else {
            $(".navbar-fixed-top").removeClass("navbar-pad-original");
        }


        var navMain = $(".navbar-collapse");

        navMain.on("click", "a", null, function () {
            navMain.collapse('hide');
        });

    });
});

$(document).ready(function () {
    $(document).on("scroll", onScroll);
});

function onScroll(event){
    var scrollPos = jQuery(document).scrollTop();
    $('.navbar-nav a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.navbar-nav ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}

/* -----------------------------------------------------
    2. Wow js
----------------------------------------------------- */
new WOW().init();



/* -----------------------------------------------------
    3. Popup Youtube Video js
----------------------------------------------------- */
$('.popup-video').magnificPopup({
    type: 'iframe'
});
$.extend(true, $.magnificPopup.defaults, {
    iframe: {
        patterns: {
            youtube: {
                index: 'youtube.com/',
                id: 'v=',
                src: 'https://www.youtube.com/embed/%id%?autoplay=1'
            }
        }
    }
});



/* -----------------------------------------------------
    4. Testimonials js
----------------------------------------------------- */
$(".carousel-main").owlCarousel({
    autoplay: true,
    pagination: false,
    nav: false,
    dots: true,
    items: 3,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        768: {
            items: 1
        },
        992: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});

/* -----------------------------------------------------
    5. Counter Number js
----------------------------------------------------- */
$('.counter-number').counterUp({
    delay: 40,
    time: 2400
});



/* -----------------------------------------------------
    6. Back to Top js
----------------------------------------------------- */
$(document).ready(function() {

    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });

    $("#toTop").click(function() {
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });

    /* -----------------------------------------------------
    7. Header Logo and Bg js
    ----------------------------------------------------- */

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        navbar = $(".navbar"),
            logo = $(".navbar .navbar-brand> img");

        if (scroll >= 100) {
            $(".scroll-me").addClass("menubg");
            logo.attr('src', 'images/logo-dark.png');
        } else {
            $(".scroll-me").removeClass("menubg");
            logo.attr('src', 'images/logo.png');
        }
    });

    /* -----------------------------------------------------
        8. Menu on Click Scroll js
    ----------------------------------------------------- */

    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });

    /* -----------------------------------------------------
        9. Home Mobile Slider js
    ----------------------------------------------------- */

    $('.header-mobile-slider')['owlCarousel']({
        loop: true,
        margin: 30,
        autoplay: true,
        dots: false,
        items: 1
    });
    var u = $(".header-mobile-slider"),
        p = $("#next"),
        m = $("#prev");
    p.on("click", function() {
        u.trigger("next.owl.carousel", [400])
    });
    m.on("click", function() {
        u.trigger("prev.owl.carousel", [400])
    });

    /* -----------------------------------------------------
        10. Preloader js
    ----------------------------------------------------- */

    $(".loading").fadeOut(500);

});

/* -----------------------------------------------------
    11. Text Animation
----------------------------------------------------- */

$(".text-element").each(function () {
    var $this = $(this);
    $this.typed({
        strings: $this.attr('data-elements').split(','),
        typeSpeed: 100,
        backDelay: 3000
    });
});


/* -----------------------------------------------------
    12. Form Submitting
----------------------------------------------------- */

var form = document.getElementById("contact-form");
    
async function handleSubmit(event) {
    event.preventDefault();
    var status = document.getElementById("contact-form-status");
    var data = new FormData(event.target);
    fetch(event.target.action, {
        method: form.method,
        body: data,
        headers: {
            'Accept': 'application/json'
        }
    }).then(response => {
        if (response.ok) {
        status.innerHTML = "Thanks for your submission!";
        form.reset()
        } else {
        response.json().then(data => {
            if (Object.hasOwn(data, 'errors')) {
            status.innerHTML = data["errors"].map(error => error["message"]).join(", ")
            } else {
            status.innerHTML = "Oops! There was a problem submitting your form"
            }
        })
        }
    }).catch(error => {
        status.innerHTML = "Oops! There was a problem submitting your form"
    });
}
form.addEventListener("submit", handleSubmit)
