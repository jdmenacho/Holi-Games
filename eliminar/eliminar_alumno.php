<?php
include_once('../funciones/alumno_modelo.php');
?>
<?php
switch ($_SESSION['usuario']['id_tipo_usuario']) {
    case 1:
        $tipoNav="administrador";
        $direccion="../administrador/lista_alumnos.php";
        break;
    case 2:
        $tipoNav="maestro";
        $direccion="../maestro/lista_alumnos_maestro.php";
        break;
    case 3:
         $tipoNav="alumno";
           break;   
    default:
        $tipoNav="principal";
        break;
}
$tituloEncabezado="Eliminar alumno";
$descripcionEncabezado="Eliminar Alumno";
	ob_start();

if (!empty($_GET["id"])) {
    $resultado = eliminarAlumnoPorId($_GET["id"]);
    if ($resultado == true) {
      header("Location:" . $direccion);
    }
  } else {
    header("Location:" . $direccion);
  }

    if ($resultado == false):
  ?>
  <p class="alert alert-danger">No se ha encontrado ese usuario.</p>
  <?php
    endif;
  ?>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>