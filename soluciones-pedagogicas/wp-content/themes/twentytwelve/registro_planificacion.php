<?php
/*
Template Name: Registro de Planificación
*/

/* NO BORRAR PORFAVOR!!!! */
	 session_start();
	 session_destroy();
     $objetivos_wp= get_post_meta(410, 'Objetivo_');	
	 $palabras_claves_wp= get_post_meta(410, 'Palabra_Clave',true);
	 $conocimientos_wp= get_post_meta(410, 'Conocimiento_',true);
	 $actitudes_wp= get_post_meta(410, 'Actitud_',true);
	 $habilidades_wp= get_post_meta(410, 'Habilidad_',true);
	 
     
	/* $cantidad_objetivos=count($objetivos_wp[0]);
	 if($cantidad_objetivos>0){
    	 for($i=0;$i<$cantidad_objetivos;$i++){
			 echo $objetivos_wp[0]['objetivo'.$i]['descripcion_objetivo'];
		 	echo '<br>';
		 
			 $cantidad_indicadores=count($objetivos_wp[0]['objetivo'.$i]);		 
			 for($x=0;$x<$cantidad_indicadores;$x++){
				 echo $objetivos_wp[0]['objetivo'.$i]['indicador'.$x];			
			 	echo '<br>';			 
    		} 
			echo '<br>';
    	} 	 	
	}
	echo '<br>';
	if(!empty($palabras_claves_wp)){
		foreach($palabras_claves_wp as $palabra){
			echo $palabra;
			echo '<br>';
		}
		echo '<br>';
	}
	
	if(!empty($conocimientos_wp)){
		foreach($conocimientos_wp as $conocimiento){
			echo $conocimiento;
			echo '<br>';
		}
		echo '<br>';
	}
	
	if(!empty($actitudes_wp)){
		foreach($actitudes_wp as $actitud){
			echo $actitud;
			echo '<br>';
		}
		echo '<br>';
	}
	
	if(!empty($habilidades_wp)){
		foreach($habilidades_wp as $habilidad){
			echo $habilidad;
			echo '<br>';
		}
		echo '<br>';
	}
    */

if (isset($_POST['guardar'])) {

	$curso = $_POST['curso_registro_plan'];
	$asignatura = $_POST['asignatura_registro_plan'];
  	$unidad = $_POST['unidad_registro_plan'];	
  	$palabras_claves = $_POST['palabrasClaves'];
  	$conocimientos = $_POST['conocimientos'];
  	$actitudes = $_POST['actitudes'];
  	$habilidades = $_POST['habilidades'];
  
  	update_post_meta( 410, 'Palabra_Clave', $palabras_claves );
  	update_post_meta( 410, 'Conocimiento_', $conocimientos );
  	update_post_meta( 410, 'Actitud_', $actitudes );
  	update_post_meta( 410, 'Habilidad_', $habilidades );
	
	$objetivos=$_POST["objetivos"];
	$total_objetivos=count($objetivos);			 
	$obj = array();		
	for($i=0;$i<$total_objetivos;$i++){								
				if(!$objetivos[$i]==""){					
					$indicadores_objetivo=$_POST["indicadores_objetivo_".($i+1).""];
					$total_indicadores_objetivos=count($indicadores_objetivo);
					$obj['objetivo'.$i]['descripcion_objetivo']=$objetivos[$i]; 	
					for($x=0;$x<$total_indicadores_objetivos;$x++){						
						//echo $indicadores_objetivo[$x];	
						if(!$indicadores_objetivo[$x]==""){
							$obj['objetivo'.$i]['indicador'.$x]=$indicadores_objetivo[$x]; 
						}	
					}
				}
	}
	
	 update_post_meta( 410, 'Objetivo_', $obj);
  
  
   $objetivos_wp= get_post_meta(410, 'Objetivo_');	
	 $palabras_claves_wp= get_post_meta(410, 'Palabra_Clave',true);
	 $conocimientos_wp= get_post_meta(410, 'Conocimiento_',true);
	 $actitudes_wp= get_post_meta(410, 'Actitud_',true);
	 $habilidades_wp= get_post_meta(410, 'Habilidad_',true);
}
?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<script> 	 
	 
 	function cargar_asignaturas(curso){			
			var curso_sel=curso.value;										
            var url="/soluciones-pedagogicas/consulta-asinaturas-base-curricular";
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_curso': curso_sel },
                success: function(datos){       
                    $('#asignaturas').html(datos);
                }				
            });			
        }
	 function cargar_unidades(){															
            var url="/soluciones-pedagogicas/consulta-unidades-base-curricular";
            $.ajax({   
                type: "GET",
                url:url,            
                success: function(datos){       
                    $('#unidad').html(datos);
                }				
            });			
        }	

	function cargar_base_curricular(unidad,curso,asignatura){															
            var url="/soluciones-pedagogicas/cargar-base-curricular";									
            $.ajax({   
                type: "GET",
                url:url,
                data: {'unidad': unidad, 'curso': curso, 'asignatura': asignatura},
                success: function(datos){    																
					$('#div_base_curricular').html(datos); 
																						
                }
            });
        }					
</script>		
<?php get_header();
?>

<table id="tab_registro_plan">
	<tr>
		<td colspan="2">Formulario de registro de base curriculares</td>
	</tr>    
	<tr>
			<td><i>Curso:</i><br> 
				<SELECT id="curso" name="curso" onchange="cargar_asignaturas(this)" size="1">
				
					<option value="" default selected>Selecciona Curso</option>
                    
					<?
							$args = array(    	
								'posts_per_page' => -1,	
						    	'post_type' => 'curso',
								'author' => get_current_user_id()											
							);
							query_posts( $args );
							while (have_posts()) : the_post();							
								echo '<option value="';
								the_ID();								
								echo '">';
								the_title();
								echo '</option>';				
							endwhile;		
					?>   
			</SELECT>
			</td>
			<td><i>Asignatura:</i> <br>
				<SELECT id="asignaturas" name="asignaturas" onchange="cargar_unidades()" >
  				<option></option>
			</SELECT> 
			</td>
	</tr>    
	<tr>
		<td colspan="2"><i>Unidad:</i><br>
				<SELECT id="unidad" name="unidad">
  				<option></option>
			</SELECT> 
		</td>		
	</tr>

</table>
<a href="javascript:irSiguiente()">Siguiente</a>
<?php get_sidebar();?>
<?php get_footer();?>

<script>                            
function irSiguiente() {
	
	var unidad=document.getElementById('unidad').value;
	var curso=document.getElementById('curso').value;
	var asignatura=document.getElementById('asignaturas').value;
	
	if(unidad=="" || curso=="" || asignatura==""){
		alert('Debe completar el formulario')
	}else{
		location.href='/soluciones-pedagogicas/cargar-base-curricular-2?unidad='+unidad+'&cu_so='+curso+'&asignatura='+asignatura;
	}
}                            
</script>