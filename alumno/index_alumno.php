<?php
session_start();
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="alumno";
$tituloEncabezado="Zona del alumno";
$descripcionEncabezado="Desde aquí podrás gestionar toda la información referente a tus juegos y ver tu ranking de puntuaciones";
	ob_start();
?>
<div class="container">
               <div class="row">
                <div class="col-sm-4 col-sm-offset-2">
                    <a href="juegos_alumno.php?id='<?=$_SESSION['usuario']['id']?>'">
                        <img src="../img/maestrojuegos.png" class="img-responsive alt="">
                    </a>
                </div>
                 <div class="col-sm-4">
                    <a href="aulas_alumno.php?id='<?=$_SESSION['usuario']['id']?>'">
                       <img src="../img/maestroaulas.png" class="img-responsive alt="">
                    </a>
                </div>
             </div>
</div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>