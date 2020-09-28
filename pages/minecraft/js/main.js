window.onload = function () {
    if (isMobile.any()) {
        //如果是手机访问的话的操作！
        alert("推荐使用电脑端访问，手机端可能出现一些显示异常的问题～")
    }
};

//检测是否为手机端访问
var isMobile = {
    Android: function () {
        return navigator.userAgent.match(/Android/i) ? true : false;
    },
    BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i) ? true : false;
    },
    iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;
    },
    Windows: function () {
        return navigator.userAgent.match(/IEMobile/i) ? true : false;
    },
    any: function () {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
    }
};

//剪贴板按钮
var clipboard = new ClipboardJS('.btn-copy');

clipboard.on('success', function (e) {
    console.log(e);
    $('#tip-copy-success').tipso({
        useTitle: false,
        position: 'right',
    });
    $('#tip-copy-success').tipso('show');
});

clipboard.on('error', function (e) {
    console.log(e);
});

//jquery打开大图动画
jQuery(document).ready(function ($) {

    'use strict';

    $(function () {

        // Vars
        var modBtn = $('#modBtn'),
            modal = $('#modal'),
            close = modal.find('.close-btn img'),
            modContent = modal.find('.modal-content');

        // open modal when click on open modal button
        modBtn.on('click', function () {
            modal.css('display', 'block');
            modContent.removeClass('modal-animated-out').addClass('modal-animated-in');
        });

        // close modal when click on close button or somewhere out the modal content
        $(document).on('click', function (e) {
            var target = $(e.target);
            if (target.is(modal) || target.is(close)) {
                modContent.removeClass('modal-animated-in').addClass('modal-animated-out').delay(300).queue(function (next) {
                    modal.css('display', 'none');
                    next();
                });
            }
        });

    });

    // on click event on all anchors with a class of scrollTo
    $('a.scrollTo').on('click', function () {

        // data-scrollTo = section scrolling to name
        var scrollTo = $(this).attr('data-scrollTo');


        // toggle active class on and off. added 1/24/17
        $("a.scrollTo").each(function () {
            if (scrollTo == $(this).attr('data-scrollTo')) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        });


        // animate and scroll to the sectin
        $('body, html').animate({

            // the magic - scroll to section
            "scrollTop": $('#' + scrollTo).offset().top
        }, 1000);
        return false;

    });


    $(".menu-icon").click(function () {
        $(this).toggleClass("active");
        $(".overlay-menu").toggleClass("open");
    });

});