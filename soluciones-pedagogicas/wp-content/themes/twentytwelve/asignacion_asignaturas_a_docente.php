<?php 
/*
Template Name: asignacion_asignaturas_a_docente
*/
session_start();
?>     
<?php get_header(); //"{'curso':"+curso_sel+"}"
?>             
<?
if(isset($_POST["sub_"])){	                    
	
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
    



<div class="container">
	<div class="row contenedor">
		<div class="span12">
        	<div class="row contenedor_margenes">
            	<div class="span4">      
                	<div class="span4">          	
                	<font color="white" style="font-size:15px;"><u>Asignacion de asignaturas por curso</u></font><br />                    </div>
                    <div class="span3 offset1" style="padding-top:20%;">
                    	 <font class="letras_form_plan_anual">Seleccione el curso</font><br />
					    <select class="select_sombra"  id="select_curso" name="select_curso" style="width: 200px;" onchange="cargar(this.value)">     
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
                	</div>                                       
                </div>
                <div class="span7" id="tabla" style="padding-top:3%;">
                </div>
               
			</div>
             <br /><br />
		</div>
	</div>
</div>                                         

<?php get_sidebar(); ?>
<?php get_footer(); ?>
  
                            