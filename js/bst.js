(function ($) {
	
	"use strict";

	$(document).ready(function() {

		// Comments
		$(".commentlist li").addClass("panel panel-default");
		$(".comment-reply-link").addClass("btn btn-default");
	
		// Forms
		$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
		$('input[type=submit]').addClass('btn btn-primary');
		
		// You can put your own code in here

		//Slick slider

		var heroSlider = $('#history-slider');

            heroSlider.slick({
                dots: true,
                slidesToShow: 1,
  				slidesToScroll: 1,
				customPaging: function(slider, i) { 
					var date = $(slider.$slides[i]).data('date'),
						text = $(slider.$slides[i]).data('text');
					return '<div class="history-item"><div class="text-cond"><p>'+ text +'</p><h3>' + date + '</h3></div><i></i><h5>' + date + '</h5></div>';
				},
                infinite:   true
            });

	});

}(jQuery));
