<!--si se descuadra la sopa de letras introducir un div con las dimesiones de 890px de ancho o 
mas facil aun modificar la clase de casilla en sopa_letras.css y aumentar a 44px el left, top, width, height y line-height o bajar a 40 px
todo depende de las dimensiones de la pantalla
por tanto lo importante de aqui es el array que queda recogido en la variable $sopa, el como se presente en pantalla depende del administrador jiji
aaaaa no copies este codigo que es una gran chapuza no coregido, poco fiable, muy extendida y a la que le faltan muchas funciones. por tanto no copiar, que la liais, que realmente no va asi, el codigo es mucho mas corto e incomprensible.-->
<?php
	session_start();
	include_once("../funciones/sopa_modelo.php");
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
		$tituloPagina=$_GET['titulo'];
    	$tituloEncabezado=$_GET['tipo'];
   		$descripcionEncabezado=$_GET['titulo'];
    	$titulo="";
    	$descripcion="";
		$linksEncabezado="<script defer type='text/javascript' src='../js/sopa_letras.js'></script><link href='../css/sopa_letras.css' rel='stylesheet'>";
							$resultados = obtenerSopaPorIdJuegos($_GET['id']); 
							$respuestas=explode(",", strtoupper($resultados[0]['palabras']));
							$numeroPalabras = count($respuestas);
							$columnas=$resultados[0]['filas'];
							$filas=$resultados[0]['columnas'];
							$sopa = puntero($respuestas,$filas,$columnas);
							$altura = ($filas*40)."px";
							$anchura = ($columnas*40)."px";
							//print_r($anchura);
							//print_r($altura);
	ob_start();
	?>
		<div class="container-fluid">
		<div class="col-md-10 col-md-offset-2 contenedor-sopa">
		
			<div class="row">
				<div class="col-md-5 sopa-container">
					<div style="width: <?=$altura?>; height: <?=$anchura?>;">
						<?php 
							for($i = 0; $i < $filas; $i++): for($j = 0; $j < $columnas; $j++):?>
							<div class="casilla" id="<?= $i . $j?>"><?= $sopa[$i][$j]; ?></div>

						<?php endfor; endfor;?>
					</div>
				</div>
				
				<div class="col-md-5 palabrasLista">
					<h2 class="tituloLista">LISTA DE PALABRAS</h2>
					<ul>
						<?php
							$cuentaRespuestas = count($respuestas);

							for($z = 0; $z < $cuentaRespuestas; $z++ ): ?>
								<li class="listaPalabras" id="<?= $z?>"><?= $respuestas[$z]; ?></li>
							<?php endfor;?>
					</ul>
				</div>
					
			</div>
		</div>
		</div>
		
		
		<script>
			var palabras = ['<?= implode("', '", $respuestas); ?>'];

		</script>
	<?php
	  	$contenidoSeccionPrincipal=ob_get_contents();
  		ob_end_clean();
  		include("../master.php");
	?>