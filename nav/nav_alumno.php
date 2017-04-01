        <li><a href="../alumno/index_alumno.php"><img src="../img/home.png" id="casita"></a></li>
        <!--dropdown de aulas-->
        <li><a href="../alumno/juegos_alumno.php?id='<?=$_SESSION['usuario']['id']?>">Mis juegos</a></li>
        <li><a href="../alumno/aulas_alumno.php?id='<?=$_SESSION['usuario']['id']?>">Mis Aulas</a></li>
        <li><a href="">Mis Puntuaciones</a></li>
        <!--dropdown de perfil del profesor-->
        <li class="dropdown submenu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['usuario']['nombre_usuario']?><span class="caret"></span></a>
          <ul class="dropdown-menu submenu">
           <li class="submenu"><a href="../ver/ver_usuario.php?id=<?=$_SESSION['usuario']['id']?>&privado=1"">Ver perfil</a></li>
           <li class="submenu"><a href="../editar/editar_usuario.php?id=<?=$_SESSION['usuario']['id']?>">Editar perfil</a></li>
            <li role="separator" class="divider"></li>
           <li class="submenu"><a href="../cerrar_sesion.php">Cerrar sesion</a></li>
          </ul>