<?php
session_start();
include_once('../funciones/aula_modelo.php');
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
$tituloEncabezado="Mis juegos";
$descripcionEncabezado="Desde aquí podrás acceder a todos tus juegos";
$aulas=obtenerListadoAulasPorIdUsuario($_SESSION['usuario']['id']);
	ob_start();
?>
<div class="container">
            <div class="row">
               <?php foreach ($aulas as $aulas):?>
                     <div class="col-sm-6 portfolio-item">
                            <h2 class="h2-aulas"><?=$aulas['nombre']?></h2>
                            <a href="juegos_alumno.php?id=$_SESSION['usuario']['id']&id_aula=<?=$aulas['id']?>">
                                <img src="../img/aulas.png" class="img-responsive" alt="">
                            </a>
                     </div>
                <?php endforeach;?>
            </div>
</div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>