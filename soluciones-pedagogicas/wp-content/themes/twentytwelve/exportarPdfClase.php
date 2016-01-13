<?
/*
Template Name: ExportarPdfClase
*/	
	global $wpdb, $post;
	$id_planificacion_clase=$_GET['id_planificacion_clase'];	
 	$asignatura= get_post_meta($id_planificacion_clase, 'Asignatura', true);
	$curso= get_post_meta($id_planificacion_clase, 'Curso', true);
	$unidad= get_post_meta($id_planificacion_clase, 'UnidadAprendizaje', true);
	$numero_semana= get_post_meta($id_planificacion_clase, 'NumeroSemana', true);
	$numero_clase=get_post_meta($id_planificacion_clase, 'NumeroClase', true);	
	$conceptos_claves=get_post_meta($id_planificacion_clase, 'ConceptosClaves', true);
	$indicadores=get_post_meta($id_planificacion_clase, 'Indicadores', true);
	$objetivo_aprendizaje=get_post_meta($id_planificacion_clase, 'ObjetivosAprendizaje', true);
	$recursos_pedagogicos=get_post_meta($id_planificacion_clase, 'RecursosPedagogicos', true);
	$tiempo=get_post_meta($id_planificacion_clase,'Tiempo',true);
	$actitudes=get_post_meta($id_planificacion_clase,'Actitudes',true);
	$fecha=get_post_meta($id_planificacion_clase,'Fecha',true);
	$inicio=get_post_meta($id_planificacion_clase,'Inicio',true);	
	$desarrollo=get_post_meta($id_planificacion_clase,'Desarrollo',true);
	$cierre=get_post_meta($id_planificacion_clase,'Cierre',true);	
	$evaluacion=get_post_meta($id_planificacion_clase,'Evaluacion',true);
	$habilidades=get_post_meta($id_planificacion_clase,'Habilidades',true);
		
	global $current_user;		
	$current_user = wp_get_current_user();	
	$nombre_profesor=$current_user->first_name.' '.$current_user->last_name;
	
	
	
$cadena =
"<page>	
	
<table style='border:1px solid #000000; font-size: 13px;' border='5' bordercolor='#000000;' >
<tr>
	<td colspan='4' style='border:1px solid #000000;' bgcolor='#B0C4DE'>
    	PLANIFICACION CLASE A CLASE
    </td> 
</tr>
<tr>
	<td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    DOCENTE:
    </td> 
    <td style='border:1px solid #000000;'>
     ".htmlentities($nombre_profesor, ENT_QUOTES,'UTF-8')."	
    </td> 
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    CURSO:
    </td> 
    <td style='border:1px solid #000000;'>
    ".htmlentities($curso, ENT_QUOTES,'UTF-8')."	
    </td>
</tr>

<tr>
	<td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    ASIGNATURA:
    </td> 
    <td style='border:1px solid #000000;'>
    ".htmlentities($asignatura, ENT_QUOTES,'UTF-8')."	
    </td> 
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    N° SEMANA:
    </td> 
    <td style='border:1px solid #000000;'>
   ".htmlentities($numero_semana, ENT_QUOTES,'UTF-8')."	
    </td>
</tr>

<tr>
	<td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    UNIDAD DE APRENDIZAJE:
    </td>
    <td colspan='3' style='border:1px solid #000000;'>
    ".htmlentities($unidad, ENT_QUOTES,'UTF-8')."
    </td>
</tr>

<tr>
	<td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    N° de clase:
    </td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	   Conceptos claves:
    </td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    Narracion Breve de la actividad:
    </td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    Recursos Pedagogicos:
    </td>
</tr>

<tr>
	<td rowspan='2' style='border:1px solid #000000;'>
   ".$numero_clase."	
    </td>
    <td rowspan='2' style='border:1px solid #000000; width:100px;'>";
    
    	foreach($conceptos_claves as $concepto){
			$cadena.='-'.htmlentities($concepto, ENT_QUOTES,'UTF-8').'<br>';	
			
		}
	   
    $cadena .="</td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    Objetivo de Clase
    </td>
     <td rowspan='9' style='border:1px solid #000000;'>
    ".htmlentities($recursos_pedagogicos, ENT_QUOTES,'UTF-8')."	   
    </td> 
</tr>


<tr>	 
    
    <td style='border:1px solid #000000; width:200px;'>
    ".htmlentities($objetivo_aprendizaje, ENT_QUOTES,'UTF-8')."	
    </td>
      
</tr>

<tr>
	<td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	   Tiempo:
    </td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	   Habilidad:
    </td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    Inicio:
    </td>    
</tr>

<tr>
	<td rowspan='3' style='border:1px solid #000000;'>
    ".$tiempo."	
    </td>
    <td style='border:1px solid #000000; width:100px;'>";
    
    	foreach($habilidades as $habilidad){
			$cadena.="-".htmlentities($habilidad, ENT_QUOTES,'UTF-8');
			$cadena.="<br>";	
		}
	  
    $cadena.="</td>
    <td style='border:1px solid #000000; width:100px;' >";
    
    	foreach($inicio as $ini){
				$cadena.="-".htmlentities($ini, ENT_QUOTES,'UTF-8');
				$cadena.="<br>";				
			}
	  
    $cadena.="</td>
	
</tr>
<tr>
	<td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	   
    </td>  
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    Desarrollo
    </td>  
</tr>

<tr>
	<td style='border:1px solid #000000;'>
    </td>
    <td style='border:1px solid #000000;'>
    ".htmlentities($desarrollo, ENT_QUOTES,'UTF-8')."   
    </td>
</tr>

<tr>
	<td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	   Fecha:
    </td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>	   
    </td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    Cierre
    </td>   
</tr>

<tr>
	<td style='border:1px solid #000000;'>
    ".$fecha."	  
    </td>
    <td style='border:1px solid #000000;'>      
    </td>
    <td style='border:1px solid #000000; width:200px;'>";
    
    	foreach($cierre as $cier){
				$cadena.="-".htmlentities($cier, ENT_QUOTES,'UTF-8');
				$cadena.="<br>";				
			}
	  
    $cadena.="</td>
</tr>

<tr>
	<td colspan='3' style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	   Evaluacion:
    </td>  	
</tr>

<tr>
	<td colspan='3' style='border:1px solid #000000;'>
    ".htmlentities($evaluacion, ENT_QUOTES,'UTF-8')."	
    </td>
</tr>
<tr>
	<td colspan='2' style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	   Indicadores:
    </td>
	<td colspan='2' style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	   Actitudes:
    </td>
</tr>
<tr>	
	<td colspan='2'style='border:1px solid #000000; width:100px;'>";
    
    	foreach($indicadores as $indicador){
			$cadena.="-".htmlentities($indicador, ENT_QUOTES,'UTF-8');
			$cadena.="<br>";	
		}
	  
    $cadena.="</td> 
	<td colspan='2'style='border:1px solid #000000; width:100px;'>";
    
    	foreach($actitudes as $actitud){
			$cadena.="-".htmlentities($actitud, ENT_QUOTES,'UTF-8');
			$cadena.="<br>";	
		}
	  
    $cadena.="</td>  	
</tr>
</table>
</page>";


	require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','es');
	$html2pdf->WriteHTML($cadena);
	$html2pdf->Output('Planificacion Clase_'.$numero_clase.'/Semana_'.$numero_semana.'/'.$curso.'/'.$asignatura.'/Unidad'.$unidad.'.pdf', 'D');
?>	