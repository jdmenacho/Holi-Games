<?php
	include_once('./quiz_modelo.php');

  session_start();
	$tipoNav="maestro";//esta variable hay que modificarla para que coja automatiamente si es maestro o administrador
	$tituloPagina="Quizz";
    $tituloEncabezado="Preguntas";
    $descripcionEncabezado="";
		$linksEncabezado='';

	if ($_POST) {
		$pregunta = $_POST['pregunta'];
		$respuestas = [$_POST['respuesta1'], $_POST['respuesta2'], $_POST['respuesta3'], $_POST['respuesta4']];

		$correcta = $_POST['radio'];
		//$mensajeError = comprobarUnicaSolucion($_POST);
		//$correctas = solucionCorrecta($_POST);

		if (empty($mensajeError)) {
			$resultado = guardarPregunta($pregunta, $_GET['id']);
			if ($resultado == false) {
    		$mensajeError = "No se ha guardado la pregunta correctamente";
			}
		
		} else {
			echo $mensajeError;
		}

		$ultimaPregunta = obtenerUltimaPregunta();

		if (empty($mensajeError)) {
			for ($i = 0; $i < count($respuestas); $i++) {
				$esLaCorrecta = false;
				if ($i == $correcta) {
					$esLaCorrecta = true;
				}
				$resultado = guardarRespuesta($respuestas[$i], $esLaCorrecta, $ultimaPregunta['id']);
				if ($resultado == false) {
    				$mensajeError = "No se ha guardado la respuesta correctamente";
   				}
			}
		} else {
			echo $mensajeError;
		}

		if (!$mensajeError) {
			header("Location: ver_juego.php");
		} else {
			echo $mensajeError;
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Nueva Pregunta</title>
	<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="nueva_pregunta.js"></script>-->
</head>
<body>
	<br/>
	<br/>
	<div class="container">
	 	<div class="col-md-8">
			<form action="" method="POST">
			<div class="row">
				<div class="form-group col-md-2">
					<label for="pregunta">Pregunta:</label>
				</div>
				<div class="form-group col-md-8">
					<input type="text" name="pregunta" id="pregunta" placeholder="Pregunta" class="form-control">
				</div>
			</div>
	<br/>
			<div class="row">
				<div class="form-group col-md-4">
					<input type="text" name="respuesta1" id="respuesta" placeholder="Respuesta" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<input type="radio" name="radio" value="0" checked="checked" >
				</div>
				<div class="form-group col-md-4">
					<input type="text" name="respuesta2" id="respuesta" placeholder="Respuesta" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<input type="radio" name="radio" value="1">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					<input type="text" name="respuesta3" id="respuesta" placeholder="Respuesta" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<input type="radio" name="radio" value="2">
				</div>
				<div class="form-group col-md-4">
					<input type="text" name="respuesta4" id="respuesta" placeholder="Respuesta" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<input type="radio" name="radio" value="3">
				</div>
			</div>

			<br/>
			
			<div class="row">
				<input type="submit" value="Guardar pregunta" class="btn btn-success">
			</div>

			</form>	
		</div>
	</div>
</body>
</html>

 <?php
  	$contenidoSeccionPrincipal=ob_get_contents();
  	ob_end_clean();
  	include("../master.php");
  ?>