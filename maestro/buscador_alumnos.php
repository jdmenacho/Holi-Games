<?php
include_once('../funciones/usuario_modelo.php');
$alumnos=obtenerAlumnosMestro($_POST['id']);
//if(isset($_POST['consulta']) && $_POST['consulta']!="[object Object]"){
		foreach ($alumnos as $alumnos) :?>
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
                    <a href="../editar/editar_usuario.php?id=<?=$alumno['id']?>" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                            </a>
                             <a href="../eliminar/eliminar_usuario.php?id=<?=$alumno['id']?>" class="btn btn-danger btn-xs">
                             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                            </a>
                  </td>
           			</tr>
           		<?php endforeach;
//}

?>