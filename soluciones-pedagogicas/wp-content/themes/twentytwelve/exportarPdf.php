<?		
/*
Template Name: ExportarPdf
*/	
			
	global $wpdb, $post;
	$id_planificacion=$_GET['id_planificacion'];	
 	$asignatura= get_post_meta($id_planificacion, 'Asignatura', true);
	$curso= get_post_meta($id_planificacion, 'Curso', true);
	$unidad= get_post_meta($id_planificacion, 'Unidad', true);
	$palabras_claves  = get_post_meta($id_planificacion, 'ConceptosAprender', true);
	$objetivos  = get_post_meta($id_planificacion, 'ObjetivosAprendizajes',true);
	$actitudes  = get_post_meta($id_planificacion, 'Actitudes', true);
	$habilidades  = get_post_meta($id_planificacion, 'Habilidades', true);
	$indicadores  = get_post_meta($id_planificacion, 'IndicadoresEvaluacion', true);	
	$semanas= get_post_meta($id_planificacion, 'Semana', true);	
	$clases= get_post_meta($id_planificacion, 'NumeroClases', true);	
	
	
    $cadena  = "
		<page>
		<h1>Planificacion Anual Curso: ".htmlentities($curso, ENT_QUOTES,'UTF-8')." / Asignatura:".htmlentities($asignatura, ENT_QUOTES,'UTF-8')." / Unidad:".$unidad."</h1><br>
		<table  style='border:1px solid #000000; font-size: 13px;'  border='1' bordercolor='#000000;'>

    	<tr>   
		    <td bgcolor='#B0C4DE'>Semanas</td> 	
		    <td bgcolor='#B0C4DE'>Clases</td>
		    <td bgcolor='#B0C4DE' >Conceptos a aprender</td>
		    <td bgcolor='#B0C4DE'>Obj. de  Aprendizaje</td>
		    <td bgcolor='#B0C4DE'>Indicadores de evaluación</td>
		    <td bgcolor='#B0C4DE'>Habilidades</td>
		    <td bgcolor='#B0C4DE'>Actitudes</td>
		    <td bgcolor='#B0C4DE'>Estrategia de<br> Aprendizaje</td>
		    <td bgcolor='#B0C4DE'>Formas de <br>evaluación</td>
		    <td bgcolor='#B0C4DE'>Tipos de <br>evaluación</td>           
		</tr>  
			
		<tr>		
			<td>".$semanas."</td>
			<td>".$clases."</td>
			<td>";	
				if(!empty($palabras_claves)){
					foreach ($palabras_claves as $value) {											
								$cadena .=htmlentities($value, ENT_QUOTES,'UTF-8');
							    $cadena .="<br>";					
					}
				}											
			$cadena .="</td>";
						
			$cadena .="<td style='width:100px'>";				    	      														    
					$cantidad_objetivos=count($objetivos);													
					for($i=0;$i<1;$i++){
						$cadena .="-".htmlentities($objetivos['objetivo'.$i]['descripcion_objetivo'], ENT_QUOTES,'UTF-8');              		}										
			$cadena .="</td>";
			
			$cadena .="<td style='width:100px'>";			
			    for($i=0;$i<1;$i++){		
					$cantidad_indicadores=count($objetivos['objetivo'.$i]);				 
					    for($x=0;$x<$cantidad_indicadores-4;$x++){
						 	$cadena .="-".htmlentities($objetivos['objetivo'.$i]['indicador'.$x], ENT_QUOTES,'UTF-8');
							$cadena .="<br>";
				    	} 
		
			    }			
			$cadena .="</td>";	
			
			$cadena .="<td style='width:100px'>";
				if(!empty($habilidades)){				
					foreach($habilidades as $habilidad){					
						$cadena .="-".htmlentities($habilidad, ENT_QUOTES,'UTF-8');
						$cadena .="<br>";
					}
				}
			$cadena .="</td>";		
						
			$cadena .="<td style='width:100px'>";
				if(!empty($actitudes)){		
					foreach($actitudes as $actitud){					
						$cadena .="-".htmlentities($actitud, ENT_QUOTES,'UTF-8');
						$cadena .="<br>";
					}
				}
			
			$cadena .="</td>";
			
			$cadena .="<td style='width:100px'>";
				if(!empty($objetivos['objetivo0']['estrategia_aprendizaje'])){
					$cadena .= htmlentities($objetivos['objetivo0']['estrategia_aprendizaje'], ENT_QUOTES,'UTF-8');
				}
			$cadena .="</td>";
			
			$cadena .="<td style='width:100px'>";
				if(!empty($objetivos['objetivo0']['formas_evaluacion'])){
					$cadena .=htmlentities($objetivos['objetivo0']['formas_evaluacion'], ENT_QUOTES,'UTF-8');			
				}
			$cadena .="</td>";
			
			$cadena .="<td style='width:100px'>";
				if(!empty($objetivos['objetivo0']['tipos_evaluacion'])){								
					$tipos_ev=$objetivos['objetivo0']['tipos_evaluacion'];
					foreach($tipos_ev as $tipo_ev){
						$cadena .=$tipo_ev."<br><br>";	
					}
				}
				
			$cadena .="</td>";
			
		$cadena .="</tr>";
		
				
   		for($i=1;$i<$cantidad_objetivos;$i++){
			$cadena .="<tr>";
				$cadena .= "<td></td>";
				$cadena .="<td></td>";
				$cadena .="<td></td>";		
				
				$cantidad_indicadores=count($objetivos['objetivo'.$i]);	
				$cadena .="<td style='width:100px'>"; 							    
					$cadena .=htmlentities($objetivos['objetivo'.$i]['descripcion_objetivo'], ENT_QUOTES,'UTF-8');			
				$cadena .="</td>";
				
				$cadena .="<td style='width:100px'>";			 
		    	for($x=0;$x<$cantidad_indicadores-4;$x++){
					$cadena .="-".htmlentities($objetivos['objetivo'.$i]['indicador'.$x], ENT_QUOTES,'UTF-8');
					$cadena .="<br>";
    			} 
				$cadena .="</td>";
				
				$cadena .="<td></td>";
				
				$cadena .="<td></td>";
				
				$cadena .="<td style='width:100px'>";
					$cadena .=htmlentities($objetivos['objetivo'.$i]['estrategia_aprendizaje'], ENT_QUOTES,'UTF-8');
				$cadena .="</td>";	
				
				$cadena .="<td style='width:100px'>";
					$cadena .=htmlspecialchars($objetivos['objetivo'.$i]['formas_evaluacion']);	
				$cadena .="</td>";
				
				$cadena .="<td style='width:100px'>";	
					$tipos_ev=$objetivos['objetivo'.$i]['tipos_evaluacion'];
					foreach($tipos_ev as $tipo_ev){
						$cadena.=$tipo_ev."<br><br>";	
					}			
				$cadena .="</td>";	
				
			$cadena .="</tr>";
	    }								
	$cadena .="</table>";
	$cadena .="</page>";	

		
		
		
		
		//header("Content-Disposition: attachment; filename=sample.pdf");
   		require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
	    $html2pdf = new HTML2PDF('L','A4','es');
    	$html2pdf->WriteHTML($cadena);
		$html2pdf->Output('Planificacion anual Unidad:'.$unidad.'/Curso: '.$curso.'/Asignatura:'.$asignatura.'.pdf', 'D');  
?>		