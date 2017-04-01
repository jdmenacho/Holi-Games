<?php

	include_once ("../funciones/sopa_modelo.php");
	include_once ("../funciones/juego_modelo.php");
	// Los valores iniciales de los datos los ponemos aquí. 
	  session_start();
	$tipoNav="maestro";//esta variable hay que modificarla para que coja automatiamente si es maestro o administrador
	$tituloPagina="SOPA";
    $tituloEncabezado="Preguntas";
    $descripcionEncabezado="";
		$linksEncabezado='';

	$filas = "";
	$columnas = "";
	$palabras = "";


	$mensajeValidacion = "";
	$id_juego=$_GET['id_juego'];

	// Comprobamos si hay datos enviados por POST.
	if ($_POST)
	{
	
		$validacion = comprobarErroresSopa($_POST);
		if ($validacion != "OK") {

			// Creamos un mensaje de error informando de que la
			// validación ha fallado.
			$mensajeValidacion = "<p class='alert alert-danger'>" . $validacion . "</p>";

			$filas = isset($_POST["filas"]) ? $_POST["filas"] : "";
			$columnas = isset($_POST["columnas"]) ? $_POST["columnas"] : "";
			$palabras = isset($_POST["palabras"]) ? $_POST["palabras"] : "";
		}

		else
		{


			$todasPalabras = array();
			print_r($_POST);
			$todasPalabras[]= $_POST["palabras"];
			$n=(count($_POST)-3);
				for($i = 0; $i <$n ; $i++ ){
					echo "esta" . $i;
					if($_POST["palabras$i"] == true){
					 $todasPalabras[]=$_POST["palabras$i"];
					unset($_POST["palabras$i"]);
					}
					$palabras =implode(",", $todasPalabras); 
					unset($_POST["palabras$i"]);
				}

				$_POST["palabras"]=$palabras;
				$_POST['id_juego']=$id_juego['id'];
			$resultado = guardarSopa($_POST);
			/*print_r($_POST);*/
				if ($resultado == TRUE) 
				{
					header("Location:../ver/ver_juego.php?id=" . $id_juego['id']);
				}else
					{
					echo "Ha ocurrido un fallo al guardar la sopa de letras.";
					}
		}
	}
?>	
<div class="container">

			<div class="contenido">
				<div class="titulo h2-aulas">Crea tu propia sopa de letras</div>
				<br/>

				<?= $mensajeValidacion ?>

			<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
				
				<script>


			$(function(){
				 var contador=0;
				$('#anadirBtn').click(function(){ 

					$("#palabrasTd").append("<input type='text' maxlength='10'  placeholder='Introduce otra palabra' name='palabras" + contador + "'/><br/>");
					//$('<input>').attr('type','text').attr('maxlength','10').attr('name','nuevaPalabra').appendTo('#palabrasTd');
					contador++;

				});


			});

			</script>



		<form name="formulario"  method="POST" >
	
			<table class="">
				<tr>
					<td class="tabla-aulas">Columnas</td>
					<td><select name="columnas" class="">
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
						</select>
					</td>
				</tr>
			
				<tr>
					<td>Filas</td>
					<td>
						<select name="filas">
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
						</select>
					</td>
				</tr>
					
				<tr>
					<td >Palabras: <br/>
						<div id="palabrasTd">
							<input type="text" maxlength="10" value="" placeholder="Introduce una palabra...   " name="palabras"/><br/>
							<!--<input type="text" maxlength="10" value="" name="palabras1"/><br/>
							<input type="text" maxlength="10" value="" name="palabras2"/><br/>
							<input type="text" maxlength="10" value="" name="palabras3"/><br/>
							<input type="text" maxlength="10" value="" name="palabras9"/><br/>-->
						</div>	
						<input type="button" value="+" id="anadirBtn" />
					</td>
				<!--<td>
				<br/>
					<div id="palabrasTd">
						<input type="text" maxlength="10" value="" name="palabras4"/><br/>
						<input type="text" maxlength="10" value="" name="palabras5"/><br/>
						<input type="text" maxlength="10" value="" name="palabras6"/><br/>
						<input type="text" maxlength="10" value="" name="palabras7"/><br/>
						<input type="text" maxlength="10" value="" name="palabras8"/><br/>
					</div>	
				</td>-->
				</tr>

			</table>

				<input type="submit" value="Generar Sopa" />
				
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