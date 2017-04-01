<?php
session_start();
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="administrador";
$tituloEncabezado="Zona de Administración";
$descripcionEncabezado="Gestiona desde aquí todos los juegos y usuarios: alumnos y maestros.";
	ob_start();
?>
    <div class="container">
            <div class="row">
                <div class="col-sm-3 portfolio-item">
                    <a href="lista_aulas.php">
                        <img src="../img/maestroaulas.png" class="img-responsive-maestro" alt="">
                    </a>
                </div>
                <div class="col-sm-3 portfolio-item">
                    <a href="lista_alumnos.php">
                        <img src="../img/maestroalumnos.png" class="img-responsive-maestro" alt="">
                    </a>
                </div>
             
                <div class="col-sm-3 portfolio-item">
                    <a href="lista_juegos.php" >
                        <img src="../img/maestrojuegos.png" class="img-responsive-maestro" alt="">
                    </a>
                </div>
                 <div class="col-sm-3 portfolio-item">
                    <a href="lista_maestros.php">
                        <img src="../img/categorias-profesores.png" class="img-responsive-maestro" alt="">
                    </a>
                </div>
             </div>
    </div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>