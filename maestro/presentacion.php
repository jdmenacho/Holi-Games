<?php
include_once('../control_sesion.php');
$tituloPagina="Holi - Plataforma de juegos educativos";
$tipoNav="maestro";
$tituloEncabezado="Presentación";
$descripcionEncabezado="“El juego forma parte de la inteligencia del niño”. PIAGET";
	ob_start();
?>
<div class="container presentacion">
	           <div class="row">
                <div class="col-sm-10 col-sm-offset-2 portfolio-item">
                        <div class="caption presentacion">                           
                  			<p>El propósito principal de HOLI GAMES es ofrecer recursos educativos orientados a la etapa de Educación Primaria centrándonos principalmente tanto en los alumnos como en los maestros contribuyendo así de forma directa al desarrollo de las Tecnologías de la Información y la Comunicación (TIC).</p>
                            
                            <h3>¿Qué ofrecemos?</h3><br/>
                            <p>Nuestro contenido ofrece la posibilidad de crear juegos interactivos adaptándolos a las capacidades e intereses de los alumnos, ciclo en el que se encuentran, y asignatura concreta, otorgando por tanto gran versatilidad y rango de acción en favor del maestro para con los alumnos.</p>
                            
                            <p>Nuestra intención educativa se encuentra además ligada a la educación en valores, el aprendizaje cooperativo, y a la contribución de cada una de las siete Competencias Clave que promueve la Consejería de Educación de la Comunidad Autónoma de Extremadura a través de una metodología activa que favorezca la autonomía del alumno/a, situándonos por tanto a la vanguardia de las ideas educativas más actuales.</p><br/>

                            <h3>¿Cuáles son los objetivos principales?</h3><br/>
                                <p>Debido a que se trata de una web orientada al aprendizaje del alumno, los objetivos propuestos pueden resumirse en los siguientes puntos:</p>
                                    <ul>
                                        <li>Resolver situaciones problema  utilizando las capacidades cognitivas en cada una de las áreas que marca el currículo.</li>
                                        <li>Promover la iniciativa personal a la hora de llevar a cabo la solución de las distintas situaciones propuestas.</li>
                                        <li>Utilizar las Tecnologías de la Información y la Comunicación como herramienta de apoyo al desarrollo cognitivo del alumno/a.</li>
                                        <li>Contribuir al desarrollo las Competencias Claves establecidas por el actual Currículo, destacando entre ellas el Sentido de Iniciativa y Espíritu Emprendedor, la competencia de Aprender a Aprender y por supuesto la Competencia digital.</li>
                                        <li>Promover la educación en valores, a través de una utilización responsable de las TIC principalmente.</li>
                                        <li>Enfoque constructivista del aprendizaje.</li>
                                        <li>wY por supuesto, utilizar el juego y la enseñanza mediante la búsqueda como medio fundamental en el aprendizaje del niño/a.
                                        </li>
                                    </ul><br/>

                                <h3>¿A quién va dirigido?</h3><br/>
                                    <p>Se trata de una herramienta de trabajo donde el maestro posee total libertad a la hora de diseñar y elaborar los contenidos de los distintos juegos y poder adaptar dichos contenidos a las necesidades educativas de los alumnos y a cada uno de los ciclo de Primaria. </p>
                                    <p>Nuestros contenidos van dirigidos más concretamente a:</p>
                                    <div class="maestro">
                                    <h4>Maestros:</h4>                                       
                                        <p><b>Versatilidad:</b> Innumerables posibilidades de utilización.</p>
                                        <p><b>Autonomía:</b> Elaboración personal de cada juego.</p>
                                        <p><b>Seguimiento</b> y control de rendimiento de los alumnos.</p>
                                        <p> Obtención de gran gama de <b>recursos educativos.</b></p>
                                    </div>

                                    <div class="alumno">
                                    <h4>Alumnos:</h4>
                                        <p><b>Interactividad:</b> A través, no sólo del desarrollo de cada juego, sino también del seguimiento personal del rendimiento.</p>
                                        <p><b>Autonomía:</b> A través de su propia toma de decisiones, y la libertad en la realización de cada juego.</p>
                                        <p><b>Autoevaluación:</b> Pues conocerá por sí mismo el resultado de cada juego realizado.</p>
                                        <p> Metodología <b>activa</b> y <b>participativa.</b></p>
                                        <p> Aprendizaje <b>lúdico/cognitivo:</b> Ya que el juego es la fórmula principal del aprendizaje.</p>
                                    </div><br/>

                                    <p class="final">Para saber más, pueden contactar con nosotros a través de las diversas redes sociales o mediante la dirección de email: holi@holi.com.</p>

                            
                        </div>
                </div>
                
</div>
<?php
	$contenidoSeccionPrincipal=ob_get_contents();
	ob_end_clean();
	include("../master.php");
?>