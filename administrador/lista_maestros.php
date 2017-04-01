<?php
session_start();
include_once('../funciones/maestro_modelo.php');
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="administrador";
$tituloEncabezado="Lista de maestros";
$descripcionEncabezado="Gestiona tus contenidos: Aulas-Alumnos-Juegos";
	ob_start();

$maestros = obtenerTodosLosMaestros();

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead class="tabla-aulas">
          <tr>
            <th>Nombre de Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo Electrónico</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
                          
            <?php

              foreach ($maestros as $maestro):

            ?>
          <tr>
            <td><?= $maestro['nombre_usuario'] ?></td>
            <td><?= $maestro['nombre'] ?></td>
            <td><?= $maestro['apellidos'] ?></td>
            <td><?= $maestro['email'] ?></td>
            <td>
              <a href="../ver/ver_usuario.php?id=<?= $maestro['id']?>" class="btn btn-ver btn-xs">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver
              </a>
              <a href="../editar/editar_usuario.php?id=<?= $maestro['id'] ?>" class="btn btn-editar btn-xs">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
              </a>
              <a href="../eliminar/eliminar_maestro.php?id=<?= $maestro['id'] ?>" class="btn btn-eliminar btn-xs">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
              </a>
            </td>
          </tr>
                <?php
                  endforeach;
                ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>