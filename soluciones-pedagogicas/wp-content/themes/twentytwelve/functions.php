<?php function create_post_types() {
	$post_types = array(
		array('Planificacion Anual', 'planificacion_anual', 'Agregar Nueva'),
		array('Planificacion Clase a Clase', 'planificacion_clase', 'Agregar Nueva'),	
		array('Curso', 'curso', 'Agregar Nuevo'),
    	array('Base curricular', 'base_curricular', 'Agregar Nueva'),
		array('Colegio', 'colegio', 'Agregar Nueva'),
		array('Carta Gantt', 'carta_gantt', 'Agregar Nueva')		
								
	);

	foreach($post_types as $t) {
		$args = array(
			'label' => $t[0],
			'rewrite' => array('slug' => $t[1]),
			'description ' => $t[2],
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 80,
			'capability_type' => 'post',
			'hierarchical' => false,			
			'has_archive' => false,
			'supports' => array('title','author','excerpt','custom-fields'),			
			
		);
		register_post_type( $t[1], $args );
	}
}

add_action( 'init', 'create_post_types');
function agregar_campos_colegio(){
	add_meta_box('wp_custom_attachment','Foto Colegio','wp_custom_attachment','colegio','side');   
}
add_action('admin_menu', 'agregar_campos_colegio');

function agregar_campos_planificacion_anual() {
    //add_meta_box('Docente','Docente','Docente','planificacion_anual','normal','high');		   
    add_meta_box('Semestre','Semestre','Semestre','planificacion_anual','normal','high');
    add_meta_box('Asignatura','Asignatura','Asignatura','planificacion_anual','normal','high');
    add_meta_box('Curso','Curso','Curso','planificacion_anual','normal','high');
    add_meta_box('Unidad','Unidad','Unidad','planificacion_anual','normal','high');
    add_meta_box('FormasEvaluacion','FormasEvaluacion','FormasEvaluacion','planificacion_anual','normal','high'); 
	add_meta_box('TiposEvaluacion','TiposEvaluacion','TiposEvaluacion','planificacion_anual','normal','high'); 
    add_meta_box('EstrategiaAprendizaje','EstrategiaAprendizaje','EstrategiaAprendizaje','planificacion_anual','normal','high');
    add_meta_box('Habilidades','Habilidades','Habilidades','planificacion_anual','normal','high'); 
    add_meta_box('Actitudes','Actitudes','Actitudes','planificacion_anual','normal','high');
    add_meta_box('IndicadoresEvaluacion','IndicadoresEvaluacion','IndicadoresEvaluacion','planificacion_anual','normal','high'); 
    add_meta_box('ObjetivosAprendizajes','ObjetivosAprendizajes','ObjetivosAprendizajes','planificacion_anual','normal','high'); 
    add_meta_box('ConceptosAprender','ConceptosAprender','ConceptosAprender','planificacion_anual','normal','high');
    add_meta_box('NumeroClases','NumeroClases','NumeroClases','planificacion_anual','normal','high'); 
    add_meta_box('Semana','Semana','Semana','planificacion_anual','normal','high');
    add_meta_box('FechaInicial','FechaInicial','FechaInicial','planificacion_anual','normal','high');
    add_meta_box('FechaFinal','FechaFinal','FechaFinal','planificacion_anual','normal','high');
	add_meta_box('Meses','Meses','Meses','planificacion_anual','normal','high'); 
	add_meta_box('IdBaseCurricular','IdBaseCurricular','IdBaseCurricular','planificacion_anual','normal','high');
	add_meta_box('Validado','Validado','Validado','planificacion_anual','normal','high');
	                               	
}
add_action('admin_menu', 'agregar_campos_planificacion_anual');


function agregar_campos_planificacion_clase() {		   
    add_meta_box('Asignatura','Asignatura','Asignatura','planificacion_clase','normal','high');
	add_meta_box('Curso','Curso','Curso','planificacion_clase','normal','high');			                 		    		    add_meta_box('NumeroSemana','NumeroSemana','NumeroSemana','planificacion_clase','normal','high');                    	
	add_meta_box('UnidadAprendizaje','UnidadAprendizaje','UnidadAprendizaje','planificacion_clase','normal','high');
	add_meta_box('NumeroClase','NumeroClase','NumeroClase','planificacion_clase','normal','high');
	add_meta_box('ConceptosClaves','ConceptosClaves','ConceptosClaves','planificacion_clase','normal','high');
	add_meta_box('ObjetivosAprendizaje','ObjetivosAprendizaje','ObjetivosAprendizaje','planificacion_clase','normal','high');
	add_meta_box('Indicadores','Indicadores','Indicadores','planificacion_clase','normal','high');	
	add_meta_box('RecursosPedagogicos','RecursosPedagogicos','RecursosPedagogicos','planificacion_clase','normal','high');
	add_meta_box('Tiempo','Tiempo','Tiempo','planificacion_clase','normal','high');
	add_meta_box('Actitudes','Actitudes','Actitudes','planificacion_clase','normal','high');
	add_meta_box('Fecha','Fecha','Fecha','planificacion_clase','normal','high');
	add_meta_box('Inicio','Inicio','Inicio','planificacion_clase','normal','high');
	add_meta_box('Desarrollo','Desarrollo','Desarrollo','planificacion_clase','normal','high');
	add_meta_box('Cierre','Cierre','Cierre','planificacion_clase','normal','high');
	add_meta_box('IdPlanificacionAnual','IdPlanificacionAnual','IdPlanificacionAnual','planificacion_clase','normal','high');
	add_meta_box('Evaluacion','Evaluacion','Evaluacion','planificacion_clase','normal','high');	
	//add_meta_box('Habilidades','Habilidades','Habilidades','planificacion_clase','normal','high');		
	add_meta_box('Habilidades','Habilidades','Habilidades','planificacion_clase','normal','high');
	add_meta_box('Validado','Validado','Validado','planificacion_clase','normal','high');
}
add_action('admin_menu', 'agregar_campos_planificacion_clase');



function agregar_campos_objetivos_aprendizaje() {
    //add_meta_box('Docente','Docente','Docente','planificacion_anual','normal','high');		   
    add_meta_box('Conceptos','Conceptos','Conceptos','objetivos','normal','high');
    add_meta_box('Indicadores','Indicadores','Indicadores','objetivos','normal','high');
    add_meta_box('Habilidades','Habilidades','Habilidades','objetivos','normal','high');
    add_meta_box('Actitudes','Actitudes','Actitudes','objetivos','normal','high');                            	
}


add_action('admin_menu', 'agregar_campos_objetivos_aprendizaje');


function agregar_campos_objetivos_gantt() {    		   
    add_meta_box('Unidad_1','Unidad_1','Unidad_1','carta_gantt','normal','high');   
	add_meta_box('Unidad_2','Unidad_2','Unidad_2','carta_gantt','normal','high');
	add_meta_box('Unidad_3','Unidad_3','Unidad_3','carta_gantt','normal','high');
	add_meta_box('Unidad_4','Unidad_4','Unidad_4','carta_gantt','normal','high'); 
	add_meta_box('Curso','Curso','Curso','carta_gantt','normal','high'); 
	add_meta_box('Asignatura','Asignatura','Asignatura','carta_gantt','normal','high'); 
	                         	
}
add_action('admin_menu', 'agregar_campos_objetivos_gantt');

function agregar_campos_curso() {
    add_meta_box('Asignaturas','Asignaturas','Asignaturas','curso','normal','high');
	add_meta_box('Letra','Letra','Letra','curso','normal','high');
	add_meta_box('NivelCurso','NivelCurso','NivelCurso','curso','normal','high');	
	add_meta_box('NumeroCurso','NumeroCurso','NumeroCurso','curso','normal','high');
	add_meta_box('NombreCurso','NombreCurso','NombreCurso','curso','normal','high');	
}
add_action('admin_menu', 'agregar_campos_curso');

function Asignaturas() {
    global $wpdb, $post;
    $values  = get_post_meta($post->ID, 'Asignaturas', true);
	echo '<label class="hidden" for="Asignaturas" >Asignaturas</label>';
	foreach ( $values as $value) {
		$consulta = "SELECT nombre FROM asignaturas WHERE id='".htmlspecialchars($value)."'";
		$nombre_asignatura_ = $wpdb->get_var( $consulta );
   		echo '<input readonly type="text" name="Asignaturas" id="Asignaturas" value="'.$nombre_asignatura_.'" style="width: 300px;" />';
		echo '<br>';
		
	}       	
}

function Conceptos() {
    global $wpdb, $post;
    $values  = get_post_meta($post->ID, 'Conceptos', true);
	echo '<label class="hidden" for="Conceptos" >Conceptos</label>';
	foreach ( $values as $value) {
   		echo '<input readonly type="text" name="Conceptos" id="Conceptos" value="'.$value.'" style="width: 300px;" />';
		echo '<br>';
		
	}       	
}
function Indicadores() {
    global $wpdb, $post;
    $values  = get_post_meta($post->ID, 'Indicadores', true);
	echo '<label class="hidden" for="Indicadores" >Indicadores</label>';
	foreach ( $values as $value) {		
   		echo '<input readonly type="text" name="Indicadores" id="Indicadores" value="'.$value.'" style="width: 300px;" />';
		echo '<br>';
		
	}       	
}
function Habilidades() {
    global $wpdb, $post;
    $values  = get_post_meta($post->ID, 'Habilidades', true);
	echo '<label class="hidden" for="Habilidades" >Habilidades</label>';
	foreach ( $values as $value) {		
   		echo '<input readonly type="text" name="Habilidades" id="Habilidades" value="'.$value.'" style="width: 300px;" />';
		echo '<br>';
		
	}       	
}
function Actitudes() {
    global $wpdb, $post;
    $values  = get_post_meta($post->ID, 'Actitudes', true);
	echo '<label class="hidden" for="Actitudes" >Actitudes</label>';
	foreach ( $values as $value) {		
   		echo '<input readonly type="text" name="Actitudes" id="Actitudes" value="'.$value.'" style="width: 300px;" />';
		echo '<br>';
		
	}       	
}
/*
function Docente() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, Docente, true);
    echo '<label class="hidden" for="Docente" >Docente</label>
  	<input type="text" name="Docente" id="Docente" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}*/  
function IdPlanificacionAnual() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'IdPlanificacionAnual', true);
    echo '<label class="hidden" for="IdPlanificacionAnual" >Id Planificacion Anual</label>
  	<input type="text" name="IdPlanificacionAnual" id="IdPlanificacionAnual" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}
function NumeroClase() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'NumeroClase', true);
    echo '<label class="hidden" for="NumeroClase" >Numero de Clase</label>
  	<input type="text" name="NumeroClase" id="NumeroClase" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}
function NombreCurso() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'NombreCurso', true);
    echo '<label class="hidden" for="NombreCurso" >Nombre Curso</label>
  	<input type="text" name="NombreCurso" id="NombreCurso" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}
function Asignatura() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'Asignatura', true);
    echo '<label class="hidden" for="Asignatura" >Asignatura</label>
  	<input type="text" name="Asignatura" id="Asignatura" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}
function Curso() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'Curso', true);
    echo '<label class="hidden" for="Curso" >Curso</label>
  	<input type="text" name="Curso" id="Curso" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}
function Unidad() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'Unidad', true);
    echo '<label class="hidden" for="Unidad" >Unidad</label>
  	<input type="text" name="Unidad" id="Unidad" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}
function Semana() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'Semana', true);
    echo '<label class="hidden" for="Semana" >Unidad</label>
  	<input type="text" name="Semana" id="Semana" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}
function FechaInicial() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'FechaInicial', true);
    echo '<label class="hidden" for="FechaInicial" >Unidad</label>
  	<input type="text" name="FechaInicial" id="FechaInicial" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}
function FechaFinal() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'FechaFinal', true);
    echo '<label class="hidden" for="FechaFinal" >Unidad</label>
  	<input type="text" name="FechaFinal" id="FechaFinal" value="'.htmlspecialchars($value).'" style="width: 150px;" />';
}
add_action('save_post', 'guardar_valores_planificacion');
add_action('publish_post', 'guardar_valores_planificacion');

function guardar_valores_planificacion() {
   global $wpdb, $post;       
    	
    
    if (!$post_id) $post_id = $_POST['post_ID'];
    	if (!$post_id) return $post;	    
    	$Docente= $_POST['Docente'];
	
	update_post_meta($post_id, 'Docente', $Docente);
     
}
add_action( 'show_user_profile', 'mostrar_jefe_del_docente' );
add_action( 'edit_user_profile', 'mostrar_jefe_del_docente' );

function mostrar_jefe_del_docente( $user ) { ?>

	<h3>Jefe del Docente</h3>

	<table class="form-table">

		<tr>
			<th><label for="jefe_docente">Jefe del Docente</label></th>

			<td>
				<input type="text" name="jefe_docente" id="jefe_docente" value="<?php echo esc_attr( get_the_author_meta( 'jefe_docente', $user->ID ) ); ?>" class="regular-text" readonly /><br />
				<span class="description">Ingresa nombre de tu jefe</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'guardar_nombre_jefe_docente' );
add_action( 'edit_user_profile_update', 'guardar_nombre_jefe_docente' );

function guardar_nombre_jefe_docente( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ){
		return false;
	}	
	update_usermeta( $user_id, 'jefe_docente', $_POST['jefe_docente'] );
}


add_action( 'show_user_profile', 'mostrar_id_colegio' );
add_action( 'edit_user_profile', 'mostrar_id_colegio' );

function mostrar_id_colegio( $user ) { ?>

	<h3>ID Colegio que es encargado</h3>

	<table class="form-table">

		<tr>
			<th><label for="jefe_docente">ID Colegio que es encargado</label></th>

			<td>
				<input type="text" name="id_colegio" id="id_colegio" value="<?php echo esc_attr( get_the_author_meta( 'id_colegio', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Ingresa ID colegio</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'guardar_id_colegio' );
add_action( 'edit_user_profile_update', 'guardar_id_colegio' );

function guardar_id_colegio( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ){
		return false;
	}	
	update_usermeta( $user_id, 'id_colegio', $_POST['id_colegio'] );
}





add_action( 'show_user_profile', 'mostrar_rut_docente' );
add_action( 'edit_user_profile', 'mostrar_rut_docente' );

function mostrar_rut_docente( $user ) { ?>

	<h3>Rut</h3>

	<table class="form-table">

		<tr>
			<th><label for="jefe_docente">Rut del docente</label></th>

			<td>
				<input type="text" name="rut_docente" id="rut_docente" value="<?php echo esc_attr( get_the_author_meta( 'rut_docente', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Ingresa Rut del docente</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'guardar_rut_docente' );
add_action( 'edit_user_profile_update', 'guardar_rut_docente' );

function guardar_rut_docente( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ){
		return false;
	}	
	update_usermeta( $user_id, 'rut_docente', $_POST['rut_docente'] );
}


function wp_custom_attachment() {
 
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');         
    $img = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);   
    echo '<img src="'.$img['url'].'"  style="width: 100px; height: 100px">';      
} 


/*   codigo por osman-elquiweb  */

 function redirect_to_front_page() {
global $redirect_to;
if (!isset($_GET['redirect_to'])) {
$redirect_to = get_option('siteurl');
}
}
add_action('login_form', 'redirect_to_front_page');

global $current_user;
      get_currentuserinfo();
      $usuario = esc_attr($current_user->user_level);
	  $nombre_usuario = esc_attr($current_user->user_login);
	  if($nombre_usuario!=='leandro.pasten'){	
     	if ($usuario == 10) {
			 show_admin_bar( false );
	      function ocultar_menu(){
    	      echo "<style type='text/css'> 			  		     	    	
    	    	   </style>";
        	}
          	add_action('wp_head', 'ocultar_menu');  
			
	     }  else {
        	  show_admin_bar( false );
	          function ocultar_menu(){
    	      echo "<style type='text/css'>
        		    #menu-item-248 {
			            display: none;
            		}
					#menu-item-963{
			            display: none;
            		}					
           			</style>";
           }
           add_action('wp_head', 'ocultar_menu');             
       
	  }
	  }
//show_admin_bar( false );	  
function diww_menu_logout_link( $nav, $args ) {
  $logoutlink = '<li><a id="wp-salir" href="'.wp_logout_url( home_url() ).'">Salir</a></li>'; 
  if( $args->theme_location == 'primary' ) {
    return $nav.$logoutlink ;
  } else {
  return $nav;
  }
}
 
add_filter('wp_nav_menu_items','diww_menu_logout_link', 10, 2);

function wp_ver(){
  $hola = $_GET['c'];   
  echo $hola;
     //die('no funciono ninguna wea');
   }
  add_action('wp_ajax_wp_ver', 'wp_ver');
  add_action('wp_ajax_nopriv_wp_ver', 'wp_ver');

//custom field de planificacion
function agregar_campos_base_curricular()
{       
    add_meta_box('Curso_','<i>Cursos :</i>','Curso_','base_curricular','normal','high');
    add_meta_box('Asignatura_','<i>Asignaturas :</i>','Asignatura_','base_curricular','normal','high');
    add_meta_box('Unidad_','<i>Unidades :</i>','Unidad_','base_curricular','normal','high');
    add_meta_box('Palabra_Clave','<i>Palabras Claves :</i>','Palabra_Clave','base_curricular','normal','high');         
    add_meta_box('Conocimiento_','<i>Conocimientos :</i>','Conocimiento_','base_curricular','normal','high');
    add_meta_box('Actitud_','<i>Actitudes :</i>','Actitud_','base_curricular','normal','high');
    add_meta_box('Habilidad_','<i>Habilidades :</i>','Habilidad_','base_curricular','normal','high');
    add_meta_box('Objetivo_','<i>Objetivos :</i>','Objetivo_','base_curricular','normal','high');                                   
}
add_action('admin_menu', 'agregar_campos_base_curricular');

function Curso_() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'Curso_', true);
    echo '<label class="hidden" for="Curso_" ><i>Curso :</i></label>
    <input type="text" name="Curso_" id="Curso_" value="'.htmlspecialchars($value).'" style="min-width: 150px;" />';
}
function Asignatura_() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'Asignatura_', true);
    echo '<label class="hidden" for="Asignatura_" ><i>Asignatura :</i></label>
    <input type="text" name="Asignatura_" id="Asignatura_" value="'.htmlspecialchars($value).'" style="min-width: 150px;" />';
}
function Unidad_() {
    global $wpdb, $post;
    $value  = get_post_meta($post->ID, 'Unidad_', true);
    echo '<label class="hidden" for="Unidad_" ><i>Unidad :</i></label>
    <input type="text" name="Unidad_" id="Unidad_" value="'.htmlspecialchars($value).'" style="min-width: 150px;" />';
}
function Palabra_Clave() {
    global $wpdb, $post;
    $values  = get_post_meta($post->ID, 'Palabra_Clave', true);
    echo '<label class="hidden" for="Palabra_Clave" ><i>Palabras Clave :</i></label>';
    foreach ( $values as $value) {
    echo '<input type="text" name="Palabra_Clave" id="Palabra_Clave" value="'.$value.'" style="min-width: 150px;" /><br>';
    }
}
function Conocimiento_() {
    global $wpdb, $post;
    $val  = get_post_meta($post->ID, 'Conocimiento_', true);
    echo '<label class="hidden" for="Conocimiento_" ><i>Conocimientos :</i></label>';
    foreach ( $val as $v) {
    echo '<input type="text" name="Conocimiento_" id="Conocimiento_" value="'.$v.'" style="min-width: 150px;" /><br>';
    }    
}
function Actitud_() {
    global $wpdb, $post;
    $values  = get_post_meta($post->ID, 'Actitud_', true);
    echo '<label class="hidden" for="Actitud_" ><i>Actitudes :</i></label>';
    foreach ( $values as $value) {
    echo '<input type="text" name="Actitud_" id="Actitud_" value="'.$value.'" style="min-width: 150px;" /><br>';
  }
}
function Habilidad_() {
    global $wpdb, $post;
    $values  = get_post_meta($post->ID, 'Habilidad_', true);
    echo '<label class="hidden" for="Habilidad_" ><i>Habilidades :</i></label>';
    foreach ( $values as $value) {
   echo ' <input type="text" name="Habilidad_" id="Habilidad_" value="'.$value.'" style="min-width: 150px;" /><br>';
  }
}
function Objetivo_() {
    global $wpdb, $post;    
    
              $objetivos_wp = get_post_meta($post->ID, 'Objetivo_'); 
              $cantidad_objetivos = count($objetivos_wp[0]);

              if($cantidad_objetivos>=0){
                   for($i=0;$i<$cantidad_objetivos;$i++){
                  echo '<textarea>'.$objetivos_wp[0]['objetivo'.$i]['descripcion_objetivo'].'</textarea>';
                  echo '<br>';
                 
                   $cantidad_indicadores = count($objetivos_wp[0]['objetivo'.$i]);     
                       for($x=0;$x<$cantidad_indicadores;$x++){
                         echo '<textarea style="margin-left:50px;">'.$objetivos_wp[0]['objetivo'.$i]['indicador'.$x].'</textarea>';      
                         echo '<br>';       
                        } 
                  echo '<br>';
                  }     
            }
}


/* fin codigo osman-elqiweb */