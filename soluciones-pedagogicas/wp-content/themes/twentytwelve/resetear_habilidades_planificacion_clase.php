<?
/*
Template Name: resetear_habilidades_planificacion_clase
*/
$id_planificacion_clase=$_GET['id_planificacion_clase'];

$id_planificacion_anual  = get_post_meta($id_planificacion_clase, 'IdPlanificacionAnual',true);
$habilidades  = get_post_meta($id_planificacion_anual, 'Habilidades',true);	
	

echo '<div>';	
	echo '<div id="habilidades_">';		  	
		$cont_habilidades=0;		
		foreach($habilidades as $habilidad){
			$cont_habilidades++;
			?>
            
            <textarea class="form-control input_con_sombra" rows="3" readonly type="text" name="Habilidad[]" id="habilidad_<? echo $cont_habilidades; ?>"> <? echo $habilidad; ?></textarea>
             <br>
    		<button class="boton_borrar" id="boton_habilidad_<? echo $cont_habilidades;?>" onClick="var parrafo = document.getElementById('habilidad_<? echo $cont_habilidades; ?>'); parrafo.parentNode.removeChild(parrafo); var boton = document.getElementById('boton_habilidad_<? echo $cont_habilidades;?>'); boton.parentNode.removeChild(boton); return false;"></button>         
    		<br>
            <br>				 			 
            <?
		}
											
	echo '</div>';
	
	echo '<div id="div_inicio_">';
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
		echo '<button class="boton_borrar" id="boton_inicio_5" onClick="eliminar_elemento_inicio(5)"></button><br>';
	echo '</div>';
	
	
	echo '<div id="div_cierre_">';
		echo '<textarea class="form-control input_con_sombra" rows="3" name="Cierre[]" id="Cierre_1" type="text" >Comentan lo aprendido</textarea>';             
		echo '<button class="boton_borrar" id="boton_cierre_1" onClick="eliminar_elemento_cierre(1)"></button><br>';	
		
		echo '<textarea class="form-control input_con_sombra" rows="3" name="Cierre[]" id="Cierre_2" type="text" >Evalúan la clase usando:
		-bitácora de aprendizaje
		-Organizador gráfico
		-Mapa conceptual
		-Tabla doble entrada</textarea>';             
		echo '<button class="boton_borrar" id="boton_cierre_2" onClick="eliminar_elemento_cierre(2)"></button><br>';	
	echo '</div>';
echo '</div>';	

?>