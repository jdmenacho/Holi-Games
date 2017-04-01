<?php

include_once('conexion.php');

//Validación formulario alumnos

function comprobarErroresUsuario($datos) {

     if (empty($datos["nombreUsuario"])) {
    return "Debes completar tu Usuario";
  }

    if (empty($datos["nombre"])) {
    return "Debes completar tu nombre";
  }

    if (empty($datos["apellidos"])) {
    return "Debes completar tus apellidos";
  }

  if(empty($datos['contrasena'])) {
    return "Debes introducir una contraseña.";
  }

  if(empty($datos['contrasena2'])) {
    return "Debe introducir una contraseña.";
  }

  if($datos['contrasena'] != $datos['contrasena2']){
    return "Las contraseñas no coinciden.";
  }

  //validación del código el formulario del alumno

  /*
  if(empty($datos['codigo'])) {
    return "Debes introducir el codigo.";
  }
  return false;
  */
}


function guardarUsuario($datos) {
  $consulta = consultaInsertUsuario($datos,"usuarios");
  return ejecutarConsulta($consulta);
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

function obtenerTodosLosAlumnos() {
  $consulta = "SELECT * FROM tipo_usuario INNER JOIN usuarios ON tipo_usuario.id = usuarios.id_tipo_usuario WHERE id_tipo_usuario = 3";
  $usuarios = hacerListado($consulta);
  return $usuarios;
}

function eliminarAlumnoPorId($id) {
    $consulta = "DELETE FROM usuarios WHERE id='$id'";
    $resultado = ejecutarConsulta($consulta);
    return $resultado;
  }
?>