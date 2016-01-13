<?
/*
Template Name: carta_gantt
*/
session_start();
get_header();
/*
$curso=$_SESSION['cu_so'];
$asignatura=$_SESSION['asignatura'];
$ano=$_SESSION['ano'];
$nombre_curso=$_SESSION['nombre_curso'];
$docente=get_current_user_id();*/




$curso=$_GET['cu_so'];
$asignatura=$_GET['asignatura'];
$ano=$_GET['ano'];
$nombre_curso=$_GET['nombre_curso'];
$docente=$_GET['docente'];



$args_gantt = array(    	
    'post_type' => 'carta_gantt',
	'author' => $docente,
	'meta_query' => array(
        array  (
	           'meta_key' => 'Asignatura',
        	   'meta_value'=> $asignatura
	     ),
	    array  (
	           'meta_key' => 'Curso',
        	   'meta_value'=> $curso
	    )	        
	)
);
query_posts( $args_gantt );

while (have_posts()) : the_post();		
	$id_carta_gantt=get_the_ID();
endwhile;




$args = array(    	
    'post_type' => 'planificacion_anual',
	'author' => $docente,
	'meta_key'		=> 'Unidad',
	'orderby'		=> 'meta_value_num',
	'order'			=> 'ASC',
	'meta_query' => array(
        array  (
	           'meta_key' => 'Asignatura',
        	   'meta_value'=> $asignatura
	     ),
	    array  (
	           'meta_key' => 'Curso',
        	   'meta_value'=> $curso
	    )	        
	)
);
query_posts( $args );


$ids_planificacion_anual = array();
$ids_=0;
while (have_posts()) : the_post();
		
	$ids_planificacion_anual[$ids_]=get_the_ID();		
	$ids_++;
endwhile;
			 		
$id_planificacion_anual_1=$ids_planificacion_anual[0];
$id_planificacion_anual_2=$ids_planificacion_anual[1];
$id_planificacion_anual_3=$ids_planificacion_anual[2];
$id_planificacion_anual_4=$ids_planificacion_anual[3];



if(isset($_POST["boton_guardar_gantt"])){	

	if(empty($id_carta_gantt)){					
		$carta_gantt_1 = array(
  				'post_title'    => 'Carta Gantt '.$curso.' '.$asignatura,	  			
	  			'post_type'	=> 'carta_gantt',
 				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_category' => array(8,39)
		);
		$id_carta_gantt=wp_insert_post( $carta_gantt_1 );
		update_post_meta($id_carta_gantt,'Asignatura',$asignatura);
		update_post_meta($id_carta_gantt,'Curso',$curso);
	}
	$objetivos_unidad_1  = get_post_meta($id_planificacion_anual_1, 'ObjetivosAprendizajes',true);
	$cantidad_objetivos_unidad_1=count($objetivos_unidad_1);
	$objetivos_unidad_1 = array();	
	for($i=1;$i<=$cantidad_objetivos_unidad_1;$i++){
		$objetivos_unidad_1['objetivo'.$i]=$_POST['unidad_1_objetivo_'.$i.'']; 	
	}
	
	$objetivos_unidad_2  = get_post_meta($id_planificacion_anual_2, 'ObjetivosAprendizajes',true);
	$cantidad_objetivos_unidad_2=count($objetivos_unidad_2);
	$objetivos_unidad_2 = array();	
	for($i=1;$i<=$cantidad_objetivos_unidad_2;$i++){
		$objetivos_unidad_2['objetivo'.$i]=$_POST['unidad_2_objetivo_'.$i.'']; 	
	}
	
	$objetivos_unidad_3  = get_post_meta($id_planificacion_anual_3, 'ObjetivosAprendizajes',true);
	$cantidad_objetivos_unidad_3=count($objetivos_unidad_3);
	$objetivos_unidad_3 = array();	
	for($i=1;$i<=$cantidad_objetivos_unidad_3;$i++){
		$objetivos_unidad_3['objetivo'.$i]=$_POST['unidad_3_objetivo_'.$i.'']; 	
	}
	
	$objetivos_unidad_4  = get_post_meta($id_planificacion_anual_4, 'ObjetivosAprendizajes',true);
	$cantidad_objetivos_unidad_4=count($objetivos_unidad_4);
	$objetivos_unidad_4 = array();	
	for($i=1;$i<=$cantidad_objetivos_unidad_4;$i++){
		$objetivos_unidad_4['objetivo'.$i]=$_POST['unidad_4_objetivo_'.$i.'']; 	
	}
	
	update_post_meta($id_carta_gantt,'Unidad_1',$objetivos_unidad_1);
	update_post_meta($id_carta_gantt,'Unidad_2',$objetivos_unidad_2);
	update_post_meta($id_carta_gantt,'Unidad_3',$objetivos_unidad_3);
	update_post_meta($id_carta_gantt,'Unidad_4',$objetivos_unidad_4);
	
	
	
	/*
	var_dump($objetivos_unidad_1);
	echo "<br>";
	var_dump($objetivos_unidad_2);
	echo "<br>";
	var_dump($objetivos_unidad_3);
	echo "<br>";
	var_dump($objetivos_unidad_4);
	echo "<br>";
	*/
		//update_post_meta( ${"id_planificacion_anual_".$x}, 'Asignatura', $asignatura );

}

$objetivos_unidad_1  = get_post_meta($id_planificacion_anual_1, 'ObjetivosAprendizajes',true);
$cantidad_objetivos_unidad_1=count($objetivos_unidad_1);


echo  'Asignatura:'.$curso.' / '.$asignatura; 
echo "<br>";
$user_info = get_userdata($docente);
echo 'Docente:'.$user_info->first_name.' '.$user_info->last_name;
echo "<br><br>";
?>
<form action="" method="post">
<table style="border:1px solid #000000; font-size: 13px;" frame="void" cellspacing="5" cellpadding="5" border="5" bordercolor="#000000;" >
	<tr bgcolor="#4169E1">
    	<td style="border:1px solid #000000; width: 1500px;">
        	Mes
        </td>        
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Febrero</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Marzo</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Abril</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Mayo</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Junio</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Julio</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Agosto</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Septiembre</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Octubre</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Noviembre</td>
        <td colspan="4" style="border:1px solid #000000; width: 150px;">Diciembre</td>
    </tr>
    <tr  bgcolor="#4169E1">
	    <td>
        	Semana
        </td>        
        
    <?
		for($i=1;$i<=11;$i++){
    		echo '<td style="border:1px solid #000000; width: 150px;">';
				echo '1';
			echo '</td>';
			echo '<td style="border:1px solid #000000; width: 150px;">';
				echo '2';
			echo '</td>';
			echo '<td style="border:1px solid #000000; width: 150px;">';
				echo '3';
			echo '</td>';
			echo '<td style="border:1px solid #000000; width: 150px;">';
				echo '4';
			echo '</td>';
		}
	?>
    	
    </tr>
    <tr  bgcolor="#4169E1">
    	<td align="center" style="border:1px solid #000000;" colspan="45">Semestre 1</td>
    </tr>
    
    <tr>    
    	<td bgcolor="#4169E1">
	       Unidad 1
    	</td>        
        
	    <?
			for($i=1;$i<=11;$i++){
    			echo '<td bgcolor="#87CEEB" style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td bgcolor="#87CEEB" style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td bgcolor="#87CEEB" style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td bgcolor="#87CEEB" style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
			}
		?>
    </tr>
    <tr>    
    	<td bgcolor="#4169E1">
	      Objetivo de Aprendizaje
    	</td>        
        
	    <?
			for($i=1;$i<=11;$i++){
    			echo '<td bgcolor="#87CEEB"  style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td bgcolor="#87CEEB"  style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td bgcolor="#87CEEB"  style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td bgcolor="#87CEEB"  style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
			}
		?>
    </tr>
        <?
       // $objetivos_unidad_1  = get_post_meta($id_planificacion_anual_1, 'ObjetivosAprendizajes',true);
		//$cantidad_objetivos=count($objetivos_unidad_1);
		$fechas_unidad_1=get_post_meta($id_carta_gantt,'Unidad_1',true);
		
		for($i=0;$i<$cantidad_objetivos_unidad_1;$i++){	
			$fechas_unidad=$fechas_unidad_1['objetivo'.($i+1)];
			if(empty($fechas_unidad)){
				$fechas_unidad=array();
			}
				echo "<tr>";	
					echo "<td style='border:1px solid #000000;' bgcolor='#4169E1'>";      	
						echo $objetivos_unidad_1['objetivo'.$i]['descripcion_objetivo'];
						echo "<br>";               		
					echo "</td>";	
					for($x=1;$x<=11;$x++){
						
		    			echo '<td style="border:1px solid #000000; width: 150px;" bgcolor="#87CEEB">';
								$c=($x*4)-4;								
								$value_1="unidad_1_objetivo_".($i+1)."_semana_".($c+1);	
								$verif="";												
										
								if (in_array($value_1, $fechas_unidad)){$verif='checked';}
								echo '<input type="checkbox" name="unidad_1_objetivo_'.($i+1).'[]" value="'.$value_1.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;" bgcolor="#87CEEB">';
								$value_2="unidad_1_objetivo_".($i+1)."_semana_".($c+2);
								$verif="";				
																		
								if (in_array($value_2, $fechas_unidad)){$verif='checked';}
								echo '<input type="checkbox" name="unidad_1_objetivo_'.($i+1).'[]" value="'.$value_2.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;" bgcolor="#87CEEB">';
								$value_3="unidad_1_objetivo_".($i+1)."_semana_".($c+3);
								$verif="";	
																				
								if (in_array($value_3, $fechas_unidad)){$verif='checked';}
								echo '<input type="checkbox" name="unidad_1_objetivo_'.($i+1).'[]" value="'.$value_3.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;" bgcolor="#87CEEB">';
								$value_4="unidad_1_objetivo_".($i+1)."_semana_".($c+4);
								$verif="";	
																				
								if (in_array($value_4, $fechas_unidad)){$verif='checked';}
								echo '<input type="checkbox" name="unidad_1_objetivo_'.($i+1).'[]" value="'.$value_4.'" '.$verif.'>';
						echo '</td>';
					}
				echo "</tr>";
		}				
		?>
    <tr bgcolor="#FF6347">    
    	<td>
	       Unidad 2
    	</td>        
        
	    <?
			for($i=1;$i<=11;$i++){
    			echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
			}
		?>
    </tr>
    <tr bgcolor="#FF6347">    
    	<td>
	      Objetivo de Aprendizaje
    	</td>        
        
	    <?
			for($i=1;$i<=11;$i++){
				
    			echo '<td style="border:1px solid #000000; width: 150px;">';					
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
				
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
			}
		?>
    </tr>
                  
        <?
        $objetivos_unidad_2  = get_post_meta($id_planificacion_anual_2, 'ObjetivosAprendizajes',true);
		$cantidad_objetivos_unidad_2=count($objetivos_unidad_2);
		$fechas_unidad_2=get_post_meta($id_carta_gantt,'Unidad_2',true);
		for($i=0;$i<$cantidad_objetivos_unidad_2;$i++){	
			$fechas_unidad=$fechas_unidad_2['objetivo'.($i+1)];
			if(empty($fechas_unidad)){
				$fechas_unidad=array();
			}
				echo "<tr bgcolor='#FF6347'>";	
					echo "<td style='border:1px solid #000000;'>";      	
						echo $objetivos_unidad_2['objetivo'.$i]['descripcion_objetivo'];
						echo "<br>";               		
					echo "</td>";	
					for($x=1;$x<=11;$x++){
						$c=($x*4)-4;
		    			echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_1='unidad_2_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_1, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_2_objetivo_'.($i+1).'[]" value="'.$value_1.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_2='unidad_2_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_2, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_2_objetivo_'.($i+1).'[]" value="'.$value_2.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_3='unidad_2_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_3, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_2_objetivo_'.($i+1).'[]" value="'.$value_3.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_4='unidad_2_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_4, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_2_objetivo_'.($i+1).'[]" value="'.$value_4.'" '.$verif.'>';
						echo '</td>';
					}
				echo "</tr>";
		}				
		?> 
    <tr bgcolor="#FFCC33">    
    	<td>
	       Unidad 3
    	</td>        
        
	    <?
			for($i=1;$i<=11;$i++){
    			echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
			}
		?>
    </tr>
    <tr bgcolor="#FFCC33">    
    	<td>
	      Objetivo de Aprendizaje
    	</td>        
        
	    <?
			for($i=1;$i<=11;$i++){
    			echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
			}
		?>
    </tr>
         
        <?
        $objetivos_unidad_3  = get_post_meta($id_planificacion_anual_3, 'ObjetivosAprendizajes',true);
		$cantidad_objetivos_unidad_3=count($objetivos_unidad_3);
		$fechas_unidad_3=get_post_meta($id_carta_gantt,'Unidad_3',true);
		for($i=0;$i<$cantidad_objetivos_unidad_3;$i++){	
			$fechas_unidad=$fechas_unidad_3['objetivo'.($i+1)];
			if(empty($fechas_unidad)){
				$fechas_unidad=array();
			}
				echo "<tr bgcolor='#FFCC33'>";	
					echo "<td style='border:1px solid #000000;'>";      	
						echo $objetivos_unidad_3['objetivo'.$i]['descripcion_objetivo'];
						echo "<br>";               		
					echo "</td>";	
					for($x=1;$x<=11;$x++){
						$c=($x*4)-4;
		    			echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_1='unidad_3_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_1, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_3_objetivo_'.($i+1).'[]" value="'.$value_1.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_2='unidad_3_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_2, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_3_objetivo_'.($i+1).'[]" value="'.$value_2.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_3='unidad_3_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_3, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_3_objetivo_'.($i+1).'[]" value="'.$value_3.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_4='unidad_3_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_4, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_3_objetivo_'.($i+1).'[]" value="'.$value_4.'" '.$verif.'>';
						echo '</td>';
					}
				echo "</tr>";
		}				
		?> 
    <tr bgcolor="#00CC66">    
    	<td>
	       Unidad 4
    	</td>        
        
	    <?
			for($i=1;$i<=11;$i++){
    			echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
			}
		?>
    </tr>
    <tr bgcolor="#00CC66">    
    	<td>
	      Objetivo de Aprendizaje
    	</td>        
        
	    <?
			for($i=1;$i<=11;$i++){
    			echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
				echo '<td style="border:1px solid #000000; width: 150px;">';
					
				echo '</td>';
			}
		?>
    </tr>
        
        <?
        $objetivos_unidad_4  = get_post_meta($id_planificacion_anual_4, 'ObjetivosAprendizajes',true);
		$cantidad_objetivos_unidad_4=count($objetivos_unidad_4);
		$fechas_unidad_4=get_post_meta($id_carta_gantt,'Unidad_4',true);
		for($i=0;$i<$cantidad_objetivos_unidad_4;$i++){	
			$fechas_unidad=$fechas_unidad_4['objetivo'.($i+1)];
			if(empty($fechas_unidad)){
				$fechas_unidad=array();
			}
				echo "<tr bgcolor='#00CC66'>";	
					echo "<td style='border:1px solid #000000;'>";      	
						echo $objetivos_unidad_4['objetivo'.$i]['descripcion_objetivo'];
						echo "<br>";               		
					echo "</td>";	
					for($x=1;$x<=11;$x++){
						$c=($x*4)-4;
		    			echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_1='unidad_4_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_1, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_4_objetivo_'.($i+1).'[]" value="'.$value_1.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_2='unidad_4_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_2, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_4_objetivo_'.($i+1).'[]" value="'.$value_2.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_3='unidad_4_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_3, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_4_objetivo_'.($i+1).'[]" value="'.$value_3.'" '.$verif.'>';
						echo '</td>';
						echo '<td style="border:1px solid #000000; width: 150px;">';
							$value_4='unidad_4_objetivo_'.($i+1).'_semana_'.($c+1);	
							$verif="";														
							if (in_array($value_4, $fechas_unidad)){$verif='checked';}
							echo '<input type="checkbox" name="unidad_4_objetivo_'.($i+1).'[]" value="'.$value_4.'" '.$verif.'>';
						echo '</td>';
					}
				echo "</tr>";
		}				
		?>         
</table>
<input type="submit" name="boton_guardar_gantt" value="Guardar">
</form>
<?php get_sidebar(); ?>
<?php get_footer(); ?>	