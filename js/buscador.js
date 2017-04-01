$(buscar_datos);
	function buscar_datos(consulta){
	$.ajax({
		url:'buscador_alumnos.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta,id:idmaestro},
	})
	.done(function(respuesta){
		$('#datos').html(respuesta);
	})
	.fail(function(){
		console.log("error");
	})
}
$(document).on('keyup','#buscador',function(){
	var valor=$(this).val();
		if(valor!=""){
			buscar_datos(valor);
		}
		else{
			buscar_datos();
		}
})