<?php
/*
Template Name: Planificacion diaria
*/
session_start();
?>
<?php get_header(); ?>
<?
if(isset($_POST['guardar'])){	
/*	try{
		
		$id_planificacion_anual=$_POST['unidades']; 
		$numeroclase=$_POST['numero_clases'];
		$semana=$_POST['semanas'];	
		$actitudes=$_POST['Actitudes'];		
	
		$args = array(    	
    		'post_type' => 'planificacion_clase_a_clase',
			'author' => get_current_user_id(),		
			'meta_query' => array(
    	    	array  (
	    	        'meta_key' => 'IdPlanificacionAnual',
        		    'meta_value'=> $id_planificacion_anual
		        ),
		        array  (
	    	        'meta_key' => 'NumeroClase',
        		    'meta_value'=> $numeroclase
		        )	        
		    )
		);
		query_posts( $args );

		while (have_posts()) : the_post();
			$id_planificacion_clase_a_clase=get_the_ID();		
		endwhile;	 			
	
		if(empty($id_planificacion_clase_a_clase)){
			$planificacion_clase_a_clase = array(
  				'post_title'    => 'Planificacion Clase a Clase : '.$numeroclase,
	  			'post_content'  => '',
	  			'post_type'	=> 'planificacion_clase_a_clase',
 				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_category' => array(8,39)
			);				
			$id_planificacion_clase_a_clase=wp_insert_post( $planificacion_clase_a_clase );
			update_post_meta( $id_planificacion_clase_a_clase, 'NumeroSemana',$semana );	
			update_post_meta( $id_planificacion_clase_a_clase, 'NumeroClase', $numeroclase );
			update_post_meta( $id_planificacion_clase_a_clase, 'IdPlanificacionAnual', $id_planificacion_anual );				
		}
		update_post_meta( $id_planificacion_clase_a_clase, 'Actitudes', $actitudes );		
		
		echo "<script>"; 
			echo "alert('Sus datos han sido guardados exitosamente.');"; 		
		echo "</script>";					
	}catch(Exception $ex){
		echo "<script>"; 
			echo "alert('".$ex."');"; 		
		echo "</script>";
	}
	*/
}
?>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
     <script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>
     <script> 	 
	 
 	function cargar_asignaturas(curso){			
			var curso_sel=curso.value;										
            var url="/soluciones-pedagogicas/consulta-asignaturas-planificacion-anual";
			 $.blockUI.defaults.message = '<h1>Cargando Asignaturas...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_curso': curso_sel },
                success: function(datos){       
                    $('#asignaturas').html(datos);
                }				
            });			
        }
	function cargar_unidades(asignatura,curso){																		
            var url="/soluciones-pedagogicas/consulta-unidades-planificacion-clase-a-clase";
			 $.blockUI.defaults.message = '<h1>Cargando Unidades...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 			
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_asignatura': asignatura , 'id_curso': curso },
                success: function(datos){       
                    $('#unidades').html(datos);					
                }				
            });					
        }	
	function cargar_semanas(id_planificacion){															
            var url="/soluciones-pedagogicas/consulta-semanas-planificacion-clase-a-clase";
			 $.blockUI.defaults.message = '<h1>Cargando Semanas...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_planificacion': id_planificacion },
                success: function(datos){       
                    $('#semanas').html(datos);
                }
            });
        }	
				
	function cargar_numero_clases(id_planificacion){															
            var url="/soluciones-pedagogicas/consulta-numero-clase-planificacion-clase-a-clase";
			 $.blockUI.defaults.message = '<h1>Cargando Clase...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_planificacion': id_planificacion },
                success: function(datos){       
                    $('#numero_clases').html(datos);
                }
            });			
        } 
	function cargar_actitudes(numeroclase,id_planificacion_anual){															
            var url="/soluciones-pedagogicas/consulta-actitudes-planificacion-clase-a-clase";
			 $.blockUI.defaults.message = '<h1>Cargando...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
 			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); 		
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_planificacion_anual': id_planificacion_anual , 'numeroclase': numeroclase },
                success: function(datos){       
                    $('#div_actitudes').html($('#actitudes' , datos).html());  
                }
            });
        } 	      
     </script>



<? 
 	$consulta_sql = "SELECT DISTINCT id_curso FROM asignaturas_docentes WHERE id_docente='".$_SESSION['id_usuario']."'";
	
    $ids_cursos_del_profesor = $wpdb->get_results( $consulta_sql );		

?>
<div class="container">
	<div class="row contenedor">
		<div class="span12">
        	<div class="row contenedor_margenes">
            	<div class="span4">                	
                	<font color="white" style="font-size:25px;"><u>Planificacion Clase a Clase</u></font>
                </div>
                 <div class="span7" id="contenedor_form_plan_anual">
                 	<form class="form-horizontal" role="form">
                    	<div class="form-group">
                        	 <label class="col-lg-2 letras_form_plan_anual">Docente</label>
   							 <div class="col-lg-10">
                             	<? echo $_SESSION['nombre_d']; ?>
                             </div>
                        </div>
                        
                        <div class="form-group">
                        	 <label class="col-lg-2 letras_form_plan_anual">Curso</label>
   							 <div class="col-lg-10">
                             	<SELECT class="select_sombra" id="curso" name="curso" onchange="cargar_asignaturas(this)" size="1">
				
									<option value="" default selected>Selecciona Curso</option>
									<?
										foreach ( $ids_cursos_del_profesor as $cursos ){				
											echo $cursos->id_curso;
											$nombre_curso=get_the_title( $cursos->id_curso);								
											echo '<OPTION VALUE="'.$cursos->id_curso.'">'.$nombre_curso.'</OPTION>';		
										}
									?>   
								</SELECT>
                             </div>
                        </div>
                        
                        <div class="form-group">
                        	 <label class="col-lg-2 letras_form_plan_anual">Asignatura</label>
   							 <div class="col-lg-10">
                             	<SELECT class="select_sombra" id="asignaturas" name="asignaturas" onchange="cargar_unidades(this.value,document.getElementById('curso').value)" >
  									<option></option>
								</SELECT> 
                             </div>
                        </div>
                        <div class="form-group">
                        	 <label class="col-lg-2 letras_form_plan_anual">Unidad de Aprendizaje</label>
   							 <div class="col-lg-10">
                             	<SELECT class="select_sombra" id="unidades" name="unidades" onchange="cargar_semanas(this.value)" size="1">
					  				<option></option>
								</SELECT>  
                             </div>
                        </div>
                        <div class="form-group">
                        	 <label class="col-lg-2 letras_form_plan_anual">Semana</label>
   							 <div class="col-lg-10">
                             	<SELECT class="select_sombra" id="semanas" name="semanas" onchange="cargar_numero_clases(document.getElementById('unidades').value)" size="1">
  									<option></option>
								</SELECT> 
                             </div>
                        </div>
                        <div class="form-group">
                        	 <label class="col-lg-2 letras_form_plan_anual">Clase</label>
   							 <div class="col-lg-10">
                             	<SELECT class="select_sombra" id="numero_clases" name="numero_clases" ><?
								//onchange="cargar_actitudes(this.value,document.getElementById('unidades').value)"
			                	?>
			                		<option></option>
   								</SELECT>
                             </div>
                        </div>
                    </form>
                 </div>
            </div>
		</div>
	</div>
          	           
	<div class="row">
		<div class="span12">
    		<small style="color:#FFF;">*Seleccione Curso, luego Asignatura,Unidad de Aprendizaje,Semana y Clase. Luego presione el link "Siguiente"</small>
	    </div>
	</div>
    <div class="row">	
    	<div class="span12">        
		<br><br>
        	<div class="boton_izquierda">
			<a class="boton" href="/soluciones-pedagogicas/?page_id=127">Volver al menu</a>
            </div>
            <div class="boton_derecha">
            	<a href="javascript:irSiguiente()" class="boton">Siguiente</a>		
            </div>
        </div>
    </div>

</div> 


<?php get_footer(); ?>
<script>                            
function irSiguiente() {
	var unidad=document.getElementById('unidades').value;
	var numero_clase=document.getElementById('numero_clases').value;
	var semana=document.getElementById('semanas').value;
	
	if(unidad=="" || numero_clase==""){
		alert('Debe completar el formulario')
	}else{
		location.href='/soluciones-pedagogicas/planificacion-diaria-2?id_unidad_planificacion='+unidad+'&clase='+numero_clase+'&semana='+semana;
	}
}                            
</script>