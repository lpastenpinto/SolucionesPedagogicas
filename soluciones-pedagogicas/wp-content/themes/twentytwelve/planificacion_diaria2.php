<?php
/*
Template Name: Planificacion diaria 2
*/
?>
<? session_start();?>
<?php get_header(); ?>
<?php 

	$id_planificacion_anual=$_GET['id_unidad_planificacion'];
	$numeroclase=$_GET['clase'];
	$semana=$_GET['semana'];
	
	
	$nombre_unidad=get_the_title($id_planificacion_anual);
	$asignatura  = get_post_meta($id_planificacion_anual, 'Asignatura', true);
	$curso  = get_post_meta($id_planificacion_anual, 'Curso', true);	
		
	//$consulta = "SELECT nombre FROM asignaturas WHERE id='".$asignatura."'";
	//$asignatura = $wpdb->get_var($consulta);
	
if(isset($_POST['guardar_planificacion_clase'])){
	
	$actitudes=$_POST['Actitudes'];
	$conceptos=$_POST['Conceptos'];
	$objetivo=$_POST['Objetivo'];	
	$indicadores=$_POST['Indicadores'];	
	
	$semanas_nueva=$_POST['Semanas'];
	
		
	if(empty($_SESSION['id_planificacion_clase_a_clase'])){
			$planificacion_clase_a_clase = array(
  				'post_title'    => 'Clase Numero:'.$numeroclase.' / Unidad:'.$nombre_unidad,
	  			'post_content'  => '',
	  			'post_type'	=> 'planificacion_clase',
 				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_category' => array(8,39)
			);
			
			if(!empty($semanas_nueva)){
				$semana=$semanas_nueva;
			}
			$_SESSION['id_planificacion_clase_a_clase']=wp_insert_post( $planificacion_clase_a_clase );
			update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'IdPlanificacionAnual', $id_planificacion_anual );
			update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'NumeroClase', $numeroclase );
			update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'NumeroSemana', $semana );
			update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'Asignatura', $asignatura );
			update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'Curso', $curso  );	
			update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'UnidadAprendizaje', $nombre_unidad );
	}
	//$objetivos_plan_anual  = get_post_meta($id_planificacion_anual, 'ObjetivosAprendizajes',true);
	//$objetivo=$objetivos_plan_anual['objetivo'.$objetivo]['descripcion_objetivo'];											
	if(!empty($semanas_nueva)){
		$semana=$semanas_nueva;
		update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'NumeroSemana', $semana );
	}
	update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'ConceptosClaves', $conceptos );
	update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'ObjetivosAprendizaje', $objetivo );
	update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'Actitudes', $actitudes );	
	update_post_meta($_SESSION['id_planificacion_clase_a_clase'], 'Indicadores', $indicadores );
	
}

?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>
<script>
	function cargar_indicadores(objetivo,id_planificacion_anual){															
            var url="/soluciones-pedagogicas/cargar-indicadores";	
			 $.blockUI.defaults.message = '<h1>Cargando Indicadores...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 								
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'objetivo': objetivo , 'id_planificacion_anual': id_planificacion_anual},
                success: function(datos){    																
					$('#indicadores').html($('#indicadores_', datos).html());
					$('#objetivos').html($('#objetivos_', datos).html()); 
																						
                }
            });
        }
	function cargar_planificacion_anual(id_planificacion_anual){															
            var url="/soluciones-pedagogicas/consulta-planificacion-anual-clase";
			 $.blockUI.defaults.message = '<h1>Cargando...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 									
            $.ajax({   
                type: "GET",
                url:url,
                data: {'id_planificacion_anual': id_planificacion_anual},
                success: function(datos){    																
					$('#plan_clase').html($('#tabla_plan_clase', datos).html()); 
																						
                }
            });
        }
	function cargar_planificacion_clase(id_planificacion_clase,id_planificacion_anual){															
            var url="/soluciones-pedagogicas/consulta-planificacion-clase";	
			 $.blockUI.defaults.message = '<h1>Cargando Planificacion ...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 								
            $.ajax({   
                type: "GET",
                url:url,
                data: {'id_planificacion_clase': id_planificacion_clase,'id_planificacion_anual': id_planificacion_anual},
                success: function(datos){    																
					$('#plan_clase').html($('#tabla_plan_clase', datos).html()); 
																						
                }
            });
        }			
	function irSiguiente(id_planificacion_clase) {			
		if(typeof(id_planificacion_clase) == "undefined"){
			alert('Debe Guardar antes de continuar.');
		}else{
			location.href='/soluciones-pedagogicas/planificacion-diaria-3?id_planificacion_clase='+id_planificacion_clase;
		}
	}	
	function eliminar_actitud(cont_actitudes){
		var parrafo = document.getElementById('actitud_'+cont_actitudes); 
		parrafo.parentNode.removeChild(parrafo); 
		var boton = document.getElementById('boton_actitud_'+cont_actitudes);
		boton.parentNode.removeChild(boton); return false;	
	}
	function eliminar_conceptos(contador_conceptos){
		var parrafo = document.getElementById('Conceptos_'+contador_conceptos); 
		parrafo.parentNode.removeChild(parrafo); 
		var boton = document.getElementById('boton_concepto_'+contador_conceptos); 
		boton.parentNode.removeChild(boton); return false;	
	}			
	function eliminar_indicadores(cont_indicadores){
		var parrafo = document.getElementById('indicador_'+cont_indicadores); 
		parrafo.parentNode.removeChild(parrafo); 
		var boton = document.getElementById('boton_indicador_'+cont_indicadores); 
		boton.parentNode.removeChild(boton); return false;	
	}
</script>
<?
	

	//$curso=get_the_title($_POST['curso_']);
	
		$args = array(    	
    	'post_type' => 'planificacion_clase',
		'author' => get_current_user_id(),		
		'meta_query' => array(
        	array  (
	            'key' => 'IdPlanificacionAnual',
        	    'value'=> $id_planificacion_anual
	        ),
	        array  (
	            'key' => 'NumeroClase',
        	    'value'=> $numeroclase
	        )	        
	    )
	);
	query_posts( $args );

	while (have_posts()) : the_post();
		$id_planificacion_clase_a_clase=get_the_ID();		
	endwhile;			
		$_SESSION['id_planificacion_clase_a_clase'] = $id_planificacion_clase_a_clase;	
		
	if(empty($id_planificacion_clase_a_clase)){
		echo "<script>";
			echo "alert('No existe planificacion para esta clase, por lo que se cargara todo lo de la unidad. No olvidar Guardar cambios');";
			echo "cargar_planificacion_anual(".$id_planificacion_anual.");";
		echo "</script>";					
	}else{
			echo "<script>";
				echo "cargar_planificacion_clase(".$id_planificacion_clase_a_clase.",".$id_planificacion_anual.");";		
		echo "</script>";
	}
	
	//$_SESSION['id_planificacion_clase_a_clase'] = 42;
?>
<div class="container">
	<div class="row contenedor">
		<div class="span12 contenedor_margenes">
    
    		<div class="row">
        		<div class="span12">
            		<font color="white" style="font-size:15px;"><u>Planificacion Clase a Clase</u></font>
	            </div>
    	    </div>
        
        	<div class="row">
	        	<div class="span12">
            		<font class="texto_azul_titulo"><b>Curso: </b></font>
	                <font class="texto_blanco_titulo"><? echo $curso;?></font><br/>
                
    	            <font class="texto_azul_titulo"><b>Unidad: </b></font>
        	        <font class="texto_blanco_titulo"><? echo $nombre_unidad;?></font><br/>
                
	                <font class="texto_azul_titulo"><b>Asignatura: <b></font>
    	            <font class="texto_blanco_titulo"><? echo $asignatura;?></font><br/>        				
    		    </div>
	        </div>
        
			<div class="row">
	    	    <div class="span12 contenedor_info_planificacion">
            
            		<form  role="form" id="planificacion_clase" name="planificacion_clase" action="" method="post">
						<div id="plan_clase">
					    </div>							
						
            	</div>
			</div>
	</div>
   
</div>                       

<div class="row">
	<div class="span12">
    	<small style="color:#FFF; font-weight:normal;">*Recuerde guardar antes de ir al Siguiente formulario. De lo contrario sus cambios no se guardaran.<br>*El Boton "Reset", sirve para resetear el formulario completo a los valores por defecto.</small>
    </div>
</div>	

<div class="row">
    	<div class="span12">
        	 <div style="float:left">
				
				<a class="boton" href="/soluciones-pedagogicas/?page_id=203">Atras</a>
				<a class="boton" href="/soluciones-pedagogicas/?page_id=127">Volver al menu</a>
				
                	
			</div>
			<div style="float:right"> 
            	<a class="boton" href="javascript:irSiguiente(<? echo $id_planificacion_clase_a_clase; ?>)">Siguiente</a>  
            	<button class="boton" type="submit" id="guardar_planificacion_clase" name="guardar_planificacion_clase" action="">Guardar</button> 
				<button class="boton" onclick="cargar_planificacion_anual(<? echo $id_planificacion_anual; ?>); return false;">Limpiar</button>	
			</div>
        
        </div>
    </div>
   
	<br><br>
</form>

<?php get_footer(); ?>

