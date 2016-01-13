<?php
/*
Template Name: Planificacion anual 3
*/
?>
<?php
session_start();
	get_header();
	$id_planificacion=$_GET['id_planificacion'];
if(isset($_POST['guardar_planificacion_unidad'])) {				
  	
	$palabras_claves = $_POST['Conceptos'];
  	$objetivos = $_POST['Objetivos'];
	$actitudes = $_POST['Actitudes'];
  	$habilidades = $_POST['Habilidades'];
	$indicadores=$_POST['Indicadores'];
	$estrategia_aprendizaje=$_POST['EstrategiaAprendizaje'];
	$formas_evaluacion=$_POST['FormasEvaluacion'];
	$semanas = $_POST['semanas'];
  	$clases = $_POST['clases'];
			
	$total_objetivos=count($objetivos);			 
	$obj = array();		
	for($i=0;$i<$total_objetivos;$i++){								
				if(!$objetivos[$i]==""){					
					$indicadores_objetivo=$_POST['Indicadores_'.$i];
					$total_indicadores_objetivos=count($indicadores_objetivo);
					$obj['objetivo'.$i]['descripcion_objetivo']=$objetivos[$i]; 
					$obj['objetivo'.$i]['estrategia_aprendizaje']=$estrategia_aprendizaje[$i]; 	
					$obj['objetivo'.$i]['formas_evaluacion']=$formas_evaluacion[$i];
					$obj['objetivo'.$i]['tipos_evaluacion']=$_POST['tipos_evaluacion_'.($i+1)];
					for($x=0;$x<$total_indicadores_objetivos;$x++){						
						//echo $indicadores_objetivo[$x];	
						if(!$indicadores_objetivo[$x]==""){
							$obj['objetivo'.$i]['indicador'.$x]=$indicadores_objetivo[$x]; 
						}	
					}
				}
	}


	update_post_meta( $id_planificacion, 'Semana', $semanas);
	update_post_meta( $id_planificacion, 'NumeroClases', $clases);
	update_post_meta( $id_planificacion, 'ObjetivosAprendizajes', $obj);
  	update_post_meta( $id_planificacion, 'ConceptosAprender', $palabras_claves );
  //	update_post_meta( $id_planificacion, 'ObjetivosAprendizajes', $objetivos );
  	update_post_meta( $id_planificacion, 'Actitudes', $actitudes );
  	update_post_meta( $id_planificacion, 'Habilidades', $habilidades);
	update_post_meta( $id_planificacion, 'IndicadoresEvaluacion', $indicadores);
	//update_post_meta( $id_planificacion, 'EstrategiaAprendizaje', $estrategia_aprendizaje);	
	
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script> 
<script> 
 	function cargar_objetivos(id_planificacion){																
            var url="/soluciones-pedagogicas/consulta-objetivos-aprendizaje";
			$.blockUI.defaults.message = '<h1>Reseteado..</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);  			
            $.ajax({   
                type: "GET",
                url:url,
                data: {'id_planificacion': id_planificacion},
                success: function(datos){    				
					$('#tabla').html($('#tabla_' , datos).html());  	
									
                }
            });		
        }
		
	function cargar_planificacion(id_planificacion){		
            var url="/soluciones-pedagogicas/consulta-planificacion-unidad";
			$.blockUI.defaults.message = '<h1>Cargando...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);  						
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_planificacion': id_planificacion },
                success: function(datos){    
					$('#tabla').html($('#tabla_' , datos).html());  																			
                }
            });			
        }
		
		function eliminar_conceptos(contador_conceptos){
			var parrafo = document.getElementById('Conceptos_'+contador_conceptos); 
			parrafo.parentNode.removeChild(parrafo); 
			var div = document.getElementById('conceptos_'+contador_conceptos); 
			div.parentNode.removeChild(div); 
			var boton = document.getElementById('boton_concepto_'+contador_conceptos); 
			boton.parentNode.removeChild(boton); return false;	
		}
		function agregar_conceptos(){
			var original=document.getElementById('conceptos_1');
			 		var nuevo=original.cloneNode(true);            
			 		destino=document.getElementById('div_conceptos');					
			 		destino.appendChild(nuevo);
             		return false;	
		}
		function eliminar_objetivo(i){
			var parrafo = document.getElementById('objetivo_'+i); 
			parrafo.parentNode.removeChild(parrafo); 
			var boton = document.getElementById('boton_objetivo_'+i); 
			boton.parentNode.removeChild(boton); return false;	
		}
		function eliminar_indicador(i,x){
			var parrafo = document.getElementById('indicador_'+i+'_'+x); 
			parrafo.parentNode.removeChild(parrafo); 
			var boton = document.getElementById('boton_indicador_'+i+'_'+x); 
			boton.parentNode.removeChild(boton); return false;	
		}
		function eliminar_habilidad(cont_habilidad){
			var parrafo = document.getElementById('habilidad_'+cont_habilidad); 
			parrafo.parentNode.removeChild(parrafo); 
			var boton = document.getElementById('boton_habilidad_'+cont_habilidad); 
			boton.parentNode.removeChild(boton); return false;	
		}
		function eliminar_actitud(cont_actitudes){
			var parrafo = document.getElementById('actitud_'+cont_actitudes); 
			parrafo.parentNode.removeChild(parrafo); 
			var boton = document.getElementById('boton_actitud_'+cont_actitudes); 
			boton.parentNode.removeChild(boton); return false;	
		}
		
		
		
    </script>


<?	
	$verificador  = get_post_meta($id_planificacion, 'ConceptosAprender', true);
	if(!empty($verificador)){
		echo "<script>";
			echo "cargar_planificacion(".$id_planificacion.");";
		echo "</script>";	
	}else{
		echo "<script>";
			echo "alert('No se encuentra ninguna planificacion guardada, por lo que se cargara por defecto toda la unidad');";
			echo "cargar_objetivos(".$id_planificacion.");";
		echo "</script>";	
	}
	
	

?>	


<?php 
		//echo "<script>";
	//echo "alert('".$id_planificacion."')"; 
	
	
	//VERIFICARSI EXISTE PLANIFICACION...SI EXISTE CARGAR PLANIFICACION...SI NO...CARGAR OBJETIVOS.....	
	$semanas= get_post_meta($id_planificacion, 'Semana', true);	
	$asignatura= get_post_meta($id_planificacion, 'Asignatura', true);
	$curso= get_post_meta($id_planificacion, 'Curso', true);
	$unidad= get_post_meta($id_planificacion, 'Unidad', true);

		$args = array(    	
    	'post_type' => 'base_curricular',		
	    'meta_query' => array(
        	array  (
	            'key' => 'Asignatura_',
        	    'value'=> $asignatura
	        ),
	        array  (
	            'key' => 'Curso_',
        	    'value'=> $curso
	        ),
			array  (
	            'key' => 'Unidad_',
        	    'value'=> $unidad
	        )	        
	    )
	);
	query_posts( $args );
	while (have_posts()) : the_post();
		$id_base_curricular_unidad=get_the_ID();				
	endwhile;

		
	//$objetivos_separados = explode("/", $objetivosAprendizajes);
			
	/*	
	if($_POST){
		update_post_meta( $id_planificacion, 'Semana', $_POST['semanas'] );
		update_post_meta( $id_planificacion, 'NumeroClases', $_POST['clases'] );		
		update_post_meta( $id_planificacion, 'ConceptosAprender', $_POST['conceptos'] );
		
		$objetivos=$_POST['objetivos'];
		$objetivos_seleccionados="";
		for ($i=0;$i<count($objetivos);$i++)    
		{       
			    $objetivos_seleccionados=$objetivos_seleccionados.$objetivos[$i].'/';
		} 		
		update_post_meta( $id_planificacion, 'ObjetivosAprendizajes', $objetivos_seleccionados );
		update_post_meta( $id_planificacion, 'IndicadoresEvaluacion', $_POST['indicadores'] ); 
		update_post_meta( $id_planificacion, 'Habilidades', $_POST['habilidades'] );
		update_post_meta( $id_planificacion, 'Actitudes', $_POST['actitudes'] );
		update_post_meta( $id_planificacion, 'EstrategiaAprendizaje', $_POST['estrategia'] );
		update_post_meta( $id_planificacion, 'FormasEvaluacion', $_POST['formas_evaluacion'] );  
		update_post_meta( $id_planificacion, 'TipoEvaluacion', $_POST['tipos_evaluacion'] );
		
		echo "<script>"; 
		echo "window.location.reload();"; 
		//echo "window.location='/soluciones-pedagogicas/?page_id=193'";
		echo "</script>";		
	}	
	*/
	

?>

<div class="container">
	<div class="row contenedor">
    	<div class="span12 contenedor_margenes">
        	<div class="row">
        		<div class="span12">
                <br />
				<br />
				<br />
				<br />		
            		<font color="white" style="font-size:15px;"><u>Planificacion de trayecto Anual</u></font>
            	</div>
        	</div>
            <div class="row">
	        	<div class="span12">
            		<font class="texto_azul_titulo"><b>Curso: </b></font><font class="texto_blanco_titulo"><? echo $curso;?></font><br/>
                	<font class="texto_azul_titulo"><b>Asignatura: <b></font><font class="texto_blanco_titulo"><? echo $asignatura;?></font><br/>        				
    	    	</div>
        	</div>	
			<div class="row">
		        <div class="span12 contenedor_info_planificacion">
                	<hr color="#FFFFFF" style="height:2px;">
					<form role="form" id="planificacion_anual" name="planificacion_anual" action="" method="post">
						<div id="tabla">
                        
						</div>  
						<br><br>
                        </div>
						</div>
						<div style="float:right">
                        	<button class="boton" type="submit"  name="guardar_planificacion_unidad" action="">Guardar</button>
                        	<button  class="boton" style="float:right" onclick="cargar_objetivos(<? echo $id_planificacion; ?>); return false;">Limpiar</button>
							
						</div>

						<div style="float:left">
							<a class="boton" href="/soluciones-pedagogicas/planificacion-anual?asignatura=<? echo $_SESSION['id_asignatura'];?>&cu_so=<? echo $_SESSION['id_cu_so']; ?>&ano=0">Volver atras</a>
							<a class="boton" href="/soluciones-pedagogicas/?page_id=127">Volver al menu</a>
						</div>
                 	</form>
                </div>
            </div>        

<?

$verif_validado=get_post_meta($id_planificacion,'Validado');
if(!empty($verif_validado)){
?>
	<br/><br/>	
	<small style="color:#FFF; font-weight:normal;">*Recuerde que antes de exportar a Excel o PDF debe haber guardado y completado todo. De lo contrario la exportacion tendra errores.</small>
	<br /><br /><br />
	<div style="float:left;">
		<a href="/soluciones-pedagogicas/exportar-a-excel?id_planificacion=<? echo $id_planificacion; ?>"><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/exportar-excel.png" /></a>
	</div>
	<div style="float:left;">
		<a href="/soluciones-pedagogicas/exportar-a-pdf?id_planificacion=<? echo $id_planificacion; ?>"><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/exportar-pdf.png" /></a>
	</div>
	<br><br><br><br>
<?
}
?>
<br /><br />




</div>
<?php get_footer(); ?>
                   