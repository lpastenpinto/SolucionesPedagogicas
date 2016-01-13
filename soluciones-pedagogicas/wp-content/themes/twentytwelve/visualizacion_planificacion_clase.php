<?
/*
Template Name: visualizacion_planificacion_clase
*/	session_start();
	get_header();
	include ('validar_planificacion.php');
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
	//$nombre_profesor=$current_user->first_name.' '.$current_user->last_name;
	$nombre_profesor=$_SESSION['nombre_autor_planificacion'];
	
	
	
?>

 <div class="container">   
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
     <?	if(!empty($nombre_profesor)){
     		echo htmlentities($nombre_profesor, ENT_QUOTES,'UTF-8');
		}	
	 ?>
    </td> 
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    CURSO:
    </td> 
    <td style='border:1px solid #000000;'>
    <?	if(!empty($curso)){
    	echo htmlentities($curso, ENT_QUOTES,'UTF-8');
		}
	?>
    </td>
</tr>

<tr>
	<td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    ASIGNATURA:
    </td> 
    <td style='border:1px solid #000000;'>
    <?	if(!empty($asignatura)){
    		echo htmlentities($asignatura, ENT_QUOTES,'UTF-8');	
		}
	?>		
    </td> 
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    N° SEMANA:
    </td> 
    <td style='border:1px solid #000000;'>
    <?	if(!empty($numero_semana)){
   			echo htmlentities($numero_semana, ENT_QUOTES,'UTF-8');			
		}
	?>	
    </td>
</tr>

<tr>
	<td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    UNIDAD DE APRENDIZAJE:
    </td>
    <td colspan='3' style='border:1px solid #000000;'>
    <?	if(!empty($unidad)){
    		echo htmlentities($unidad, ENT_QUOTES,'UTF-8');
		}
	?>
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
   <? if(!empty($numero_clase)){echo $numero_clase; }?>	
    </td>
    <td rowspan='2' style='border:1px solid #000000; width:100px;'>
    <?	if(!empty($conceptos_claves)){
    		foreach($conceptos_claves as $concepto){
				echo htmlentities($concepto, ENT_QUOTES,'UTF-8').",";			
			}
		}
	?>  
    </td>
    <td style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	    Objetivo de Aprendizaje
    </td>
    <td rowspan='9' style='border:1px solid #000000;'>
    <? 	if(!empty($recursos_pedagogicos)){
			echo htmlentities($recursos_pedagogicos, ENT_QUOTES,'UTF-8');
		}
	?>	   
    </td> 
</tr>


<tr>	 
    
    <td style='border:1px solid #000000; width:200px;'>
    <? 	if(!empty($objetivo_aprendizaje)){
			echo htmlentities($objetivo_aprendizaje, ENT_QUOTES,'UTF-8');
		}	
	?>
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
    <? if(!empty($tiempo)){echo $tiempo;} ?>	
    </td>
    <td style='border:1px solid #000000; width:100px;'>
    <?	if(!empty($habilidades)){
    		foreach($habilidades as $habilidad){
				echo "-".htmlentities($habilidad, ENT_QUOTES,'UTF-8');
				echo "<br>";	
			}
		}
	?>  
    </td>
    <td style='border:1px solid #000000; width:100px;' >
    <? 	if(!empty($inicio)){
			foreach($inicio as $ini){
				echo htmlentities($ini, ENT_QUOTES,'UTF-8');
				echo "<br>";				
			}
		}
	?>	
    </td>
	
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
    <?	if(!empty($desarrollo)){
    		echo htmlentities($desarrollo, ENT_QUOTES,'UTF-8');  
		}
	?>
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
    <?	if(!empty($fecha)){
    		echo $fecha;	  
		}
	?>	
    </td>
    <td style='border:1px solid #000000;'>      
    </td>
    <td style='border:1px solid #000000;'>
    <?	if(!empty($cierre)){
    		
    		foreach($cierre as $cier){
				echo "-".htmlentities($cier, ENT_QUOTES,'UTF-8');
				echo "<br>";				
			}
		}
	?>
    </td>
</tr>

<tr>
	<td colspan='3' style='border:1px solid #000000;' bgcolor='#B0C4DE'>
	   Evaluacion:
    </td>  	
</tr>

<tr>
	<td colspan='3' style='border:1px solid #000000;'>
    <?	if(!empty($evaluacion)){
    		echo htmlentities($evaluacion, ENT_QUOTES,'UTF-8');
		}
	?>
    </td>
</tr>

</table>

<?
$verif_validado=get_post_meta($id_planificacion_clase,'Validado');
if(empty($verif_validado)){
	
?>
<form action="" method="post">
	<input type="text" value="<? echo $id_planificacion_clase;?>" name="id_planificacion_validar" style="display:none" />
    <input type="submit" value="Validar" name="boton_validar"/> 
</form>
<?
}else{
	echo "<br>*Esta Planificacion ya fue validada. <br>";	
}
?>

<br /><br />        
<a class="boton" href="javascript:history.back(1)">Volver Atras</a>
<br /><br />    
</div>
