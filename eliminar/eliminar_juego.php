<?php
include_once('../funciones/juegos_modelo.php');
?>
<?php
$tituloPagina="Holi - Plataforma de juegos educativos";
switch ($_SESSION['usuario']['id_tipo_usuario']) {
    case 1:
        $tipoNav="administrador";
        $direccion="../administrador/lista_juegos.php";
        break;
    case 2:
        $tipoNav="maestro";
        $direccion="../maestro/lista_juegos_maestro.php";
        break;
    case 3:
         $tipoNav="alumno";
           break;   
    default:
        $tipoNav="principal";
        break;
}
$tituloEncabezado="Eliminar Juego";
$descripcionEncabezado="Eliminar juegos";
	ob_start();
?>

<?php

  if (!empty($_GET['id'])) {
    $resultado = eliminarJuegoPorId($_GET['id']);
      if ($resultado == false) {
        $_SESSION["errorMsg"] = "<p class='alert alert-danger'>No se ha encontrado ese usuario.</p>";
      }
      header("Location:" . $direccion);
  } 
    
?>


<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("/holigames/master.php");
?>