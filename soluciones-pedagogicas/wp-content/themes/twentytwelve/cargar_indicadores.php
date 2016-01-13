<?
/*
Template Name: cargar_indicadores
*/
$id_planificacion_anual=$_GET['id_planificacion_anual'];
$i=$_GET['objetivo']; 
$objetivos  = get_post_meta($id_planificacion_anual, 'ObjetivosAprendizajes',true);

echo '<div>';	
	echo '<div id="indicadores_">';
	
	  	
					$cantidad_indicadores=count($objetivos['objetivo'.$i]);				 
					    for($x=0;$x<$cantidad_indicadores-4;$x++){
						?>
				            <textarea   class="form-control input_con_sombra" rows="3"  type="text" name="Indicadores[]" id="indicador_<? echo $i.'_'.$x; ?>"> <? echo $objetivos['objetivo'.$i]['indicador'.$x]; ?></textarea>
             
			    		<button class="boton_borrar" id="boton_indicador_<? echo $i.'_'.$x;?>" onClick="var parrafo = document.getElementById('indicador_<? echo $i.'_'.$x; ?>'); parrafo.parentNode.removeChild(parrafo); var boton = document.getElementById('boton_indicador_<? echo $i.'_'.$x;?>'); boton.parentNode.removeChild(boton); return false;"></button>         
    							 			 
            			<?
				    	} 
					    										
	echo '</div>';
	
	echo '<div id="objetivos_">';
	?>
		 <textarea  class="form-control input_con_sombra" rows="3"  type="text" name="Objetivo"> <? echo $objetivos['objetivo'.$i]['descripcion_objetivo']; ?></textarea>
		
	<?	
	echo '</div>';
echo '</div>';	

?>