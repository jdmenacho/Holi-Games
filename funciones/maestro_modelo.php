<?php

include_once('conexion.php');

//Validación formulario maestros

function comprobarErroresUsuario($datos) {

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

    if ($datos["modificar_contraseña"] == 1) {
      
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

function consultaInsertUsuario ($datos, $tabla) {
    unset($datos["enviar_registro"]);
    unset($datos["contrasena2"]);
  $datos["contrasena"] = cifrarContrasena($datos["contrasena"]);
  $indices = array_keys($datos);
  $valores = array_values($datos);

  $consulta = "INSERT INTO $tabla (" . implode(", " , $indices) . ") VALUES ('" . implode("' , '", $valores) . "')";
  return $consulta;
}

function cifrarContrasena($contrasena) {
  return sha1($contrasena);
}

function obtenerTodosLosMaestros() {
  $consulta = "SELECT * FROM tipo_usuario INNER JOIN usuarios ON tipo_usuario.id = usuarios.id_tipo_usuario WHERE id_tipo_usuario = 2";
  $usuarios = hacerListado($consulta);
  return $usuarios;
}

function eliminarMaestroPorId($id) {
    $consulta = "DELETE FROM usuarios WHERE id='$id'";
    $resultado = ejecutarConsulta($consulta);
    return $resultado;
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

function editarUsuario($datos, $tabla) {
  $consulta = consultaUpdate($_POST, $tabla);
  return ejecutarConsulta($consulta);
}

?>