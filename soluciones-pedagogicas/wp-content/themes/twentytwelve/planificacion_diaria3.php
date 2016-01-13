<?php
/*

Template Name: Planificacion diaria 3

*/
session_start();
	$id_planificacion_clase=$_GET['id_planificacion_clase'];
	$curso=get_post_meta($id_planificacion_clase,'Curso',true);
	$asignatura=get_post_meta($id_planificacion_clase,'Asignatura',true);
	$nombre_unidad=get_post_meta($id_planificacion_clase,'UnidadAprendizaje',true);
		
	if(isset($_POST['guardar_planificacion_clase_clase'])){
		
		$habilidad_=$_POST['Habilidad'];						
		$inicio_=$_POST['Inicio'];
		$recursos_pedagogicos_=$_POST['RecursosPedagogicos'];
		$tiempo_=$_POST['Tiempo'];
		$desarrollo_=$_POST['Desarrollo'];
		$fecha_=$_POST['Fecha'];
		$cierre_=$_POST['Cierre'];
		$evaluacion_=$_POST['Evaluacion'];
	 
		update_post_meta($id_planificacion_clase, 'Habilidades',$habilidad_);// $habilidades_ 
		update_post_meta($id_planificacion_clase, 'Inicio', $inicio_ );
		update_post_meta($id_planificacion_clase, 'RecursosPedagogicos', $recursos_pedagogicos_ );
		update_post_meta($id_planificacion_clase, 'Tiempo', $tiempo_);
		update_post_meta($id_planificacion_clase, 'Desarrollo', $desarrollo_ );
		update_post_meta($id_planificacion_clase, 'Fecha', $fecha_ );
		update_post_meta($id_planificacion_clase, 'Cierre', $cierre_ );
		update_post_meta($id_planificacion_clase, 'Evaluacion', $evaluacion_ );
	
	}			
	$numero_clase  = get_post_meta($id_planificacion_clase, 'NumeroClase', true);
	$fecha  = get_post_meta($id_planificacion_clase, 'Fecha', true);
	$inicio  = get_post_meta($id_planificacion_clase, 'Inicio', true);
	$desarrollo = get_post_meta($id_planificacion_clase, 'Desarrollo', true);
	$cierre  = get_post_meta($id_planificacion_clase, 'Cierre', true);
	$recursos_pedagogicos  = get_post_meta($id_planificacion_clase, 'RecursosPedagogicos', true);
	$evaluacion  = get_post_meta($id_planificacion_clase, 'Evaluacion', true);
	$tiempo  = get_post_meta($id_planificacion_clase, 'Tiempo', true);
?>

<?php 

get_header(); ?>
<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('.Calendario').datepicker({        
		monthNames : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		closeText: 'Cerrar',
		prevText: '<Ant',
		nextText: 'Sig>',
		currentText: 'Hoy',
		onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			alert(month);
		} 		
    });
	
});

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
 <script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>
<script>
	function cargar_habilidades(id_planificacion_clase){															
            var url="/soluciones-pedagogicas/cargar-habilidades-planificacion-clase";
			$.blockUI.defaults.message = '<h1>Cargando...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 									
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_planificacion_clase': id_planificacion_clase},
                success: function(datos){    																
					$('#habilidades').html($('#habilidades_', datos).html()); 
																						
                }
            });
        }
		
		function resetear_habilidades(id_planificacion_clase){															
            var url="/soluciones-pedagogicas/resetear-habilidades-planificacion-clase";
			$.blockUI.defaults.message = '<h1>Reseteando Habilidades...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 									
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_planificacion_clase': id_planificacion_clase},
                success: function(datos){    																
					$('#habilidades').html($('#habilidades_', datos).html());
					$('#div_inicio').html($('#div_inicio_', datos).html());
					$('#div_cierre').html($('#div_cierre_', datos).html()); 
																						
                }
            });
        }	
</script>
<script>
	cargar_habilidades(<? echo $id_planificacion_clase; ?>)
</script>	
<div class="container">
	<div class="row contenedor">
		<div class="span12 contenedor_margenes">
    
    		<div class="row">
        		<div class="span12">
            		<font color="white" style="font-size:15px;"><u>Planificacion Clase a Clase</u></font>
	            </div>
    	    </div>
        
        	<div class="row">
	        	<div class="span12">
            		<font class="texto_azul_titulo"><b>Curso: </b></font>
	                <font class="texto_blanco_titulo"><? echo $curso;?></font><br/>
                
    	            <font class="texto_azul_titulo"><b>Unidad: </b></font>
        	        <font class="texto_blanco_titulo"><? echo $nombre_unidad;?></font><br/>
                
	                <font class="texto_azul_titulo"><b>Asignatura: <b></font>
    	            <font class="texto_blanco_titulo"><? echo $asignatura;?></font><br/>        				
    		    </div>
	        </div>
        	<br /><br />
			<div class="row">
	    	    <div class="span12 contenedor_info_planificacion">
            		<form role="form" name="planificacion_diaria_3" id="planificacion_diaria_3" action="" method="post">            			<div class="row">
                    		<div class="span2">
                            	<font class="contenedor_azul">N° Clase</font>
                            </div>   
                            <div class="span1">
                            	<? echo $numero_clase; ?>
                            </div>   
                            <div class="span1">
                            	<font class="contenedor_azul">Tiempo</font>
                            </div>   
                            <div class="span1">
                            	<input class="form-control input_con_sombra" type="number" name="Tiempo" value="<? if(!empty($tiempo)){ echo $tiempo; }?>">
                            
                            </div>                             
                            <div class="span1">
                            	<font class="contenedor_azul">Fecha</font>
                            </div>   
                            <div class="span2">
                            	<input type="date" name="Fecha" class="Calendario input_con_sombra" value="<? if(!empty($fecha)){ echo $fecha; }?>">
                            </div>                                                        	
		                </div>
                        <br />	
                        
                        
                       <div class="row">
                			<div class="span3 contenedor_azul">
                    			<font class="">Habilidad</font>
                    		</div>
                     		<div id="habilidades" class="span7">                            	
                            </div>
                       </div>
                       <br /><br />   
                       <div class="row">
                			<div class="span3 contenedor_azul">
                    			<font class="">Narracion Breve</font>
                    		</div>
                       </div>
                       <br />
                       <div class="row">
                	   		<div class="span2 offset1 contenedor_celeste">
                    			<font class="">Inicio</font>
                    		</div>
                    		<div id="div_inicio" class="span7">   
                                                        	
	  							<? if(!empty($inicio)){ 
									$i=1;
									foreach($inicio as $ini){
											echo '<textarea class="form-control input_con_sombra" rows="3" name="Inicio[]" id="Inicio_'.$i.'" type="text" >'.$ini.'</textarea>';             
											echo '<button class="boton_borrar" id="boton_inicio_'.$i.'" onClick="eliminar_elemento_inicio('.$i.')"></button><br>';	
											$i++;
										} 
									}else{
										cargar_inicio_vacio();
									}	
								?>       																	
                            </div>
						</div>
                        <br />
                        <div class="row">
                	   		<div class="span2 offset1 contenedor_celeste">
                    			<font class="">Desarrollo</font>
                    		</div>
                    		<div  class="span7">
                            	<textarea class="form-control input_con_sombra" rows="3" type="text" name="Desarrollo"><? if(!empty($desarrollo)){ echo $desarrollo; } ?></textarea>
                            </div>
                        </div> 
                        <br />
                         <div class="row">
                	   		<div class="span2 offset1 contenedor_celeste">
                    			<font class="">Cierre</font>
                    		</div>
                    		<div id="div_cierre" class="span7"> 
                            	
  								<? if(!empty($cierre)){ 
										$i=1;
										foreach($cierre as $cier){
											echo '<textarea class="form-control input_con_sombra" rows="3" name="Cierre[]" id="Cierre_'.$i.'" type="text" >'.$cier.'</textarea>';             
											echo '<button class="boton_borrar" id="boton_cierre_'.$i.'" onClick="eliminar_elemento_cierre('.$i.')"></button><br>';		
											$i++;
										} 
									}else{
										cargar_cierre_vacio();
									}	
								?>
  	
                            </div>
                        </div>                                
                        <br />
                       <div class="row">
                			<div class="span3 contenedor_azul">
                    			<font class="">Recurso Pedagogico</font>
                    		</div>
                     		<div class="span7"> 
                            	<textarea class="form-control input_con_sombra" rows="3" type="text" name="RecursosPedagogicos"><? if(!empty($recursos_pedagogicos)){ echo $recursos_pedagogicos; }?></textarea>                           	
                            </div>
                       </div>
                       <br />
                        <div class="row">
                			<div class="span3 contenedor_azul">
                    			<font class="">Evaluacion</font>
                    		</div>
                     		<div class="span7">  
                            	 
                            	<textarea class="form-control input_con_sombra" rows="3" type="text" name="Evaluacion"><? if(!empty($evaluacion)){ echo $evaluacion; }?></textarea>                         	
                            </div>
                       </div>
                       <br /><br /><br />
                                              
            	</div>
			</div>
		</div>
	</div> 
    <div class="row">
    	<div class="span12">
        	<small style="color:#FFF; font-weight:normal;">*Recuerde que antes de exportar a Excel o PDF debe haber guardado y completado todo. De lo contrario la exportacion tendra errores.<br>*El boton "Resetear" , entrega las habilidades que estaban almacenada en la planificacion de la unidad respectiva, y las actividades de inicio y cierre por defecto</small>
        </div>
    </div>
    <div class="row">
    	<div class="span12">
        	 <div style="float:left">
             	<?
  				$clase  = get_post_meta($id_planificacion_clase, 'NumeroClase', true);  
				$id_anual  = get_post_meta($id_planificacion_clase, 'IdPlanificacionAnual', true);  
				$semana  = get_post_meta($id_planificacion_clase, 'NumeroSemana', true);  
				?>
				<a class="boton" href="/soluciones-pedagogicas/planificacion-diaria-2?id_unidad_planificacion=<? echo $id_anual; ?>&clase=<? echo $clase;?>&semana=<? echo $semana;?>">Volver atras</a>
				<a class="boton" href="/soluciones-pedagogicas/?page_id=127">Volver al menu</a>
								                	
			</div>
			<div style="float:right">             
            	<?
				$id_planificacion_anual  = get_post_meta($id_planificacion_clase, 'IdPlanificacionAnual',true);
				?>
				<a class="boton" href="/soluciones-pedagogicas/planificacion-diaria-2/?id_unidad_planificacion=<? echo $id_planificacion_anual; ?>&clase=<? echo ($numero_clase+1); ?>">Planificar Siguiente Clase</a>
                
            	<button class="boton" type="submit" id="guardar_planificacion_clase_clase" name="guardar_planificacion_clase_clase" action="">Guardar</button>
                	
                <button class="boton" onclick="resetear_habilidades(<? echo $id_planificacion_clase; ?>); return false;">Resetear</button>   
			</div>
        
        </div>
    </div> 
    <br /><br />
    <div class="row">
		<div class="span12">
   		 	<?

			$verif_validado=get_post_meta($id_planificacion_clase,'Validado');
			if(!empty($verif_validado)){
				?>

				<div style="float:left;">
					<a href="/soluciones-pedagogicas/exportar-excel-clase?id_planificacion_clase=<? echo $id_planificacion_clase; ?>"><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/exportar-excel.png" /></a>
				</div>
				<div style="float:left;">
					<a href="/soluciones-pedagogicas/exportar-clase-a-pdf?id_planificacion_clase=<? echo $id_planificacion_clase; ?>"><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/exportar-pdf.png" /></a>
				</div>
				<br><br><br><br>
				<?
			}
			?>
    
    	</div>
	</div> 
</div>         

</form>


<?php get_footer(); ?>
<?
	function cargar_inicio_vacio(){	
	
		echo '<textarea class="form-control input_con_sombra" rows="3" name="Inicio[]" id="Inicio_1" type="text" >Saludo</textarea>';             
		echo '<button class="boton_borrar" id="boton_inicio_1" onClick="eliminar_elemento_inicio(1)"></button><br>';	
		 
		echo '<textarea class="form-control input_con_sombra" rows="3" name="Inicio[]" id="Inicio_2" type="text" >Resaltar aspectos positivos de los alumnos.</textarea>';             
		echo '<button class="boton_borrar" id="boton_inicio_2" onClick="eliminar_elemento_inicio(2)"></button><br>';
		
		echo '<textarea class="form-control input_con_sombra" rows="3" name="Inicio[]" id="Inicio_3" type="text" >Conocen las normas de clase basadas en el respeto</textarea>';             
		echo '<button class="boton_borrar" id="boton_inicio_3" onClick="eliminar_elemento_inicio(3)"></button><br>';
		
		echo '<textarea class="form-control input_con_sombra" rows="3" name="Inicio[]" id="Inicio_4" type="text" >Activan conocimientos previo de clase</textarea>';             
		echo '<button class="boton_borrar" id="boton_inicio_4" onClick="eliminar_elemento_inicio(4)"></button><br>'; 
		
		echo '<textarea class="form-control input_con_sombra" rows="3" name="Inicio[]" id="Inicio_5" type="text" >Conocen el propósito de clase</textarea>';             
		echo '<button class="boton_borrar" id="boton_inicio_5" onClick="eliminar_elemento_inicio(5)"></button><br>'; 
		
		echo '<textarea class="form-control input_con_sombra" rows="3" name="Inicio[]" id="Inicio_5" type="text" >Formulan preguntar en relación al propósito</textarea>'; 
		echo '<button class="boton_borrar" id="boton_inicio_5" onClick="eliminar_elemento_inicio(5)">borrar</button><br>';             					 		
	}
	
	
	function cargar_cierre_vacio(){
		echo '<textarea class="form-control input_con_sombra" rows="3" name="Cierre[]" id="Cierre_1" type="text" >Comentan lo aprendido</textarea>';             
		echo '<button class="boton_borrar" id="boton_cierre_1" onClick="eliminar_elemento_cierre(1)">borrar</button><br>';	
		
		echo '<textarea class="form-control input_con_sombra" rows="6"  name="Cierre[]" id="Cierre_2" type="text" >Evalúan la clase usando:
		-bitácora de aprendizaje
		-Organizador gráfico
		-Mapa conceptual
		-Tabla doble entrada</textarea>';             
		echo '<button class="boton_borrar" id="boton_cierre_2" onClick="eliminar_elemento_cierre(2)">borrar</button><br>';					
	}

?>
<script>
	function eliminar_elemento_inicio(contador){
			var parrafo = document.getElementById('Inicio_'+contador); 
			parrafo.parentNode.removeChild(parrafo); 
			var boton = document.getElementById('boton_inicio_'+contador); 
			boton.parentNode.removeChild(boton); return false;	
	}
	function eliminar_elemento_cierre(contador){
			var parrafo = document.getElementById('Cierre_'+contador); 
			parrafo.parentNode.removeChild(parrafo); 
			var boton = document.getElementById('boton_cierre_'+contador); 
			boton.parentNode.removeChild(boton); return false;	
	}
</script>