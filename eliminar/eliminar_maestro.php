<?php
include_once('../funciones/maestro_modelo.php');
?>
<?php
$tituloPagina="Holi - Plataforma de juegos educativos";
switch ($_SESSION['usuario']['id_tipo_usuario']) {
    case 1:
        $tipoNav="administrador";
        $direccion="../administrador/lista_maestros.php";
        break;
    case 2:
        $tipoNav="maestro";
        $direccion="../index.html";
        break;
    case 3:
         $tipoNav="alumno";
           break;   
    default:
        $tipoNav="principal";
        break;
}
$tituloEncabezado="Eliminar Maestro";
$descripcionEncabezado="Eliminar Maestro";
	ob_start();

if (!empty($_GET["id"])) {
    $resultado = eliminarMaestroPorId($_GET["id"]);
    if ($resultado == true) {
      header("Location:" . $direccion);
    }
  } else {
    header("Location:" . $direccion);
  }

?>
<?php
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