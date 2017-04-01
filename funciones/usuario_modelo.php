<?php
	include_once('conexion.php');
  include_once('aula_modelo.php');



function modificarNumeroAulas($numAulas,$idUsuario){
    $consulta="UPDATE usuarios SET numero_aulas=$numAulas WHERE id=$idUsuario";
    return ejecutarConsulta($consulta); 
}
function comprobarUsuario($nombre_usuario, $contrasena) {
  $consulta = "SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario' AND contrasena='$contrasena'";
  $listado = hacerListado($consulta);
  if (count($listado) == 0) {
    return false;
  } else {
    return $listado[0];
  }

  return $listado;
}

	function comprobarErroresRegistroUsuario($datos) {

    if (empty($datos["nombre_usuario"])) {
    return "Debes completar el campo Usuario";
  }

    if (empty($datos["nombre"])) {
    return "Debe completar el nombre";
  }

    if (empty($datos["apellidos"])) {
    return "Debe completar los apellidos";
  }

      
    if(empty($datos['contrasena'])) {
        return "Debe introducir una contraseña.";
  }

    if(empty($datos['verificacionContrasena'])) {
        return "Debe introducir una contraseña.";
  }

    if($datos['contrasena'] != $datos['verificacionContrasena']) {
        return "Las contraseñas no coinciden.";
  }
    if($datos['id_tipo_usuario']==="0"){
        return "Debes elegir un tipo de usuario";
    }
        if($datos['id_tipo_usuario']==="3"){
          if(empty($datos['codigoAula'])){
              return "Debes introducir un codigo de aula";
      }
        if(obtenerAulaPorCodigo($datos['codigoAula'])==false || obtenerAulaPorCodigo($datos['codigoAula'])==0){
            return "El codigo de aula no es correcto";
        }
    }

  return false;
}

	function guardarUsuario($datos) {
      if($datos['id_tipo_usuario']=='3'){
          echo "entra por tanto es 3";
          $resultado=hacerListado("SELECT MAX(id) AS ultimo FROM usuarios");
          $id_usuario=$resultado[0]['ultimo']+1;
          $idAula=obtenerAulaPorCodigo($datos['codigoAula']);
          unset($datos['codigoAula']);
          $insertar="INSERT INTO aulas_usuarios_juegos (id_aula,id_usuario,id_juego) VALUES ('" . $idAula['id_aula'] . "','" . $id_usuario . "','0')";
          $resultadoInsertar=ejecutarConsulta($insertar);
          if($resultadoInsertar!=true)
          {
            return false;
          }
      }

	  $consulta = consultaInsertUsuario($datos,"usuarios");
	  return ejecutarConsulta($consulta);
	}

	function obtenerUsuarioPorId($id) {
  $consulta = "SELECT * FROM usuarios WHERE id='$id'";
  $usuarios = hacerListado($consulta);
  if (count($usuarios) <= 0) {
    return false;
  } else {
    return $usuarios[0];
  }
}

function consultaInsertUsuario ($datos, $tabla) {
  $datos["contrasena"] = cifrarContrasena($datos["contrasena"]);

  $indices = array_keys($datos);
  $valores = array_values($datos);
  $consulta = "INSERT INTO $tabla (" . implode(", " , $indices) . ") VALUES ('" . implode("' , '", $valores) . "')";
  return $consulta;
}

function cifrarContrasena($contrasena) {
  return sha1($contrasena);
}

function obtenerTodosLosUsuarios() {
  $consulta = "SELECT * FROM tipo_usuarios INNER JOIN usuarios ON tipo_usuarios.id = usuarios.id_tipo_usuario";
  $usuarios = hacerListado($consulta);
  return $usuarios;
}

function eliminarUsuarioPorId($id) {
    $consulta = "DELETE FROM usuarios WHERE id='$id'";
    $resultado = ejecutarConsulta($consulta);
    return $resultado;
  }

  function obtenerAlumnosAula($idAula){
      $consulta1="SELECT aulas_usuarios_juegos.id_usuario FROM aulas_usuarios_juegos WHERE aulas_usuarios_juegos.id_aula='$idAula'";
      $cadena="";
      $resultado1=hacerListado($consulta1);

      $id_usuarios = [];
        foreach ($resultado1 as $valores) {
          $id_usuarios[] = $valores["id_usuario"];
        }
        $cadena = implode(",", $id_usuarios);
      $consulta2="SELECT usuarios.nombre,usuarios.apellidos,usuarios.id FROM usuarios WHERE id_tipo_usuario='3' AND id IN ($cadena)";
    return hacerListado($consulta2);
  }
  function obtenerAlumnosMestro($idMaestro){
      //obtenemos todas las aulas que tiene el maestro
      $consulta1="SELECT aulas_usuarios_juegos.id_aula FROM aulas_usuarios_juegos WHERE id_usuario='$idMaestro'";
      $resultado1=hacerListado($consulta1);
        $id_aulas=array();
          foreach ($resultado1 as $valores) {
            $id_aulas[]=$valores['id_aula'];
          }
          $cadenaAulas=implode(",", $id_aulas);
      //buscamos todos los alumnos de esas aulas
      $consulta2="SELECT aulas_usuarios_juegos.id_usuario,usuarios.nombre AS nombre_usuario,usuarios.apellidos,aulas_usuarios_juegos.id_aula,aulas.nombre AS nombre_aula FROM aulas_usuarios_juegos INNER JOIN usuarios ON aulas_usuarios_juegos.id_usuario=usuarios.id INNER JOIN aulas ON aulas_usuarios_juegos.id_aula=aulas.id WHERE id_aula IN($cadenaAulas)";
        $resultado2=hacerListado($consulta2);
        $n=count($resultado2);
      //agrupamos las aulas para que no halla repeticion de datos
          for ($i=0; $i < $n; $i++) { 
                for ($j=$i+1; $j < $n; $j++) { 
                  if(!empty($resultado2[$i]) && !empty($resultado2[$j])){
                    if($resultado2[$i]['id_usuario']==$resultado2[$j]['id_usuario']){
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
                    elseif ($resultado2[$i]['id_usuario']==$idMaestro) {
                        unset($resultado2[$i]);
                    }
                  }
                }
          }
        return $resultado2;
  }
  function comprobarErroresEditarUsuario($datos) {

    if (empty($datos["nombre_usuario"])) {
    return "Debes completar tu Usuario";
  }

    if (empty($datos["nombre"])) {
    return "Debe completar el nombre";
  }

    if (empty($datos["apellidos"])) {
    return "Debe completar los apellidos";
  }

    if (empty($datos["email"])) {
    return "Debe proporcionar una dirección e-mail.";
  }

    if ($datos["modificar_contrasena"] == 1) {
      
      if(empty($datos['contrasena'])) {
        return "Debe introducir una contraseña.";
      }

      if(empty($datos['contrasena2'])) {
        return "Debe introducir una contraseña.";
      }

      if($datos['contrasena'] != $datos['contrasena2']){
        return "Las contraseñas no coinciden.";
      }
    }

  return false;
}
  function editarUsuario($datos) {
    $consulta = consultaUpdate($_POST, "usuarios");
    return ejecutarConsulta($consulta);
  }
?>