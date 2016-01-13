<?php
/*
Template Name: consulta_numero_clase_planificacion_clase_a_clase
*/
	$options='';
	$id_planificacion=$_GET['id_planificacion']; 		
	
	$clases= get_post_meta($id_planificacion, 'NumeroClases', true);
	
	$options=$options.'<option value="" default selected>Seleccione Clase</option>';
	for($i=1;$i<=$clases;$i++){
		$options=$options.'<option value="'.$i.'">'.$i.'</option>';	
	}	
	
		
	echo $options;    
?>



