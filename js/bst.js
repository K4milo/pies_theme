(function ($) {
	
	"use strict";

	$(document).ready(function() {

		// Comments
		$(".commentlist li").addClass("panel panel-default");
		$(".comment-reply-link").addClass("btn btn-default");
	
		// Forms
		$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
		$('input[type=submit]').addClass('btn btn-primary');
		
		// side menu
		if($('.side-menu .nav-collapse').hasClass('collapsed')){
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

		//Items timeline

		var timelineItem = $('.items-ano li');

			timelineItem.each(function(index, el) {
				var $this = $(this);

				if(index == 0){
					$this.addClass('active');	
				}
				
				$this.on('click',function(e){
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
					return '<div class="history-item"><div class="text-cond"><p>'+ text +'</p><h3>' + date + '</h3></div><i></i><h5>' + date + '</h5></div>';
				},
                infinite:   true
            });

        //Trigger slider;
        
        $('ul.items-photos').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3
        });

	});

}(jQuery));
