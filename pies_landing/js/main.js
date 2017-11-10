(function($){

	// evento de ckecked para labels

	var theCheck = $('input[type="radio"]');

		theCheck.each(function(index, el) {
			var thisCheck = $(this),
				parentRadio = thisCheck.parent().parent().find('input[type="radio"]');

			thisCheck.on('change', function(event) {
				//event.preventDefault();
				var $this = $(this);

					if ($this.is(':checked') && $this.hasClass('other')) {
						console.log('true');
						$('.other-value').show(300);
					} else {
						$('.other-value').hide(300);
					}

					parentRadio.next('label').removeClass('active');

					if ($this.is(':checked')){
						$this.next('label').addClass('active');
					}
			});
		});

})(jQuery)
