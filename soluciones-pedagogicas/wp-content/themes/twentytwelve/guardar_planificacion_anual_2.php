<?
if(isset($_POST["guardar_2"])){		 		
//if($_POST['nombre_unidad_1']){
	 global $wpdb, $post;   	
	 $nombre_unidad_1= $_POST['nombre_unidad_1'];
	 $semestre_unidad_1= $_POST['semestre_unidad_1']; 
	 $semanas_unidad_1= $_POST['semanas_unidad_1']; 
	 $fecha_final_1= $_POST['fecha_final_1'];	
	 $fecha_inicial_1= $_POST['fecha_inicial_1'];
	 $meses_1= $_POST['meses_1'];	
		
	 	
	
	 $nombre_unidad_2= $_POST['nombre_unidad_2'];
	 $semestre_unidad_2= $_POST['semestre_unidad_2']; 		
	 $semanas_unidad_2= $_POST['semanas_unidad_2'];	
	 $fecha_final_2= $_POST['fecha_final_2'];	
	 $fecha_inicial_2= $_POST['fecha_inicial_2'];
	 $meses_2= $_POST['meses_2'];	
	
	 
	 $nombre_unidad_3= $_POST['nombre_unidad_3'];
	 $semestre_unidad_3= $_POST['semestre_unidad_3']; 
	 $semanas_unidad_3= $_POST['semanas_unidad_3'];	
	 $fecha_final_3= $_POST['fecha_final_3'];	
	 $fecha_inicial_3= $_POST['fecha_inicial_3'];	
	 $meses_3= $_POST['meses_3'];	
	
	
	 $nombre_unidad_4= $_POST['nombre_unidad_4'];
	 $semestre_unidad_4= $_POST['semestre_unidad_4']; 
	 $semanas_unidad_4= $_POST['semanas_unidad_4'];	
	 $fecha_final_4= $_POST['fecha_final_4'];	
	 $fecha_inicial_4= $_POST['fecha_inicial_4'];	
	 $meses_4= $_POST['meses_4'];		
	 				
	try{
		if(empty($id_planificacion_anual_1) ||empty($id_planificacion_anual_2)||empty($id_planificacion_anual_3)||empty($id_planificacion_anual_4)){
			$planificacion_anual_1 = array(
  				'post_title'    => $nombre_unidad_1,
	  			'post_content'  => '',
	  			'post_type'	=> 'planificacion_anual',
 				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_category' => array(8,39)
			);
			$planificacion_anual_2 = array(
  				'post_title'    => $nombre_unidad_2,
	  			'post_content'  => '',
	  			'post_type'	=> 'planificacion_anual',
 				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_category' => array(8,39)
			);
			$planificacion_anual_3 = array(
  				'post_title'    => $nombre_unidad_3,
	  			'post_content'  => '',
	  			'post_type'	=> 'planificacion_anual',
 				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_category' => array(8,39)
			);
			$planificacion_anual_4 = array(
  				'post_title'    => $nombre_unidad_4,
	  			'post_content'  => '',
	  			'post_type'	=> 'planificacion_anual',
 				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_category' => array(8,39)
			);
			$id_planificacion_anual_1=wp_insert_post( $planificacion_anual_1 );
			$id_planificacion_anual_2=wp_insert_post( $planificacion_anual_2 );
			$id_planificacion_anual_3=wp_insert_post( $planificacion_anual_3 );
			$id_planificacion_anual_4=wp_insert_post( $planificacion_anual_4 );
			
							
			for($x=1;$x<=4;$x++){
				$args = array(    	
    				'post_type' => 'base_curricular',		
					'meta_query' => array(
			        	array  (
	        			    'key' => 'Asignatura_',
			        	    'value'=> $asignatura
	        			),
				        array  (
	        			    'key' => 'Curso_',
			        	    'value'=> $nombre_curso
	        			),
						array  (
	        			    'key' => 'Unidad_',
			        	    'value'=> $x
	        			)        
			    	)
				);
				query_posts( $args );
				while (have_posts()) : the_post();
					$id_base_curricular_unidad=get_the_ID();							
				endwhile;
				
				
				update_post_meta( ${"id_planificacion_anual_".$x}, 'Asignatura', $asignatura );
				update_post_meta( ${"id_planificacion_anual_".$x}, 'Curso', $curso );
				update_post_meta( ${"id_planificacion_anual_".$x}, 'Unidad', $x );
				update_post_meta( ${"id_planificacion_anual_".$x}, 'IdBaseCurricular', $id_base_curricular_unidad);
				
			}	
			
				
			
		/*	update_post_meta( $id_planificacion_anual_2, 'Asignatura', $asignatura );
			update_post_meta( $id_planificacion_anual_2, 'Curso', $curso );
			update_post_meta( $id_planificacion_anual_2, 'Unidad', '2' );	
			
			update_post_meta( $id_planificacion_anual_3, 'Asignatura', $asignatura );
			update_post_meta( $id_planificacion_anual_3, 'Curso', $curso );
			update_post_meta( $id_planificacion_anual_3, 'Unidad', '3' );		
			
			update_post_meta( $id_planificacion_anual_4, 'Asignatura', $asignatura );
			update_post_meta( $id_planificacion_anual_4, 'Curso', $curso );
			update_post_meta( $id_planificacion_anual_4, 'Unidad', '4' );	*/
		}      			
			
			$post_planificacion_anual_1 = array(
      			'ID'           => $id_planificacion_anual_1,
      			'post_title'    => $nombre_unidad_1
 			 );
  			wp_update_post( $post_planificacion_anual_1 );						
			
			$post_planificacion_2 = array(
      			'ID'           => $id_planificacion_anual_2,
      			'post_title'    => $nombre_unidad_2
 			 );
  			wp_update_post( $post_planificacion_2 );
			
			$post_planificacion_3 = array(
      			'ID'           => $id_planificacion_anual_3,
      			'post_title'    => $nombre_unidad_3
 			 );
  			wp_update_post( $post_planificacion_3 );
			
			$post_planificacion_4 = array(
      			'ID'           => $id_planificacion_anual_4,
      			'post_title'    => $nombre_unidad_4
 			 );
  			wp_update_post( $post_planificacion_4 );
			
			
			update_post_meta( $id_planificacion_anual_1, 'Semestre', $semestre_unidad_1 );
			update_post_meta( $id_planificacion_anual_1, 'Semana', $semanas_unidad_1 );
			update_post_meta( $id_planificacion_anual_1, 'FechaInicial', $fecha_inicial_1 );
			update_post_meta( $id_planificacion_anual_1, 'FechaFinal', $fecha_final_1 );
			update_post_meta( $id_planificacion_anual_1, 'Meses', $meses_1 );		
			
			
			//update_usermeta( $id_planificacion_anual_2, 'Docente', $nombre_profesor );
			
			update_post_meta( $id_planificacion_anual_2, 'Semestre', $semestre_unidad_2 );
			update_post_meta( $id_planificacion_anual_2, 'Semana', $semanas_unidad_2 );
			update_post_meta( $id_planificacion_anual_2, 'FechaInicial', $fecha_inicial_2 );
			update_post_meta( $id_planificacion_anual_2, 'FechaFinal', $fecha_final_2 );
			update_post_meta( $id_planificacion_anual_2, 'Meses', $meses_2 );			
			
			//update_usermeta( $id_planificacion_anual_3, 'Docente', $nombre_profesor );
			
			update_post_meta( $id_planificacion_anual_3, 'Semestre', $semestre_unidad_3 );			
			update_post_meta( $id_planificacion_anual_3, 'Semana', $semanas_unidad_3 );
			update_post_meta( $id_planificacion_anual_3, 'FechaInicial', $fecha_inicial_3 );
			update_post_meta( $id_planificacion_anual_3, 'FechaFinal', $fecha_final_3 );
			update_post_meta( $id_planificacion_anual_3, 'Meses', $meses_3 );			
			
			//update_usermeta( $id_planificacion_anual_4, 'Docente', $nombre_profesor );
			
			update_post_meta( $id_planificacion_anual_4, 'Semestre', $semestre_unidad_4 );			
			update_post_meta( $id_planificacion_anual_4, 'Semana', $semanas_unidad_4 );
			update_post_meta( $id_planificacion_anual_4, 'FechaInicial', $fecha_inicial_4 );
			update_post_meta( $id_planificacion_anual_4, 'FechaFinal', $fecha_final_4 );
			update_post_meta( $id_planificacion_anual_4, 'Meses', $meses_4 );	
			
			
			
			
			
			for($x=1;$x<=4;$x++){
				$args = array(    	
    				'post_type' => 'base_curricular',		
					'meta_query' => array(
			        	array  (
	        			    'key' => 'Asignatura_',
			        	    'value'=> $asignatura
	        			),
				        array  (
	        			    'key' => 'Curso_',
			        	    'value'=> $nombre_curso
	        			),
						array  (
	        			    'key' => 'Unidad_',
			        	    'value'=> $x
	        			)        
			    	)
				);
				query_posts( $args );
				while (have_posts()) : the_post();
					$id_base_curricular_unidad=get_the_ID();
												
				endwhile;
										
				update_post_meta( ${"id_planificacion_anual_".$x}, 'IdBaseCurricular', $id_base_curricular_unidad);
				
			}	
			
			
			
			
			
			
					
							
		echo "<script>"; 
		echo "alert('Sus datos han sido guardados exitosamente.');"; 
		//echo "window.location='/soluciones-pedagogicas/?page_id=193'";
		echo "</script>";
	}
	catch(Exception $ex){
		echo "<script>"; 
		echo "alert('Sus datos no se han podido guardar. Intente mas tarde.');"; 		
		echo "</script>";
	}		
}



?>