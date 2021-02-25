;(function ($) {
    'use strict'

    $(document).ready(function () {
        
        // sticky navigation
        $(window).on('scroll', function () {
            var scroll = $(window).scrollTop()
            if (scroll < 2) {
                $('#header_area').removeClass('sticky')
            } else {
                $('#header_area').addClass('sticky')
            }
        })
        // active menu class
        $('.navbar-toggler').click(function () {
            $('.header_area').toggleClass('active')
        })

        // nice select
        $('select').niceSelect()

        // on page nav
        $('#menu-main-menu').onePageNav()

        // magnify pop up
        $('.video-btn-mfp, .video-btn, .video-btn').magnificPopup({
            type: 'video',
        })

        // Home two slider
        $('.we-care-so-much-area-id').owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            autoplay: false,
            loop: false,
            navText: [
                "<i class='fas fa-long-arrow-alt-left'></i>",
                "<i class='fas fa-long-arrow-alt-right'></i>",
            ],
            mouseDrag: true,
            touchDrag: true,
        })

        // Home two slider
        $('.site-slider-area-wrapper-slider').owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            autoplay: false,
            loop: false,
            navText: [
                "<i class='fas fa-long-arrow-alt-left'></i>",
                "<i class='fas fa-long-arrow-alt-right'></i>",
            ],
            mouseDrag: true,
            touchDrag: true,
        })

        // scrool down

        // scrollUp
        // active menu class
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 900, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            scrollTarget: false, // Set a custom target element for scrolling to. Can be element or number
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647, // Z-Index for the overlay
        })

        // meanmenu
        $('#mobile-menu').meanmenu({
            meanMenuContainer: '.mobile-menu',
            meanScreenWidth: '767',
        });
    



        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay',
            },
            defaultView: 'month',
            navLinks: false, // can click day/week names to navigate views
            selectable: true,
            selectHelper: false,
            editable: false,
            eventLimit: false, // allow "more" link when too many events

            

            select: function (start, end) {
                if(start.isBefore(moment())) {
                    $('#calendar').fullCalendar('unselect');
                    return false;
                }
                // var title = prompt('Event Content:')
                // var eventData
                // if (title) {
                //     eventData = {
                //         title: title,
                //         start: start,
                //         end: end,
                //     }
                //     $('#calendar').fullCalendar('renderEvent', eventData, true) // stick? = true
                // }
                // $('#calendar').fullCalendar('unselect')
            },

            eventRender: function (event, element) {
                element
                    .find('.fc-content')
                    .prepend(
                        "<span class='closeon material-icons'>&#xe5cd;</span>"
                    )
                element.find('.closeon').on('click', function () {
                    $('#calendar').fullCalendar('removeEvents', event._id)
                })
            },

            eventClick: function (calEvent) {
                var title = prompt('Edit Event Content:', calEvent.title)
                calEvent.title = title
                $('#calendar').fullCalendar('updateEvent', calEvent)
            },
        })


        



    })

})(jQuery)
