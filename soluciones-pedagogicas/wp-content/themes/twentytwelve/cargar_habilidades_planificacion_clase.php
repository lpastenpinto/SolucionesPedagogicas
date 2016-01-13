<?
/*
Template Name: cargar_habilidades_planificacion_clase
*/
$id_planificacion_clase=$_GET['id_planificacion_clase'];
$habilidades  = get_post_meta($id_planificacion_clase, 'Habilidades',true);

if(empty($habilidades)){
	$id_planificacion_anual  = get_post_meta($id_planificacion_clase, 'IdPlanificacionAnual',true);
	$habilidades  = get_post_meta($id_planificacion_anual, 'Habilidades',true);	
	
}

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
echo '</div>';	

?>