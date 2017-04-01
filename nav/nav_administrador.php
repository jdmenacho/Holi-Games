        <li><a href="../administrador/index_administracion.php"><img src="../img/home.png" id="casita"></a></li>
        <!-- dropdown de usuarios-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
          <ul class="dropdown-menu submenu">
             <li><a href="../administrador/lista_alumnos.php">Lista alumnos</a></li>
             <li><a href="../administrador/lista_maestros.php">Lista maestros</a></li>
             <li><a href="../registros/registrar_usuario.php">Crear usuario</a></li>
          </ul>
        </li>
        <!--dropdown de aulas-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">AULAS<span class="caret"></span></a>
          <ul class="dropdown-menu submenu">
             <li><a href="../administrador/lista_aulas.php">Lista aulas</a></li>
             <li><a href="../registros/registrar_aula.php">Crear aulas</a></li>
          </ul>
        </li>
                <!--dropdown de juegos-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">JUEGOS<span class="caret"></span></a>
          <ul class="dropdown-menu submenu">
             <li><a href="../administrador/lista_juegos.php">Lista juegos</a></li>
             <li><a href="../registros/registrar_juego.php">Crear juegos</a></li>
          </ul>
        </li>
        <!--dropdown de perfil del profesor-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['usuario']['nombre_usuario']?><span class="caret"></span></a>
          <ul class="dropdown-menu submenu">
           <li><a href="../ver/ver_usuario.php?id=<?=$_SESSION['usuario']['id']?>&privado=1">Ver perfil</a></li>
           <li><a href="../editar/editar_usuario.php?id=<?=$_SESSION['usuario']['id']?>">Editar perfil</a></li>
            <li role="separator" class="divider"></li>
           <li><a href="../cerrar_sesion.php">Cerrar sesion</a></li>
      </ul>