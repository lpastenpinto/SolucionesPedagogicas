<?php 
/*
Template Name: Form Registro Asignaturas
*/
$curso_seleccionado=$_GET['curso_sel'];
/* 
if($_POST["sub_"]){	                    

/*	echo "<script type='text/javascript'>alert('Guardado Con Exito');</script>";	
   $asignaturas_seleccionadas=$_POST["asignatura"];
   $docentes_seleccionados=$_POST["docentes"];     
   $curso_selecc=$_POST['curso_act'];   
   echo $curso_selecc;
   $count = count($asignaturas_seleccionadas);  
   global $wpdb;
   try{
   		for ($i = 0; $i < $count; $i++) {
		   	
	    	update_post_meta( $curso_seleccionado, 'Asignaturas', $asignaturas_seleccionadas );
			$wpdb->insert( 
				'asignaturas_docentes',  //nombre tabla
				array( 
					'id_docente' => $docentes_seleccionados[$i],  // entre comillas nombre variable
					'id_asignatura' => $asignaturas_seleccionadas[$i],  // valor $ php a insertar
					'id_curso'	=>	$curso_seleccionado
		     	) 
			);	   
	    }
				
   	} catch (Exception $e) {					
		
	}
  }
 */ 
 	$current_user = wp_get_current_user();
	$users = get_users( array(  'meta_key'     => 'jefe_docente',
	'meta_value'   => $current_user->user_login) );	
?>


<form class="form-horizontal" role="form" name="form_asignaturas" id="form_asignaturas" action="" method="post">
                    	<div class="form-group">
                        	 <label class="col-lg-6 letras_form_plan_anual">Asignatura</label>
   							 <div class="col-lg-6">
                             		<label class="col-lg-6 letras_form_plan_anual">Docente</label>
                             </div>
                        </div>                          
                        	<?php 
   	 
							$asignaturas_del_curso=get_post_meta($curso_seleccionado, 'Asignaturas',true);		
						    foreach (  $asignaturas_del_curso as $asignatura ){
		 
		 						?>
        						 <div class="form-group">
                             	  							
        						<?    
									$consulta = "SELECT nombre FROM asignaturas WHERE id='".$asignatura."'";
									$nombre_asignatura = $wpdb->get_var($consulta);				
						     	 	echo '<input type="hidden"  name="asignatura[]" value="'.$asignatura.'" ><label class="col-lg-6 letras_blanca_normal">'.$nombre_asignatura.'</label>';      
			
								?>                                
                                	<div class="col-lg-6">			       
	        						<?		
					 					$consulta_ = "SELECT id_docente FROM asignaturas_docentes WHERE id_curso='".$curso_seleccionado."' AND id_asignatura='".$asignatura."'";
						    			$id_docente_ = $wpdb->get_var( $consulta_);	 							 
				 	
						     		 echo '<select class="select_sombra" name="docentes[]" >';	
									 	echo "<option>Seleccione docente</option>";
									 	foreach ( $users as $user ) {
											if((strcmp($id_docente_, $user->ID) == 0)  ){	 
									 			echo "<OPTION VALUE=".$user->ID." selected>".$user->display_name."</OPTION>";  				
											}
											else{
												echo "<OPTION VALUE=".$user->ID.">".$user->display_name."</OPTION>";  
											}					
										} 
					 					if((strcmp($id_docente_, $current_user->ID) == 0)){
											echo "<OPTION VALUE=".$current_user->ID." selected>".$current_user->display_name."</OPTION>";  
				 						}else{	
				 							echo "<OPTION VALUE=".$current_user->ID.">".$current_user->display_name."</OPTION>"; 
				 						}
										 //echo "<OPTION VALUE=".$current_user->ID.">".$current_user->display_name."</OPTION>"; 
			 			 
				 					echo '</select>';
									?>
        	                        </div>        			
       						 	</div>     
        							<?
								$asignatura_++;
     						} 	        
									?>
                		<input type="hidden"  name="curso_act"  value="<? echo $curso_seleccionado ?>">
                        <div class="form-group">
                         <button class="boton col-lg-offset-6" type="submit" name="sub_">Guardar</button>
                         
                        </div>                                             
                        
</form>                                               