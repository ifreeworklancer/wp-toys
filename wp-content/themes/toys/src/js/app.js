import jquery from 'jquery';
import Flickity from 'flickity';
import 'flickity-as-nav-for';
import ScrollReveal from 'scrollreveal';
import IMask from 'imask';

window.jQuery = window.$ = jquery;

import Vue from 'vue';
import store from './store';
import Products from './components/product/Products';


new Vue({
    el: '#app',
    components: {
        Products,
    },
    store,
    created() {
        this.$store.dispatch('getBasket');
    }
});

(function () {

    /**
     * Burger-menu
     */
    let menu = $('.menu');
    let burgerMenu = $('.burger-menu');
    $(burgerMenu).click(function () {
        $(this).toggleClass('active');
        menu.slideToggle();
    });

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 0) {
            $('#app-header').addClass('is-scroll');
        } else {
            $('#app-header').removeClass('is-scroll');
        }
    });

    /**
     * languages menu
     */
    $('.languages-menu').hover(
        function () {
            $(this).find($('li:not(".active")')).slideDown();
        },
        function () {
            $(this).find($('li:not(".active")')).slideUp().css('display', 'flex');
        }
    );

    /**
     * Filters list
     */
    $('.filters li').on('click', function () {
        $(this).toggleClass('active');
        $(this).find('ul').slideToggle();
    });

    /**
     * Scroll
     */
    $(".scroll-link").on("click", function (event) {
        event.preventDefault();
        let id = $(this).attr('href');
        if (id.length > 1) {
            let top = ($(id).offset().top - $('#app-header').height());

            $('body,html').animate({
                scrollTop: top
            }, 1500);
        }
        burgerMenu.removeClass('active');
        menu.slideUp();
    });

    /**
     * Form-label
     */

    $('.form-control').on('focus', function () {
        $(this).parents('.form-group').addClass('in-focus');
    });

    $('.form-control').on('blur', function () {
        if ($(this).val() !== "") {
            $(this).parents('.form-group').addClass('in-focus');
        } else {
            $(this).parents('.form-group').removeClass('in-focus');
        }
    });

    /**
     * Phone mask
     * @type {*|jQuery.fn.init|jQuery|HTMLElement}
     */
    const phones = $('[type="tel"]');
    Array.from(phones).forEach(phone => {
        new IMask(phone, {
            mask: '+{38} (000) 000-00-00'
        });
    });

    /**
     * Modal
     */
    let feedbackModal = $('.custom-modal--feedback');
    let closeModal = $('.close-modal');
    let modalMask = $('.modal-mask');

    $('.add-feedback').on('click', function (e) {
        e.preventDefault();
        $(feedbackModal).addClass('active');
        $(modalMask).addClass('active');
    });

    $(closeModal).on('click', function () {
        $(feedbackModal).removeClass('active');
        $(modalMask).removeClass('active');
    });

    $(modalMask).on('click', function () {
        $(feedbackModal).removeClass('active');
        $(modalMask).removeClass('active');
    });


    /**
     * Youtube video
     */
    $('[data-youtube]').on('click', function () {
        let id = $(this).data('youtube'),
            padding = $(window).innerWidth() > 768 ? 120 : 30,
            ratio = 9 / 16,
            width = $(window).innerWidth() > 768 ? $(window).innerWidth() - padding - 200 : $(window).innerWidth() - padding,
            height = width * ratio,
            html = '<iframe style="width: ' + width + 'px; height: ' + height + 'px;" ' +
                'src="' +
                id + '" frameborder="0" gesture="media" allowfullscreen></iframe>';
        console.log(height);

        $('body').append('<div class="outer">' + html + '</div>');
    });

    $(document).mouseup(function (e) {
        let container = $('.outer iframe');

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.outer').remove();
        }
    });

    $(document).on('keyup', function (e) {
        if (e.keyCode === 27) {
            if ($(feedbackModal).lenght > 0) {
                $(feedbackModal).removeClass('active');
                $(modalMask).removeClass('active');
            }
        }
    });

    /**
     * Sliders
     */
    if ($('.intro-slider').length) {

        let elem1 = document.querySelector('.intro-slider');
        if (elem1) {
            const flkty1 = new Flickity(elem1, {
                prevNextButtons: false,
                pageDots: false,
                contain: true,
                draggable: false,
                wrapAround: false,
                cellAlign: 'left',
            });

            let prevArrowIntro = document.querySelector('.slider-arrow--intro .slider-arrow-item--prev');

            prevArrowIntro.addEventListener('click', function () {
                flkty1.previous(false, false);
            });

            let nextArrowIntro = document.querySelector('.slider-arrow--intro .slider-arrow-item--next');

            nextArrowIntro.addEventListener('click', function () {
                flkty1.next(false, false);
            });
        }
    }

    if ($('.reviews-slider').length) {

        let elem2 = document.querySelector('.reviews-slider');
        if (elem2) {


            if($(window).width() < 576) {
                const flkty2 = new Flickity(elem2, {
                    prevNextButtons: false,
                    contain: true,
                    draggable: true,
                    wrapAround: false,
                    groupCells: 1,
                    cellAlign: 'left',
                });

                let prevArrowIntro = document.querySelector('.slider-arrow--reviews .slider-arrow-item--prev');

                prevArrowIntro.addEventListener('click', function () {
                    flkty2.previous(false, false);
                });

                let nextArrowIntro = document.querySelector('.slider-arrow--reviews .slider-arrow-item--next');

                nextArrowIntro.addEventListener('click', function () {
                    flkty2.next(false, false);
                });
            }

            if($(window).width() > 576) {
                const flkty2 = new Flickity(elem2, {
                    prevNextButtons: false,
                    contain: true,
                    draggable: true,
                    wrapAround: false,
                    groupCells: 2,
                    cellAlign: 'left',
                });

                let prevArrowIntro = document.querySelector('.slider-arrow--reviews .slider-arrow-item--prev');

                prevArrowIntro.addEventListener('click', function () {
                    flkty2.previous(false, false);
                });

                let nextArrowIntro = document.querySelector('.slider-arrow--reviews .slider-arrow-item--next');

                nextArrowIntro.addEventListener('click', function () {
                    flkty2.next(false, false);
                });
            }

            if($(window).width() > 992) {
                const flkty2 = new Flickity(elem2, {
                    prevNextButtons: false,
                    contain: true,
                    draggable: true,
                    wrapAround: false,
                    groupCells: 3,
                    cellAlign: 'left',
                });

                let prevArrowIntro = document.querySelector('.slider-arrow--reviews .slider-arrow-item--prev');

                prevArrowIntro.addEventListener('click', function () {
                    flkty2.previous(false, false);
                });

                let nextArrowIntro = document.querySelector('.slider-arrow--reviews .slider-arrow-item--next');

                nextArrowIntro.addEventListener('click', function () {
                    flkty2.next(false, false);
                });
            }
        }
    }

    if ($('.product-slider').length) {
        let elem3 = document.querySelector('.product-slider');
        let galleryNavFor = document.querySelector('.product-slider-asNavFor');

        let flkty3 = new Flickity(elem3, {
            prevNextButtons: false,
            cellAlign: 'left',
            contain: true,
            draggable: false,
            pageDots: false,
            wrapAround: false,
        });

        new Flickity(galleryNavFor, {
            asNavFor: elem3,
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            prevNextButtons: false,
            wrapAround: false,
        });

        let prevArrowIntro = document.querySelector('.slider-arrow--product .slider-arrow-item--prev');

        prevArrowIntro.addEventListener('click', function () {
            flkty3.previous(false, false);
        });

        let nextArrowIntro = document.querySelector('.slider-arrow--product .slider-arrow-item--next');

        nextArrowIntro.addEventListener('click', function () {
            flkty3.next(false, false);
        });
    }

    /**
     * Animate scroll
     */
    ScrollReveal().reveal('.catalog-card', {
        origin: 'bottom',
        delay: 400,
        distance: '200px',
        interval: 80
    });
    ScrollReveal().reveal('.filters', {
        origin: 'bottom',
        delay: 400,
        distance: '200px',
    });
})(jQuery);

document.addEventListener('DOMContentLoaded', function () {
    let inputs = document.getElementsByClassName('quantity');

    function incInputNumber(input, step) {
        let val = +input.value;
        if (isNaN(val)) val = 1;
        val += step;
        input.value = val > 1 ? val : 1
        // If you need to change the input value in the DOM :
        // var newValue = val > 0 ? val : 0;
        // input.setAttribute("value", newValue);
    }

    Array.prototype.forEach.call(inputs, function (el) {
        let input = el.getElementsByTagName('input')[0];

        el.getElementsByClassName('quantity-up')[0].addEventListener('click', function () {
            incInputNumber(input, 1)
        });
        el.getElementsByClassName('quantity-down')[0].addEventListener('click', function () {
            incInputNumber(input, -1)
        })
    })
});