<?php
session_start();
include_once('../funciones/juego_modelo.php');
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="maestro";
$tituloEncabezado="Mis Juegos";
$descripcionEncabezado="Gestiona tus juegos";
$juegos=obtenerJuegosUsuario($_GET['id']);
	ob_start();
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">	
			<form method="POST" class="form-inline">
				<input type="search" name="buscador" id="buscador" class="form-control" size="70" placeholder="Introduce el alumno, aula o juego que estes buscando">
			</form>
		</div>
	</div>
    <div class="row">
        <!--aqui va la parte de los alumnos-->
        <div class="col-md-8 col-md-offset-2">
            <h2 class="h2-aulas">Mis Juegos</h2>
            <div class="list-group">
           		<table class="table table-striped">
           			 <tr class="tabla-aulas">
           				<td>TÍTULO</td>
           				<td>TIPO</td>
           				<td>AULAS</td>
                  <td>ACCIONES</td>
           			</tr>
           			<?php foreach ($juegos as $juegos) :?>
           			<tr>
           				<td><a href="../ver/ver_juego.php?id=<?=$juegos['id_juego']?>" style="color: #1A1A1A"><?=$juegos['titulo']?></a></td>
           				<td><a href="../ver/ver_juego.php?id=<?=$juegos['id_juego']?>" style="color: #1A1A1A"><?=$juegos['tipo']?></a></td>
           				<td>
                  <?php 
                    $nombreAulas=explode(",", $juegos['nombre_aula']);
                    $id_aula=explode(",", $juegos['id_aula']);
                      for($i=0;$i<count($nombreAulas);$i++):?>
                        <a href="gestionar_aula.php?id=<?=$id_aula[$i]?>" style="color: #1A1A1A;"><?=$nombreAulas[$i]?></a>,
                      <?php endfor;?>
                  </td>
                  <td>
                    <a href="../editar/editar_juego.php?id=<?=$juegos['id_juego']?>" class="btn btn-editar btn-xs">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                            </a>
                             <a href="../eliminar/eliminar_juego.php?id=<?=$juegos['id_juego']?>" class="btn btn-eliminar btn-xs">
                             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                            </a>
                  </td>
           			</tr>
           		<?php endforeach;?>
           		</table>
            </div>
        </div>
    </div>
           <div class="row">
                <div class="col-md-2 col-md-offset-5" style="margin-top: 50px;">
                     <a href="../registros/registrar_juego.php" class="btn btn-primary" role="button">Agregar juego</a>
                </div>
            </div>
</div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>