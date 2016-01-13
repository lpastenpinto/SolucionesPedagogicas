<?php
/*
Template Name: consulta_planificacion_clase
*/	

	
	 $id_planificacion_anual=$_GET['id_planificacion_anual']; 
	 $id_planificacion_clase=$_GET['id_planificacion_clase'];  				

	$palabras_claves  = get_post_meta($id_planificacion_clase, 'ConceptosClaves', true);
	$objetivos  = get_post_meta($id_planificacion_anual, 'ObjetivosAprendizajes',true);
	$objetivo_guardado  = get_post_meta($id_planificacion_clase, 'ObjetivosAprendizaje',true);
	$actitudes  = get_post_meta($id_planificacion_clase, 'Actitudes', true);
	$indicadores  = get_post_meta($id_planificacion_clase, 'Indicadores', true);
	
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
            	<select class="select_sombra_fijo" id="objetivoAprendizaje" name="ObjetivoAprendizaje" onChange="cargar_indicadores(this.value,<? echo $id_planificacion_anual; ?>);">	                	
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
                    	<?
                        $cont_indicadores=0;
						foreach($indicadores as $indicador){
							$cont_indicadores++;
						?>
    		        		<textarea class="form-control input_con_sombra" rows="3" type="text" name="Indicadores[]" id="indicador_<? echo $cont_indicadores; ?>"> <? echo $indicador; ?></textarea>
             
		    				<button class="boton_borrar" id="boton_indicador_<? echo $cont_indicadores;?>" onClick="eliminar_indicadores(<? echo $cont_indicadores;?>)"></button>             						 			 
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
                    	<font class="">Objetivo de Clase</font>
                    </div>
                    <div id="objetivos" class="span7">
                    
						<textarea class="form-control input_con_sombra" rows="3" type="text" name="Objetivo"> <? echo $objetivo_guardado; ?></textarea>
                    
                    </div>
				</div>
			</div>
		</div>
        <br /><br />
        	                                                

