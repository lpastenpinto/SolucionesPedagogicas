<?php
/*
Template Name: consulta_semanas_planificacion_clase_a_clase
*/
	$options='';
	$id_planificacion=$_GET['id_planificacion']; 		
	
	$semanas= get_post_meta($id_planificacion, 'Semana', true);
	
	$options=$options.'<option value="" default selected>Selecciona Semana</option>';
	for($i=1;$i<=$semanas;$i++){
		$options=$options.'<option value="'.$i.'">'.$i.'</option>';	
	}	
	
		
	echo $options;    
?>





