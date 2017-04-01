<?php	
	include_once('conexion.php');

	/*function obtenerListadoJuegosPorIdUsuario($usuario){
		$consulta="SELECT DISTINCT juegos.id,juegos.titulo,juegos.id_tipo_juego,tipo_juego.nombre FROM aulas_usuarios_juegos INNER JOIN juegos ON aulas_usuarios_juegos.id_juego=juegos.id  INNER JOIN tipo_juego ON tipo_juego.id=juegos.id_tipo_juego WHERE aulas_usuarios_juegos.id_usuario=$usuario";

		return hacerListado($consulta);
	}	*/
  function obtenerTodosLosJuegos() {
  $consulta = "SELECT * FROM tipo_juego INNER JOIN juegos ON tipo_juego.id = juegos.id_tipo_juego";
  $juegos = hacerListado($consulta);
  return $juegos;
}

	function obtenerNombreTipoJuego($tipo){
		$consulta="SELECT tipo_juego.nombre FROM tipo_juego WHERE id='$tipo'";
		$resultado=hacerListado($consulta);
		return $resultado[0];
	}
		function comprobarErroresRegistroJuego($datos) {

			    if (empty($datos["titulo"])) {
			    return "Debe introducir el titulo del juego";
			  }

			    if (empty($datos["descripcion"])) {
			    return "Debe completar la descripcion";
			  }
			      if($datos['id_tipo_juego']==="0"){
       					 return "Debes elegir un tipo de juego";
    				}

			  return false;
			}
		function guardarJuego($datos) {
			 	 $consulta = consultaInsertJuego($datos,"juegos");
			  	return ejecutarConsulta($consulta);
		}


	function consultaInsertJuego ($datos, $tabla) {
		  $indices = array_keys($datos);
		  $valores = array_values($datos);
		  $consulta = "INSERT INTO $tabla (" . implode(", " , $indices) . ") VALUES ('" . implode("' , '", $valores) . "')";
		  return $consulta;
		}

	function obtenerTodosLosTiposDeJuegos(){
		return hacerListado("SELECT * FROM tipo_juego");
	}

function obtenerJuegosAula($idAula){
      $consulta1="SELECT aulas_usuarios_juegos.id_juego FROM aulas_usuarios_juegos WHERE aulas_usuarios_juegos.id_aula='$idAula'";
      $cadena="";
      $resultado1=hacerListado($consulta1);

      $id_juegos = [];
        foreach ($resultado1 as $valores) {
          $id_juegos[] = $valores["id_juego"];
        }
        $cadena = implode(",", $id_juegos);
      	$consulta2="SELECT juegos.titulo,juegos.id AS id_juego,tipo_juego.nombre AS tipo FROM juegos INNER JOIN tipo_juego ON juegos.id_tipo_juego=tipo_juego.id WHERE juegos.id IN ($cadena)";
    	return hacerListado($consulta2);
  }
  function obtenerJuegoPorId($idJuego){
  	$consulta="SELECT juegos.titulo,juegos.descripcion,tipo_juego.nombre,tipo_juego.id FROM juegos INNER JOIN tipo_juego ON juegos.id_tipo_juego=tipo_juego.id WHERE juegos.id='$idJuego'";
  	return hacerListado($consulta);
  }

  function obtenerJuegosUsuario($idUsuario){
  		 //obtenemos todas las aulas que tiene el maestro
      $consulta1="SELECT aulas_usuarios_juegos.id_aula FROM aulas_usuarios_juegos WHERE id_usuario='$idUsuario'";
      $resultado1=hacerListado($consulta1);
        $id_aulas=array();
          foreach ($resultado1 as $valores) {
            $id_aulas[]=$valores['id_aula'];
          }
          $cadenaAulas=implode(",", $id_aulas);

         //obtenemos los juegos que estan en esas aulas
          $consulta2="SELECT aulas_usuarios_juegos.id_juego,juegos.titulo,tipo_juego.nombre AS tipo,aulas_usuarios_juegos.id_aula,aulas.nombre AS nombre_aula FROM aulas_usuarios_juegos INNER JOIN aulas ON aulas_usuarios_juegos.id_aula=aulas.id INNER JOIN juegos ON aulas_usuarios_juegos.id_juego=juegos.id  INNER JOIN tipo_juego ON tipo_juego.id=juegos.id_tipo_juego WHERE aulas_usuarios_juegos.id_aula IN ($cadenaAulas)";
          $resultado2=hacerListado($consulta2);	
          //filtramos y ordenamos los datos
                  $n=count($resultado2);
      //agrupamos las aulas para que no halla repeticion de datos
          for ($i=0; $i < $n; $i++) { 
                for ($j=$i+1; $j < $n; $j++) { 
                  if(!empty($resultado2[$i]) && !empty($resultado2[$j])){
                    if($resultado2[$i]['id_juego']==$resultado2[$j]['id_juego']){
      
                      if($resultado2[$i]['id_aula']!=$resultado2[$j]['id_aula']){
                      		$aulas=explode(",", $resultado2[$i]['nombre_aula']);
                      		$entrar=true;
                      		for($z=0;$z<count($aulas) && $entrar!=false;$z++){
                      				if($aulas[$z]==$resultado2[$j]['nombre_aula']){
                      					$entrar=false;
                      				}
                      		}
                      		if($entrar==true){
                        		$resultado2[$i]['nombre_aula'] .="," . $resultado2[$j]['nombre_aula'];
                        		$resultado2[$i]['id_aula'] .="," . $resultado2[$j]['id_aula'];
                        		}
                      }
                        unset($resultado2[$j]);
                    }
                  }
                }
          }
          	return $resultado2;
  }
  function obtenerSiguienteIdJuego(){
    $consulta="SELECT MAX(id) AS id FROM juegos";
    $resultado=hacerListado($consulta);
    return $resultado[0];
  }
  function insertarJuegoEnAulaYMaestro($id_aula,$id_maestro,$id_juego){
    $consulta="INSERT INTO aulas_usuarios_juegos (id_aula, id_usuario, id_juego) VALUES ($id_aula, $id_maestro, $id_juego)";
    return ejecutarConsulta($consulta);
  }
?>