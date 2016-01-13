<?
/*
Template Name: visualizacion_planificacion_anual
*/	session_start();
	get_header();
	include ('validar_planificacion.php');
	global $wpdb, $post;
	$id_planificacion=$_GET['id_planificacion'];	
 	$asignatura= get_post_meta($id_planificacion, 'Asignatura', true);
	$curso= get_post_meta($id_planificacion, 'Curso', true);
	$unidad= get_post_meta($id_planificacion, 'Unidad', true);
	$nombre_profesor=$_SESSION['nombre_autor_planificacion'];
	$palabras_claves  = get_post_meta($id_planificacion, 'ConceptosAprender', true);
	$objetivos  = get_post_meta($id_planificacion, 'ObjetivosAprendizajes',true);
	$actitudes  = get_post_meta($id_planificacion, 'Actitudes', true);
	$habilidades  = get_post_meta($id_planificacion, 'Habilidades', true);
	$indicadores  = get_post_meta($id_planificacion, 'IndicadoresEvaluacion', true);	
	$semanas= get_post_meta($id_planificacion, 'Semana', true);	
	$clases= get_post_meta($id_planificacion, 'NumeroClases', true);
	
	
?>  
<script>
$( document ).ready(function() {
 $("input[type:checkbox]").prop( "checked", false );
});
	
</script>

<div class="container">
	<div class="row contenedor">
    	<div class="span12 contenedor_margenes">
        	<div class="row">
        		<div class="span12">
                <br />
				<br />
				<br />
				<br />		
            		<font color="white" style="font-size:15px;"><u>Planificacion de trayecto Anual</u></font>
            	</div>
        	</div>
            <div class="row">
	        	<div class="span12">
            		<font class="texto_azul_titulo"><b>Curso: </b></font><font class="texto_blanco_titulo"><? echo $curso;?></font><br/>
                	<font class="texto_azul_titulo"><b>Asignatura: <b></font><font class="texto_blanco_titulo"><? echo $asignatura;?></font><br/>      
                    <font class="texto_azul_titulo"><b>Unidad: </b></font><font class="texto_blanco_titulo"><? echo $unidad;?></font><br/>
                	<font class="texto_azul_titulo"><b>Docente: <b></font><font class="texto_blanco_titulo"><? echo $nombre_profesor;?></font><br/>        				
    	    	</div>
        	</div>	
			<div class="row">
		        <div class="span12 contenedor_info_planificacion">
                	<hr color="#FFFFFF" style="height:2px;">                    
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
											<input readonly type="text" class="input_con_sombra"  value="<? echo $value?>" name="Conceptos[]" id="Conceptos_<? echo $contador_conceptos; ?>"/>  		                                                       								                        	    
						            	</div>
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
                    	<font class="contenedor_azul">Habilidades</font>
                    </div>
                     <div class="span8">
                     <?
                     	$cont_habilidad=0;
						foreach($habilidades as $habilidad){
							$cont_habilidad++;
							?>
        					    <textarea readonly class="form-control input_con_sombra" readonly rows="3" type="text" name="Habilidades[]" id="habilidad_<? echo $cont_habilidad; ?>"> <? echo $habilidad; ?></textarea>
             				    		       
    						 			 
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
    				        <textarea readonly class="form-control input_con_sombra" rows="3" readonly type="text" name="Actitudes[]" id="actitud_<? echo $cont_actitudes; ?>"> <? echo $actitud; ?></textarea>
                 					           						 			 
			            <?
						}
						?>
												
                     </div>                    
                </div>
			</div>
		</div>           
        <br /> 	
         
        <? $cantidad_objetivos=count($objetivos);
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
							<textarea class="form-control input_con_sombra" rows="3" readonly type="text" name="Objetivos[]" > <? echo $objetivos['objetivo'.$i]['descripcion_objetivo'];?></textarea>
               							
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
                    		
							$cantidad_indicadores=count($objetivos['objetivo'.$i]);				 
					    		for($x=0;$x<$cantidad_indicadores-4;$x++){
								?>
				            		<textarea readonly class="form-control input_con_sombra" rows="3" type="text" name="Indicadores_<? echo $i; ?>[]" id="indicador_<? echo $i.'_'.$x; ?>"> <? echo $objetivos['objetivo'.$i]['indicador'.$x]; ?></textarea>
             						    		       
    							 			 
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
    	              	<textarea readonly class="form-control input_con_sombra" rows="3" type="text" name="EstrategiaAprendizaje[]"> <? echo $objetivos['objetivo'.$i]['estrategia_aprendizaje']; ?></textarea>	
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
    	              	 <textarea readonly class="form-control input_con_sombra" rows="3" type="text" name="FormasEvaluacion[]"> <? echo $objetivos['objetivo'.$i]['formas_evaluacion']; ?></textarea>	
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
                    	if(!empty($objetivos['objetivo'.$i]['tipos_evaluacion'])){								
							$tipos_ev=$objetivos['objetivo'.$i]['tipos_evaluacion'];
						?>            												
            				<input readonly type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Diagnostica" <? 
					$tip_ev="Evaluacion Diagnostica"; if ( in_array($tip_ev, $tipos_ev)!== FALSE){ ?> checked <?} ?>> Evaluacion Diagnostica
                			<input readonly type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Formativa" <? 
					$tip_ev="Evaluacion Formativa"; if ( in_array($tip_ev, $tipos_ev)!== FALSE){ ?> checked <?} ?>> Evaluacion Formativa 
		                	<input readonly type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Sumativa" <? 
					$tip_ev="Evaluacion Sumativa"; if ( in_array($tip_ev, $tipos_ev)!== FALSE){ ?> checked <?} ?>> Evaluacion Sumativa						
						<?		
						}
						else{
						?>
							<input readonly type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Diagnostica"> Evaluacion Diagnostica
                			<input readonly type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Formativa"> Evaluacion Formativa 
                			<input readonly type="checkbox" name="tipos_evaluacion_<? echo $i+1;?>[]" value="Evaluacion Sumativa" > Evaluacion Sumativa
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
        <br /><br /><br /><br />
        <br /> 
                </div>
			</div>
		</div>
        
        
	</div>
    <div class="row">
    	<div class="span12">
        
        	<?
			$verif_validado=get_post_meta($id_planificacion,'Validado');
			if(empty($verif_validado)){
	
			?>
            <div style="float:left;">	
				<form action="" method="post">
					<input type="text" value="<? echo $id_planificacion;?>" name="id_planificacion_validar" style="display:none" />
				    <button class="boton" type="submit" name="boton_validar"/>Validar</button> 
				</form>
            </div>    
			<?
			}else{
				?>
                <small><font class="letras_blanca_normal">*Esta Planificacion ya fue validada</font></small>				
                <?
			}
			?>
            <div style="float:right">
            	<a class="boton" href="javascript:history.back(1)">Volver Atras</a>
            </div>
        </div>        
    </div>
</div>    
            
      

<br /><br />    
