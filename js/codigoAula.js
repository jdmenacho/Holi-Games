$(function(){
	mostrarCampo();
		$("#id_tipo_usuario").change(mostrarCampo);

		function mostrarCampo(){
			if($("#id_tipo_usuario").val()=="3"){

				$("#codigoAula").attr("required","true");
				$("#divCodigoAula").show();
			}
			else{
				$("#codigoAula").removeAttr("required","true");
				$("#divCodigoAula").hide();
			}
		}
});