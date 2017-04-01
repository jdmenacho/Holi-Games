document.getElementById('opcionsi').addEventListener('click', mostrarCampoContrasena);
document.getElementById('opcionno').addEventListener('click', mostrarCampoContrasena);

		var divContrasena=document.getElementById('divContrasena');
		var divVerificacionContrasena=document.getElementById('divVerificacionContrasena');

		var labelContrasena=document.createElement('label');
		var labelVerificacionContrasena=document.createElement('label');

		var campoContrasena=document.createElement('input');
		var campoVerificacionContrasena=document.createElement('input');

	function mostrarCampoContrasena(){


		if(this.value==1){		


			labelContrasena.innerHTML="Contraseña";
			labelVerificacionContrasena.innerHTML="Verifique su contraseña";

			
			campoContrasena.setAttribute("type", "password");
			campoContrasena.setAttribute("name", "contrasena");
			campoContrasena.setAttribute("class", "form-control");
			campoContrasena.setAttribute("id", "pass");
			campoContrasena.setAttribute("placeholder", "Escriba su contraseña");
			campoContrasena.setAttribute("required", "true");

			campoVerificacionContrasena.setAttribute("type", "password");
			campoVerificacionContrasena.setAttribute("name", "contrasena2");
			campoVerificacionContrasena.setAttribute("class", "form-control");
			campoVerificacionContrasena.setAttribute("id", "passVerification");
			campoVerificacionContrasena.setAttribute("placeholder", "Verifique su contraseña");
			campoVerificacionContrasena.setAttribute("required","true");

			divContrasena.appendChild(labelContrasena);
			divContrasena.appendChild(campoContrasena);
			divVerificacionContrasena.appendChild(labelVerificacionContrasena);
			divVerificacionContrasena.appendChild(campoVerificacionContrasena);
		}

		else

		{
			
			labelContrasena.parentNode.removeChild(labelContrasena);
			labelVerificacionContrasena.parentNode.removeChild(labelVerificacionContrasena);
			campoContrasena.parentNode.removeChild(campoContrasena);
			campoVerificacionContrasena.parentNode.removeChild(campoVerificacionContrasena);
		}
	}