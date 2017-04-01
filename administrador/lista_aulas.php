<?php
  session_start();
  include_once('../funciones/aula_modelo.php');
?>
<?php
  $tituloPagina="Holi - Plataforma de juegos educativos";
  $tipoNav="administrador";
  $tituloEncabezado="Listado de Aulas";
  $descripcionEncabezado="Gestiona desde aquí todas las aulas";
    ob_start();

  $aulas = obtenerTodasLasAulas();
?>


<div class="container">

<?php

  if (!empty($_SESSION["errorMsg"])) {
      echo $_SESSION["errorMsg"];
      unset($_SESSION["errorMsg"]);
    }

?>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped juegos">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Temario</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>

          <tr>
          <?php
            foreach ($aulas as $aula):
          ?>
            <td><?=$aula["nombre"]?></td>
            <td><?=$aula["descripcion"]?></td>
            <td><?=$aula["temario"]?></td>
            <td>
              <a href="../ver/ver_aula.php?id=<?=$aula['id']?>" class="btn btn-ver btn-xs">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver
              </a>
              <a href="../editar/editar_aula.php?id=<?=$aula['id']?>" class="btn btn-editar btn-xs">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Editar
              </a>
              <a href="../eliminar/eliminar_aula.php?id=<?=$aula['id']?>" class="btn btn-eliminar btn-xs">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Eliminar
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