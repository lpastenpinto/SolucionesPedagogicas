<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo("stylesheet_url"); ?>"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>


<link rel="stylesheet" type="text/css" href="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/sp_style.css" />
 <link rel="stylesheet" href="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/css/bootstrap.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/css/responsive.css" type="text/css" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/js/jquery.js"></script>
    <script type="text/javascript" src="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/js/jquery.easing.1.3.js"></script>
    <script src="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/js/jquery.ui.totop.js" type="text/javascript"></script> 
    
</head>
<body <?php //body_class(); ?> class="cuerpo">
<!--  <div id="page" class="hfeed site"> site-header  -->
	<header id="masthead" class="" role="banner">
		<hgroup>        	        				
			<?	
    				if($_SESSION['login']==false){
						//class="logo_login"
						?>
						<div class="row">
                        	<div class="span12">
                            	<div class="span7 offset3">
    			                    	<img  class="img-responsive" src="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/logo-login.png">
	                            </div>
                            </div>
                        </div>
                        <?
					}else{
						?>
                        <div class="row">
                        	<div class="span12">
                            	<div class="span5" style="margin-left:inherit !important;">
                                	<img class="img-responsive" src="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/logosp.png">
                                </div>
                                <div class="span6">
                                	<div class="posicion_menu_div_padre"><? //width:100%; height:30%;?>
										<div class="posicion_menu_div_hijo"><? // width:50%;?>
										<?	
										include('menu_header.php');
										?>							
										</div>
		                       		 </div>                                
                                </div>
                            </div>
                        </div>
						
                        <?
					}    
			?>
       		
		</hgroup>
		<? /*
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->*/
		?>
		
        <div style="clear:left;"></div>
	</header><!-- #masthead -->

	<!--  <div id="main" class="wrapper">  -->
    