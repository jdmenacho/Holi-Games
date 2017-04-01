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
$tituloEncabezado="Juego";
$descripcionEncabezado="";
$juego=obtenerJuegoPorId($_GET['id']);
    //para saber el tipo de imagen a poner
        if($juego[0]['id']==1){
            $imagenJuego="../img/sopaletras.png";
        }
        elseif ($juego[0]['id']==2) {
            $imagenJuego="../img/quizz.png";
        }
    ob_start();
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                        <div class="panel-titulo">
                             <h3 class="h3-juegos"><?=$juego[0]['nombre'] . " " . $juego[0]['titulo'];?></h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6 portfolio-item col-sm-offset-3">
                                    <img src="../img/<?=$imagenJuego?>" class="img-responsive" style="width: 400px;">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <p class="p-juegos"><?=$juego[0]['descripcion']?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="row">
                                <div class="col-sm-2 col-sm-offset-5">
                                    <a href="../sopa/sopa_jugar.php?id=<?=$_GET['id']?>&tipo=<?=$juego[0]['nombre']?>&titulo=<?=$juego[0]['titulo']?>" class="btn btn-info">Jugar</a>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
        </div>
    </div>
</div>
<?php
    $contenidoSeccionPrincipal=ob_get_contents();
    ob_end_clean();
    include("../master.php");
?>