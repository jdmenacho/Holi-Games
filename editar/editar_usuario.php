<?php
session_start();
include_once('../funciones/usuario_modelo.php');
?>
<?php
$tituloPagina="Holi - Plataforma de juegos educativos";
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
$tituloEncabezado="Editar datos usuario";
$descripcionEncabezado="Desde aquí podrás editar los datos asociados al usuario";
  ob_start();

$nombre_usuario = "";
$nombre = 
$apellidos = "";
$email = "";
$contrasena = "";
$contrasena2 = "";


$linksEncabezado = " <script defer src='../js/modificarContrasena.js'></script>";

if ($_POST) {
  $validacion = comprobarErroresEditarUsuario($_POST);
  if ($validacion == false) {
        if ($_POST["modificar_contrasena"] == 1) {
          unset($_POST["contrasena2"]);
        }
        unset($_POST["modificar_contrasena"]);
        unset($_POST["editar"]);
    $resultado = editarUsuario($_POST, "usuarios");
    if ($resultado == false) {
      echo "<p class='alert alert-danger'>Ha ocurrido un error al editar el usuario</p>";
    } else {
      header ("Location: ../ver/ver_usuario.php?id= " . $_GET['id']);
    }
  }
}

if(!empty($_GET["id"])){
$usuario = obtenerUsuarioPorId($_GET["id"]);
  }
  else{
    $usuario=false;
  }

?>

<div class="container">
  <div class="col-md-8 col-md-offset-2">
      <form id="editar_usuario" method="POST">
        <input type="hidden" name="id" value="<?=$usuario['id']?>">
                <div class="form-group-registro">
                  <label for="nombre" class="control-label-form-registro">Nombre de usuario:</label>
                  <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Escriba su nombre" required="true" value="<?=$usuario['nombre_usuario']?>">
                </div>
                <div class="form-group-registro">
                  <label for="nombre" class="control-label-form-registro">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba su nombre" required="true" value="<?=$usuario['nombre']?>">
                </div>
                <div class="form-group-registro">
                  <label for="apellidos" class="control-label-form-registro">Apellidos:</label>
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escriba sus apellidos" required="true" value="<?=$usuario['apellidos']?>">
                </div>
                <div class="form-group-registro">
                  <label for="correo" class="control-label-form-registro">Correo Electrónico:</label>
                  <input type="email" class="form-control" id="correo" name="email" placeholder="Escriba su correo" required="true" value="<?=$usuario['email']?>">
                </div>
                <div class="form-group-registro">
                  <label for="modificar_contrasena" class="control-label-form-registro">Modificar contraseña: </label>
                  <div class="radio">
                     <label><input type="radio" name="modificar_contrasena" value=1 id="opcionsi">SI</label>
                  </div>
                  <div class="radio">
                   <label><input type="radio" name="modificar_contrasena" checked="checked" value=0 id="opcionno">NO</label>
                  </div>
                  </div>
                  <div class="form-group" id="divContrasena">
                    <!--aqui va el campo de contraseña que entra por javascript-->
                  </div>
                  <div class="form-group" id="divVerificacionContrasena">
                </div>
                <div class="form-group">
                  <input type="hidden" name="editar" value="true">
                  <input type="submit" id="botonRegistro" class="btn btn-primary btn-block" value="Actualizar">
                </div>
      </form> 
    </div>     
</div>

<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>