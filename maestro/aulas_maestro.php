<?php
session_start();
include_once('../funciones/aula_modelo.php');
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="maestro";
$tituloEncabezado="Aulas";
$descripcionEncabezado="Gestiona todo el contenido referente a tus aulas. Crea nuevas aulas, modifica las ya existentes o elimínalas.<br/> Prueba a crear aulas según el curso o según la materia, tú decides cómo organizarlo.";
$aulas=obtenerListadoAulasPorIdUsuario($_SESSION['usuario']['id']);
	ob_start();
?>
<div class="container">
        <div class="row">
             <div class="col-md-8 col-md-offset-2">
                <h2 class="h2-aulas">Mis aulas</h2><br/>
                <table class="table table-striped">
                     <tr class="tabla-aulas">
                        <td>NOMBRE</td>
                        <td>DESCRIPCIÓN AULA</td>
                        <td>ACCIONES</td>
                    </tr>
                    <?php foreach ($aulas as $aulas) :?>
                    <tr>
                        <td class="listado-aulas"><a href="gestionar_aula.php?id=<?=$aulas['id']?>"><?=$aulas['nombre']?></a></td>
                        <td class="descripcion-aulas"><?=$aulas['descripcion']?></td>
                        <td>
                            <a href="../editar/editar_aula.php?id=<?=$aulas['id']?>" class="btn btn-editar btn-xs">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                            </a>
                             <a href="../eliminar/eliminar_aula.php?id=<?=$aulas['id']?>" class="btn btn-eliminar btn-xs">
                             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                            </a>
                        </td>
                    </tr>
                 <?php endforeach;?>
                 </table>
            </div>
        </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-5" style="margin-top: 50px;">
                     <a href="../registros/registrar_aula.php" class="btn btn-primary" role="button">Agregar aula</a>
                </div>
            </div>
</div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>