<?php 
/*

Template Name: Registro Asignatura

*/
?>
<?php get_header(); 

if(isset($_POST['btn_registro_asignatura'])){
	
	$nombre_asignatura_a_inscribir=$_POST['nombre_asignatura'];	

	$wpdb->insert( 
					'asignaturas',  //nombre tabla
					array( 
						'nombre' => $nombre_asignatura_a_inscribir					
		     		) 
	);
	
	$id_asignatura_creada=$wpdb->insert_id;
	
	$cursos_escogidos=$_POST['select_curso'];
	
	foreach ($cursos_escogidos as $curso)
	{	$asignaturas_del_curso = array();
		$asignaturas_del_curso  = get_post_meta($curso, 'Asignaturas', true);
		array_push($asignaturas_del_curso, $id_asignatura_creada);
		//print_r($asignaturas_del_curso);
		update_post_meta($curso, 'Asignaturas', $asignaturas_del_curso  );
		//echo '<br>';
	}
}

?>
<br><br><h1>Registro de Asignaturas </h1><br><br><br><br>
<table>
<form name="registro_asignatura" action="" method="post">
<tr>	
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><label>Ingresa la Asignatura :</label></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="nombre_asignatura" name="nombre_asignatura"></td>
</tr>
<tr>
	<td colspan="2" style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">Elija curso a vincular nueva asignatura</td>	
</tr>
<tr>
	<td colspan="2" style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
		<select multiple name="select_curso[]" size="15">     
    <?php
	echo '<option></option>'; 	 
	//$jefe_docente = get_post_meta(get_current_user_id(), 'jefe_docente', true);
	//if(current_user_can( 'manage_options' )){
		$args = array(    	
    		'post_type' => 'curso',
			'posts_per_page' => -1,
			'author' => get_current_user_id()				    
		);	
		
	/*}else{
		$args = array(    	
    		'post_type' => 'curso',
			'posts_per_page' =>-1,
			'author' => $jefe_docente				    
		);		
	}*/
	
	query_posts( $args );
	
	while (have_posts()) : the_post();
				echo '<option value="'.get_the_ID().'">'.get_the_title().'</option>';		//get_the_title()
	endwhile;
	echo '</select>';
    ?>

	</td>	
</tr>
<tr>	
 <td colspan="2"style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
<input type="submit" id="btn_registro_asignatura" name="btn_registro_asignatura" value="Insertar Nueva Asignatura">
</td>
</tr>
</form>
</table>
<br><br><br><br>
<?php get_sidebar(); ?>
<?php get_footer(); ?>