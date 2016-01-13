<?php
/*
Template Name: consulta_unidades_planificacion_clase_a_clase
*/
	$options='';
	$id_curso=$_GET['id_curso']; 
	$id_asignatura=$_GET['id_asignatura'];
	
	$curso=get_the_title($id_curso);
	   
	$consulta = "SELECT nombre FROM asignaturas WHERE id='".$id_asignatura."'";
	$asignatura = $wpdb->get_var($consulta);	

	$args = array(    	
    	'post_type' => 'planificacion_anual',
		'posts_per_page' => -1,
		'author' => get_current_user_id(),
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
	
	$ids_planificacion_anual = array();
	$ids_=0;
	while (have_posts()) : the_post();
		$ids_planificacion_anual[$ids_]=get_the_ID();		
		$ids_++;
	endwhile;
				 		
	$id_planificacion_anual_1=$ids_planificacion_anual[0];
	$id_planificacion_anual_2=$ids_planificacion_anual[1];
	$id_planificacion_anual_3=$ids_planificacion_anual[2];
	$id_planificacion_anual_4=$ids_planificacion_anual[3];
	
	
	
	$verificador = array();
	for($i=0;$i<4;$i++){
		$Semana=get_post_meta($ids_planificacion_anual[$i], 'Semana', true);
		$NumeroClases=get_post_meta($ids_planificacion_anual[$i], 'NumeroClases', true);
		$ObjetivosAprendizajes=get_post_meta($ids_planificacion_anual[$i], 'ObjetivosAprendizajes', true);
		$ConceptosAprender=get_post_meta($ids_planificacion_anual[$i], 'ConceptosAprender', true);	
		$Actitudes=get_post_meta($ids_planificacion_anual[$i], 'Actitudes', true);
		$Habilidades=get_post_meta($ids_planificacion_anual[$i], 'Habilidades', true);
		$IndicadoresEvaluacion=get_post_meta($ids_planificacion_anual[$i], 'IndicadoresEvaluacion', true);		
		if((empty($ObjetivosAprendizajes))||(empty($ConceptosAprender))||(empty($Actitudes))||(empty($Habilidades))){
			$verificador[$i]=false;
		}else{
			$verificador[$i]=true;
		}
	
	}
	
	$options=$options.'<option value="" default selected>Selecciona Unidad</option>';
	$cont_verif=0;	
	for($i=0;$i<4;$i++){
		if($verificador[$i]==true){
			$options=$options.'<option value="'.$ids_planificacion_anual[$i].'">'.get_the_title($ids_planificacion_anual[$i]).'</option>';
			$cont_verif++;
		}
	}
	if($cont_verif==0){
		echo "<script>";
			echo "alert('No hay ninguna unidad lista para planificar. Primero debe planificar Anualmente');";
		echo "</script>";	
	}
	/*$options=$options.'<option value="'.$id_planificacion_anual_1.'">'.get_the_title($id_planificacion_anual_1).'</option>';
	$options=$options.'<option value="'.$id_planificacion_anual_2.'">'.get_the_title($id_planificacion_anual_2).'</option>';
	$options=$options.'<option value="'.$id_planificacion_anual_3.'">'.get_the_title($id_planificacion_anual_3).'</option>';
	$options=$options.'<option value="'.$id_planificacion_anual_4.'">'.get_the_title($id_planificacion_anual_4).'</option>';*/
	
	echo $options;    
?>





