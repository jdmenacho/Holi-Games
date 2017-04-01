<?php
  session_start();
  include_once('../funciones/aula_modelo.php');
  include_once('../funciones/usuario_modelo.php');
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
		$tituloPagina="Crear aula";
    $tituloEncabezado="Crear  aula";
     $descripcionEncabezado="";
		$linksEncabezado="";
    $nombre="";
    $descripcion="";
    $temario="";
    $mensaje="";
    $codigoAula=substr($_SESSION['usuario']['nombre'],0,2) . substr($_SESSION['usuario']['apellidos'],0,2) . ($_SESSION['usuario']['numero_aulas']+1);
      //comprobar errores del formulario de registro y guardar usuario
      if (isset($_POST["botonRegistro"])) {
            $validacion = comprobarErroresRegistroAula($_POST);
            if ($validacion !== false) {
              $mensaje = "<p class='alert alert-danger'>" . $validacion . "</p>";
              $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
              $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
              $temario = isset($_POST["temario"]) ? $_POST["temario"] : "";
              $contrasena = isset($_POST["codigo"]) ? $_POST["codigo"] : "";
            } else {
              unset($_POST['botonRegistro']);
              $resultado = guardarAula($_POST);
              print_r($resultado);
                    if ($resultado == true) {
                      $mensaje = "<p class='alert alert-info'>Aula registrada correctamente</p>";
                      modificarNumeroAulas(($_SESSION['usuario']['numero_aulas']+1),$_SESSION['usuario']['id']);
                      $_SESSION['usuario']['numero_aulas']+=1;
                          $codigoAula=substr($_SESSION['usuario']['nombre'],0,2) . substr($_SESSION['usuario']['apellidos'],0,2) . ($_SESSION['usuario']['numero_aulas']+1);
                    }
                    else {
                      $mensaje = "<p class='alert alert-danger'>Ha ocurrido un fallo al crear el aula.</p>";
                    }
  }
}
		ob_start();
?>

	 <div class="container">
    <div class="contenido-main">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <?=$mensaje?>
          <div class="formularios">
          <div id="formulario-registro">
            <form id="registro_aula" method="POST" action="registrar_aula.php">
                    <div class="text-center">
                         <img src="../img/avatar_hombre3.png" class="logoFormulario">
                    </div>
              <div class="form-group-registro">
                <div class="col-md-10 col-md-offset-1 form-group-registro">
  				<label class="control-label-form-registro" for="nombre">Nombre</label>
  				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre del aula" required="true" value="<?=$nombre?>">
              </div>
			</div>
              <div class="form-group-registro">
                  <div class="col-md-10 col-md-offset-1 form-group-registro">
                <label for="descripcion" class="control-label-form-registro">Descripcion </label><br>
                <textarea cols="81" rows="5" id="descripcion" name="descripcion" placeholder="Introduzca una descripcion del aula" required="true"><?=$descripcion?></textarea>
              </div>
              </div>
         	<div class="form-group-registro">
            <div class="col-md-10 col-md-offset-1 form-group-registro">
  				<label class="control-label-form-registro" for="temario">Temario</label>
  				<input type="text" class="form-control" id="temario" name="temario" placeholder="Escriba el tema principal que se va a tratar en el aula" required="true" value="<?=$temario?>">
			</div>
      </div>
              <div class="form-group-registro">
                  <div class="col-md-10 col-md-offset-1 form-group-registro">
                <label for="codigo" class="control-label-form-registro">Codigo Aula</label>
                <!--poner el campo de codigo de aula de forma automatica y poniendo el campo readonly-->
                <input type="text" class="form-control" id="codigo" name="codigo"  value="<?=$codigoAula?>" readonly>
              </div>
                </div>
                <div class="col-md-10 col-md-offset-1 form-group-registro">
                <input type="submit" id="botonRegistro" class="btn btn-primary btn-block" name="botonRegistro"  style="margin-bottom: 20px;">
                </div>
            </form>
            </div>
          </div>
        </div>
  </div>
  <?php
  	$contenidoSeccionPrincipal=ob_get_contents();
  	ob_end_clean();
  	include("../master.php");
  ?>