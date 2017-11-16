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
					required: "Debe estar de acuerdo con los términos y condiciones"
				}
			}
		});

		$.validator.addMethod("lettersonly", function(value, element) {
		  return this.optional(element) || /^[a-z-´ ]+$/i.test(value);
		}, "Sólo puede ingresar caracteres alfabéticos");

		$.extend( $.validator.messages, {
			required: "Este campo es obligatorio.",
			remote: "Por favor, rellena este campo.",
			email: "Por favor, escriba una dirección de correo válida.",
			url: "Por favor, escriba una URL válida.",
			date: "Por favor, escriba una fecha válida.",
			dateISO: "Por favor, escribe una fecha (ISO) válida.",
			number: "Por favor, escribe un número válido.",
			digits: "Sólo puede ingresar caracteres alfabéticos",
			creditcard: "Por favor, escriba un número de tarjeta válido.",
			equalTo: "Por favor, escriba el mismo valor de nuevo.",
			extension: "Por favor, escribe un valor con una extensión aceptada.",
			maxlength: $.validator.format( "Por favor, no escriba más de {0} caracteres." ),
			minlength: $.validator.format( "Por favor, no escriba menos de {0} caracteres." ),
			rangelength: $.validator.format( "Por favor, escriba entre {0} y {1} caracteres." ),
			range: $.validator.format( "Por favor, escribe un valor entre {0} y {1}." ),
			max: $.validator.format( "Por favor, escribe un valor menor o igual a {0}." ),
			min: $.validator.format( "Por favor, escribe un valor mayor o igual a {0}." )
		} );

})(jQuery)
