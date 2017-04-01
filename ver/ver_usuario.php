<?php
session_start();
include_once('../funciones/usuario_modelo.php');
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
$tituloEncabezado="Usuario";
$descripcionEncabezado="Desde aquí podrás acceder a todos los datos de usuario";
$alumno=obtenerUsuarioPorId($_GET['id']);
	ob_start();
?>
<div class="container">
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <img src="../img/avatar_hombre3.png" class="img-responsive"/>
        </div>
    </div>
</div>
            
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="nombre-usuario">
            <h2><?=$alumno['nombre_usuario'];?></h2>
        </div>
                                
        <div class="panel-informacion">
            <div class="row">
                <div class="col-sm-6">
                    <p><span style="color: #0071BC;">Nombre:</span> <span style="color: #1A1A1A"><?=$alumno['nombre']?></span></p>
                    </div>
                    <div class="col-sm-6">
                        <p><span style="color: #0071BC;">Apellidos:</span> <span style="color: #1A1A1A"><?=$alumno['apellidos']?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <?php
                //en este caso lo que hacemos es diferenciar desde donde se accede a ver perfil.
                //se pude acceder como usuario privado que accede a su propio perfil
                //se puede acceder a un perfil de alumno  como profesor o administrador 
                if(empty($_GET['privado'])):
            ?>
            <!--<div class="row">
                <div class="col-sm-2 col-sm-offset-4">
                        <button class="btn btn-default">Puntuaciones</button>
                </div>
            </div>-->
        <?php else:?>
            <div class="row">
                <div class="col-md-6 col-md-offset-5 form-group-registro">
                    <a href="../editar/editar_usuario.php?id=<?=$_SESSION['usuario']['id']?>" class="btn btn-info">Editar Perfil</a>
                </div>
            </div>
        <?php endif; ?>

</div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>