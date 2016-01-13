<?php
/*
Template Name: consulta_asignaturas_planificacion_anual
*/
	session_start();

	$options='';
	$id_curso_escogido=$_GET['id_curso'];   
	
	$consulta = "SELECT id_asignatura FROM asignaturas_docentes WHERE id_curso='".$id_curso_escogido."' AND id_docente='".$_SESSION['id_usuario']."'";
	$ids_asign = $wpdb->get_results( $consulta );
	$options=$options.'<option value="" default selected>Seleccione Asignaturas</option>';	
	foreach ( $ids_asign as $asign ){
		$consulta_2 = "SELECT nombre FROM asignaturas WHERE id='".$asign->id_asignatura."'";
		$nombre_asig = $wpdb->get_var( $consulta_2);
		$options=$options.'<option value="'.$asign->id_asignatura.'">'.$nombre_asig.'</option>';
	}
	echo $options;    
?>