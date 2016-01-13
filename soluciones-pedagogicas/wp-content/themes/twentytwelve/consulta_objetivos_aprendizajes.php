<?php
/*
Template Name: consulta_objetivos_aprendizaje
*/
	// $id_objetivo=$_GET['id_base_curricular'];	 
?>

<?	   
	 $id_planificacion=$_GET['id_planificacion'];  	
	 
	 $id_objetivo=get_post_meta($id_planificacion,'IdBaseCurricular',true); 			
	 global $wpdb, $post;	
	
	 $objetivos= get_post_meta($id_objetivo, 'Objetivo_');	
	 $palabras_claves= get_post_meta($id_objetivo, 'Palabra_Clave',true);
	 $conocimientos= get_post_meta($id_objetivo, 'Conocimiento_',true);
	 $actitudes= get_post_meta($id_objetivo, 'Actitud_',true);
	 $habilidades= get_post_meta($id_objetivo, 'Habilidad_',true);
	 
	 
	 $semanas= get_post_meta($id_planificacion, 'Semana', true);	
	 $clases= get_post_meta($id_planificacion, 'NumeroClases', true);	
	 $objetivos_guardados  = get_post_meta($id_planificacion, 'ObjetivosAprendizajes',true);


	 	  	 

echo '<div>';	
echo '<div id="tabla_">';	
		?>
        <br />
        <div class="row">
        	<div class="span1">
            	<font class="contenedor_azul">Semanas</font>
            </div>
            <div class="span1">
            	 <INPUT class="form-control input_con_sombra" TYPE="text" NAME="semanas"  value=<? echo $semanas;?>>
            </div>
            <div class="span1">
            	<font class="contenedor_azul">Clases</font>
            </div>
            <div class="span1">
            	<INPUT class="form-control input_con_sombra" TYPE="text" NAME="clases"  value=<? echo $clases;?>>
            </div>
        </div>
        <br /><br />
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span3 sin_margen">
                    	<font class="contenedor_azul">Conceptos a Aprender</font>
                    </div>   
                    <div id="div_conceptos" class="span9">
                    	<?
						$contador_conceptos=0;			
						foreach ($palabras_claves as $value) {		
							$contador_conceptos++;
						?>
        				    <div class="span2" id="conceptos_<? echo $contador_conceptos;?>">
                	        		<br />
									<input type="text" class="input_con_sombra"  value="<? echo $value?>" name="Conceptos[]" id="Conceptos_<? echo $contador_conceptos; ?>"/>  
                                     <button class="boton_borrar" id="boton_concepto_<? echo $contador_conceptos;?>" onClick="eliminar_conceptos(<? echo $contador_conceptos;?>)"></button>                     								
                        	    
			            	</div>
            		<?			
					}
					?>
                    	<div class="span2">
                        	<button class="boton_agregar" onClick="agregar_conceptos()"></button>
                        </div>	
                    </div>                 
                </div>                            	
            </div>
        </div>
        <br />
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span3 sin_margen">
                    	<font class="contenedor_azul">Habilidades</font>
                    </div>
                     <div class="span8">
                     <?
                     	$cont_habilidad=0;
						foreach($habilidades as $habilidad){
							$cont_habilidad++;
							?>
        					    <textarea class="form-control input_con_sombra" readonly rows="3" type="text" name="Habilidades[]" id="habilidad_<? echo $cont_habilidad; ?>"> <? echo $habilidad; ?></textarea>
             
				    		<button class="boton_borrar" id="boton_habilidad_<? echo $cont_habilidad;?>" onClick="eliminar_habilidad(<? echo $cont_habilidad;?>)"></button>         
    						 			 
        				    <?
						}					 					 
					 ?>
                     </div>                    
                </div>
			</div>
		</div>           
        <br />        
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span3 sin_margen">
                    	<font class="contenedor_azul">Actitudes</font>
                    </div>
                     <div class="span8">
                     	<?
                       
                    	$cont_actitudes=0;
						foreach($actitudes as $actitud){
							$cont_actitudes++;
						?>
    				        <textarea class="form-control input_con_sombra" rows="3" readonly type="text" name="Actitudes[]" id="actitud_<? echo $cont_actitudes; ?>"> <? echo $actitud; ?></textarea>
             
    						<button class="boton_borrar" id="boton_actitud_<? echo $cont_actitudes;?>" onClick="eliminar_actitud(<? echo $cont_actitudes;?>)"></button>             						 			 
			            <?
						}
						?>
												
                     </div>                    
                </div>
			</div>
		</div>           
        <br /> 	
         
        <? 
		$cantidad_objetivos=count($objetivos[0]);
		//$cantidad_objetivos=count($objetivos);
		for($i=0;$i<$cantidad_objetivos;$i++){
		
		
		?>  
        <br />
        <br />
        <div id="objetivo_<? echo $i?>">
        <br /> 
         <br /> 
          <br /> 
                             
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span3 sin_margen">
                    	<font class="contenedor_azul">Objetivo de Aprendizaje</font>
                    </div>
                    <div class="span8">
                    	<?
                    	
						?>
							<textarea class="form-control input_con_sombra" rows="3" readonly type="text" name="Objetivos[]" > <? echo $objetivos[0]['objetivo'.$i]['descripcion_objetivo'];?></textarea>
               
							<button class="boton_borrar" id="boton_objetivo_<? echo $i;?>" onClick="eliminar_objetivo(<? echo $i;?>)"></button>
		           		 <?
						
                    	?>
                    </div>
                </div>            
            </div>        
        </div>
        <br />
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span1 offset1 sin_margen">
                    	<font class="contenedor_celeste">Indicadores de Evaluacion</font>
                    </div>
                    <div class="span7">
                    <?
                    		
							$cantidad_indicadores=count($objetivos[0]['objetivo'.$i]);				 
					    		for($x=0;$x<$cantidad_indicadores-1;$x++){
								?>
				            		<textarea class="form-control input_con_sombra" rows="3" type="text" name="Indicadores_<? echo $i; ?>[]" id="indicador_<? echo $i.'_'.$x; ?>"> <? echo $objetivos[0]['objetivo'.$i]['indicador'.$x]; ?></textarea>
             
						    		<button class="boton_borrar" id="boton_indicador_<? echo $i.'_'.$x;?>" onClick="eliminar_indicador(<? echo $i;?>,<? echo $x;?>)"></button>         
    							 			 
            					<?
				    			} 
		
			    		
						?>
                    </div>
                </div>
            </div>    
        </div>
        <br />
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span1 offset1 sin_margen">
                    	<font class="contenedor_celeste">Estrategia de Aprendizaje</font>
                    </div>
                    <div class="span7">
    	              	<textarea class="form-control input_con_sombra" rows="3" type="text" name="EstrategiaAprendizaje[]"> <? echo $objetivos_guardados['objetivo'.$i]['estrategia_aprendizaje']; ?></textarea>	
                    </div>
                </div>
            </div>
		</div>  
        <br />  
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span1 offset1 sin_margen">
                    	<font class="contenedor_celeste">Formas de Evaluacion   </font>
                    </div>
                    <div class="span7">
    	              	 <textarea class="form-control input_con_sombra" rows="3" type="text" name="FormasEvaluacion[]"> <? echo $objetivos_guardados['objetivo'.$i]['formas_evaluacion']; ?></textarea>	
                    </div>
                </div>
            </div>
		</div>
        <br />   
        <div class="row">
        	<div class="span12">
            	<div class="row">
                	<div class="span1 offset1 sin_margen">
                    	<font class="contenedor_celeste">Tipos de Evaluacion    </font>
                    </div>
                    <div class="span7 checkbox_">
        	            <?
                    	if(!empty($objetivos_guardados['objetivo'.$i]['tipos_evaluacion'])){								
							$tipos_ev=$objetivos_guardados['objetivo'.$i]['tipos_evaluacion'];
						?>            												
            				<input type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Diagnostica" <? 
					$tip_ev="Evaluacion Diagnostica"; if ( in_array($tip_ev, $tipos_ev)!== FALSE){ ?> checked <?} ?>> Evaluacion Diagnostica
                			<input type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Formativa" <? 
					$tip_ev="Evaluacion Formativa"; if ( in_array($tip_ev, $tipos_ev)!== FALSE){ ?> checked <?} ?>> Evaluacion Formativa 
		                	<input type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Sumativa" <? 
					$tip_ev="Evaluacion Sumativa"; if ( in_array($tip_ev, $tipos_ev)!== FALSE){ ?> checked <?} ?>> Evaluacion Sumativa						
						<?		
						}
						else{
						?>
							<input type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Diagnostica"> Evaluacion Diagnostica
                			<input type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Formativa"> Evaluacion Formativa 
                			<input type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Sumativa" > Evaluacion Sumativa
						<?		
						}
						?>    	              
                    </div>
                </div>
            </div>
		</div> 
        
        </div>
        <hr color="#FFFFFF" style="height:2px;">
        <?
		
		}
        ?> 
        
        <br />           
                
        
        
</div>
	

	