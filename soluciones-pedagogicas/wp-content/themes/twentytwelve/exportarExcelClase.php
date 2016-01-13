<?
/*
Template Name: ExportarExcelClase
*/		
	global $wpdb, $post;
	$id_planificacion_clase=$_GET['id_planificacion_clase'];	
 	$asignatura= get_post_meta($id_planificacion_clase, 'Asignatura', true);
	$curso= get_post_meta($id_planificacion_clase, 'Curso', true);
	$unidad= get_post_meta($id_planificacion_clase, 'UnidadAprendizaje', true);
	$numero_semana= get_post_meta($id_planificacion_clase, 'NumeroSemana', true);
	$numero_clase=get_post_meta($id_planificacion_clase, 'NumeroClase', true);	
	
	
	header("Content-type: application/vnd.ms-excel; name='excel'");	
	header("Content-Disposition: filename=Planificacion Clase_".$numero_clase."/Semana_".$numero_semana."/".$curso."/".$asignatura."/Unidad".$unidad.".xls");
	header("Pragma: no-cache");
	header("Expires: 0");

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
			
?>
<table style="border:1px solid #000000; font-size: 13px;" cellspacing="1" cellpadding="1" border="5" bordercolor="#000000;" >
<tr>
	<td colspan="4" style="border:1px solid #000000;" bgcolor="#B0C4DE">
    	PLANIFICACION CLASE A CLASE
    </td> 
</tr>

<tr>
	<td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    DOCENTE:
    </td> 
    <td style="border:1px solid #000000;">
    <?
    	echo htmlentities($nombre_profesor, ENT_QUOTES,'UTF-8');
	?>
    </td> 
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    CURSO:
    </td> 
    <td style="border:1px solid #000000;">
    <?
    	echo htmlentities($curso, ENT_QUOTES,'UTF-8');
	?>
    </td>
</tr>

<tr>
	<td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    ASIGNATURA:
    </td> 
    <td style="border:1px solid #000000;">
    <?
    	echo htmlentities($asignatura, ENT_QUOTES,'UTF-8');
	?>
    </td> 
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    N SEMANA:
    </td> 
    <td style="border:1px solid #000000;">
    <?
    	echo htmlentities($numero_semana, ENT_QUOTES,'UTF-8');
	?>
    </td>
</tr>

<tr>
	<td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    UNIDAD DE APRENDIZAJE:
    </td>
    <td colspan='3' style="border:1px solid #000000;">
    <?
    	echo htmlentities($unidad, ENT_QUOTES,'UTF-8');
	?>
    </td>
</tr>

<tr>
	<td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    N de clase:
    </td>
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	   Conceptos claves:
    </td>
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    Narracion Breve de la actividad:
    </td>
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    Recursos Pedagogicos:
    </td>
</tr>

<tr>	
   <td rowspan='2' style="border:1px solid #000000;">
    <?
    	echo $numero_clase;
	?>    
    </td>
    <td rowspan='2' style="border:1px solid #000000;">
    <?
    	foreach($conceptos_claves as $concepto){
			echo htmlentities($concepto, ENT_QUOTES,'UTF-8');	
			echo ',';
		}
	?>    
    </td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    Objetivo de Clase
    </td>
    <td rowspan='8' style="border:1px solid #000000;">
    <?
    	echo htmlentities($recursos_pedagogicos, ENT_QUOTES,'UTF-8');
	?>    
    </td>    
</tr>

<tr>
	<td style='border:1px solid #000000; width:200px;'>
    <?
    	echo htmlentities($objetivo_aprendizaje, ENT_QUOTES,'UTF-8');
	?>
    </td>
</tr>
<tr>
	<td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	   Tiempo:
    </td>
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	   Habilidad:
    </td>
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    Inicio:
    </td>    
</tr>

<tr>
	<td rowspan="3" style="border:1px solid #000000;">
    <?
    	echo $tiempo;
	?>    
    </td>
    <td style="border:1px solid #000000;">
    <?
    	foreach($habilidades as $habilidad){
			echo htmlentities($habilidad, ENT_QUOTES,'UTF-8');
			echo '<br>';	
		}
	?>    
    </td>
    <td style="border:1px solid #000000;">
    <? 
			foreach($inicio as $ini){
				echo htmlentities($ini, ENT_QUOTES,'UTF-8');
				echo '<br>';				
			} 
			
	?>
    <?
    	
	?>    
    </td>
	
</tr>
<tr>
	<td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	   
    </td>  
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    Desarrollo
    </td>  
</tr>

<tr>
	<td>
    </td>
    <td style="border:1px solid #000000;">
    <?
    	echo htmlentities($desarrollo, ENT_QUOTES,'UTF-8');
	?>    
    </td>
</tr>

<tr>
	<td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	   Fecha:
    </td>
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">	   
    </td>
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	    Cierre
    </td>   
</tr>

<tr>
	<td style="border:1px solid #000000;">
    <?
    	echo $fecha;
	?>    
    </td>
    <td style="border:1px solid #000000;">      
    </td>
    <td style="border:1px solid #000000;" >
    <?
		foreach($cierre as $cier){
				echo htmlentities($cier, ENT_QUOTES,'UTF-8');
				echo '<br>';
			}
    	
	?>    
    </td>
</tr>

<tr>
	<td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	   Evaluacion:
    </td>
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	   Indicadores:
    </td>
    <td style="border:1px solid #000000;" bgcolor="#B0C4DE">
	  Actitudes:
    </td>  	
</tr>

<tr>
	<td rowspan="3" style="border:1px solid #000000;">
    <?
    	echo htmlentities($evaluacion, ENT_QUOTES,'UTF-8');
	?>    
    </td>
    <td rowspan="3" style="border:1px solid #000000;">
    <?
    	foreach($indicadores as $indicador){
			echo "-".htmlentities($indicador, ENT_QUOTES,'UTF-8');
			echo "<br>";	
		}
	?>    
    </td>
    <td rowspan="3" style="border:1px solid #000000;">
    <?
    	foreach($actitudes as $actitud){
			echo "-".htmlentities($actitud, ENT_QUOTES,'UTF-8');
			echo "<br>";	
		}
	?>    
    </td>
</tr>



</table>