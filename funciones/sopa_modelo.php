<?php 
include('conexion.php');
function comprobarErroresSopa($datos)
		{

		/*echo "HOLA<pre>";
		print_r($datos);
		echo "</pre>";*/

		if (empty($datos["filas"])) {
			return "Nº de filas erróneo";
		}

		if (empty($datos["columnas"]))
		{
			return "Nº de columnas erróneo";
		}

		if (empty($datos["palabras"]))
		{
			return "Debes introducir alguna palabra";
		}

		return "OK";
	}

function guardarSopa($datos){

		$consulta = consultaInsert($datos,"sopadeletras");
		return ejecutarConsulta($consulta);
	}
//function nuevoGuardar($indices,$datos,$sopadeletras);
function obtenerSopaPorIdJuegos($id){
		$consulta = "SELECT * FROM sopadeletras WHERE id_juego = $id";
		$resultado = hacerListado($consulta);
		return $resultado;
	}


function puntero($arrayPalabras,$filas,$columnas){

	$fX = $filas ;
	$cY = $columnas ;
	$buffer = [];


	$sopaVacia = array();
	$sopa = rellenar($sopaVacia,$filas,$columnas);
	
	$sentido 	 = array ('HD','HI','VU','VD');
	$palabras = count($arrayPalabras)-1;
	$arrayPalabras = ordenarTamano($arrayPalabras);


	for($p=0; $p <= $palabras; $p++){
		$palabra =$arrayPalabras[$p] ;
		$longitud  = strlen($palabra);
		$letras = separarLetras($palabra);
		$contador=0;
		

		for ($x = 0; $x < $fX; $x++){
			for($y = 0; $y < $cY; $y++){
				for($i=0; $i <= 3; $i++){
					$coordenadas = array($x,$y);
					$sentidos = $sentido[$i];
					//print_r($y);
					switch ($sentidos){
						case 'HD':
						   if ((($y+$longitud)<=$cY) && (vacio($sopa,$longitud,$letras,$coordenadas,$sentidos))){
						 		$buffer[$contador]['coordenadasX']=$x;
						 		$buffer[$contador]['coordenadasY']=$y;
						 		$buffer[$contador]['posicion']=$sentidos;
						 		$contador++;

						 	
						 	 }
						 break;
						case 'HI':
						    if ((($y-$longitud)>=0) && (vacio($sopa,$longitud,$letras,$coordenadas,$sentidos))){
						 		$buffer[$contador]['coordenadasX']=$x;
						 		$buffer[$contador]['coordenadasY']=$y;
						 		$buffer[$contador]['posicion']=$sentidos;
						 		$contador++;
						 	
						 	 }
						 break;
						case 'VU':
							if ((($x-$longitud)>=0) && (vacio($sopa,$longitud,$letras,$coordenadas,$sentidos))){
						 		$buffer[$contador]['coordenadasX']=$x;
						 		$buffer[$contador]['coordenadasY']=$y;
						 		$buffer[$contador]['posicion']=$sentidos;
						 		$contador++;


						 	 }
						 break;
						case 'VD':
							if ((($x+$longitud)<=$fX) && (vacio($sopa,$longitud,$letras,$coordenadas,$sentidos))){
						 		$buffer[$contador]['coordenadasX']=$x;
						 		$buffer[$contador]['coordenadasY']= $y;
						 		$buffer[$contador]['posicion']=$sentidos;
						 		$contador++;
				
						 	 }
						 break;

					}//switch sentidos

				}//for sentidos
			}//for Y
		}//for X

		
	  $aleatorio = rand(0,$contador-1);

		$x = $buffer[$aleatorio]['coordenadasX'];
		$y = $buffer[$aleatorio]['coordenadasY'];

		$sentidoRand = $buffer[$aleatorio]['posicion'];

				switch ($sentidoRand){ //INTRODUCIR
				case 'VD':
				        for ($z=0;$z<$longitud;$z++){
								$sopa[$x+$z][($y)] = $letras[$z];
						 // la sopa debe ir previamente llena con '5';
						}
				    break;
				case 'VU':
				        for ($z=0;$z<$longitud;$z++){
								$sopa[$x-$z][($y)] =  $letras[$z];
						}
				    break;
				case 'HD':
				        for ($z=0;$z<$longitud;$z++){
								$sopa[($x)][$y+$z] =  $letras[$z];
						}
				    break;
				case 'HI':
				        for ($z=0;$z<$longitud;$z++){
				            	$sopa[($x)][$y-$z] =  $letras[$z];
				        }
				    break;
				    //print_r($sopa);
			}//switch
			unset($buffer);
			$buffer = array ();
	}//for p (palabras)
	//imprimirSopa($sopa,$columnas,$filas);



	for($i=0; $i< $fX; $i++){
		for($j = 0; $j< $cY; $j++){
			if(!is_numeric($sopa[$i][$j])){
			$letras = $sopa[$i][$j];
			}else{
				$sopa[$i][$j]= chr(rand(ord("A"),ord("Z")));
			}
		}
	}

	return $sopa;
}
////////////////////////////////////////////////////////////
	function vacio ($sopa,$longitud,$letras,$coordenadas,$sentido){
	$x = $coordenadas[0];// esta es la x
	$y = $coordenadas[1];//es el de la y

	$seguir = TRUE;
	switch ($sentido){
		case 'HD':
		        for ($z=0;( $z<($longitud) && $seguir);$z++){
		            if(!is_numeric($sopa[$x][($y+$z)]) && ($letras[$z] != $sopa[$x][($y+$z)])){
					$seguir = FALSE;
					} 
		        }
			break;
		case 'HI':
		        $n = $y + $longitud - 1; //coordenada final
		        for ($z=0;($z<($longitud) && $seguir);$z++){
		            if(!is_numeric($sopa[$x][($y-$z)]) && ($letras[$z] != $sopa[$x][($y-$z)])){
		            $seguir = FALSE;
		            } 
		        }
		    break;
		case 'VD':
		        for ($z=0;($z<($longitud) && $seguir);$z++){
		            if(!is_numeric($sopa[($x+$z)][$y]) && ($letras[$z] != $sopa[($x+$z)][$y])){ 
		            $seguir = FALSE;
		            } 
		        }
		    break;
		case 'VU':

		        for ($z=0;($z<($longitud) && $seguir);$z++){
		            if(!is_numeric($sopa[($x-$z)][$y]) && ($letras[$z] != $sopa[($x-$z)][$y])){ 
		            $seguir = FALSE;
		            }
		        }
		    break;
	}
	return $seguir;
}
////////////////////////////////////////////////////////////
function separarLetras($palabra){
	$mayusculas = strtoupper($palabra);
	$letras = str_split($mayusculas);

	//print_r($nuevaPalabra); 
	return $letras;
}
////////////////////////////////////////////////////////////
function ordenarTamano($palabras){
	array_multisort(array_map('strlen', $palabras), $palabras);

	$array = array_reverse($palabras);
	
	return $array;
}
////////////////////////////////////////////////////////////


function imprimirSopa($sopa,$filas,$columnas){
	$filas =$filas-1;
	$columnas = $columnas -1;

	echo  "<table border='2' >";
	for($i=0; $i<=$filas; $i++){
			echo "<tr>";
		for($j = 0; $j<=$columnas; $j++){
			if(!is_numeric($sopa[$i][$j])){
			$letras = $sopa[$i][$j];
				echo "<td><div class="."casilla".">$letras</div></td>";
			}else{
				$letra= chr(rand(ord("A"),ord("Z")));
				echo "<td><div class="."casilla"." id='$i.$j'>$letra</div></td>";
			}
		}
	echo "</tr>\n";		
	}
	echo  "</table>";
}
function rellenar($array,$filas,$columnas){ //// PRUEBA PARA RELLENAR EL ARRAY
$f = $filas - 1;
$c = $columnas -1;
	for($i = 0; $i <= $f ; $i++){
		for($j = 0; $j <= $c; $j++){
			$array[$i][$j]= "5";
		}
	}

return $array;
}

//$arrayPalabras = array ("putafina" , "eneko", "putazo", "putero","chuloputas","prostituta","puta");
//puntero($arrayPalabras, 10, 10);
/////////////////////////////////////////
//imprimirSopa($sopa,10,10)

?>