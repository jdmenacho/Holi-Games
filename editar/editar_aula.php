<?php
session_start();
include_once('../funciones/aula_modelo.php');
?>
<?php
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="administrador";
$tituloEncabezado="Edición de aula";
$descripcionEncabezado="Gestiona los datos de tu aula. Podrás cambiar el nombre, la descripción y el temario relacionado";
	ob_start();

if ($_POST) {


  $mensajeError = comprobarErroresEditarAula($_POST);

  if ($mensajeError == false) {
    $resultado = actualizarAula($_POST, "aulas");


    if ($resultado == false) {
      $mensajeError = "<p class = 'alert alert-danger'>No se ha guardado el aula correctamente</p>";
    } else {
      header("Location: ../ver/ver_aula.php?id=" . $_GET["id"]);
    }
    
  }else{
    echo "<p class='alert alert-danger'>" . $mensajeError . "</p>";
  }
}

if(!empty($_GET["id"])){
$aula = obtenerAulaPorId($_GET["id"]);
  }
  else{
    $aula =false;
  }

?>

<div class="container">
   <div class="col-md-8 col-md-offset-2">
	  <form id="editar_aula" method="POST">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Escriba aquí el nombre del aula" required="true" class="form-control" value="<?=$aula[0]['nombre']?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" id="descripcion" placeholder="Escriba aquí la descripcion" required="true" class="form-control" value="<?=$aula[0]['descripcion']?>">
            </div>
            <div class="form-group">
                <label for="temario">Temario:</label>
                <input type="text" name="temario" id="temario" placeholder="Escriba aquí el tema" required="true" class="form-control" value="<?=$aula[0]['temario']?>">
            </div>
            <div class="form-group">
                <input type="submit" id="botonEditarAula" class="btn btn-primary btn-block" value="Actualizar">
            </div>    
      </form>
    </div>
</div>

<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>