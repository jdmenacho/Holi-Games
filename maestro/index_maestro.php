<?php
session_start();
include_once('../control_sesion.php');
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="maestro";
$tituloEncabezado="Zona del maestro";
$descripcionEncabezado="Desde aquí podrás gestionar toda la información relacionada con tus juegos, tus aulas y tus alumnos. <br/>Crea, modifica y elimina de la manera más fácil.";
	ob_start();
?>
<div class="container">
               <div class="row">
                <div class="col-sm-3 portfolio-item-maestro">
                    <a href="aulas_maestro.php">
                        <img src="../img/maestroaulas.png" class="img-responsive-maestro" alt="">
                    </a>
                </div>
                 <div class="col-sm-3 portfolio-item-maestro">
                    <a href="lista_alumnos_maestro.php?id=<?=$_SESSION['usuario']['id']?>">
                        <img src="../img/maestroalumnos.png" class="img-responsive-maestro" alt="">
                    </a>
                </div>
                <div class="col-sm-3 portfolio-item-maestro">
                    <a href="lista_juegos_maestro.php?id=<?=$_SESSION['usuario']['id']?>">
                        <img src="../img/maestrojuegos.png" class="img-responsive-maestro" alt=""
                        >
                    </a>
                </div>
                 <div class="col-sm-3 portfolio-item-maestro">
                    <a href="presentacion.php">
                        <img src="../img/maestropresentacion.png" class="img-responsive-maestro" alt="">
                    </a>
                </div>
             </div>
</div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>