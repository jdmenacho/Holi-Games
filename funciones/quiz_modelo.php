<?php
include_once('conexion.php');


function crearQuiz($datos) {
  $consulta = consultaInsert($datos,"quiz");
  return ejecutarConsulta($consulta);
}

function obtenerQuizPorId($id) {
	$consulta = "SELECT * FROM quiz WHERE id='$id'";
	$quiz = hacerListado($consulta);
}

function obtenerPreguntasPorIdQuiz($id) {
  $consulta = "SELECT * FROM quiz_preguntas WHERE quiz_id='$id'";
  $preguntas = hacerListado($consulta);
  if (count($preguntas) <= 0) {
    return false;
  } else {
    return $preguntas;
  }
}

function obtenerUltimoQuiz() {
	$consulta = "SELECT MAX(id) AS id FROM quiz";
	$quiz = hacerListado($consulta);
	if (count($quiz) <= 0) {
		return false;
	} else {
		return $quiz[0];
	}
}

function obtenerUltimaPregunta() {
	$consulta = "SELECT MAX(id) AS id FROM quiz_preguntas";
	$quiz_pregunta = hacerListado($consulta);
	if (count($quiz_pregunta) <= 0) {
		return false;
	} else {
		return $quiz_pregunta[0];
	}
}


function comprobarErrorQuiz() {
	return false;
}

function comprobarErrorPregunta(){
	return false;
}

function guardarPregunta($datos, $quiz_id) {
	$pregunta = [];
	$pregunta['pregunta'] = $datos;
	$pregunta['quiz_id'] = $quiz_id;
	$consulta = consultaInsert($pregunta,"quiz_preguntas");
	return ejecutarConsulta($consulta);
}

function guardarRespuesta($datos, $correcta, $quiz_id) {
	$respuesta = [];
	$respuesta['respuesta'] = $datos;
	$respuesta['correcta'] = $correcta;
	$respuesta['quiz_preguntas_id'] = $quiz_id;
	$consulta = consultaInsert($respuesta,"quiz_respuesta_pregunta");
	return ejecutarConsulta($consulta);
}

function eliminarPreguntaPorId($id) {
	$consulta = "DELETE FROM quiz_preguntas WHERE id='$id'";
	$consulta2 = "DELETE FROM quiz_respuesta_pregunta WHERE quiz_preguntas_id='$id'";
	$resultado = ejecutarConsulta($consulta);
	$resultado = ejecutarConsulta($consulta2);
	return $resultado;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
/*							CONSULTAS PARA APARTADO DE ALUMNOS											*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////
	function obtenerQuiz($id) {
		$consulta = "SELECT * FROM quiz_preguntas WHERE quiz_id = '$id'";
		$quiz = hacerListado($consulta);
		return $quiz;
	}

	function obtenerTemarioPorId($id) {
		$consulta = "SELECT * FROM quiz WHERE id = $id";
		$temario = hacerListado($consulta);
		if(count($temario)<= 0){
			return false;
		} else {
			return $temario[0];
		}
	}

	function obtenerPreguntaAleatoriaPorQuizId($id) {
		$consulta = "SELECT * FROM quiz_preguntas WHERE quiz_id='$id' ORDER BY RAND() LIMIT 10";
		$preguntas = hacerListado($consulta);
		return $preguntas;
	}
	function obtenerTodasLasRespuestas($id) {
		$consulta = "SELECT * FROM quiz_respuesta_pregunta WHERE quiz_preguntas_id = '$id'";
		$respuestas = hacerListado($consulta);
		return $respuestas;
	}

	function obtenerRespuestaCorrecta() {
		$consulta = "SELECT * FROM quiz_respuesta_pregunta WHERE correcta = '1'";
		$respuestaCorrecta = hacerListado($consulta);
		return $respuestaCorrecta;
	}

	function guardarPuntuacion($tiempo) {
		$consulta = "INSERT INTO quiz_puntuacion (puntuacion) VALUES ('$tiempo')";
		$guardarPuntuacion = ejecutarConsulta($consulta);
		return $guardarPuntuacion;
	}
?>