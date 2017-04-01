<?php
session_start();
include_once('../funciones/juego_modelo.php');
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
$tituloEncabezado="Juegos";
$descripcionEncabezado="Desde aquí podrás acceder a todos tus juegos";
    if(!empty($_GET['id_aula'])){
            $juegos=obtenerJuegosAula(($_GET['id_aula']));
        }else{
            $juegos=obtenerJuegosUsuario($_SESSION['usuario']['id']);
        }
	ob_start();
?>
<div class="container">
               <div class="row">
               <?php foreach ($juegos as $juegos):?>
                <div class="col-sm-6 portfolio-item">
                    <h2 class="h2-aulas"><?=$juegos['tipo'] . " " . $juegos['titulo']?></h2>
                    <a href="../ver/ver_juego.php?id=<?=$juegos['id_juego']?>&alumno=true">
                        <img src="../img/juegos.png" class="img-responsive" alt="">
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