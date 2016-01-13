
<? /*
<nav id="site-navigation" class="main-navigation" role="navigation">
								<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
								<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
</nav>
*/
?>

<nav class="navbar navbar-default menu_header" role="navigation">
	<div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      		<span class="sr-only">Menu</span>
	      	<span class="icon-bar"></span>
    	  	<span class="icon-bar"></span>
      		<span class="icon-bar"></span>
    	</button>    
    </div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
   		<ul class="nav navbar-nav">
        	<li><a href="/soluciones-pedagogicas/planificaciones/"><font class="li_menu">Home</font></a></li>
      		<li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
          			<font class="li_menu">Menu de Planificacion </font><b class="caret"></b>
        		</a>
        		<ul class="dropdown-menu">
		          	<li><a href="/soluciones-pedagogicas/planificacion-anual-1/">Planificacion Anual</a></li>
        		  	<li><a href="/soluciones-pedagogicas/planificacion-diaria/">Planificacion Diaria</a></li>		          	
        		</ul>                        
            </li>
      		<li id="menu-item-248" class="menu-item-248"><a href="/soluciones-pedagogicas/visualizar_planificaciones_admin/"><font class="li_menu">Visualizar Planificaciones</font></a></li>
      		<li id="menu-item-963" class="dropdown menu-item-963">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
          		<font class="li_menu">Administracion </font><b class="caret"></b>
        		</a>
        		<ul class="dropdown-menu">
		          	<li><a href="/soluciones-pedagogicas/registro-de-asignaturas/">Asignar Asignaturas a Docentes</a></li>
        		  	<li><a href="/soluciones-pedagogicas/registro-de-planificacion/">Registro Planificacion</a></li>
		          	<li><a href="/soluciones-pedagogicas/registro-de-cursos/">Registro de Cursos</a></li>        		  	
		          	<li><a href="/soluciones-pedagogicas/registro-asignatura/">Registro de Asignaturas</a></li>        		  
		          	<li><a href="/soluciones-pedagogicas/registro-docente/">Registro Docente</a></li>                    
                    <li><a href="/soluciones-pedagogicas/eliminar-docente">Eliminar Docente</a></li>
        		</ul>
      		</li>
            <li><a href="/soluciones-pedagogicas/perfil/"><font class="li_menu">Mi Perfil</font></a></li>
            <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><font class="li_menu_salir">Salir</font></a></li>
	    </ul>
    </div>
   
</nav>
<hr class="hr_menu">
