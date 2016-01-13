
<style type='text/css'>
        		    .menu-menu-1-container {
			            display: block;
            		}									
          </style>
<div class="container">
	<div class="row contenedor">
		<div class="span12">
  
			<div class="row">
            	<div class="span6">
        			<div class="span6 contenedor_letras_menu_plan">
                    	<font color="white" style="font-weight:bold">Bienvenido!</font>
						<font color="#00a19a"><? echo $_SESSION['nombre_d']; ?></font>                    
                    </div>
					<?		
					//echo '<font color="white" style="font-weight:bold">Bienvenido!</font> ';
					//echo '<font color="#00a19a">'.$_SESSION['nombre_d'].'</font>'; 

					$usuario = esc_attr($current_user->user_level);
	
		
			
					$args_plan_anual = array(   
						'posts_per_page' => -1,	 	
				    	'post_type' => 'planificacion_anual', //planificacion_clase
						'author'   => get_current_user_id(),		
						'meta_query' => array(
			        	array  (
	        			    'key' => 'Validado',
			        	    'value'=> 1
	        			)        
				  	  )
					);
					$query_anual=query_posts( $args_plan_anual );
					$count_anual = sizeof($query_anual);
					?>
                    <div class="span5 offset1" style="padding-left:5%">
                    	<br><font class="letras_blanca_normal">Tiene <? echo $count_anual;?> Planificaciones Anuales Validadas<a class="boton_agregar" onclick="vermas('vermas_anual')"><img src="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/mas.png" /></a></font><br>
				    	<div class="span4 offset1" id="vermas_anual" style="display:none">
							<?		
							while (have_posts()) : the_post();
								$cantidad_plan_anual_validadas++;						
								echo '<a href="/soluciones-pedagogicas/planificacion-anual-3?id_planificacion='.get_the_ID().'">'.get_the_title().'</a><br>';			
							endwhile;		
							?>
		    			</div>
							<?
				
  						$args_plan_clase = array(   
							'posts_per_page' => -1,	 	
					    	'post_type' => 'planificacion_clase', //planificacion_clase
							'author'   => get_current_user_id(),		
							'meta_query' => array(
					        	array  (
	            					'key' => 'Validado',
				    	    	    'value'=> 1
					    	    )        
						    )
						);
						$query_clase=query_posts( $args_plan_clase );
						$count_clase=sizeof($query_clase);
						?>
						<br><font class="letras_blanca_normal">Tiene <? echo $count_clase;?> Planificaciones de Clase Validadas<a onclick="vermas('vermas_clase')"><img src="http://elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/mas.png"/></a></font><br>
				    	<div class="span4 offset1"  id="vermas_clase" style="display:none">
						<?
							while (have_posts()) : the_post();			
								echo '<a href="/soluciones-pedagogicas/planificacion-diaria-3/?id_planificacion_clase='.get_the_ID().'">'.get_the_title().'</a><br>';				
							endwhile;	
				
						?>     
	    				</div>
                    </div>
					
                </div>  
        		<div class="span6">
                	<div class="div_botones_planificacion row">			 
                    	<div class="span6">
                        	<div style="margin-left:15%;">
								<form id="wp_login_form1" action="/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/planificacion_anual.php" method="post">																
    	                            <button type="submit" class="boton_plan_anual">Planificacion Anual</button>
        	                    </form>
                            </div>
                    	</div>
                        <div class="span6">
                        	<div style="margin-left:15%; margin-top:15%;">
								<form id="wp_login_form3" action="/soluciones-pedagogicas/planificacion-diaria/" method="post">
								 	<button type="submit" class="boton_plan_anual">Planificacion Diaria</button>
								</form>
                            </div>
                    	</div>
					</div>
		    	</div>
	    	</div>
			<br><br><br><br><br><br><br><br>			
		</div>
    </div>
</div>
