/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, '__esModule', {
	value: true
});
var serialize = function serialize(form) {
	var arr = [];
	Array.prototype.slice.call(form.elements).forEach(function (field) {
		if (!field.name || field.disabled || ['reset', 'submit', 'button'].indexOf(field.type) > -1) return;
		if (field.type === 'select-multiple') {
			Array.prototype.slice.call(field.options).forEach(function (option) {
				if (!option.selected) return;
				arr.push(encodeURIComponent(field.name) + '=' + encodeURIComponent(option.value));
			});
			return;
		}
		if (['checkbox', 'radio'].indexOf(field.type) > -1 && !field.checked) return;
		arr.push(encodeURIComponent(field.name) + '=' + encodeURIComponent(field.value));
	});
	return arr.join('&');
};

exports.serialize = serialize;

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _filterQuestions = __webpack_require__(5);

(function ($) {

  "use strict";
  $(document).ready(function () {
    $("#lb").click(function () {

      $("#info1").css("display", "none");
      $("#info2").css("display", "block");
      $("#ha").css("display", "none");
      $("#hb").css("display", "inline");
      $("#infra").css("color", "#fff");
      $("#lb").css("display", "none");
      $("#la").css("display", "inline");
      $("#pract").css("color", "#ffbb01");
    });

    $("#hb").click(function () {

      $("#info1").css("display", "block");
      $("#info2").css("display", "none");
      $("#ha").css("display", "inline");
      $("#hb").css("display", "none");
      $("#infra").css("color", "#ffbb01");
      $("#la").css("display", "none");
      $("#lb").css("display", "inline");
      $("#pract").css("color", "#fff");
    });
  });
  $(document).ready(function () {

    // Scrolled menu
    var header_el = $('.navbar');

    $(window).scroll(function () {

      var scroll = $(window).scrollTop();
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
          infinite: false

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
      !window.requestAnimationFrame ? setTimeout(function () {
        showBlocks(timelineBlocks, offset);
      }, 100) : window.requestAnimationFrame(function () {
        showBlocks(timelineBlocks, offset);
      });
    });

    function hideBlocks(blocks, offset) {
      blocks.each(function () {
        $(this).offset().top > $(window).scrollTop() + $(window).height() * offset && $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
      });
    }

    function showBlocks(blocks, offset) {
      blocks.each(function () {
        $(this).offset().top <= $(window).scrollTop() + $(window).height() * offset && $(this).find('.cd-timeline-img').hasClass('is-hidden') && $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
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
          var _this = this;

          if (index == 0) {
            var tmr;
            var m;

            (function () {
              var myDelay = function myDelay() {
                m += 1;
                if (m > $val) {
                  window.clearInterval(tmr);
                  return;
                }
                $the_knob.val(m).trigger('change');
              };

              $the_knob = $(_this).find('.knob.knob-0');
              $val = $(_this).find('.knob.knob-0').val();

              $the_knob.knob({
                'min': 0,
                'max': 100,
                'displayInput': false,
                'bgColor': 'rgba(0,0,0,0)',
                'fgColor': '#C9CB00',
                'width': 320,
                'height': 320,
                'dynamicDraw': true
              });

              //the function of delay
              $the_knob.val(0).trigger('change').delay(0);

              tmr = self.setInterval(function () {
                myDelay();
              }, 10);
              m = 0;
            })();
          } else if (index == 1) {
            var tmr;
            var m;

            (function () {
              var myDelay = function myDelay() {
                m += 1;
                if (m > $val1) {
                  window.clearInterval(tmr);
                  return;
                }
                $the_knob1.val(m).trigger('change');
              };

              $the_knob1 = $(_this).find('.knob.knob-1');
              $val1 = $(_this).find('.knob.knob-1').val();

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

              tmr = self.setInterval(function () {
                myDelay();
              }, 10);
              m = 0;
            })();
          } else if (index == 2) {
            var tmr;
            var m;

            (function () {
              var myDelay = function myDelay() {
                m += 1;
                if (m > $val2) {
                  window.clearInterval(tmr);
                  return;
                }
                $the_knob2.val(m).trigger('change');
              };

              $the_knob2 = $(_this).find('.knob.knob-2');
              $val2 = $(_this).find('.knob.knob-2').val();

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

              tmr = self.setInterval(function () {
                myDelay();
              }, 10);
              m = 0;
            })();
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
      customPaging: function customPaging(slider, i) {
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
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false
        }
      }]
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
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false
        }
      }]
    });

    //append soacha content

    var soaES = $('body.page-template-what-we-do-tpl.page-id-236 .gestion #cd-gestion .tab-content #menu3'),
        soaEN = $('body.page-template-what-we-do-tpl.page-id-736 .gestion #cd-gestion .tab-content #menu3');

    soaES.prepend('<h4>EN EL AÑO 2015 FINALIZAMOS NUESTRA INTERVENCIÓN EN SOACHA.</h4>');
    soaEN.prepend('<h4>IN 2015, WE FINISHED OUR INTERVENTION IN SOACHA.</h4>');

    new WOW().init();
  });
})(jQuery);

// New scripts
(0, _filterQuestions.buildQuestionsFilters)();
(0, _filterQuestions.buildQuestionsPost)();

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var _utils = __webpack_require__(0);

var PostQuestions = (function () {
    function PostQuestions(wrapper, resultWrapper, markupSuccess, fileInput) {
        _classCallCheck(this, PostQuestions);

        this.wrapper = wrapper;
        this.resultsDOM = resultWrapper;
        this.resultMarkup = markupSuccess;
        this.file = fileInput;
        this.fetchResponse();
    }

    _createClass(PostQuestions, [{
        key: "fetchResponse",
        value: function fetchResponse() {
            var serializedFrm = new FormData(this.wrapper);
            var ajaxUrl = this.wrapper.getAttribute("action");
            var resultsDiv = this.resultsDOM;
            var successHTML = this.resultMarkup;
            var formWrapper = this.wrapper;
            var loader = "<div class=\"form--loader\"><span>Loading..</span></div>";
            formWrapper.innerHTML = loader;

            if (this.file.files[0]) {
                serializedFrm.append("file", this.file.files[0]);
                serializedFrm.append('name', 'question-thumb');
                serializedFrm.append('description', 'Featured image for question');
            }

            var paramsObj = {
                method: 'POST',
                credentials: 'same-origin',
                body: serializedFrm
            };

            fetch(ajaxUrl, paramsObj).then(function (response) {
                return response.text();
            }).then(function (data) {

                if (data) {
                    resultsDiv.innerHTML = successHTML;
                    formWrapper.innerHTML = '';
                }
                data ? resultsDiv.innerHTML = successHTML : 'No se pudo añadir el post';
            })["catch"](function (e) {
                return console.log('error', e);
            });
        }
    }]);

    return PostQuestions;
})();

exports.PostQuestions = PostQuestions;

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, '__esModule', {
    value: true
});

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var _utils = __webpack_require__(0);

var FetchQuestions = (function () {
    function FetchQuestions(wrapper, resultWrapper) {
        _classCallCheck(this, FetchQuestions);

        this.wrapper = wrapper;
        this.resultsDOM = resultWrapper;
        this.fetchResponse();
    }

    _createClass(FetchQuestions, [{
        key: 'fetchResponse',
        value: function fetchResponse() {
            var serializedFrm = (0, _utils.serialize)(this.wrapper);
            var ajaxUrl = this.wrapper.getAttribute("action");
            var resultsDiv = this.resultsDOM;

            var paramsObj = {
                method: 'POST',
                credentials: 'same-origin',
                headers: new Headers({
                    'Content-Type': 'application/x-www-form-urlencoded'
                }),
                body: serializedFrm
            };

            // Dom events
            var loader = '<div class="form--loader"><span>Loading..</span></div>';
            resultsDiv.classList.add('loading');
            resultsDiv.innerHTML = loader;

            fetch(ajaxUrl, paramsObj).then(function (response) {
                return response.text();
            }).then(function (data) {
                if (data) {
                    resultsDiv.innerHTML = data;
                    resultsDiv.classList.remove('loading');
                }
            })['catch'](function (e) {
                return console.log('error', e);
            });
        }
    }]);

    return FetchQuestions;
})();

exports.FetchQuestions = FetchQuestions;

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, '__esModule', {
    value: true
});

var _api_questionsCalls = __webpack_require__(4);

var _api_questionPost = __webpack_require__(3);

// Fetch filters module
var buildQuestionsFilters = function buildQuestionsFilters() {
    var filterWrapper = document.getElementById('QuestionsFilter');
    var resultsWrapper = document.getElementById('QuestionsResponse');

    if (filterWrapper.length > 0) {
        filterWrapper.addEventListener('submit', function (e) {
            var createFilters = new _api_questionsCalls.FetchQuestions(filterWrapper, resultsWrapper);
            e.preventDefault();
        });
    }
};

// Build post object
var buildQuestionsPost = function buildQuestionsPost() {
    var formPost = document.getElementById('QuestionsPost');
    var fileInput = document.getElementById('avatar');
    var responseWrapper = document.getElementById('QuestionsPostResult');
    var successMarkup = '<div class="form-success"><p>Hemos recibido tu pregunta</p><span class="form-success--icon">icon</span><h4>¡Pronto te responderemos!</h4></div>';

    if (formPost.length > 0) {
        formPost.addEventListener('submit', function (e) {
            var createPost = new _api_questionPost.PostQuestions(formPost, responseWrapper, successMarkup, fileInput);
            e.preventDefault();
        });
    }
};

exports.buildQuestionsFilters = buildQuestionsFilters;
exports.buildQuestionsPost = buildQuestionsPost;

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ })
/******/ ]);