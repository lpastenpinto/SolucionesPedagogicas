<?php                                                                                                                                                                                                                               
/*
Template Name: Planificacion
*/
?>
<?
 $pagePath = explode('/wp-content/', dirname(__FILE__));
    include_once(str_replace('wp-content/' , '', $pagePath[0] . '/wp-load.php'));
	
session_start();
session_destroy();
session_start();
?>
   
<? 

$current_user = wp_get_current_user();
$nombre_profesor=$current_user->user_login;
$_SESSION['nombre_d']=$current_user->first_name.' '.$current_user->last_name;
$_SESSION['id_usuario']=$current_user->ID;

$id_colegio=get_user_meta($current_user->ID,'id_colegio',true);
wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');         
$img = get_post_meta($id_colegio, 'wp_custom_attachment', true);   
//echo '<img src="'.$img['url'].'"  style="width: 100px; height: 100px">'; 

echo "<style type='text/css'>
        		    .imagen {
						background-image: url(".$img['url'].");
						background-repeat: no-repeat;
						background-position: center center;
						background-attachment: fixed;
			            -webkit-background-size: cover;
						-moz-background-size: cover;
						-o-background-size: cover;
						background-size: cover;
            		}
					
																			
          </style>"; 	
echo $nombre_jefe=get_post_meta($_SESSION['id_usuario'],'jefe_docente',true);
if(empty($nombre_profesor)){
	$_SESSION['login']=false;	
}
else
{
	$_SESSION['login']=true;
}
get_header();
?>

<?
//echo do_shortcode( '[ngg_uploader id=3]' );
//echo do_shortcode('[nggallery id=3]'); 

echo '<div class="imagen">';
if(empty($nombre_profesor)){
	
	echo "<style type='text/css'>
        		    .menu-menu-1-container {
			            display: none;
            		}									
          </style>";		
	include('form_login.php');
						
	
	?>
   
	<?
	
}
else{
	include('menu_planificacion.php');	
}
echo '</div>';	
?>

<?php get_footer(); ?>

<script type="text/javascript">
var a=0;
function vermas(div) {
	if(a==0){
	var eldiv =document.getElementById(div);
	eldiv.style.display="block";
	
	a=1;
	}
	else{
	a=0;	
	var eldiv =document.getElementById(div);
	eldiv.style.display="none";
		}
	
}
</script>	                            
                          
                            
                            
                            
                            
                            
                            
                            