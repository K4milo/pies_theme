(function($) {

  "use strict";

  $(document).ready(function() {

    // Comments
    $(".commentlist li").addClass("panel panel-default");
    $(".comment-reply-link").addClass("btn btn-default");

    // Forms
    $('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
    $('input[type=submit]').addClass('btn btn-primary');

    // side menu
    if ($('.side-menu .nav-collapse').hasClass('collapsed')) {
      $('body').addClass('open-menu');
    }

    $('.navbar-side-btn').on('click', function(event) {
      event.preventDefault();
      event.stopPropagation();
      /* Act on the event */
      $('body').toggleClass('open-menu');
      $('.side-menu .nav-collapse').toggleClass('collapsed');
      //$('.side-menu .nav-collapse').toggle("slide");
    });


    //Timeline
    var timelineBlocks = $('.cd-timeline-block'),
      offset = 0.8;

    //hide timeline blocks which are outside the viewport
    hideBlocks(timelineBlocks, offset);
    //on scolling, show/animate timeline blocks when enter the viewport
    $(window).on('scroll', function() {
      (!window.requestAnimationFrame) ?
      setTimeout(function() {
        showBlocks(timelineBlocks, offset);
      }, 100): window.requestAnimationFrame(function() {
        showBlocks(timelineBlocks, offset);
      });
    });

    function hideBlocks(blocks, offset) {
      blocks.each(function() {
        ($(this).offset().top > $(window).scrollTop() + $(window).height() * offset) && $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
      });
    }

    function showBlocks(blocks, offset) {
      blocks.each(function() {
        ($(this).offset().top <= $(window).scrollTop() + $(window).height() * offset && $(this).find('.cd-timeline-img').hasClass('is-hidden')) && $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
      });
    }

    //Timeline scripts
    var listTime = $('.gestion .nav-tabs li'),
      contentTab = $('.gestion .tab-content .tab-pane');

    listTime.each(function(index, el) {
      if (index == 0) {
        $(this).addClass('active');

        triggerKnobs(contentTab);

        $(this).on('click', function(event) {
          event.preventDefault();
          /* Act on the event */
            triggerKnobs(contentTab);
        });    
      }
    });

    contentTab.each(function(index, el) {
      var $this = $(this);
      if (index == 0) {
        $this.addClass('active');
        $this.removeClass('fade');
      }

      $this.find('.text-item').wrapAll('<div class="col-md-6 text-info"></div>');
      $this.find('.kn-cont').wrapAll('<div class="col-md-6 graph-info"></div>');

    });

    function resetKnobs(){
      $('.knob').each(function(index, el) {
         $(this).val(0);
      });
    }

    function triggerKnobs(sel){
        sel.each(function(index, el) {
        var $knob = $(this).find('.kn-cont'),
            $val = 0,
            $val1 = 0,
            $val2 = 0,
            $the_knob,
            $the_knob1,
            $the_knob2;

        $knob.each(function(index, el) {
          
          if (index == 0) {
          
            $the_knob = $(this).find('.knob.knob-0');
            $val = $(this).find('.knob.knob-0').val();
            
            $the_knob.knob({
              'min': 0,
              'max': 100,
              'displayInput': false,
              'bgColor': '#5a5d66',
              'fgColor': '#C9CB00',
              'width': 320,
              'height': 320,
              'dynamicDraw': true,
            });

          //the function of delay
          $the_knob.val(0).trigger('change').delay(0);

          var tmr = self.setInterval(function () {
              myDelay();
            }, 50);
            
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
              'max':100,
              'displayInput': false,
              'fgColor': '#00A2A6',
              'bgColor': '#5a5d66',
              'width': 200,
              'height': 200,
              'dynamicDraw': true
            });

            //the function of delay
          $the_knob1.val(0).trigger('change').delay(0);

          var tmr = self.setInterval(function () {
              myDelay();
            }, 50);
            
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
              'bgColor': '#5a5d66',
              'fgColor': '#CA3516',
              'width': 100,
              'min': 0,
              'max': 100,
              'height': 100,
              'dynamicDraw': true
            });
            
            //the function of delay
          $the_knob2.val(0).trigger('change').delay(0);

          var tmr = self.setInterval(function () {
              myDelay();
            }, 50);
            
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

    var timelineItem = $('.items-ano li');

    timelineItem.each(function(index, el) {
      var $this = $(this);

      if (index == 0) {
        $this.addClass('active');
      }

      $this.on('click', function(e) {
        e.preventDefault();
        //Reset timeline class
        timelineItem.removeClass('active');
        $this.addClass('active');
      });
    });


    //Slick slider

    var heroSlider = $('#history-slider');

    heroSlider.slick({
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      customPaging: function(slider, i) {
        var date = $(slider.$slides[i]).data('date'),
          text = $(slider.$slides[i]).data('text');
        return '<div class="history-item"><div class="text-cond"><p>' + text + '</p><h3>' + date + '</h3></div><i></i><h5>' + date + '</h5></div>';
      },
      infinite: true
    });

    //Trigger slider;

    $('ul.items-photos').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3
    });

		new WOW().init();

  });

}(jQuery));
