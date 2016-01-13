<?php
/*
Template Name: consulta_asinaturas_curso
*/	

	$options='';
	$id_curso_escogido=$_GET['id_curso'];   
	$asignaturas= get_post_meta($id_curso_escogido, 'Asignaturas',true);	
	
	$options=$options.'<option value="" default selected>Seleccione Asignaturas</option>';	
	
	foreach ( $asignaturas as $asign ){		
		$consulta = "SELECT nombre FROM asignaturas WHERE id='".$asign."'";
		$nombre_asig = $wpdb->get_var($consulta);
		$options=$options.'<option value="'.$nombre_asig.'">'.$nombre_asig.'</option>';
	}
	echo $options;    
?>