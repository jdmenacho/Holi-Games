<?php 
    if(empty($tituloPagina)){$tituloPagina="Holi - Plataforma de juegos educativos";};
    if(empty($linksEncabezado)){$linksEncabezado="";}
    if(empty($tipoNav)){$tipoNav="general";};
    if(empty($tituloEncabezado)){$tituloEncabezao="Holi Games";}
    if(empty($descripcionEncabezado)){$descripcionEncabezado="";}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Plataforma de juegos educativos">
    <meta name="author" content="">

    <!-- la variable $liksEncabezado es para introducir nuevo links css, javascript o de cualquier tipo en la pagina-->
            <?=$linksEncabezado?>
        <title><?=$tituloPagina?></title>
    <!-- Bootstrap Core CSS -->
    <link href="/holigames/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom Fonts -->
    <link href="/holigames/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="/holigames/css/master.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <!--INICIO NAVBAR-->

    <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img src="../img/logo-01.png" class="logo"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <!-- los valores posibles de $tipoNav son maestro,alumnos,administrador,principal,inicioSesion que solo tiene un inicio de sesion-->
                        <?php include("../nav/nav_" . $tipoNav . ".php");?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!--FIN NAVBAR-->

    <!--INICIO ENCABEZADO-->
      <?php if(!empty($tituloEncabezado)):?>
    <header class="encabezado">
       <div class="intro-text">
                    <!--titulo del encabezado-->
                        <span class="name"><?=$tituloEncabezado?></span>
                        <hr class="star-light">
                        <!--descripcion del encaezado-->
                        <span class="skills"><?=$descripcionEncabezado?></span>   
         </div>
    </header>
    <?php endif;?>
    <!--FIN ENCABEZADO-->

    <!--INICIO SECCION PRINCIPAL-->

    <section>
            <div class="container-fuid">
                <?php
                if(!empty($contenidoSeccionPrincipal))
                        echo $contenidoSeccionPrincipal;
                ?>
            </div>
    </section>

    <!--FIN SECCION PRINCIPAL-->

      <!-- INICIO FOOTER -->

    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Localización</h3>
                        <p>Calle Ronda Pilar, 20
                            <br>Badajoz, España</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Síguenos en redes sociales.</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3></h3>
                     <a class="navbar-brand page-scroll" href="#page-top"><img src="/holigames/img/logo-01.png" class="logo"/></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Curso de PHP. Proyecto final 2017.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--FIN FOOTER-->

    <!-- jQuery -->
    <script src="/holigames/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/holigames/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="/holigames/js/new-age.min.js"></script>

</body>

</html>
