<?php 
/*

Template Name: Registro curso

*/
session_start();
?>
<script src='http://code.jquery.com/jquery-1.7.1.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script> 
<script>
$(document).ready(function() {

	$("body").on("click",".btn_agregar_curso", function(e){							        
		var contenedorCurso = $('#contenedorCurso_'+this.name); 																	
		var cursos=document.getElementsByName('curso_'+this.name+'[]');              											        var cantidad_cursos=cursos.length+1;							        
		$(contenedorCurso).append('<div><input type="text" maxlenght="1" size="1" name="curso_'+this.name+'[]"><a href="#" class="eliminar">&times;</a></div>');			           
		return false;
	});
	
	$("body").on("click",".eliminar", function(e){ 					
			    
		confirmar=confirm("¿Seguro desea eliminar el curso?"); 
		if (confirmar){ 		    
			$(this).parent('div').remove(); 	
		}				           			        
		return false;
	});

});	


</script>

<?php get_header(); ?> 
<?php 
if (isset($_POST['guardar_cursos'])){

	global $wpdb;
	$args = array( 		  	
		'post_type' => 'curso',
		'author' => get_current_user_id(),	
		'posts_per_page' => -1			
	);
	query_posts( $args );	
	$all_cursos = array();
	$x=0;
	while (have_posts()) : the_post();
		$all_cursos[$x]=get_the_title();		
		$x++;
	endwhile;
	for($i=1;$i<=12;$i++){
		$cursos=$_POST['curso_'.$i];
		if(!empty($cursos)){			
			foreach($cursos as $curso){
					$registro_curso = array(
			    		'post_title'    => $_POST['c_'.$i].' '.$curso,
		 				'post_content'  => '',
					 	'post_type'	    => 'curso',
			 			'post_status'   => 'publish',
						'post_author'   => get_current_user_id(),
						'post_category' => array(8,39)
				    );
				//	var_dump($all_cursos);
					//echo '<br>';
					//echo $_POST['c_'.$i].' '.$curso;
					//echo '<br>';
					
					if (in_array($_POST['c_'.$i].$curso, $all_cursos)==FALSE){													
						$id_curso=wp_insert_post( $registro_curso );					
						update_post_meta( $id_curso, 'Letra', $curso);
						update_post_meta( $id_curso, 'NumeroCurso', $i);
						update_post_meta( $id_curso, 'NombreCurso', $_POST['c_'.$i]);
					
						if(($i>=1) && ($i<=4)){
							update_post_meta( $id_curso, 'NivelCurso', 'Medio');
							$asignaturas_del_curso = array();
							
							if($i==1 || $i==2){
								$z=0;
								for($x=1;$x<=14;$x++){
									if($x!==5){																				
										$asignaturas_del_curso[$z]  = $x;	
										$z++;																				
									}
								}
								update_post_meta($id_curso, 'Asignaturas', $asignaturas_del_curso);
							}else{
								$z=0;
								for($x=1;$x<=13;$x++){
									if($x!==5){																				
										$asignaturas_del_curso[$z]  = $x;	
										$z++;																				
									}
								}
								update_post_meta($id_curso, 'Asignaturas', $asignaturas_del_curso);
								
							}
							
						}else{
							update_post_meta( $id_curso, 'NivelCurso', 'Basico');
							
							$asignaturas_del_curso = array();
								
							for($x=1;$x<=10;$x++){																
										$asignaturas_del_curso[$x-1]  = $x;			
							}
							update_post_meta($id_curso, 'Asignaturas', $asignaturas_del_curso);
						}
						
						
							
					}
			}
		}else{
			$registro_curso = array(
			    'post_title'    => $_POST['c_'.$i],
 				'post_content'  => '',
			 	'post_type'	    => 'curso',
			 	'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_category' => array(8,39)
		    );
			if (!in_array($_POST['c_'.$i], $all_cursos)){			
				$id_curso=wp_insert_post( $registro_curso );
				update_post_meta( $id_curso, 'NumeroCurso', $i);
				update_post_meta( $id_curso, 'NombreCurso', $_POST['c_'.$i]);
				if(($i>=1) && ($i<=4)){
							update_post_meta( $id_curso, 'NivelCurso', 'Medio');
							$asignaturas_del_curso = array();
							
							if($i==1 || $i==2){
								$z=0;
								for($x=1;$x<=14;$x++){
									if($x!==5){																				
										$asignaturas_del_curso[$z]  = $x;	
										$z++;																				
									}
								}
								update_post_meta($id_curso, 'Asignaturas', $asignaturas_del_curso);
							}else{
								$z=0;
								for($x=1;$x<=13;$x++){
									if($x!==5){																				
										$asignaturas_del_curso[$z]  = $x;	
										$z++;																				
									}
								}
								update_post_meta($id_curso, 'Asignaturas', $asignaturas_del_curso);
								
							}
							
						}else{
							update_post_meta( $id_curso, 'NivelCurso', 'Basico');
							
							$asignaturas_del_curso = array();
								
							for($x=1;$x<=10;$x++){																
										$asignaturas_del_curso[$x-1]  = $x;			
							}
							update_post_meta($id_curso, 'Asignaturas', $asignaturas_del_curso);
						}
			}
		}		
		
	}
	
}

/*
for($i=1;$i<=12;$i++){	
		
		$args = array( 		  	
	    	'post_type' => 'curso',
			'author' => get_current_user_id(),
			'posts_per_page' => -1,	
			'meta_query' => array(
				array  (
		            'key' => 'NumeroCurso',
        		    'value'=> $i
	        	)				
			)
		);
		query_posts( $args );
			
		while (have_posts()) : the_post();
			the_title();
			//echo  get_post_meta(get_the_ID(),'Nivel',true);
			echo '<br>';
			 //si tiene letra colocar otra wea
		endwhile;
}	*/
?>
<br><br><h1>Registro de cursos </h1><br><br><br><br>

<form name="administracion_cursos" id="administracion_cursos" action="" method="post">
<table>
	<tr>	
		<td  colspan="2" style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><label>Administracion de Cursos</label></td>
	</tr>
<?
	$args = array( 		  	
		'post_type' => 'curso',
		'author' => get_current_user_id(),				
	);
	$consulta=query_posts( $args );
	if(!empty($consulta)){
		for($i=1;$i<=12;$i++){
			echo '<tr>';				
			$args = array( 		  	
	    		'post_type' => 'curso',
				'author' => get_current_user_id(),
				'posts_per_page' => -1,	
				'meta_query' => array(
					array  (
		        	    'key' => 'NumeroCurso',
        		    	'value'=> $i
		        	)				
				)
			);
			query_posts( $args );
		
			$contador=0;	
			while (have_posts()) : the_post();
			 	if($contador==0){
					$ltr=get_post_meta(get_the_ID(),'Letra',true);
					if(!empty($ltr)){
						$nombre_curso=substr(get_the_title(), 0, -1);	
					}else{
						$nombre_curso=get_the_title();
					}	
					 					
					echo '<td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_'.$i.'" name="c_'.$i.'" value="'.$nombre_curso.'" readonly="readonly"></td><td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><div id="contenedorCurso_'.$i.'">';
					if(!empty($ltr)){
						$letra_curso=get_post_meta(get_the_ID(),'Letra',true);
						echo '<div><input readonly type="text" maxlenght="1" size="1" name="curso_'.$i.'[]" value="'.$letra_curso.'"><a href="javascript:confirmar()" class="eliminar">&times;</a></div>';	
					}
				}				
				else{
					$letra_curso=get_post_meta(get_the_ID(),'Letra',true);
					echo '<div><input readonly type="text" maxlenght="1" size="1" name="curso_'.$i.'[]" value="'.$letra_curso.'"><a href="#" class="eliminar">&times;</a></div>';
				}
				$contador++;				
			endwhile;
			echo '<a id="btn_agregar_curso" name="'.$i.'" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>';
			echo '</div>';
			echo '</td>';
		echo '</tr>';	
	}
}else{
?>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_1" name="c_1" value="4 Medio" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_1">
    	<a id="btn_agregar_curso" name="1" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_2" name="c_2" value="3 Medio" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_2">
    	<a id="btn_agregar_curso" name="2" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_3" name="c_3" value="2 Medio" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_3">
    	<a id="btn_agregar_curso" name="3" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_4" name="c_4" value="1 Medio" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_4">
    	<a id="btn_agregar_curso" name="4" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_5" name="c_5" value="8 Basico" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_5">
    	<a id="btn_agregar_curso" name="5" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_6" name="c_6" value="7 Basico" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_6">
    	<a id="btn_agregar_curso" name="6" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_7" name="c_7" value="6 Basico" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_7">
    	<a id="btn_agregar_curso" name="7" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_8" name="c_8" value="5 Basico" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_8">
    	<a id="btn_agregar_curso" name="8" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_9" name="c_9" value="4 Basico" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_9">
    	<a id="btn_agregar_curso" name="9" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_10" name="c_10" value="3 Basico" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_10">
    	<a id="btn_agregar_curso" name="10" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_11" name="c_11" value="2 Basico" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_11">
    	<a id="btn_agregar_curso" name="11" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>

<tr>    
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;"><input type="text" id="c_12" name="c_12" value="1 Basico" readonly="readonly"></td>
 <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
 	<div id="contenedorCurso_12">
    	<a id="btn_agregar_curso" name="12" class="btn-btn-info btn_agregar_curso" href="#">Agregar Curso</a>	
    </div>
 </td>
</tr>
<?
	}
?>
</table><br><br><br><br>
<input type="submit" class="guardar_cursos" id="guardar_cursos" name="guardar_cursos" action="" value="Guardar">
</form>
<?php get_sidebar(); ?>
<?php get_footer(); ?>