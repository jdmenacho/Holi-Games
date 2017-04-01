<?php
session_start();
include_once('../funciones/usuario_modelo.php');
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="maestro";
$tituloEncabezado="Lista Alumnos";
$descripcionEncabezado="Desde aquí podrás acceder a tu lista de alumnos";
$alumnos=obtenerAlumnosMestro($_GET['id']);
	ob_start();
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">	
			<form method="POST" class="form-inline">
				<input type="search" name="buscador" id="buscador" class="form-control" size="70" placeholder="Introduce el alumno o aula que estes buscando">
			</form>
		</div>
	</div>
    <div class="row">
        <!--aqui va la parte de los alumnos-->
        <div class="col-md-6 col-md-offset-3">
            <h2 class="h2-aulas">Mis alumnos</h2>
            <div class="list-group">
           		<table class="table table-striped">
           			 <tr class="tabla-aulas">
           				<td>NOMBRE</td>
           				<td>APELLIDOS</td>
           				<td>AULAS</td>
                  <td>ACCIONES</td>
           			</tr>
           			<?php foreach ($alumnos as $alumnos) :?>
           			<tr>
           				<td><a href="../ver/ver_usuario.php?id=<?=$alumnos['id_usuario']?>" style="color:black;"><?=$alumnos['nombre_usuario']?></a></td>
           				<td><a href="../ver/ver_usuario.php?id=<?=$alumnos['id_usuario']?>" style="color:black;"><?=$alumnos['apellidos']?></a></td>
           				<td>
           				<?php 
           					$nombreAulas=explode(",", $alumnos['nombre_aula']);
           					$id_aula=explode(",", $alumnos['id_aula']);
           						for($i=0;$i<count($nombreAulas);$i++):?>
           							<a href="gestionar_aula.php?id=<?=$id_aula[$i]?>" style="color:black;"><?=$nombreAulas[$i]?></a>,
           						<?php endfor;?>
           				</td>
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
        </div>
    </div>
           <div class="row">
                <div class="col-md-2 col-md-offset-5" style="margin-top: 50px;">
                     <a href="../registros/registrar_usuario.php" class="btn btn-primary" role="button">Agregar alumno</a>
                </div>
            </div>
</div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>