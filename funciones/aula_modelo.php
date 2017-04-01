<?php
	include_once('conexion.php');
	
		function comprobarErroresRegistroAula($datos) {

			    if (empty($datos["nombre"])) {
			    return "Debe introducir el nombre del aula";
			  }

			    if (empty($datos["descripcion"])) {
			    return "Debe completar la descripcion";
			  }

			      
			    if(empty($datos['temario'])) {
			        return "Debe introducir un tema.";
			  }

			  return false;
			}


	function guardarAula($datos) {
		  $consulta = consultaInsertAula($datos,"aulas");
		  print_r($consulta);
		  return ejecutarConsulta($consulta);
		}


	function consultaInsertAula ($datos, $tabla) {
		  $indices = array_keys($datos);
		  $valores = array_values($datos);
		  $consulta = "INSERT INTO $tabla (" . implode(", " , $indices) . ") VALUES ('" . implode("' , '", $valores) . "')";
		  return $consulta;
		}
	function obtenerListadoAulasPorIdUsuario($usuario){
		$consulta="SELECT aulas.id,aulas.nombre,aulas.descripcion FROM aulas_usuarios_juegos INNER JOIN aulas ON aulas_usuarios_juegos.id_aula=aulas.id WHERE aulas_usuarios_juegos.id_usuario='$usuario'";
		return hacerListado($consulta);
	}	
	function obtenerAulaPorId($idAula){
			$consulta="SELECT * FROM aulas WHERE id=$idAula";
			return hacerListado($consulta);
	}
	function obtenerTodasLasAulas() {
	  $consulta = "SELECT * FROM aulas";
	  $aulas = hacerListado($consulta);
	  return $aulas;
	}
	function eliminarAulaPorId($id) {
	$consulta = "DELETE FROM aulas WHERE id = '$id'";
	$aulas = ejecutarConsulta($consulta);
	return $aulas;
}

function comprobarErroresEditarAula($datos) {

    if (empty($datos["nombre"])) {

    return "Debes indicar un nombre";
  }

    if (empty($datos["descripcion"])) {
    return "Debe añadir una descripción";
  }

    if (empty($datos["temario"])) {
    return "Debe indicar el tipo del aula";
  }

  return false;
}

function actualizarAula($datos) {
	$consulta = consultaUpdate($datos, "aulas");
	return ejecutarConsulta($consulta);
}
function obtenerAulaPorCodigo($codigo){
	$consulta="SELECT id AS id_aula FROM aulas WHERE codigo='$codigo'";
	$resultado=hacerListado($consulta);
	return $resultado[0];
}
?>