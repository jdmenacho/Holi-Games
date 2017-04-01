<?php
session_start();
include_once('../funciones/aula_modelo.php');
$tituloPagina="Holi - Plataforma de juegos educativos";
switch ($_SESSION['usuario']['id_tipo_usuario']) {
    case 1:
        $tipoNav="administrador";
        $direccion="../administrador/lista_aula.php";
        break;
    case 2:
        $tipoNav="maestro";
        $direccion="../maestro/aulas_maestro.php";
        break;
    case 3:
         $tipoNav="alumno";
           break;   
    default:
        $tipoNav="principal";
        break;
}
$tituloEncabezado="Eliminar aula";
$descripcionEncabezado="Gestiona tus contenidos: Aulas-Alumnos-Juegos";
	ob_start();
?>

<?php

  if (!empty($_GET['id'])) {
    $resultado = eliminarAulaPorId($_GET['id']);
      if ($resultado == false) {
        $_SESSION["errorMsg"] = "<p class='alert alert-danger'>No se ha encontrado ese aula.</p>";
      }
      header("Location:" . $direccion);
  } 
    
?>
?>

<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>