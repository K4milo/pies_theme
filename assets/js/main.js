!function(t){function n(i){if(e[i])return e[i].exports;var o=e[i]={i:i,l:!1,exports:{}};return t[i].call(o.exports,o,o.exports,n),o.l=!0,o.exports}var e={};n.m=t,n.c=e,n.i=function(t){return t},n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:i})},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},n.p="",n(n.s=2)}([function(t,n,e){"use strict";!function(t){t(document).ready(function(){function n(n,e){n.each(function(){t(this).offset().top<=t(window).scrollTop()+t(window).height()*e&&t(this).find(".cd-timeline-img").hasClass("is-hidden")&&t(this).find(".cd-timeline-img, .cd-timeline-content").removeClass("is-hidden").addClass("bounce-in")})}function e(n){n.each(function(n,e){var i,o,a,s=t(this).find(".kn-cont"),l=0,r=0,c=0;s.each(function(n,e){var s=this;if(0==n){var d,u;!function(){var n=function(){if((u+=1)>l)return void window.clearInterval(d);i.val(u).trigger("change")};i=t(s).find(".knob.knob-0"),l=t(s).find(".knob.knob-0").val(),i.knob({min:0,max:100,displayInput:!1,bgColor:"rgba(0,0,0,0)",fgColor:"#C9CB00",width:320,height:320,dynamicDraw:!0}),i.val(0).trigger("change").delay(0),d=self.setInterval(function(){n()},10),u=0}()}else if(1==n){var d,u;!function(){var n=function(){if((u+=1)>r)return void window.clearInterval(d);o.val(u).trigger("change")};o=t(s).find(".knob.knob-1"),r=t(s).find(".knob.knob-1").val(),o.knob({min:0,max:100,displayInput:!1,fgColor:"#00A2A6",bgColor:"rgba(0,0,0,0)",width:200,height:200,thickness:.41,dynamicDraw:!0}),o.val(0).trigger("change").delay(0),d=self.setInterval(function(){n()},10),u=0}()}else if(2==n){var d,u;!function(){var n=function(){if((u+=1)>c)return void window.clearInterval(d);a.val(u).trigger("change")};a=t(s).find(".knob.knob-2"),c=t(s).find(".knob.knob-2").val(),a.knob({displayInput:!1,bgColor:"rgba(0,0,0,0)",fgColor:"#CC0B3C",min:0,max:100,width:110,height:110,thickness:.7,dynamicDraw:!0}),a.val(0).trigger("change").delay(0),d=self.setInterval(function(){n()},10),u=0}()}})})}var i=t(".navbar");t(window).scroll(function(){t(window).scrollTop()>=100?i.addClass("scroll_menu"):i.removeClass("scroll_menu")}),t(".commentlist li").addClass("panel panel-default"),t(".comment-reply-link").addClass("btn btn-default"),t(".panel-heading").click(function(n){t(this).toggleClass("active")}),t("select, input[type=text], input[type=email], input[type=password], textarea").addClass("form-control"),t("input[type=submit]").addClass("btn btn-primary"),t(".side-menu .nav-collapse").hasClass("collapsed")&&t("body").addClass("open-menu"),t(".navbar-side-btn").on("click",function(n){n.preventDefault(),n.stopPropagation(),t("body").toggleClass("open-menu"),t(".side-menu .nav-collapse").toggleClass("collapsed")});var o=t(".dummy-drop select");o&&o.on("change",function(n){n.preventDefault();var e=t(this).val();t("#gatewayForm input.value_gateway").val(e)});var a=document.location.toString();a.match("#")&&t('.nav-tabs a[href="#'+a.split("#")[1]+'"]').tab("show"),t(".page-template-donation-tpl .nav-tabs a").on("shown.bs.tab",function(t){window.location.hash=t.target.hash}),t(window).width()<=760&&(setTimeout(function(){t("ul.items-photos").slick({slidesToShow:1,slidesToScroll:1,infinite:!1})},600),t(".page-template-about-tpl .nav-tabs li").on("click",function(n){t("ul.items-photos .slick-next ").trigger("click")})),t("body.page-template-home-tpl #impact-value-container .impact-items .item .text-body p strong").counterUp({delay:10,time:1e3}),t("body.page-template-home-tpl #impact-value-container .impact-items .item .text-body p b").counterUp({delay:10,time:1e3});var s=t(".cd-timeline-block");!function(n,e){n.each(function(){t(this).offset().top>t(window).scrollTop()+t(window).height()*e&&t(this).find(".cd-timeline-img, .cd-timeline-content").addClass("is-hidden")})}(s,.8),t(window).on("scroll",function(){window.requestAnimationFrame?window.requestAnimationFrame(function(){n(s,.8)}):setTimeout(function(){n(s,.8)},100)});var l=t(".gestion .nav-tabs li"),r=t(".gestion .tab-content .tab-pane");l.each(function(n,i){t(this).on("click",function(t){t.preventDefault(),e(r)}),0==n&&(t(this).addClass("active"),e(r))}),r.each(function(n,e){var i=t(this);0==n&&(i.addClass("active"),i.removeClass("fade")),i.find(".text-item").wrapAll('<div class="col-md-3 col-md-push-2 text-info"></div>'),i.find(".kn-cont").wrapAll('<div class="col-md-4 col-md-push-2 graph-info"></div>')});var c=t(".items-ano li, #history-slider-mobile li");c.each(function(n,e){var i=t(this);0==n&&i.addClass("active"),i.on("click",function(t){t.preventDefault(),c.removeClass("active"),i.addClass("active")})});var d=t("#history-slider");t("#history-slider li");d.slick({dots:!0,slidesToShow:1,slidesToScroll:1,customPaging:function(n,e){var i=t(n.$slides[e]).data("date");t(n.$slides[e]).data("text");return'<div class="history-item"><h3>'+i+"</h3><i></i><h5>"+i+"</h5></div>"},infinite:!0}),t("#partners-container .impact-items").slick({dots:!0,slidesToShow:6,slidesToScroll:6,speed:2500,infinite:!0,autoplay:!0,autoplaySpeed:2500,responsive:[{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2,dots:!1}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1,dots:!1}}]});var u=t("body.page-template-what-we-do-tpl.page-id-236 .gestion #cd-gestion .tab-content #menu3"),p=t("body.page-template-what-we-do-tpl.page-id-736 .gestion #cd-gestion .tab-content #menu3");u.prepend("<h4>EN EL AÑO 2015 FINALIZAMOS NUESTRA INTERVENCIÓN EN SOACHA.</h4>"),p.prepend("<h4>IN 2015, WE FINISHED OUR INTERVENTION IN SOACHA.</h4>"),(new WOW).init()})}(jQuery)},function(t,n){},function(t,n,e){e(0),t.exports=e(1)}]);