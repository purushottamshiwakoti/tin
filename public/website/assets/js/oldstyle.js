$("#reviewForm").validate({});

$('.afterSearch').keypress(function (event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        $('.filter-bar.mobile-view').toggleClass('show')
        $('.filter-wrapper').slideToggle();
        $(this).val('');
    }
});

$(document).on('click','#filterToggler',function () {
    $('.filter-bar.mobile-view').toggleClass('show')
    $('.filter-wrapper').show();
    $('.filter-wrapper').removeClass("hide");
});

$(document).on('click','#flexCheckChecked',function () {
    $('.filter-bar.mobile-view').addClass('show');
    $('.filter-wrapper').toggleClass("hide");
});

$(document).ready(function () {
    $('.paragraphButton').click(function (e) {
        e.preventDefault();
        $(this).closest('.about-travel-card-wrapper').addClass('travelContent');
    });

    $('.closeTravelContent').click(function (e) {
        e.preventDefault();
        if ($(this).closest(".about-travel-card-wrapper").hasClass('travelContent')) {
            $(this).closest(".about-travel-card-wrapper").removeClass('travelContent');;
        } else if (!$(this).closest(".about-travel-card-wrapper").hasClass('travelContent')) {
            $(this).closest(".about-travel-card-wrapper").removeClass('travelContent');
        }
    });

    $('#stars li').on('mouseover', function () {
        var onStar = parseInt($(this).data('value'), 10);
        $(this).parent().children('li.star').each(function (e) {
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function () {
        $(this).parent().children('li.star').each(function (e) {
            $(this).removeClass('hover');
        });
    });
    $('#stars li').on('click', function () {
        var onStar = parseInt($(this).data('value'), 10);
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

    });
});

const navLi = document.querySelectorAll('.sidebar ul li a')
const sections = document.querySelectorAll('.detail-wrapper .content-wrapper')

window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
        let sectionTop = section.offsetTop;
        if (scrollY >= sectionTop) {
            current = section.getAttribute('id');
        }
    });
    navLi.forEach(a => {
        a.classList.remove('active');
        document.querySelector('.sidebar ul li a[href*= ' + current + ']').classList.add('active')
    })
});


$(document).mouseup(function (e) {
    var container = $(".dashboardDrop");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.css('display', 'none');
    }
});

//initialize tooltip
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

// returntotop
$(window).scroll(function () {
    if ($(this).scrollTop() >= 200) { $('#return-to-top').show(200); }
    else { $('#return-to-top').hide(200); }
});
$('#return-to-top').click(function () {
    $('body,html').animate({ scrollTop: 0 }, 000);
});

// sticking the navbar
$(function () {
    var header = $("#header");
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 20) {
            header.addClass("fixed-top");
        } else {
            header.removeClass("fixed-top");
        }
    });
});
//responsive navbar
$('#custom-navbar-toggler').click(function () {
    $('header .menu').addClass('show')
})
$('#menuClose').click(function () {
    $('header .menu').removeClass('show')
})
$('.menu-toggler .search').on('click', function () {
    $(this).find('form').slideToggle(200);
})
$("#home-search").click(function () {
    $('header .menu').addClass('search-on')
    $('header .menu .search').addClass('extended')
    $('.search input').focus()
})
$("#search-close").click(function () {
    $('header .menu .search').removeClass('extended')
    $('header .menu').removeClass('search-on');
})
//expandable text
$('.see-more-btn').click(function () {
    $('.expandable-text').toggleClass("expanded")
    if ($('.expandable-text').hasClass("expanded")) {
        $('.see-more-btn').text('Show less')
    } else {
        $('.see-more-btn').text('See more')
    }
    $('html, body').animate({
        scrollTop: $(".expandable-text").offset().top - 200
    }, 0000);
})

//carousels
$('.welcome-banner-carousel').owlCarousel({
    items: 1,
    animateOut: 'fadeOut'
})
$('.discover-nepal-carousel').owlCarousel({
    items: 4,
    margin: 24,
    nav: true,
    dots: false,
    navText: ['<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_236_1666)"><path d="M15 18L9 12" stroke="#C5C2C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 6L9 12" stroke="#C5C2C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_236_1666"><rect width="24" height="24" fill="white" transform="translate(24) rotate(90)"/></clipPath></defs></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_236_1666)"><path d="M9 18L15 12" stroke="#C5C2C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 6L15 12" stroke="#C5C2C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_236_1666"><rect width="24" height="24" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 0)"/></clipPath></defs></svg>         ']
    , responsive: {
        0: {
            items: 1,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: false
        },
        600: {
            items: 2,
        },
        1000: {
            items: 4,
        }
    }
})
$('.teams-carousel').owlCarousel({
    items: 4,
    margin: 24,
    nav: true,
    dots: false,
    navText: ['<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_236_1666)"><path d="M15 18L9 12" stroke="#C5C2C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 6L9 12" stroke="#C5C2C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_236_1666"><rect width="24" height="24" fill="white" transform="translate(24) rotate(90)"/></clipPath></defs></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_236_1666)"><path d="M9 18L15 12" stroke="#C5C2C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 6L15 12" stroke="#C5C2C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_236_1666"><rect width="24" height="24" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 0)"/></clipPath></defs></svg>         ']

    , responsive: {
        0: {
            items: 1,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: false
        },
        600: {
            items: 2,
        },
        1000: {
            items: 5,
        }
    }
})

$('.insta-picture').owlCarousel({
    items: 6,
    margin: 0,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: false
        },
        600: {
            items: 2,
        },
        1000: {
            items: 5,
        }
    }
})

$(".tags-wrapper .item .close").click(function () {
    $(this).parent().hide();
})
$('#logged-in-user').click(function () {
    $('#logged-in-submenu').slideToggle();
})
$('#burger-menu').click(function () {
    $('#nav-items').addClass("show");
})
$('#close-menu').click(function () {
    $('#nav-items').removeClass("show");
})
$('#dashboard-menu').click(function () {
    $('.dashboard-sidebar-wrapper').toggleClass("show");
})

//package-detail
$(window).scroll(function () {
    if ($(window).scrollTop() >= 1150) {
        $('.detail-navbar').addClass('fixed');
    }
    else if ($(window).scrollTop() < 100) {
        $('.detail-navbar').removeClass('fixed');
    }
})

//PACKAGE DETAIL NAV COLOR ON ACTIVE
$(window).scroll(function () {
    var scrollDistance = $(window).scrollTop() + 201;
    // Assign active class to nav links while scolling
    $(".detail-content .nav-content").each(function (i) {
        if ($(this).position().top <= scrollDistance) {
            $('.detail-navbar li').removeClass('active');
            $('.detail-navbar li').eq(i).addClass('active');
        }
    });
}).scroll();
$(".view-all-accordion").click(function () {
    $(this).hide();
    let parent = $(this).parent();
    let accordion = parent.siblings();
    accordion.find('.collapse').addClass("show")
    accordion.find('.accordion-button').removeClass("collapsed")
})
$('.nav-items-custom a').click(function () {
    $(this).siblings('.submenu-wrapper,.submenuTwo').toggleClass("showSubmenu");
})
$('#home-search-icon').click(function () {
    $('#home-search').slideToggle();
})

$('.close-toaster').click(function () {
    $('.toaster-wrapper').hide()
})

$('#close-toaster-error').click(function () {
    $('.toaster-wrapper-error').hide()
})

//error for traveller booknow
let error = document.querySelector('.travellerField');

function travellerInform() {
    var result = null;
    if (error.value == "") {
        $('.travellerField').addClass('errorField');
        $('.bookError').html("Required");
        $('html, body').animate({
            scrollTop: $("#purchase-box").offset().top - 130
        }, 0000);
    } else {
        return true;
    }
}


// trip planner step fieldset
var current_fs, next_fs, previous_fs;

$(".purchase-box .next").click(function (event) {
    event.preventDefault();
    var func = travellerInform();
    if (func == true) {
        current_fs = $(this).closest('fieldset');
        next_fs = $(this).closest('fieldset').next();

        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active").prev().addClass('complete');

        next_fs.show();
        current_fs.hide();
        return false;
    }
})

$(".purchase-box .previous").click(function (event) {
    event.preventDefault();
    current_fs = $(this).closest('fieldset');
    previous_fs = $(this).closest('fieldset').prev();

    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active").prev().removeClass('complete');

    previous_fs.show();
    current_fs.hide();
    $('html, body').animate({
        scrollTop: $("#purchase-box").offset().top - 130
    }, 0000);
})

//for welcome banner
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.slider-nav',
    prevArrow: $('.prev'),
    nextArrow: $('.next')
});
$('.slider-nav').slick({
    slidesToShow: 15,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    focusOnSelect: true
});

jQuery(function () {
    jQuery("#bgndVideo").YTPlayer({
        videoURL: 'https://www.youtube.com/watch?v=bi57yQzF_5g',
        containment: "self",
        autoPlay: true,
        showControls: false,
        mute: true,
        startAt: 0,
        opacity: 1,
        loop: true,
        showYTLogo: false,
        abundance: 0,
        addRaster: false,
        realfullscreen: true,
        showAnnotations: false,
        abundance: 0.2
    });
});
$('.play-btn').hide()
$('.pause-btn').click(function () {
    $('#bgndVideo').YTPPause();
    $('.pause-btn').hide();
    $('.play-btn').show();
})
$('.play-btn').click(function () {
    $('#bgndVideo').YTPPlay();
    $('.pause-btn').show();
    $('.play-btn').hide();
})
$(document).ready(function () {
    $('.js-example-basic-single').select2();
});

$(".date-picker").flatpickr({static: true});



// search
// var priceRangeSlider = document.getElementById('slider-range');
// var dayRangeSlider = document.getElementById('slider-duration');

// $('#resetSearchFilter').click(function (e) {
//     e.preventDefault();
//     $('#activity').select2("val", "Activity");
//     $('#destination').select2("val", "Activity");
//     $('#styles').select2("val", "Activity");
//     priceRangeSlider.noUiSlider.reset();
//     dayRangeSlider.noUiSlider.reset();
// })

// range slider
// $('.noUi-handle').on('click', function () {
//     $(this).width(50);
// });
// var moneyFormat = wNumb({
//     decimals: 0,
//     thousand: ',',
//     prefix: 'Rs '
// });
// noUiSlider.create(priceRangeSlider, {
//     start: [0, 50000],
//     step: 1,
//     range: {
//         'min': [1000],
//         'max': [100000]
//     },
//     format: moneyFormat,
//     connect: true
// });

// Set visual min and max values and also update value hidden form inputs
// priceRangeSlider.noUiSlider.on('update', function (values, handle) {
//     document.getElementById('slider-range-value1').innerHTML = values[0];
//     document.getElementById('slider-range-value2').innerHTML = values[1];
//     document.getElementsByName('min-value').value = moneyFormat.from(
//         values[0]);
//     document.getElementsByName('max-value').value = moneyFormat.from(
//         values[1]);
// });

//Initialize Duration slider:
// $('.noUi-handle').on('click', function () {
//     $(this).width(50);
// });
// var dayFormat = wNumb({
//     decimals: 0,
//     thousand: ',',
//     prefix: 'Days '
// });
// noUiSlider.create(dayRangeSlider, {
//     start: [0, 7],
//     step: 1,
//     range: {
//         'min': [1],
//         'max': [30]
//     },
//     format: dayFormat,
//     connect: true
// });

// Set visual min and max values and also update value hidden form inputs
// dayRangeSlider.noUiSlider.on('update', function (values, handle) {
//     document.getElementById('slider-duration-value1').innerHTML = values[0];
//     document.getElementById('slider-duration-value2').innerHTML = values[1];
//     document.getElementsByName('min-value-duration').value = dayFormat.from(
//         values[0]);
//     document.getElementsByName('max-value-duration').value = dayFormat.from(
//         values[1]);
// });

// addLoadEvent(function () {

//     if($("#slider-range").length < 1)
//     {
//         return false;
//     }
//     $("#slider-range").slider({
//         range: true,
//         min: 0,
//         max: 90,
//         values: [0, 90],
//         slide: function (event, ui) {
//             $("#days-left").val(ui.values[0] + " Days");
//             $("#days-right").val(ui.values[1] + " Days");
//             $(document).trigger(jQuery.Event("filterChanged",{"evalues":ui.values,'ftype':'duration'}));
//         }
//     });
//     $("#days-left").val($("#slider-range").slider("values", 0) + " Days");
//     $("#days-right").val($("#slider-range").slider("values", 1) + " Days");

//     $("#slider-range2").slider({
//         range: true,
//         min: 1,
//         max: 5000,
//         values: [0, 5000],
//         slide: function (event, ui) {

//             $("#amount-left").val(ui.values[0] + "$");
//             $("#amount-right").val(ui.values[1] + "$");
//             $(document).trigger(jQuery.Event("filterChanged",{"evalues":ui.values,'ftype':'price'}));
//         }
//     });
//     $("#amount-left").val($("#slider-range2").slider("values", 0) + "$");

//     // $("#amount-left").simulate("change");
//     $("#amount-right").val($("#slider-range2").slider("values", 1) + "$");
// });

// profile-upload
$('.change-profile-btn').on('click', function () {
    $('.profile-upload-file').trigger('click');
});

$('.profile-upload-file').on('change', function () {
    var fileName = $(this)[0].files[0].name;
});

$('#add-other-person').click(function (e) {
    e.preventDefault();
    $('.person-info-box').first().clone()
        .appendTo(".next-book-form").find('form').trigger('reset');
})
$(".removePersonInfoBox").click(function () {
    $(this).parent().parent().parent().remove();
})

//jsValidation
$(document).on("submit", "form", function (e) {
})

$(".jsValidation").validate({
    submitHandler: function (form) {
        form.submit();
    }
});

$(document).ready(function () {
    $("#reviewValidate").validate({
        rules: {
            "checkbox[],subscribe[],read_notes[]": {
                required: true,
                minlength: 1
            },
            radio: "required",
        },

        // FIX
        // Using highlight and unhighlight options we can add the error class to the parent ul which can then be selected and styled
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
            // Keeps the default behaviour, adding error class to element but seems to break the default radio group behaviour but the below fixes that
            $(element).closest('ul').addClass(errorClass);
            // add error class to ul element for checkbox groups and radio inputs
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
            // keeps the default behaviour removing error class from elements
            $(element).closest('ul').removeClass(errorClass);
            // remove error class from ul element for checkbox groups and radio inputs
        },
        // FIX END

        errorLabelContainer: ".js-errors",
        errorElement: "li",

        messages: {
            "checkbox[],subscribe[],read_notes[]": "Please select at least one checkbox",
            radio: "Please choose from the Radio Group",
        },
    });
});

$('.booking-show-more').click(function () {
    $more = $(this).parent().siblings('.more');
    $more.slideToggle();
    $more.toggleClass('show');
    if ($more.hasClass('show')) {
        $(this).text("Show less");
    }
    else {
        $(this).text("Show More");
    }
});
$('.cancel-booking-btn').click(function () {
    $(this).parent().siblings('.cancel-booking').slideToggle()
});
(jQuery);

