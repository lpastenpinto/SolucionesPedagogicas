<?php 
/*
Template Name: registro completo 2
*/
?>     
<?php get_header(); //"{'curso':"+curso_sel+"}"
?>             
<?
if($_POST["sub_"]){	                    
	
   $asignaturas_seleccionadas=$_POST["asignatura"];
   $docentes_seleccionados=$_POST["docentes"];     
   $curso_selecc=$_POST['curso_act'];  
   
    
   $count = count($asignaturas_seleccionadas);  
   global $wpdb;
   try{
   		for ($i = 0; $i < $count; $i++) {
		   	
	    	update_post_meta( $curso_selecc, 'Asignaturas', $asignaturas_seleccionadas );
			
			 $consulta_sql = "SELECT id_docente FROM asignaturas_docentes WHERE id_curso='".$curso_selecc."' AND id_asignatura='".$asignaturas_seleccionadas[$i]."'";
    		 $id_docente = $wpdb->get_var( $consulta_sql);
			 if($id_docente>0){			
				 	$wpdb->query(
						"
							UPDATE asignaturas_docentes				
							SET id_docente = ".$docentes_seleccionados[$i]."
							WHERE id_curso='".$curso_selecc."'
							AND id_asignatura='".$asignaturas_seleccionadas[$i]."'						
						"
					);			 
			 }
			 else{
				 $wpdb->insert( 
					'asignaturas_docentes',  //nombre tabla
					array( 
						'id_docente' => $docentes_seleccionados[$i],  // entre comillas nombre variable
						'id_asignatura' => $asignaturas_seleccionadas[$i],  // valor $ php a insertar
						'id_curso'	=>	$curso_selecc
		     		) 
				);	
			}
			 
		/*	
			$wpdb->insert( 
				'asignaturas_docentes',  //nombre tabla
				array( 
					'id_docente' => $docentes_seleccionados[$i],  // entre comillas nombre variable
					'id_asignatura' => $asignaturas_seleccionadas[$i],  // valor $ php a insertar
					'id_curso'	=>	$curso_selecc
		     	) 
			);	   
			*/
				
			
	    }
		
		echo "<script>cargar(".$curso_selecc.");</script>";	
		echo "<script type='text/javascript'>alert('Guardado Con Exito');</script>";	
   	} catch (Exception $e) {	
		echo "<script type='text/javascript'>alert('".$e."');</script>";	
	}
	
}

?>                  
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
     <script> 
        function cargar(curso){
			$('#tabla').html('<div><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif"/></div>');
			var curso_sel=curso;						
            var url="../formulario-asignacion-asignaturas";
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'curso_sel': curso_sel },
                success: function(datos){       
                    $('#tabla').html(datos);
                }
            });
        }
     </script>
    

<h1>Asignacion de asignaturas por curso </h1><br>
 

<table >
<tr>
<td colspan="2" style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
  Elija el curso :
  <?
	?>
    <select id="select_curso" name="select_curso" size="1" onchange="cargar(this.value)">     
    <?
	echo '<option></option>'; 	 
	$jefe_docente = get_post_meta(get_current_user_id(), 'jefe_docente', true);
	if(current_user_can( 'manage_options' )){
		$args = array(    	
    		'post_type' => 'curso',
			'posts_per_page' => -1,
			'author' => get_current_user_id()				    
		);	
		
	}else{
		$args = array(    	
    		'post_type' => 'curso',
			'posts_per_page' =>-1,
			'author' => $jefe_docente				    
		);		
	}
	
	query_posts( $args );
	
	while (have_posts()) : the_post();
				echo '<option value="'.get_the_ID().'">'.get_the_title().'</option>';		//get_the_title()
	endwhile;
	echo '</select>';
    ?>

</td>
</tr>
</table>
<div id="tabla">
    
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
  
                            