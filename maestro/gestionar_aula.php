<?php
session_start();
include_once('../funciones/usuario_modelo.php');
include_once('../funciones/juego_modelo.php');
include_once('../funciones/aula_modelo.php');
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="maestro";
$tituloEncabezado="Aula";
$descripcionEncabezado="Gestiona los alumnos y juegos de tu aula. Podrás acceder a la ficha de cada alumno, eliminarlos o añadir nuevos alumnos y juegos al aula.";
$alumnos=obtenerAlumnosAula($_GET['id']);
$juegos=obtenerJuegosAula($_GET['id']);
$aula=obtenerAulaPorId($_GET['id']);
	ob_start();
?>
<div class="container">
    <div class="aulas-fondo">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <h2 class="h2-aulas-nombre"><?=$aula[0]['nombre']?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <p class="descripcion-aula"><?=$aula[0]['descripcion']?></p>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <!--aqui va la parte de los alumnos-->
        <div class="col-md-6">
            <h2 class="h2-aulas">Mis alumnos</h2>
            <table class="table table-striped">
                     <tr class="tabla-aulas">
                        <td>NOMBRE</td>
                        <td>APELLIDOS</td>
                        <td>ACCIONES</td>
                    </tr>
                    <?php foreach ($alumnos as $alumno) :?>
                    <tr>
                        <td><a href="../ver/ver_usuario.php?id=<?=$alumno['id']?>" style="color:black;"><?=$alumno['nombre']?></a></td>
                        <td><a href="../ver_usuario.php?id=<?=$alumno['id']?>" style="color:black;"><?=$alumno['apellidos']?></a></td>
                        <td>
                            <a href="../editar/editar_usuario.php?id=<?=$alumno['id']?>" class="btn btn-editar btn-xs">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                            </a>
                             <a href="../eliminar/eliminar_usuario.php?id=<?=$alumno['id']?>" class="btn btn-eliminar btn-xs">
                             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                            </a>
                        </td>
                    </tr>
                 <?php endforeach;?>
                 </table>
            </div> 
        <!--aqui va la parte de los juegos-->
        <div class="col-md-6">
            <h2 class="h2-aulas">Mis Juegos</h2>
                <table class="table table-striped">
                     <tr class="tabla-aulas">
                        <td>TÍTULO</td>
                        <td>TIPO</td>
                        <td>ACCIONES</td>
                    </tr>
                    <?php foreach ($juegos as $juego) :?>
                    <tr>
                        <td><a href="../ver/ver_juego.php?id=<?=$juego['id_juego']?>" style="color:black;"><?=$juego['titulo']?></a></td>
                        <td><a href="../ver/ver_juego.php?id=<?=$juego['id_juego']?>" style="color:black;"><?=$juego['tipo']?></a></td>
                        <td>
                            <a href="../editar/editar_juego.php?id=<?=$alumno['id']?>" class="btn btn-editar btn-xs">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                            </a>
                             <a href="../eliminar/eliminar_juego.php?id=<?=$alumno['id']?>" class="btn btn-elimiar btn-xs">
                             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                            </a>
                        </td>
                    </tr>
                 <?php endforeach;?>
                 </table>
        </div>
    </div>
</div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>