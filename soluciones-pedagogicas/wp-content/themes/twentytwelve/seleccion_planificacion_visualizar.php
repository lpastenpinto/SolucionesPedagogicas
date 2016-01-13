<?
/*
Template Name: seleccion_visualizar_planificacion
*/
session_start();
get_header();

$users = get_users( 
		array(  
			'meta_key'     => 'jefe_docente',
			'meta_value'   => $current_user->user_login,
			'posts_per_page' => -1
		) 
);

$docentes = array();
$i=0;
foreach($users as $user){
	$docentes[$i]=$user->display_name;
	$i++;	
}
//$user->display_name 

$tipo_planificacion=$_GET['tipo_planificacion'];
$curso=get_the_title($_GET['cu_so']);
$asignatura=$_GET['asignatura'];

$args = array(    	
    	'post_type' => $tipo_planificacion,
		'posts_per_page' => -1,				
		'meta_query' => array(
        	array  (
	            'meta_key' => 'Asignatura',
        	    'meta_value'=> $asignatura
	        ),
	        array  (
	            'meta_key' => 'Curso',
        	    'meta_value'=> $curso
	        )	        
	    )
	);
	query_posts( $args );
		
	$autor_planificacion="";		
	while (have_posts()) : the_post();				
		
		if(in_array(get_the_author(),$docentes)){
			$autor_planificacion=get_the_author_meta('ID');	
			$nombre_autor_planificacion=get_the_author();		
			break;
		}
	endwhile;
	
	wp_reset_query();

	$args = array(    	
    	'post_type' => $tipo_planificacion,
		'posts_per_page' => -1,	
		'author' =>	$autor_planificacion			
	);
	
	
	query_posts( $args);
	
	?>
	<div class="container">
		<div class="row contenedor">
			<div class="span12">
        		<div class="row contenedor_margenes">
	
	<?
			
	$_SESSION['nombre_autor_planificacion']=$nombre_autor_planificacion;	
	if((strcmp($tipo_planificacion,'planificacion_anual')== 0)){
		?>
		<div class="row">
        	<div class="span12">
            	<font color="white" style="font-size:25px;"><u>Escoja Planificacion Unidades Asignatura:<? echo $asignatura; ?> Curso:<? echo $curso;?> Docente:<? echo $nombre_autor_planificacion; ?></u></font>
            </div>
		<?						
		while (have_posts()) : the_post();		
			$asignatura_planificacion=get_post_meta(get_the_ID(),'Asignatura',true);
			$curso_planificacion=get_post_meta(get_the_ID(),'Curso',true);							
			if((strcmp($asignatura_planificacion,$asignatura)== 0) && (strcmp($curso_planificacion,$curso)== 0) ){	
				echo '<div class="span12">';
					echo '<a href="/soluciones-pedagogicas/visualizar-planificacion-anual?id_planificacion='.get_the_ID().'">'.get_the_title().'</a>';
				$revisado=get_post_meta(get_the_ID(),'Validado');
				if(!empty($revisado)){
					echo "(Validado)";	
				}
				echo '</div>';
			}	
		endwhile;
		
	}else{
		?>
		<div class="row">
        	<div class="span12">
            	<font color="white" style="font-size:25px;"><u>Escoja Planificacion Clases a Clase Asignatura:<? echo $asignatura;?> Curso:<? echo $curso;?> Docente:<? echo $nombre_autor_planificacion;?></u></font>
            </div>		
		<?		
		while (have_posts()) : the_post();		
			$asignatura_planificacion=get_post_meta(get_the_ID(),'Asignatura',true);
			$curso_planificacion=get_post_meta(get_the_ID(),'Curso',true);									
			if((strcmp($asignatura_planificacion,$asignatura)== 0) && (strcmp($curso_planificacion,$curso)== 0) ){
				echo '<div class="span12">';	
					echo '<a href="/soluciones-pedagogicas/visualizar-planificacion-clase?id_planificacion_clase='.get_the_ID().'">'.get_the_title().'</a>';
				$revisado=get_post_meta(get_the_ID(),'Validado');
				if(!empty($revisado)){
					echo "(Validado)";	
				}
				echo '</div>';
			}	
		endwhile;
		
		
	}

?>				</div>
<br />
<br />
			</div>
		</div>            
	
    <br />
   
</div>

<br />
 <div class="row">
    	<div class="span12">
        	<a class="boton" href="/soluciones-pedagogicas/visualizar_planificaciones_admin/">Volver Atras</a>
        </div>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>	