<?php
/*
Template Name: consulta_planificacion_anual_clase
*/	

	
	 $id_planificacion=$_GET['id_planificacion_anual'];  				

	$palabras_claves  = get_post_meta($id_planificacion, 'ConceptosAprender', true);
	$objetivos  = get_post_meta($id_planificacion, 'ObjetivosAprendizajes',true);
	$actitudes  = get_post_meta($id_planificacion, 'Actitudes', true);
	
echo '<div>';
echo '<div id="tabla_plan_clase">';	
	
		$cantidad_objetivos=count($objetivos);
		?>		
        <div class="row">
        	<div class="span12">
            	<font color="#FFFFFF">Seleccione el objetivo de su clase:</font>
            </div>
        </div>
       
        <div class="row">
        	<div class="span12">
            	<select class="select_sombra_fijo" id="objetivoAprendizaje" name="ObjetivoAprendizaje" onChange="cargar_indicadores(this.value,<? echo $id_planificacion; ?>);">	                	
				<? 	echo '<option>Seleccione Objetivo</option>';								
				for($i=0;$i<$cantidad_objetivos;$i++){						
					if ( strpos($objetivo_guardado, $objetivos['objetivo'.$i]['descripcion_objetivo'])!== FALSE){ 
						echo '<option value="'.$i.'" selected >';
					}
					else{
						echo '<option value="'.$i.'">';
					}
							echo $objetivos['objetivo'.$i]['descripcion_objetivo'];
		            echo '</option>';               		            
				}	
				echo '</select><br>';?>
            </div>
        </div>
        <br />
        
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span3 contenedor_azul">
                    	<font class="">Actitudes</font>
                    </div>
                     <div class="span7">
                    	 <?
                     	$cont_actitudes=0;
						foreach($actitudes as $actitud){
							$cont_actitudes++;
						?>
    		        		<textarea class="form-control input_con_sombra" readonly rows="3" type="text" name="Actitudes[]" id="actitud_<? echo $cont_actitudes; ?>"> <? echo $actitud; ?></textarea>
             
    						<button class="boton_borrar" id="boton_actitud_<? echo $cont_actitudes;?>" onClick="eliminar_actitud(<? echo $cont_actitudes; ?>)"></button>             						 			 
	        		    <?
						}	
						?>
                     </div>
                </div>
			</div>
		</div>  
        <br /><br />
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span3 contenedor_azul">
                    	<font class="">Conceptos Claves</font>
                    </div>   
                    <div id="div_conceptos" class="span7">
                    	<? $contador_conceptos=0;								 						
						foreach ($palabras_claves as $value) {		
							$contador_conceptos++;
						?>
        			    	<div class="span2"  id="conceptos_<? echo $contador_conceptos;?>">
								<input class="input_con_sombra" type="text"value="<? echo $value?>" name="Conceptos[]" id="Conceptos_<? echo $contador_conceptos; ?>"/>                        
								<button  class="boton_borrar" id="boton_concepto_<? echo $contador_conceptos;?>" onClick="eliminar_conceptos(<? echo $contador_conceptos;?>)"></button>
			            	</div>
            			<?			
						}
                    	?>	                    	
                    </div>
				</div>
			</div>
		</div>
        <br /><br /> 
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span3 contenedor_azul">
                    	<font class="">Indicadores de Evaluacion</font>
                    </div>
                    <div id="indicadores" class="span7">
                    	                  	
                    </div>
                </div>                               	                                                   
        	</div>
		</div>   
        <br /><br />         
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span3 contenedor_azul">
                    	<font class="">Objetivo de Clase</font>
                    </div>
                    <div id="objetivos" class="span7">
                    
                    </div>
				</div>
			</div>
		</div>
        <br /><br />
</div>        
</div>
        	                                                

