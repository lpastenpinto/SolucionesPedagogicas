<?
/*
Template Name: ExportarExcel
*/		
	global $wpdb, $post;
	$id_planificacion=$_GET['id_planificacion'];	
 	$asignatura= get_post_meta($id_planificacion, 'Asignatura', true);
	$curso= get_post_meta($id_planificacion, 'Curso', true);
	$unidad= get_post_meta($id_planificacion, 'Unidad', true);
	
	header("Content-type: application/vnd.ms-excel; name='excel'");	
	header("Content-Disposition: filename=Planificacion Anual".$curso."/".$asignatura."/Unidad".$unidad.".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	?>
		<h1>Planificacion Anual Curso: <? echo htmlentities($curso, ENT_QUOTES,'UTF-8'); ?> Asignatura: <? echo htmlentities($asignatura, ENT_QUOTES,'UTF-8'); ?> Unidad: <? echo $unidad; ?><h1><br> 
	<?
	$palabras_claves  = get_post_meta($id_planificacion, 'ConceptosAprender', true);
	$objetivos  = get_post_meta($id_planificacion, 'ObjetivosAprendizajes',true);
	$actitudes  = get_post_meta($id_planificacion, 'Actitudes', true);
	$habilidades  = get_post_meta($id_planificacion, 'Habilidades', true);
	$indicadores  = get_post_meta($id_planificacion, 'IndicadoresEvaluacion', true);	
	$semanas= get_post_meta($id_planificacion, 'Semana', true);	
	$clases= get_post_meta($id_planificacion, 'NumeroClases', true);	
		
		?>
        
	<table style="border:1px solid #000000; font-size: 13px;" cellspacing="1" cellpadding="1" border="5" bordercolor="#000000;" >

    	<tr>   
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Semanas</td> 	
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Clases</td>
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Conceptos a aprender</td>
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Obj. de  Aprendizaje</td>
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Indicadores de evaluación</td>
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Habilidades</td>
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Actitudes</td>
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Estrategia de Aprendizaje</td>
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Formas de evaluación</td>
		    <td id="b" style="border:1px solid #000000;" bgcolor="#B0C4DE">Tipos de evaluación</td>
           
		</tr>  
		
		
		<?	
		
//		($value)				
		echo '<tr>';		
			echo '<td>'.$semanas.'</td>';
			echo '<td>'.$clases.'</td>';
			echo '<td>';	        				
					foreach ($palabras_claves as $value) {											
								echo '-'.htmlentities($value, ENT_QUOTES,'UTF-8');
							    echo '<br>';					
					}											
			echo '</td>';
						
			echo '<td>';				    	      														    
					$cantidad_objetivos=count($objetivos);													
					for($i=0;$i<1;$i++){
						echo '-'.htmlentities($objetivos['objetivo'.$i]['descripcion_objetivo'], ENT_QUOTES,'UTF-8');              		}										
			echo '</td>';
			
			echo '<td>';			
			    for($i=0;$i<1;$i++){		
					$cantidad_indicadores=count($objetivos['objetivo'.$i]);				 
					    for($x=0;$x<$cantidad_indicadores-4;$x++){
						 	echo '-'.htmlentities($objetivos['objetivo'.$i]['indicador'.$x], ENT_QUOTES,'UTF-8');
							echo '<br>';
				    	} 
		
			    }			
			echo '</td>';	
			
			echo '<td>';				
				foreach($habilidades as $habilidad){					
					echo '-'.htmlentities($habilidad, ENT_QUOTES,'UTF-8');
					echo '<br>';
				}
			
			echo '</td>';		
						
			echo '<td>';
				
				foreach($actitudes as $actitud){					
					echo '-'.htmlentities($actitud, ENT_QUOTES,'UTF-8');
					echo '<br>';
				}
			
			echo '</td>';
			
			echo '<td>';
				echo htmlentities($objetivos['objetivo0']['estrategia_aprendizaje'], ENT_QUOTES,'UTF-8');
			echo '</td>';
			
			echo '<td>';
				echo htmlentities($objetivos['objetivo0']['formas_evaluacion'], ENT_QUOTES,'UTF-8');			
			echo '</td>';
			
			echo '<td>';								
				$tipos_ev=$objetivos['objetivo0']['tipos_evaluacion'];
				foreach($tipos_ev as $tipo_ev){
					echo $tipo_ev.'<br>';	
				}
			echo '</td>';
			
		echo '</tr>';
		
				
   		for($i=1;$i<$cantidad_objetivos;$i++){
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';		
				
				$cantidad_indicadores=count($objetivos['objetivo'.$i]);	
				echo '<td>'; 							    
					echo htmlentities($objetivos['objetivo'.$i]['descripcion_objetivo'], ENT_QUOTES,'UTF-8');			
				echo '</td>';
				
				echo '<td>';			 
		    	for($x=0;$x<$cantidad_indicadores-4;$x++){
					echo '-'.htmlentities($objetivos['objetivo'.$i]['indicador'.$x], ENT_QUOTES,'UTF-8');
					echo '<br>';
    			} 
				echo '</td>';
				
				echo '<td></td>';
				
				echo '<td></td>';
				
				echo '<td>';
					echo htmlentities($objetivos['objetivo'.$i]['estrategia_aprendizaje'], ENT_QUOTES,'UTF-8');
				echo '</td>';	
				
				echo '<td>';
					echo htmlspecialchars($objetivos['objetivo'.$i]['formas_evaluacion']);	
				echo '</td>';
				
				echo '<td>';	
					$tipos_ev=$objetivos['objetivo'.$i]['tipos_evaluacion'];
					foreach($tipos_ev as $tipo_ev){
						echo $tipo_ev.'<br>';	
					}			
				echo '</td>';	
				
			echo '</tr>';
	    }								
	echo '</table>';	
?>