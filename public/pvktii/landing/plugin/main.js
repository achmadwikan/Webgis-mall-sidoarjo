/*-----------------------------------------------------------------------------------
 Theme Name: WICON
 Author: Viki Team
 Author URI: http://www.vikitheme.com
 Version: 1.0.0
 Description: A Beautiful, Professional and Multipurpose Theme Made by Viki Team
 -----------------------------------------------------------------------------------*/

/* ----------------------------------------------------------------
 [Table of contents]

 - PreLoader
 - AnimationScrollPage
 - CountTo
 - ParallaxBackground
 - Slider
 - MenuMobile
 - InputFile
 - MegaMenu
 - ScrollToTop
 - LightBox
 - CustomTheme
 - MediaPlayer
 - PriceRange
 - CalcQuantity

 ------------------------------------------------------------------*/

'use strict';


//action


$(document).ready(function () {
    PreLoader.init();
    AnimationScrollPage.init();
    CountTo.init();
    CountDown.init();
    ParallaxBackground.init();
    Slider.init();
    InputFile.init();
    ScrollToTop.init();
    LightBox.init();
    CustomTheme.init();
    PriceRange.init();
    CalcQuantity.init();
    Tooltip.init();
});

$(window).resize(function () {
    MasonryItem.responsive();
    CustomTheme.responsive();

});

$(window).on('load', function () {
    MasonryItem.init();
});


// preloader
var PreLoader = function () {
    var _initInstances = function () {
        $('.animsition').animsition({
            // loadingClass: 'loader',
            inDuration: 900,
            outDuration: 500,
            linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([href^="javascript:void(0);"])',
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// animation scroll page
var AnimationScrollPage = function () {
    var _initInstances = function () {
        $('.animation').waypoint(function (direction) {
            $(this).addClass('animation-active');
        }, {
            offset: '100%',
            triggerOnce: true
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// count to
var CountTo = function () {
    var _initInstances = function () {
        var itemCount = $('[data-conter]');
        $(itemCount).waypoint({
            handler: function (direction) {
                $(this.element).countTo({
                    from: 0,
                    speed: 2000,
                    refreshInterval: 50,
                    formatter: function (value, options) {
                        return numeral(value).format('0,0');
                    }
                });
            },
            offset: '100%',
            triggerOnce: true,
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

var CountDown = function () {


    var _initInstances = function () {
        var itemCount = '.vk-countdown-box';
        $(itemCount).countdown({
            date: "June 7, 2020 15:03:26",
            render: function (date) {
                return $(this.el).html(
                    '<ul class="vk-list vk-list-inline vk-list-count-down" >'
                    + '<li class="day">'
                    + '<div class="wrapper">'
                    + '<span class="box">' + date.days + '</span>days'
                    + '</div>'
                    + '</li>'
                    + '<li class="hou">'
                    + '<div class="wrapper">'
                    + '<span class="box">' + (this.leadingZeros(date.hours)) + '</span>hours'
                    + '</div>'
                    + '</li>'
                    + '<li class="min">'
                    + '<div class="wrapper">'
                    + '<span class="box">' + (this.leadingZeros(date.min)) + '</span>mins'
                    + '</div>'
                    + '</li>'
                    + '<li class="sec">'
                    + '<div class="wrapper">'
                    + '<span class="box">' + (this.leadingZeros(date.sec)) + '</span>secs'
                    + '</div>'
                    + '</li>'
                    + '</ul>'
                );
            }
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// parallax background
var ParallaxBackground = function () {
    var _initInstances = function () {
        $('.vk-parallax').attr('data-stellar-background-ratio', '0.1');
        $.stellar({
            verticalOffset: 1,
            horizontalScrolling: false,
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// slider
var Slider = function () {

    var singlePortfolio = function () {
        $('.vk-slider[data-slider-name="single-portfolio"]').slick({
            nextArrow: '<button  class="vk-btn vk-arrow next"><i class="fa fa-arrow-right"></i></button>',
            prevArrow: '<button  class="vk-btn vk-arrow prev"><i class="fa fa-arrow-left"></i></button>',
            adaptiveHeight: true,
            arrows: false,
            dots: true,
            dotsClass: 'vk-dots-nav vk-list vk-list-inline',
            autoplay: true,
            centerMode: true,
            centerPadding: '355px',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        centerPadding: '100px',
                    }

                },
                {
                    breakpoint: 992,
                    settings: {
                        centerPadding: '0px',
                    }

                }]


        });
    }

    var singleProjectSlider = function () {
        $("[data-slider-name = 'project']").slick({
            nextArrow: '<button  class="vk-btn vk-arrow next"><i class="fa fa-arrow-right"></i></button>',
            prevArrow: '<button  class="vk-btn vk-arrow prev"><i class="fa fa-arrow-left"></i></button>',
            adaptiveHeight: true,
            centerMode: true,
            centerPadding: '150px',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        centerPadding: '0px',
                    }

                }]

        });


        $("[data-slider-name = 'home-onepage-project']").slick({
            nextArrow: '<button  class="vk-btn vk-arrow next"><i class="fa fa-arrow-right"></i></button>',
            prevArrow: '<button  class="vk-btn vk-arrow prev"><i class="fa fa-arrow-left"></i></button>',
            adaptiveHeight: true,
            centerMode: true,
            centerPadding: '235px',
            arrows: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        centerPadding: '0px',
                        arrows: true,
                    }

                }]

        });

        $("[data-slider-name = 'left-menu-project']").slick({
            nextArrow: '<button  class="vk-btn vk-arrow next"><i class="fa fa-arrow-right"></i></button>',
            prevArrow: '<button  class="vk-btn vk-arrow prev"><i class="fa fa-arrow-left"></i></button>',
            adaptiveHeight: true,
            centerMode: true,
            centerPadding: '260px',
            arrows: true,
            responsive: [
                {
                    breakpoint: 1500,
                    settings: {
                        centerPadding: '150px',
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        centerPadding: '0px',
                    }

                }]

        });
    };

    var singleProductSlider = function () {
        $('.vk-slider-shop .slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            arrows: false,
            asNavFor: '.slider-nav',
            adaptiveHeight: true,
        });
        $('.vk-slider-shop .slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            focusOnSelect: true,
            arrows: false,
        });
    };

    var homepageSlider = function () {

        $('.vk-slider[data-slider-name="home-slider"]').slick({
            nextArrow: '<button  class="vk-btn vk-arrow next"><i class="fa fa-chevron-right"></i></button>',
            prevArrow: '<button  class="vk-btn vk-arrow prev"><i class="fa fa-chevron-left"></i></button>',
            dots: true,
            arrows: false,
            fade: true,
            autoplay: true,
            dotsClass: 'vk-list vk-list-inline vk-dots-nav',

        });

        $('.vk-slider[data-slider-name="home-slider-shop"]').slick({
            nextArrow: '<button  class="vk-btn vk-arrow next"><i class="ti-angle-right"></i></button>',
            prevArrow: '<button  class="vk-btn vk-arrow prev"><i class="ti-angle-left"></i></button>',
            dots: true,
            dotsClass: 'vk-list vk-list-inline vk-dots-nav',
            autoplay: true,
            fade: true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        arrows: false,
                    }
                }
            ]

        });
    };

    var homeShopSlider = function () {

        $('.vk-slider[data-slider-name="client-slider"]').slick({
            slidesToShow: 6,
            arrows: false,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }

            },
                {
                    breakpoint: 768,
                    settings: 'unslick'

                }]
        });
    };

    var homeOnePageExtra = function () {

        $(".vk-slider[data-slider-name = 'testimonial-slide-for']").slick({
            nextArrow: '<button  class="vk-btn vk-arrow next"><i class="ti-angle-right"></i></button>',
            prevArrow: '<button  class="vk-btn vk-arrow prev"><i class="ti-angle-left"></i></button>',
            adaptiveHeight: true,
            asNavFor: '.slide-nav'
        });

        $("[data-slider-name = 'testimonial-slide-nav']").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slide-for',
            dots: false,
            centerMode: false,
            focusOnSelect: true

        });

        $('[data-slider-name="testimonial"]').slick({
            nextArrow: '<button  class="vk-btn vk-arrow next"><i class="fa fa-arrow-right"></i></button>',
            prevArrow: '<button  class="vk-btn vk-arrow prev"><i class="fa fa-arrow-left"></i></button>',
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }],
        });

        $('[data-slider-name="testimonial-left-menu"]').slick({
            nextArrow: '<button  class="vk-btn vk-arrow next"><i class="fa fa-arrow-right"></i></button>',
            prevArrow: '<button  class="vk-btn vk-arrow prev"><i class="fa fa-arrow-left"></i></button>',
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }],
        });
    }

    var _initInstances = function () {

        homepageSlider();
        singleProjectSlider();
        homeShopSlider();
        singleProductSlider();
        homeOnePageExtra();
        singlePortfolio();
    };

    return {
        init: function () {
            _initInstances();
        },
        responsive: function () {

        }
    };
}();

// masonry item
var MasonryItem = function () {
    var masonry = '[data-layout="masonry"]';
    var masonryItem = '[data-layout="masonry-item"]'
    var masonryFix = '[data-layout="masonry-fix"]';

    var buttonFilterDefault = '[data-filter-button="default"]';
    var buttonFilterFix = '[data-filter-button="filter-fix"]';

    var filterFix = function () {

        var delayFilter = function () {
            $(masonryFix).isotope({
                filter: '.first',
            })
        }

        setTimeout(delayFilter, 100);
        $(buttonFilterFix)

            .on('click', 'li', function () {
                var filterValue = $(this).attr('data-filter');
                console.log(filterValue)
                $(masonryFix).isotope({
                    filter: filterValue,
                });

                return false;
            })
            .on('change', function () {

                // get filter value from option value
                var filterValue = this.value;
                $(masonryFix).isotope({
                    filter: filterValue,

                });

                return false;
            });

    }

    var masonryLayout = function () {
        $(masonry).isotope({
            // options...
            itemSelector: masonryItem,
            masonry: {
                columnWidth: masonryItem,
            }
        });

        //filter items on button click
        $(buttonFilterDefault)
            .on('click', 'li', function () {
                var filterValue = $(this).attr('data-filter');
                console.log(filterValue);
                $(masonry).isotope({
                    filter: filterValue,

                });

                return false;
            })
            .on('change', function () {
                // get filter value from option value
                var filterValue = this.value;
                // console.log(filterValue);
                $(masonry).isotope({
                    filter: filterValue,

                });

                return false;
            });
    };

    var _initInstances = function () {
        masonryLayout();
        filterFix();

    };

    return {
        init: function () {
            _initInstances();
        },

        responsive: function () {

        }
    };
}();

// google maps
var initMap = function () {
    var myLatLng = {lat: 38.5397102, lng: -93.6881803};
    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        scrollwheel: false,
        zoom: 4
    });
    // Create a marker and set its position.
    var marker = new google.maps.Marker({
        map: map,
        position: myLatLng,
        title: 'WICON!'
    });
};

// input file
var InputFile = function () {
    var _initInstances = function () {
        var inputs = document.querySelectorAll('.vk-input-file');
        Array.prototype.forEach.call(inputs, function (input) {
            var label = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener('change', function (e) {
                var fileName = '';
                if (this.files && this.files.length > 1)
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                else
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    label.querySelector('span').innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });

            // Firefox bug fix
            input.addEventListener('focus', function () {
                input.classList.add('has-focus');
            });
            input.addEventListener('blur', function () {
                input.classList.remove('has-focus');
            });
        });
    }
    return {
        init: function () {
            _initInstances();
        }
    };
}();


//scroll up
var ScrollToTop = function () {

    var _initInstances = function () {
        $.scrollUp({
            scrollText: '<i class="fa fa-angle-up"></i>',
            scrollSpeed: 500,
            zIndex: 1,

        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

//lightbox otion
var LightBox = function () {

    var _initInstances = function () {
        lightbox.option({
            disableScrolling: true,
            showImageNumberLabel: false,
            wrapAround: true,
            alwaysShowNavOnTouchDevices: true
        })
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();


// price range
var PriceRange = function () {
    var _initInstances = function () {
        var slider_range = '#slider-range';
        var amount1 = '#amount1';
        var amount2 = '#amount2';
        $(slider_range).slider({
            range: true,
            min: 0,
            max: 1000,
            values: [59, 799],
            slide: function (event, ui) {
                $(amount1).val(ui.values[0]);
                $(amount2).val(ui.values[1]);
            }
        });
        $(amount1).val($(slider_range).slider("values", 0));
        $(amount2).val($(slider_range).slider("values", 1));
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// calculator quantity
var CalcQuantity = function () {
    var _initInstances = function () {
        $(".vk-quantity-calulator button").on("click", function () {
            var $button = $(this);
            var oldValue = $button.parent().siblings().find("input").val();

            if ($button.attr('data-index') == "plus") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }

            $button.parent().siblings().find("input").val(newVal);

            return false;
        });
    };

    return {
        init: function () {
            _initInstances();
        }
    };
}();

// Tooltip
var Tooltip = function () {
    var _initInstances = function () {
        $('[data-toggle="tooltip"]').tooltip();
    }

    return {
        init: function () {
            _initInstances();
        }
    };
}();


// custom theme
var CustomTheme = function () {

    var custom = function () {
        var currentWidth = $(window).outerWidth();

        if ($('.vk-home.dark').length) {
            $('body').addClass('vk-home-dark');
        }

        if ($('.vk-home-dark').length) {
            $('#scrollUp').addClass('inverse');
        }

        if (currentWidth > 991) {
            if ($('.vk-header-left-menu').length) {

                $('body').addClass('vk-left-menu');

                $('#menu .vk-navbar-child').prepend('<li class="back"> <a href="#"><span class="fa fa-angle-double-left"></span></a></li>');
                $('#menu .vk-navbar-child').addClass('vk-navbar-nav');
                $('#menu .vk-navbar-child ').fadeOut();
                $('#menu .vk-navbar-nav:not(.vk-navbar-child)').on('click', 'li', function () {
                    console.log($(this).find('.vk-navbar-child'));
                    $(this).find('.vk-navbar-child').fadeIn();
                    $('#menu').css('transform', 'translateX(-95%)');


                    $('.back').on('click', function () {
                        $('#menu').css('transform', 'translateX(0%)');
                        $(this).parent().fadeOut();
                        return false;
                    });

                });

            }
        }


        if ($('.vk-home.onepage').length) {
            $('body').addClass('vk-one-page');
        }

        if ($('.onepage-service').length) {
            $('body').addClass('vk-one-page vk-onepage-service');
        }

        if ($('.page-service-2').length) {
            $('body').addClass('vk-page-service-2');
        }
        $("#navScroll2Id a").mPageScroll2id();
    }


    var customByDevice = function () {
        $('.vk-one-page .section').css('min-height', $(window).height());
        $('.vk-page-service-2 .vk-content').css('min-height', $(window).height());
    }

    var clickActive = function () {
        var buttonActive = '[data-list-active = "true"]';
        $(buttonActive).find('li:first-child').addClass('active');
        $(buttonActive).on('click', 'li', function (e) {

            $(this).siblings('.active').removeClass('active');

            $(this).addClass('active');

            return false;
        });
    };

    var _initInstances = function () {
        custom();
        clickActive();
    };

    return {
        init: function () {
            _initInstances();
            customByDevice();
        },
        responsive: function () {
            customByDevice();
            _initInstances();
        }
    };
}();


jQuery(document).ready(function ($) {
    "use strict";
    /*Jquery validate form contact*/
    $('#contactform').submit(function () {
        var action = $(this).attr('action');

        $("#message-contact").slideUp(750, function () {
            $('#message-contact').hide();

            $('#submit-contact')
                .after('<i class="icon-spin4 animate-spin loader"></i>')
                .attr('disabled', 'disabled');

            $.post(action, {
                    name_contact: $('#name_contact').val(),
                    email_contact: $('#email_contact').val(),
                    phone_contact: $('#phone_contact').val(),
                    message_contact: $('#message_contact').val(),
                    subject: $('#subject').val(),
                },
                function (data) {
                    document.getElementById('message-contact').innerHTML = data;
                    $('#message-contact').slideDown('slow');
                    $('#contactform .loader').fadeOut('slow', function () {
                        $(this).remove()
                    });
                    $('#submit-contact').removeAttr('disabled');
                    if (data.match('success') != null) $('#contactform').slideUp('slow');

                }
            );

        });
        return false;
    });
    /*form-newsletter*/
    $('form.form-newsletter').submit(function (e) {

        /*return false so form submits through jQuery rather than reloading page.*/
        if (e.preventDefault) e.preventDefault();
        else e.returnValue = false;

        var thisForm = $(this).closest('form.form-newsletter'),
            submitButton = thisForm.find('button[type="submit"]'),
            error = 0,
            originalError = thisForm.attr('original-error'),
            preparedForm, iFrame, userEmail, userFullName, userFirstName, userLastName, successRedirect, formError,
            formSuccess;

        /*Mailchimp/Campaign Monitor Mail List Form Scripts*/
        iFrame = $(thisForm).find('iframe.mail-list-form');

        thisForm.find('.form-error, .form-success').remove();
        submitButton.attr('data-text', submitButton.text());
        thisForm.append('<div class="form-error" style="display: none;">' + thisForm.attr('data-error') + '</div>');
        thisForm.append('<div class="form-success" style="display: none;">' + thisForm.attr('data-success') + '</div>');
        formError = thisForm.find('.form-error');
        formSuccess = thisForm.find('.form-success');
        thisForm.addClass('attempted-submit');

        /*Do this if there is an iframe, and it contains usable Mail Chimp / Campaign Monitor iframe embed code*/
        if ((iFrame.length) && (typeof iFrame.attr('srcdoc') !== "undefined") && (iFrame.attr('srcdoc') !== "")) {

            console.log('Mail list form signup detected.');
            if (typeof originalError !== typeof undefined && originalError !== false) {
                formError.html(originalError);
            }
            userEmail = $(thisForm).find('.signup-email-field').val();
            userFullName = $(thisForm).find('.signup-name-field').val();
            if ($(thisForm).find('input.signup-first-name-field').length) {
                userFirstName = $(thisForm).find('input.signup-first-name-field').val();
            } else {
                userFirstName = $(thisForm).find('.signup-name-field').val();
            }
            userLastName = $(thisForm).find('.signup-last-name-field').val();

            /*validateFields returns 1 on error;*/
            if (validateFields(thisForm) !== 1) {
                preparedForm = prepareSignup(iFrame);

                preparedForm.find('#mce-EMAIL, #fieldEmail').val(userEmail);
                preparedForm.find('#mce-LNAME, #fieldLastName').val(userLastName);
                preparedForm.find('#mce-FNAME, #fieldFirstName').val(userFirstName);
                preparedForm.find('#mce-NAME, #fieldName').val(userFullName);
                thisForm.removeClass('attempted-submit');

                /*Hide the error if one was shown*/
                formError.fadeOut(200);
                /*Create a new loading spinner in the submit button.*/
                try {
                    $.ajax({
                        url: preparedForm.attr('action'),
                        crossDomain: true,
                        data: preparedForm.serialize(),
                        method: "GET",
                        cache: false,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        success: function (data) {
                            /*Request was a success, what was the response?*/
                            if (data.result != "success" && data.Status != 200) {

                                /*Error from Mail Chimp or Campaign Monitor*/

                                /*Keep the current error text in a data attribute on the form*/
                                formError.attr('original-error', formError.text());
                                /*Show the error with the returned error text.*/
                                formError.html(data.msg).fadeIn(1000);
                                formSuccess.fadeOut(1000);
                            } else {

                                /*Got Success from Mail Chimp*/

                                successRedirect = thisForm.attr('success-redirect');
                                /*For some browsers, if empty `successRedirect` is undefined; for others,*/
                                /*`successRedirect` is false.  Check for both.*/
                                if (typeof successRedirect !== typeof undefined && successRedirect !== false && successRedirect !== "") {
                                    window.location = successRedirect;
                                }

                                thisForm.find('input[type="text"]').val("");
                                thisForm.find('textarea').val("");
                                formSuccess.fadeIn(1000);

                                formError.fadeOut(1000);
                                setTimeout(function () {
                                    formSuccess.fadeOut(500);
                                }, 5000);
                            }
                        }
                    });
                } catch (err) {
                    /*Keep the current error text in a data attribute on the form*/
                    formError.attr('original-error', formError.text());
                    /*Show the error with the returned error text.*/
                    formError.html(err.message).fadeIn(1000);
                    formSuccess.fadeOut(1000);
                    setTimeout(function () {
                        formError.fadeOut(500);
                    }, 5000);

                }

            } else {
                formError.fadeIn(1000);
                setTimeout(function () {
                    formError.fadeOut(500);
                }, 5000);
            }
        } else {
            /*If no iframe detected then this is treated as an email form instead.*/
            console.log('Send email form detected.');
            if (typeof originalError !== typeof undefined && originalError !== false) {
                formError.text(originalError);
            }

            error = validateFields(thisForm);

            if (error === 1) {
                formError.fadeIn(200);
                setTimeout(function () {
                    formError.fadeOut(500);
                }, 3000);
            } else {

                thisForm.removeClass('attempted-submit');

                /*Hide the error if one was shown*/
                formError.fadeOut(200);

                /*Create a new loading spinner in the submit button.*/

                jQuery.ajax({
                    type: "POST",
                    url: "mail/mail.php",
                    data: thisForm.serialize() + "&url=" + window.location.href,
                    success: function (response) {
                        /*Swiftmailer always sends back a number representing numner of emails sent.*/
                        /*If this is numeric (not Swift Mailer error text) AND greater than 0 then show success message.*/

                        if ($.isNumeric(response)) {
                            if (parseInt(response) > 0) {
                                /*For some browsers, if empty 'successRedirect' is undefined; for others,*/
                                /*'successRedirect' is false.  Check for both.*/
                                successRedirect = thisForm.attr('success-redirect');
                                if (typeof successRedirect !== typeof undefined && successRedirect !== false && successRedirect !== "") {
                                    window.location = successRedirect;
                                }


                                thisForm.find('input[type="text"]').val("");
                                thisForm.find('textarea').val("");
                                thisForm.find('.form-success').fadeIn(1000);

                                formError.fadeOut(1000);
                                setTimeout(function () {
                                    formSuccess.fadeOut(500);
                                }, 5000);
                            }
                        }
                        /*If error text was returned, put the text in the .form-error div and show it.*/
                        else {
                            /*Keep the current error text in a data attribute on the form*/
                            formError.attr('original-error', formError.text());
                            /*Show the error with the returned error text.*/
                            formError.text(response).fadeIn(1000);
                            formSuccess.fadeOut(1000);
                        }
                    },
                    error: function (errorObject, errorText, errorHTTP) {
                        /*Keep the current error text in a data attribute on the form*/
                        formError.attr('original-error', formError.text());
                        /*Show the error with the returned error text.*/
                        formError.text(errorHTTP).fadeIn(1000);
                        formSuccess.fadeOut(1000);
                    }
                });
            }
        }
        return false;
    });

    $('.validate-required, .validate-email').on('blur change', function () {
        validateFields($(this).closest('form'));
    });

    $('form').each(function () {
        if ($(this).find('.form-error').length) {
            $(this).attr('original-error', $(this).find('.form-error').text());
        }
    });

    function validateFields(form) {
        var name, error, originalErrorMessage;

        $(form).find('.validate-required[type="checkbox"]').each(function () {
            if (!$('[name="' + $(this).attr('name') + '"]:checked').length) {
                error = 1;
                name = $(this).attr('name').replace('[]', '');
                form.find('.form-error').text('Please tick at least one ' + name + ' box.');
            }
        });

        $(form).find('.validate-required').each(function () {
            if ($(this).val() === '') {
                $(this).addClass('field-error');
                error = 1;
            } else {
                $(this).removeClass('field-error');
            }
        });

        $(form).find('.validate-email').each(function () {
            if (!(/(.+)@(.+){2,}\.(.+){2,}/.test($(this).val()))) {
                $(this).addClass('field-error');
                error = 1;
            } else {
                $(this).removeClass('field-error');
            }
        });

        if (!form.find('.field-error').length) {
            form.find('.form-error').fadeOut(1000);
        }

        return error;
    }


    /*Prepare Signup Form - It is used to retrieve form details from an iframe Mail Chimp or Campaign Monitor form.*/

    function prepareSignup(iFrame) {
        var form = jQuery('<form />'),
            div = jQuery('<div />'),
            action;

        jQuery(div).html(iFrame.attr('srcdoc'));
        action = jQuery(div).find('form').attr('action');

        // Alter action for a Mail Chimp-compatible ajax request url.
        if (/list-manage\.com/.test(action)) {
            action = action.replace('/post?', '/post-json?') + "&c=?";
            if (action.substr(0, 2) == "//") {
                action = 'http:' + action;
            }
        }

        // Alter action for a Campaign Monitor-compatible ajax request url.
        if (/createsend\.com/.test(action)) {
            action = action + '?callback=?';
        }


        // Set action on the form
        form.attr('action', action);

        // Clone form input fields from
        jQuery(div).find('input, select, textarea').not('input[type="submit"]').each(function () {
            jQuery(this).clone().appendTo(form);

        });

        return form;


    }

    /*End form-newsletter*/
});








