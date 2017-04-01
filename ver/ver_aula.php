<?php
session_start();
include_once('../funciones/aula_modelo.php');
?>
<?php
$tituloPagina="Holi - Plataforma de juegos educativos";
switch ($_SESSION['usuario']['id_tipo_usuario']) {
    case 1:
        $tipoNav="administrador";
        break;
    case 2:
        $tipoNav="maestro";
        break;
    case 3:
         $tipoNav="alumno";
           break;   
    default:
        $tipoNav="principal";
        break;
}
$tituloEncabezado="Datos del aula";
$descripcionEncabezado="Información de tu aula, tema y descripción";
	ob_start();

$aulas = obtenerAulaPorId($_GET['id']);

?>

<div class="container">
   <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <ul class="list-group">
            <li class="list-group-item list-group-item-info titulo_aula"><strong><?= $aulas[0]["nombre"] ?></strong></li>
            <li class="list-group-item"><strong>Temario: </strong><?=$aulas[0]["temario"]?></li>
            <li class="list-group-item"><strong>Descripción del aula:</strong> <?=$aulas[0]["descripcion"]?></li>
          </ul>
      </div>
   </div>
</div>

<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>