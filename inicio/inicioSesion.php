	<?php 
	session_start();
	include_once("../funciones/usuario_modelo.php");
	$tituloEncabezado="Inicia sesión";
	$descripcionEncabezado="";
	$tipoNav="inicioSesion";
		if (isset($_POST["enviarInicioSesion"])) {
			  $usuario = comprobarUsuario($_POST['usuario'], cifrarContrasena($_POST['contrasena']));
			  if ($usuario == false) {
			    $mensaje_error = "<p class='alert alert-danger'><strong>El usuario o contraseña no son correctos</strong></p>";
			  } else {
			    $_SESSION['usuario'] = $usuario;
			    switch ($_SESSION['usuario']['id_tipo_usuario']) {
			    	case '1':
			    		  header("Location: ../administrador/index_administracion.php");
			    		break;
			    	case '2':
			    		  header("Location: ../maestro/index_maestro.php");
			    		  break;
			    	case '3':
			    		  header("Location: ../alumno/index_alumno.php");
			    		  break;	  
			    	default:
			    		# code...
			    		break;
			    }
			  }
}
ob_start();
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<?php 
				if(!empty( $mensaje_error)){echo $mensaje_error;}
				if(!empty($_GET['registro'])){
					echo "<p class='alert alert-success'><strong>El Registro se ha realizado correctamente</strong></p>";
				}
			?>
			<div class="formularios">
				<form action="inicioSesion.php" method="POST" class="form-horizontal">
			<div class="text-center">
				<img src="../img/avatar_hombre3.png" class="logoFormulario">
			</div>
			<div class="text-center">
				<p class="text-danger"><!--<?=$mensajeError?>--></h1></p>
			</div><br>
			<div class="form-group">
    			<div class="col-md-10 col-md-offset-1">
      				<input type="text" class="form-control :focus" id="email" placeholder="Nombre de usuario" name="usuario">
    			</div>
  			</div>

			<div class="form-group">
    			<div class="col-md-10 col-md-offset-1">
      				<input type="password" class="form-control" id="contrasena" placeholder="Contraseña" name="contrasena">
    			</div>
  			</div>

  			<button type="submit" class="btn btn-primary col-md-10 col-md-offset-1 " name="enviarInicioSesion" id="enviarInicioSesion" style="margin-bottom: 20px;">Iniciar Sesion</button>
	</form>
		<div class="text-center">
		<p class="texto-aregistro">¿Todavia no eres usuario?</p>
		<p id="textoRegistro"><a href="../registros/registrar_usuario.php">Registrate</a></p>
		</div>
		</div>
	</div>
	</div>
	</div>
	<?php
		$contenidoSeccionPrincipal=ob_get_contents();
		ob_end_clean();
		include('../master.php');
	?>