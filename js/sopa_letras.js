$(function() {

	var coordenadasPrimerClick;
	var coordenadasSegundoClick;
	var contador = 0;
	var numeroPalabras = palabras.length;
	console.log(numeroPalabras);
	var contadorAciertos=0;
	$('.casilla').on('click', colorearLetra);

	function colorearLetra(evento) {

		if ($(this).hasClass('casillaselected')) {
			contador = 0;
			$(this).removeClass('casillaselected');
		} else {
			contador ++;
			$(this).addClass('casillaselected');

			if (contador == 1) {
				coordenadasPrimerClick = $(this).attr('id').split("");
			} else {
				contador = 0;
				coordenadasSegundoClick = $(this).attr('id').split("");



	// DESPINTAR SELECCIÓN EN DIAGONAL

	if ((coordenadasPrimerClick[0] != coordenadasSegundoClick[0]) && (coordenadasPrimerClick[1] != coordenadasSegundoClick[1])) {
			$("#" + coordenadasPrimerClick[0] + coordenadasPrimerClick[1]).removeClass('casillaselected');
			$("#" + coordenadasSegundoClick[0] + coordenadasSegundoClick[1]).removeClass('casillaselected');

		} else {
			
				//HORIZONTAL DERECHO & HORIZONTAL IZQUIERDO

			if (coordenadasPrimerClick[0] == coordenadasSegundoClick[0]) {

				var mayor = Math.max(coordenadasPrimerClick[1], coordenadasSegundoClick[1]);
				var menor = Math.min(coordenadasPrimerClick[1], coordenadasSegundoClick[1]);

				//HORIZONTAL DERECHO:

					var cadena = "";
					if (coordenadasPrimerClick[1] < coordenadasSegundoClick[1]) {

						for (var j = parseInt(menor); j <= parseInt(mayor); j++) {
							$("#" + coordenadasPrimerClick[0] + j).addClass('palabraselected');
							cadena += $("#" + coordenadasPrimerClick[0] + j).text();
						} 
						
						var palabraCorrecta = false;
						var posicion = 0;

						for (var i = 0; i < palabras.length; i++) {				
							if (palabras[i] == cadena) {
								palabraCorrecta = true;
								posicion = i;
							} 
						} 

						if (palabraCorrecta == true) {
							for (var j = parseInt(menor); j <= parseInt(mayor); j++) {
								$("#" + coordenadasPrimerClick[0] + j).addClass('palabraacertada');
								tacharAciertos("#" + coordenadasPrimerClick[0] + j, posicion);	
							} 
							contadorAciertos++;
			
						} else {
							setTimeout(function() {
							for (var j = parseInt(menor); j <= parseInt(mayor); j++) {
									$("#" + coordenadasPrimerClick[0] + j).removeClass('casillaselected');
									$("#" + coordenadasPrimerClick[0] + j).removeClass('palabraselected');							
								} 
							}, 500);
						}

				//HORIZONTAL IZQUIERDO:

					} else {

							for (var j = parseInt(mayor); j >= parseInt(menor); j--) {
									$("#" + coordenadasPrimerClick[0] + j).addClass('palabraselected');
									cadena += $("#" + coordenadasPrimerClick[0] + j).text();
									

							var palabraCorrecta = false;

							for (var i = 0; i < palabras.length; i++) {				
								if (palabras[i] == cadena) {
									palabraCorrecta = true;
									posicion = i;
								} 
							} 

							if (palabraCorrecta == true) {
								for (var j = parseInt(menor); j <= parseInt(mayor); j++) {
									$("#" + coordenadasPrimerClick[0] + j).addClass('palabraacertada');	
									tacharAciertos("#" + coordenadasPrimerClick[0] + j, posicion);
								} 
								contadorAciertos++;

							} else {
								setTimeout(function() {
								for (var j = parseInt(menor); j <= parseInt(mayor); j++) {
										$("#" + coordenadasPrimerClick[0] + j).removeClass('casillaselected');
										$("#" + coordenadasPrimerClick[0] + j).removeClass('palabraselected');							
									} 
								}, 500);
								
										}

									}

								}

				// VERTICAL ARRIBA Y ABAJO

			} else {

				var mayor = Math.max(coordenadasPrimerClick[0], coordenadasSegundoClick[0]);
				var menor = Math.min(coordenadasPrimerClick[0], coordenadasSegundoClick[0]);


				//VERTICAL ABAJO:

				var cadena = "";
				
				if (coordenadasPrimerClick[0] < coordenadasSegundoClick[0]) {

					for (var i = parseInt(menor); i <= parseInt(mayor); i++) {
						$("#" + i + coordenadasPrimerClick[1]).addClass('palabraselected');
						cadena += $("#" + i + coordenadasPrimerClick[1]).text();
					} 
					
					var palabraCorrecta = false;

					for (var z = 0; z < palabras.length; z++) {				
						if (palabras[z] == cadena) {
							palabraCorrecta = true;
							posicion = z;
						} 
					} 

					if (palabraCorrecta == true) {
						for (var i = parseInt(menor); i <= parseInt(mayor); i++) {
							$("#" + i + coordenadasPrimerClick[1]).addClass('palabraacertada');	
							tacharAciertos("#" + i + coordenadasPrimerClick[1], posicion);
						}
						contadorAciertos++; 

						} else {
							setTimeout(function() {
							for (var i = parseInt(menor); i <= parseInt(mayor); i++) {
									$("#" + i + coordenadasPrimerClick[1]).removeClass('casillaselected');
									$("#" + i + coordenadasPrimerClick[1]).removeClass('palabraselected');							
								} 
							}, 500);
						}

					//VERTICAL ARRIBA:

				} else {
					
					for (var i = parseInt(mayor); i >= parseInt(menor); i--) {
							$("#" + i + coordenadasPrimerClick[1]).addClass('palabraselected');
							cadena += $("#" + i + coordenadasPrimerClick[1]).text();
					}		
					
					var palabraCorrecta = false;

					for (var z = 0; z < palabras.length; z++) {

						if (palabras[z] == cadena) {
							palabraCorrecta = true;
							posicion = z;
						} 
					} 

					if (palabraCorrecta == true) {
						for (var i = parseInt(menor); i <= parseInt(mayor); i++) {
							$("#" + i + coordenadasPrimerClick[1]).addClass('palabraacertada');
							tacharAciertos("#" + i + coordenadasPrimerClick[1], posicion);
								
						}
						contadorAciertos++; 

					} else {
						setTimeout(function() {
						for (var i = parseInt(menor); i <= parseInt(mayor); i++) {
								$("#" + i + coordenadasPrimerClick[1]).removeClass('casillaselected');
								$("#" + i + coordenadasPrimerClick[1]).removeClass('palabraselected');							
							} 
						}, 500);
						
					}										

					}

					} //else grande

		}


	}




		}
				if(contadorAciertos == numeroPalabras){
							alert("¡ENHORABUENA, HAS TERMINADO!");
					if(confirm("¿Quieres intentarlo otra vez?")){
							location.reload();
							
							
					}
					else{
						window.history.go(-4);
					}
			}

		

};




//FIN FUNCIÓN COLOREAR LETRAS

	function tacharAciertos(id, posicion) {

		if ($(id).hasClass('palabraacertada')) { 
			($('#' + posicion).addClass('palabratachada'));
				
		}
	};
			
});