<?php
/*
Template Name: eliminar_docente
*/
session_start();
?>
<script src='http://code.jquery.com/jquery-1.7.1.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script> 
<script>
$(document).ready(function() {	 	 
	$("body").on("click",".eliminar", function(e){		
		confirmar=confirm("¿Seguro desea eliminar el docente?"); 
		if (confirmar){ 
			var url="/soluciones-pedagogicas/consulta-eliminar-docente";							
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_docente': this.name },
                success: function(datos){    
					alert('Docente eliminado con exito');
																							
                }
            });	
			$(this).parent('div').remove();  		    			 	
		}	 								        		 			           			        
		return false;
	});	
});
</script>	
<?php 
get_header(); ?>

<div class="container">
	<div class="row contenedor">
		<div class="span12">
        	<div class="row contenedor_margenes">
            	<div class="row">
                	<div class="span12">
                    	<font color="white" style="font-size:15px; font-weight:bold"><u>Eliminar Docentes<u></font>
                    </div>
                </div>
                <br />
                <div class="row">
                	<div class="span10 offset2">
	                	<div class="span2">
    	                	<font class="letras_form_plan_anual" style="font-weight:bold">Nombre</font>
        	            </div>
                    
            	        <div class="span2">
                	    	<font class="letras_form_plan_anual" style="font-weight:bold">Rut</font>                        
                    	</div>
                    
	                    <div class="span2">
    	                	<font class="letras_form_plan_anual" style="font-weight:bold">E-mail</font>                   
        	            </div>
                         
            	    </div>
                </div>
                <?

				$current_user = wp_get_current_user();
				$users = get_users( 
					array(  
						'meta_key'     => 'jefe_docente',
						'meta_value'   => $current_user->display_name
						) 
				);
				foreach($users as $user){		
					$id_usuario=$user->ID;		
					$nombre_usuario=$user->first_name.' '.$user->last_name;
					?>
					<div class="row">
                    	<div class="span10 offset2">
                        	<div class="span2">
                            	<font class="letras_blanca_normal"><? echo $nombre_usuario;?></font>
                            </div>
                            <div class="span2">
                            	<font class="letras_blanca_normal"><? echo esc_attr( get_the_author_meta( 'rut_docente', $user->ID ) );?></font>
                            </div>
                            <div class="span2">
                            	<font class="letras_blanca_normal"><? echo $user->user_email;?></font>
                            </div>
                            <div class="span2">
                            	<a name="<? echo $id_usuario; ?>" href="#" class="eliminar boton"> Eliminar Docente</a>
                            </div>
                        </div>
					</div>  
                    <br />
                    <br />                      
					
					<?										
					}
					?>                 
            </div>
            <br /><br />
		</div>
	</div>
</div>                        

<?php get_footer(); ?>
