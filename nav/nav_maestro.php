
        <li><a href="../maestro/index_maestro.php"><img src="../img/home.png" id="casita"></a></li>
        <!--dropdown de aulas-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">AULAS<span class="caret"></span></a>
          <ul class="dropdown-menu submenu">
             <li><a href="../maestro/aulas_maestro.php" class="submenu">Mis aulas</a></li>
             <li><a href="../registros/registrar_aula.php" class="submenu">Crear aulas</a></li>
          </ul>
        </li>
                <!--dropdown de juegos-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">JUEGOS<span class="caret"></span></a>
          <ul class="dropdown-menu submenu">
             <li><a href="../maestro/lista_juegos_maestro.php?id=<?=$_SESSION['usuario']['id']?>">Mis juegos</a></li>
             <li><a href="../registros/registrar_juego.php">Crear juegos</a></li>
          </ul>
        </li>
        <!--dropdown de perfil del profesor-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['usuario']['nombre_usuario']?><span class="caret"></span></a>
          <ul class="dropdown-menu submenu">
           <li><a href="../ver/ver_usuario.php?id=<?=$_SESSION['usuario']['id']?>&privado=1"">Ver perfil</a></li>
           <li><a href="../editar/editar_usuario.php?id=<?=$_SESSION['usuario']['id']?>">Editar perfil</a></li>
            <li role="separator" class="divider"></li>
           <li><a href="../cerrar_sesion.php">Cerrar sesion</a></li>
      </ul>