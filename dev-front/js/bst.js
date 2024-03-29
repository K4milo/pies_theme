import { buildQuestionsFilters, buildQuestionsPost } from './filter-questions';

(function ($) {

  "use strict";
  $(document).ready(function () {

    $("#lb").click(function () {

      $("#info1").css("display", "none");
      $("#info2").css("display", "block");
      $("#info3").css("display", "none");
      $("#ha").css("display", "none");
      $("#hb").css("display", "inline");
      $("#infra").css("color", "#fff");
      $("#lb").css("display", "none");
      $("#la").css("display", "inline");
      $("#pract").css("color", "#ffbb01");
      $("#tc-h").css("display", "inline-block");
      $("#tc").css("display", "none");
      $("#tc-t").css("color", "#fff");
    });

    $("#hb").click(function () {

      $("#info1").css("display", "block");
      $("#info2").css("display", "none");
      $("#info3").css("display", "none");
      $("#ha").css("display", "inline");
      $("#hb").css("display", "none");
      $("#infra").css("color", "#ffbb01");
      $("#la").css("display", "none");
      $("#lb").css("display", "inline");
      $("#tc-h").css("display", "inline-block");
      $("#tc").css("display", "none");
      $("#pract").css("color", "#fff");
      $("#tc-t").css("color", "#fff");
    });

    $(".todos-cole").click(function () {
      $("#info1").css("display", "none");
      $("#info2").css("display", "none");
      $("#info3").css("display", "block");
      $("#la").css("display", "none");
      $("#lb").css("display", "inline-block");
      $("#ha").css("display", "none");
      $("#hb").css("display", "inline-block");
      $("#tc").css("display", "inline-block");
      $("#tc-h").css("display", "none");
      $("#tc-t").css("color", "#ffbb01");
      $("#pract").css("color", "#fff");
      $("#infra").css("color", "#fff");
    });

    // Scrolled menu
    let header_el = $('.navbar');

    $(window).scroll(function () {

      let scroll = $(window).scrollTop();
      if (scroll >= 100) {
        header_el.addClass("scroll_menu");
      } else {
        header_el.removeClass("scroll_menu");
      }
    });

    // Comments
    $(".commentlist li").addClass("panel panel-default");
    $(".comment-reply-link").addClass("btn btn-default");

    //header
    $('.panel-heading').click(function (event) {
      /* Act on the event */
      $(this).toggleClass('active');
    });

    // Forms
    $('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
    $('input[type=submit]').addClass('btn btn-primary');

    // side menu
    if ($('.side-menu .nav-collapse').hasClass('collapsed')) {
      $('body').addClass('open-menu');
    }

    $('.navbar-side-btn').on('click', function (event) {
      event.preventDefault();
      event.stopPropagation();
      /* Act on the event */
      $('body').toggleClass('open-menu');
      $('.side-menu .nav-collapse').toggleClass('collapsed');
      //$('.side-menu .nav-collapse').toggle("slide");
    });

    // Gateway form
    var select_opt_gateway = $('.dummy-drop select');

    if (select_opt_gateway) {
      select_opt_gateway.on('change', function (event) {
        event.preventDefault();
        /* Act on the event */
        var gateway_val = $(this).val();

        $('#gatewayForm input.value_gateway').val(gateway_val);

      });
    }

    // Javascript to enable link to tab
    var url = document.location.toString();
    if (url.match('#')) {
      $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.page-template-donation-tpl .nav-tabs a').on('shown.bs.tab', function (e) {
      window.location.hash = e.target.hash;
    });

    //add support to small slider
    if ($(window).width() <= 760) {
      //Trigger slider;
      setTimeout(function () {
        $('ul.items-photos').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: false,

        });

      }, 600);

      $('.page-template-about-tpl .nav-tabs li').on('click', function (event) {
        $('ul.items-photos .slick-next ').trigger('click');
      });
    }

    //counterscript
    $('body.page-template-home-tpl #impact-value-container .impact-items .item .text-body p strong').counterUp({
      delay: 10,
      time: 1000
    });

    $('body.page-template-home-tpl #impact-value-container .impact-items .item .text-body p b').counterUp({
      delay: 10,
      time: 1000
    });


    //Timeline
    var timelineBlocks = $('.cd-timeline-block'),
      offset = 0.8;

    //hide timeline blocks which are outside the viewport
    hideBlocks(timelineBlocks, offset);
    //on scolling, show/animate timeline blocks when enter the viewport
    $(window).on('scroll', function () {
      (!window.requestAnimationFrame) ?
      setTimeout(function () {
        showBlocks(timelineBlocks, offset);
      }, 100): window.requestAnimationFrame(function () {
        showBlocks(timelineBlocks, offset);
      });
    });

    function hideBlocks(blocks, offset) {
      blocks.each(function () {
        ($(this).offset().top > $(window).scrollTop() + $(window).height() * offset) && $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
      });
    }

    function showBlocks(blocks, offset) {
      blocks.each(function () {
        ($(this).offset().top <= $(window).scrollTop() + $(window).height() * offset && $(this).find('.cd-timeline-img').hasClass('is-hidden')) && $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
      });
    }

    //Timeline scripts
    var listTime = $('.gestion .nav-tabs li'),
      contentTab = $('.gestion .tab-content .tab-pane');

    listTime.each(function (index, el) {

      $(this).on('click', function (event) {
        event.preventDefault();
        /* Act on the event */
        triggerKnobs(contentTab);
      });

      if (index == 0) {
        $(this).addClass('active');

        triggerKnobs(contentTab);
      }
    });

    contentTab.each(function (index, el) {
      var $this = $(this);
      if (index == 0) {
        $this.addClass('active');
        $this.removeClass('fade');
      }

      $this.find('.text-item').wrapAll('<div class="col-md-3 col-md-push-2 text-info"></div>');
      $this.find('.kn-cont').wrapAll('<div class="col-md-4 col-md-push-2 graph-info"></div>');

    });

    function resetKnobs() {
      $('.knob').each(function (index, el) {
        $(this).val(0);
      });
    }

    function triggerKnobs(sel) {
      sel.each(function (index, el) {
        var $knob = $(this).find('.kn-cont'),
          $val = 0,
          $val1 = 0,
          $val2 = 0,
          $the_knob,
          $the_knob1,
          $the_knob2;

        $knob.each(function (index, el) {

          if (index == 0) {

            $the_knob = $(this).find('.knob.knob-0');
            $val = $(this).find('.knob.knob-0').val();

            $the_knob.knob({
              'min': 0,
              'max': 100,
              'displayInput': false,
              'bgColor': 'rgba(0,0,0,0)',
              'fgColor': '#C9CB00',
              'width': 320,
              'height': 320,
              'dynamicDraw': true,
            });

            //the function of delay
            $the_knob.val(0).trigger('change').delay(0);

            var tmr = self.setInterval(function () {
              myDelay();
            }, 10);

            var m = 0;

            function myDelay() {
              m += 1;
              if (m > $val) {
                window.clearInterval(tmr);
                return;
              }
              $the_knob.val(m).trigger('change');
            }

          } else if (index == 1) {

            $the_knob1 = $(this).find('.knob.knob-1');
            $val1 = $(this).find('.knob.knob-1').val();

            $the_knob1.knob({
              'min': 0,
              'max': 100,
              'displayInput': false,
              'fgColor': '#00A2A6',
              'bgColor': 'rgba(0,0,0,0)',
              'width': 200,
              'height': 200,
              'thickness': 0.41,
              'dynamicDraw': true
            });

            //the function of delay
            $the_knob1.val(0).trigger('change').delay(0);

            var tmr = self.setInterval(function () {
              myDelay();
            }, 10);

            var m = 0;

            function myDelay() {
              m += 1;
              if (m > $val1) {
                window.clearInterval(tmr);
                return;
              }
              $the_knob1.val(m).trigger('change');
            }

          } else if (index == 2) {

            $the_knob2 = $(this).find('.knob.knob-2');
            $val2 = $(this).find('.knob.knob-2').val();

            $the_knob2.knob({
              'displayInput': false,
              'bgColor': 'rgba(0,0,0,0)',
              'fgColor': '#CC0B3C',
              'min': 0,
              'max': 100,
              'width': 110,
              'height': 110,
              'thickness': 0.7,
              'dynamicDraw': true
            });

            //the function of delay
            $the_knob2.val(0).trigger('change').delay(0);

            var tmr = self.setInterval(function () {
              myDelay();
            }, 10);

            var m = 0;

            function myDelay() {
              m += 1;
              if (m > $val2) {
                window.clearInterval(tmr);
                return;
              }
              $the_knob2.val(m).trigger('change');
            }
          }

        });
      });
    }


    //Items timeline

    var timelineItem = $('.items-ano li, #history-slider-mobile li');

    timelineItem.each(function (index, el) {
      var $this = $(this);

      if (index == 0) {
        $this.addClass('active');
      }

      $this.on('click', function (e) {
        e.preventDefault();
        //Reset timeline class
        timelineItem.removeClass('active');
        $this.addClass('active');
      });
    });



    //Slick slider

    var heroSlider = $('#history-slider'),
      herolist = $('#history-slider li');

    heroSlider.slick({
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      customPaging: function (slider, i) {
        var date = $(slider.$slides[i]).data('date'),
          text = $(slider.$slides[i]).data('text');
        return '<div class="history-item"><h3>' + date + '</h3><i></i><h5>' + date + '</h5></div>';
      },
      infinite: true
    });

    //Slick sponsors
    $('#partners-container .impact-items').slick({
      dots: true,
      slidesToShow: 6,
      slidesToScroll: 6,
      speed: 2500,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 2500,
      responsive: [{
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false
          }
        }
      ]
    });
    $('#partners-container2 .impact-items2').slick({
      dots: true,
      slidesToShow: 4,
      slidesToScroll: 4,
      speed: 1500,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 1500,
      responsive: [{
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false
          }
        }
      ]
    });


    //append soacha content

    var soaES = $('body.page-template-what-we-do-tpl.page-id-236 .gestion #cd-gestion .tab-content #menu3'),
      soaEN = $('body.page-template-what-we-do-tpl.page-id-736 .gestion #cd-gestion .tab-content #menu3');

    soaES.prepend('<h4>EN EL AÑO 2015 FINALIZAMOS NUESTRA INTERVENCIÓN EN SOACHA.</h4>');
    soaEN.prepend('<h4>IN 2015, WE FINISHED OUR INTERVENTION IN SOACHA.</h4>');


    new WOW().init();

  });

}(jQuery));

// New scripts 
buildQuestionsFilters();
buildQuestionsPost();