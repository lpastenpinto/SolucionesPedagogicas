<?php
/*
Template Name: consulta_actitudes_planificacion_clase_a_clase
*/	
	$id_planificacion_anual=$_GET['id_planificacion_anual']; 
	$numeroclase=$_GET['numeroclase'];			
	
	echo "<script>";
	echo "alert('".$id_planificacion_anual.$numeroclase."')";
	echo "</script>";
	$args = array(    	
    	'post_type' => 'planificacion_clase_a_clase',
		'author' => get_current_user_id(),		
		'meta_query' => array(
        	array  (
	            'meta_key' => 'IdPlanificacionAnual',
        	    'meta_value'=> $id_planificacion_anual
	        ),
	        array  (
	            'meta_key' => 'NumeroClase',
        	    'meta_value'=> $numeroclase
	        )	        
	    )
	);
	query_posts( $args );

	while (have_posts()) : the_post();
		$id_planificacion_clase_a_clase=get_the_ID();		
	endwhile;

if(empty($ids_planificacion_clase_a_clase)){	
	$actitudes = get_post_meta($id_planificacion_anual, 'Actitudes', true);
}else{
	$actitudes = get_post_meta($id_planificacion_clase_a_clase, 'Actitudes', true);
}
			
echo '<div>';	
	echo '<div id="actitudes">';	
		$cont_actitudes=0;
		foreach($actitudes as $actitud){
			$cont_actitudes++;
			?>
            <textarea readonly rows="6" type="text" name="Actitudes[]" id="actitud_<? echo $cont_actitudes; ?>"> <? echo $actitud; ?></textarea>
             
    		<button id="boton_actitud_<? echo $cont_actitudes;?>" onClick="var parrafo = document.getElementById('actitud_<? echo $cont_actitudes; ?>'); parrafo.parentNode.removeChild(parrafo); var boton = document.getElementById('boton_actitud_<? echo $cont_actitudes;?>'); boton.parentNode.removeChild(boton); return false;">borrar</button>         
    						 			 
            <?
		}
	
	echo '</div>';	

echo  '</div>';
		  
?>





