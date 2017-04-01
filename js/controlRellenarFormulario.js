$(function(){
	var error;
	$('#formulario-registro').find("input,select").blur(function (){
		var mensajeCampo=mensajeErrorMostrar($(this).prop('id'));
		error=false;
				if(($(this).val().length<1 && !$(this).parent().hasClass('has-error has-feedback') || error==true)){
					if($(this).parent().hasClass('has-success has-feedback')==true)
			{
				$(this).parent().removeClass('has-success has-feedback');
				$('.acierto').remove()
			}
			$(this).parent().addClass('has-error has-feedback');
			$(this).after("<p class='text-danger fallo'>Debe introducir" + mensajeCampo + "</p>");
			$(this).after("<span class='sr-only fallo'></span>");
			$(this).after("<span class='glyphicon glyphicon-remove form-control-feedback fallo' aria-hidden='true'></span>");
		}
		else if($(this).val().length>0){
			$('#botonRegistro').prop('disabled',false);
			if($(this).parent().hasClass('has-error has-feedback')==true)
			{
				$(this).parent().removeClass('has-error has-feedback');
				$('.fallo').remove()
			}
			$(this).parent().addClass('has-success has-feedback');
			$(this).after("<span class='sr-only acierto'></span>");
			$(this).after("<span class='glyphicon glyphicon-ok form-control-feedback acierto' aria-hidden='true'></span>");
		}
		//controlar todos los campos antes de enviar.....esta pendiente porque puede que hallas campos que no cogan el foco.
	});
	function verificarContrasena(){
		if($('#verificacionContrasena').val()===$('#contrasena').val()){
			return true;
		}
		else
		{
			return false;
		}
	}
	$('#botonRegistro').click(function(evento){
		evento.preventDefault();
		var $camposVacios=new Array();
		var $camposFormulario=$('#formulario-registro').find("input,select");
			console.log("entra");
			for(var i=0;i< $camposFormulario.length;i++){
					if($($camposFormulario[i]).val().length < 1){
						$camposVacios.push($($camposFormulario[i]).prop('id'));
					}
			}
			console.log($camposVacios[1]);
			alertarErroresCampos($camposVacios);
	});
	function alertarErroresCampos($camposVacios){
		var mensajeCampo;
		for(var i=0;i<$camposVacios.length;i++){
			 mensajeCampo=mensajeErrorMostrar(camposVacios[i]);
			if(!$(this).parent().hasClass('has-error has-feedback')){
				$($camposVacios[i]).parent().addClass('has-error has-feedback');
				$($camposVacios[i]).after("<p class='text-danger fallo'>Debe introducir " + mensajeCampo + "</p>");
				$($camposVacios[i]).after("<span class='sr-only fallo'></span>");
				$($camposVacios[i]).after("<span class='glyphicon glyphicon-remove form-control-feedback fallo' aria-hidden='true'></span>");
			}
		}
	}
	function mensajeErrorMostrar(id){
				var mensajeCampo;
				switch(id){
			case 'nombre':
				mensajeCampo=" el nombre";
				break;
			case 'apellidos':
				mensajeCampo=" los apellidos";
				break;
			case 'nombreUsuario':
				mensajeCampo=" el nombre de usuario";
				break;
			case 'contrasena':
				mensajeCampo=" la contraseña";
				break;
			case 'verificacionContrasena':	
				mensajeCampo=" la verificacion de contraseña";
				if(verificarContrasena()==false){
					mensajeCampo=" unas contraseñas que coincidan";
					error=true;
				}
				break;
			case 'tipoUsuario':
				if($(this).val()==0){
				mensajeCampo=" un tipo de usuario";
				error=true;
			}
				break;
			default:
				mensajeCampo=" el campo";
				break;	

		}
		return mensajeCampo;
	}
});