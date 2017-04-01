<?php
//tiene que llegar el id del maestro
  session_start();
  include_once('../funciones/juego_modelo.php');
		$tipoNav="maestro";//esta variable hay que modificarla para que coja automatiamente si es maestro o administrador
		$tituloPagina="Crear juego";
    $tituloEncabezado="Crear juego";
    $descripcionEncabezado="";
		$linksEncabezado="";
    $titulo="";
    $descripcion="";
   $tipo_juego = obtenerTodosLosTiposDeJuegos();
   $id=obtenerSiguienteIdJuego();
   $id_juego=$id['id']+1;
    $mensaje="";
      //comprobar errores del formulario de registro y guardar usuario
      if (isset($_POST["botonRegistro"])) {
            $validacion = comprobarErroresRegistroJuego($_POST);
            if ($validacion !== false) {
              $mensaje = "<p class='alert alert-danger'>" . $validacion . "</p>";
              $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
              $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            } else {
              unset($_POST['botonRegistro']);
              $resultado=insertarJuegoEnAulaYMaestro($_POST['aulas'],$_SESSION['usuario']['id'],$id_juego);
              unset($_POST['aulas']);
              $resultado = guardarJuego($_POST);
                    if ($resultado == true) {
                     // $mensaje = "<p class='alert alert-info'>".$_POST["id_tipo_juego"]."</p>";
                  
                      //$mensaje = "<p class='alert alert-info'>Juego registrado correctamente</p>"
                      $numeroJuego = $_POST["id_tipo_juego"];
                        switch($numeroJuego){
                          case "1":

                            header("Location:sopa_form.php?id_juego=" . $id_juego );
                          break;
                          case "2":
                            header("Location:nueva_pregunta_form.php?id_juego=" . $id_juego);
                          break;
                          case "3":
                            header("Location:ahorcado_form.php?id_juego=" .  $id_juego);
                          break;
                        }
                    }
                    else {
                      $mensaje = "<p class='alert alert-danger'>Ha ocurrido un fallo al registrar el juego.</p>";
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
           <form id="registro_juego" method="POST" action="registrar_juego.php">
                    <div class="text-center">
                         <img src="../img/avatar_hombre3.png" class="logoFormulario">
                    </div>
              <div class="form-group-registro">
                <div class="col-md-10 col-md-offset-1 form-group-registro">
  				<label class="control-label-form-registro" for="titulo">Titulo</label>
  				<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escriba el titulo del juego" required="true" value="<?=$titulo?>">
              </div>
			</div>
              <div class="form-group-registro">
                  <div class="col-md-10 col-md-offset-1 form-group-registro">
                <label for="descripcion" class="control-label-form-registro">Descripcion </label><br>
                <textarea cols="81" rows="5" id="descripcion" name="descripcion" placeholder="Introduzca una descripcion del juego" required="true"><?=$descripcion?></textarea>
                </div>
              </div>
               <div class="form-group-registro">
                  <div class="col-md-10 col-md-offset-1 form-group-registro">
                  <label for="tipoUsuario" class="control-label-form-registro">Elige un tipo de juego </label>
                <select name="id_tipo_juego" id="id_tipo_juego" class="form-control">
                    <?php foreach($tipo_juego AS $tipo): ?>
                   <option value="<?=$tipo['id']?>" selected="selected"><?=$tipo['nombre']?></option>
                    <?php endforeach;?>
                    <option value="0" selected="selected">Tipo de juego</option>
                </select>
              </div>
                <div class="form-group-registro">
                  <div class="col-md-10 col-md-offset-1 form-group-registro">
                <label for="aulas" class="control-label-form-registro">Aula </label><br>
                <select name="aulas" id="aulas" class="form-control">
                    <option value="1">Informatica</option>
                    <option value="4">Ingles</option>
                    <option value="5">Historia</option>
                    <option value="6">Geografia</option>
                </select>
                </div>
              </div>

      

               
                     <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="col-md-10 col-md-offset-1 form-group-registro">
 <input type="submit" id="botonRegistro" class="btn btn-primary btn-block" name="botonRegistro"  style="margin-bottom: 20px;">
</div>
          </form>
            </div>
          </div>
        </div>
        </div>
          </div>
        </div>

  
 
  <?php
  	$contenidoSeccionPrincipal=ob_get_contents();
  	ob_end_clean();
  	include("../master.php");
  ?>