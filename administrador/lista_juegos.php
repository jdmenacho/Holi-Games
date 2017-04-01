<?php
  include_once('../funciones/juego_modelo.php');
session_start();
  $tituloPagina="Holi - Plataforma de juegos educativos";
  $tipoNav="administrador";
  $tituloEncabezado="Lista de Juegos";
  $descripcionEncabezado="Gestiona desde aquí todos los juegos";
    ob_start();
?>
<?php

$juegos = obtenerTodosLosJuegos();

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
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
                          
            <?php

              foreach ($juegos as $juego):

            ?>
          <tr>
            <td><?= $juego['titulo'] ?></td>
            <td><?= $juego['descripcion'] ?></td>
            <td><?= $juego['nombre'] ?></td>
            <td>
              <a href="../ver/ver_juego.php?id=<?=$juego['id']?>" class="btn btn-ver btn-xs">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver
              </a>
              <a href="#" class="btn btn-editar btn-xs">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
              </a>
              <a href="../eliminar/eliminar_juego.php?id=<?=$juego['id']?>" class="btn btn-eliminar btn-xs">
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