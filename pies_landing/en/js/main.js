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


		//validaciones jquery

		$('#formGateway').validate({
			rules: {
				nombre: {
					lettersonly: true,
					required: true
				},
				apellido: {
					lettersonly: true,
					required: true
				},
				fecha_nacimiento: {
					required: true
				},
				direccion: {
					required: true
				},
				ciudad: {
					required: true
				},
				departamento: {
					required: true
				},
				accept: {
					required: true
				},
				correo: {
					required: true,
					email:true
				},
				celular: {
					number: true,
					required: true,
					maxlength: 10
				},
				numero_documento: {
					number: true,
					required: true
				},
				numero_tarjeta: {
					number: true,
					required: true
				},
				verificacion_tarjeta: {
					number: true,
					required: true
				},
				titular_tarjeta: {
					lettersonly: true,
					required: true
				},
				otro_valor: {
					number: true
				}
			},
			messages:{
				accept:{
					required: "You must accept the terms and conditions before proceed"
				}
			}
		});

		$.validator.addMethod("lettersonly", function(value, element) {
		  return this.optional(element) || /^[a-z-´ ]+$/i.test(value);
		}, "Only alphabetic characters");

})(jQuery)
