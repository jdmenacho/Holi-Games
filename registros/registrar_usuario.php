<?php
  session_start();
  include_once('../funciones/usuario_modelo.php');
  if(!empty($_SESSION['usuario'])){
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
}
else{
   $tipoNav="principal";
}
		$tituloPagina="Registro de usuario";
    $tituloEncabezado="Registro de usuario";
    $descripcionEncabezado="Sólo necesitamos que nos facilites unos pocos datos sobre ti.<br/>No te llevará más de dos minutos formar parte de la plataforma educativa HOLI";
		$linksEncabezado="<script type='text/javascript' defer src='../js/codigoAula.js'></script>";
    $nombre="";
    $apellidos="";
    $nombre_usuario="";
    $contrasena="";
    $verificacionContrasena="";
    $codigoAula="";
    $mensaje="";
      //comprobar errores del formulario de registro y guardar usuario
      if (isset($_POST["botonRegistro"])) {
            $validacion = comprobarErroresRegistroUsuario($_POST);
            if ($validacion !== false) {
              $mensaje = "<p class='alert alert-danger'>" . $validacion . "</p>";
              $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
              $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : "";
              $nombre_usuario = isset($_POST["nombre_usuario"]) ? $_POST["nombre_usuario"] : "";
              $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
              $verificacionContrasena = isset($_POST["verificacionContrasena"]) ? $_POST["verificacionContrasena"] : "";
              $codigoAula = isset($_POST["codigoAula"]) ? $_POST["codigoAula"] : "";
            } else {
              unset($_POST['verificacionContrasena']);
              unset($_POST['botonRegistro']);
                //en caso de que el tipo de usuario elegido no sea el alumno debemos de borrar el campo codigo aula
                    if($_POST['id_tipo_usuario']!="3"){
                          unset($_POST['codigoAula']);
                    }
              $resultado = guardarUsuario($_POST);
                    if ($resultado == true) {
                      $mensaje = "<p class='alert alert-info'>Usuario registrado correctamente</p>";
                    }
                    else {
                      $mensaje = "<p class='alert alert-danger'>Ha ocurrido un fallo al guardar el usuario.</p>";
                    }
  }
}
		ob_start();
?>

	 <div class="container">
    <div class="contenido-main">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <?=$mensaje?>
          <div class="formularios">
            <div id="formulario-registro">
              <form id="registro_usuario" method="POST" action="registrar_usuario.php">
                  <div class="text-center">
                    <img src="../img/avatar_hombre3.png" class="logoFormulario">
                  </div>
                  <div class="form-group-registro">
                    <div class="col-md-10 col-md-offset-1 form-group-registro">
  				            <label class="control-label-form-registro" for="nombre">Nombre</label>
  				            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba su nombre" required="true" value="<?=$nombre?>">
                    </div>
			             </div>
              
                  <div class="form-group-registro">
                    <div class="col-md-10 col-md-offset-1 form-group-registro">
                      <label for="apellidos" class="control-label-form-registro">Apellidos </label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escriba sus apellidos" required="true" value="<?=$apellidos?>">
                    </div>
                  </div>

         	        <div class="form-group-registro">
                    <div class="col-md-10 col-md-offset-1 form-group-registro">
  				            <label class="control-label-form-registro" for="nombre_usuario">Nombre Usuario</label>
  				            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Escriba un nombre de usaurio" required="true" value="<?=$nombre_usuario?>">
			              </div>
                  </div>

                  <div class="form-group-registro">
                    <div class="col-md-10 col-md-offset-1 form-group-registro">
                      <label for="pass" class="control-label-form-registro">Contraseña</label>
                      <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Escriba su contraseña" required="true" value="<?=$contrasena?>">
                    </div>
                  </div>
              
                  <div class="form-group-registro">
                    <div class="col-md-10 col-md-offset-1 form-group-registro">
                      <label for="pass" class="control-label-form-registro">Verifique su contraseña</label>
                      <input type="password" class="form-control" id="verificacionContrasena" name="verificacionContrasena" placeholder="Verifique su contraseña" required="true" value="<?=$verificacionContrasena?>">
                    </div>
                  </div>
              
                  <div class="form-group-registro">
                    <div class="col-md-10 col-md-offset-1 form-group-registro">
             	        <label for="tipoUsuario" class="control-label-form-registro">¿Que tipo de usuario eres? </label>
              	      <select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control">
              		      <option value="0" selected="selected">Tipo de usuario</option>
              		      <option value="2">Maestro</option>
              		      <option value="3">Alumno</option>
              	      </select>
                    </div>
                  </div>

                  <div class="form-group-registro" id="divCodigoAula">
                    <div class="col-md-10 col-md-offset-1 form-group-registro" >
                      <label for="codigoAula" class="control-label-form-registro">Codigo aula</label>
                      <input type="text" class="form-control" id="codigoAula" name="codigoAula" placeholder="introduce el codigo de aula" required="true" value="<?=$codigoAula?>">
                    </div>
                  </div>
              <!--
              <div class="form-group"  id="divCodigoAula">
                  <div class="col-md-10 col-md-offset-1">
                    <label for="codigoAula" class="control-label">Codigo Aula</label>
                    <input type="text" id="codigoAula" name="codigoAula" placeholder="introduce el codigo de aula">
              </div>
              </div>-->
                  <div class="col-md-10 col-md-offset-1 form-group-registro">
                  <input type="submit" id="botonRegistro" class="btn btn-primary btn-registro form-group-registro btn-block" name="botonRegistro">
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