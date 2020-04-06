"use strict";

$(function () {
  (function () {
    // 繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ繝医ャ繝�
    var $btn, r;

    if ($(window).width() < 1040) {
      r = 60;
    } else {
      r = ($(window).width() - 1000) / 2;
    }

    $btn = $('#scrollToTop').css('right', r).on('click', function () {
      return $('html,body').animate({
        scrollTop: 0
      }, 500);
    });
    $btn.on('mouseover', function () {
      return $(this).addClass('hover');
    });
    $btn.on('mouseleave', function () {
      return $(this).removeClass('hover');
    });
    $(window).on('scroll', function () {
      var s;
      s = $(this).scrollTop();

      if (s >= 200) {
        $btn.attr('show', 'on');
      } else if (s < 200 && $btn.attr('show') === 'on') {
        $btn.attr('show', 'off');
      }
    });
    $(window).on('resize', function () {
      if ($(window).width() < 1040) {
        r = 60;
      } else {
        r = ($(window).width() - 1000) / 2;
      }

      $btn.css('right', r);
    });
  })();

  (function () {
    // 繝偵せ繝医Μ繝ｼ繝舌ャ繧ｯ
    var $btn;
    $btn = $('.js-hb').on('click', function () {
      return history.back();
    });
  })();
});
