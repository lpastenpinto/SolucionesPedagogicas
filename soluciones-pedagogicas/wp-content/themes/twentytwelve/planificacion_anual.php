<?php
//Planificacion anual 1
 $pagePath = explode('/wp-content/', dirname(__FILE__));
    include_once(str_replace('wp-content/' , '', $pagePath[0] . '/wp-load.php'));
session_start();
?>
<link rel="stylesheet" href="/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/sp_style.css" type="text/css" media="screen" />

<?php get_header(); 
/*

 function cargar_asignaturas(curso){			
			var curso_sel=curso.value;								
            var url="../consulta-asignaturas-planificacion-anual";
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_curso': curso_sel },
                success: function(datos){       
                    $('#asignaturas').html(datos);
                }
            });
        }

*/
?>
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
     <script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>
     
     <script> 	 
	 
 	function cargar_asignaturas(curso){			
			var curso_sel=curso.value;														
            var url="/soluciones-pedagogicas/consulta-asignaturas-planificacion-anual";
            $.blockUI.defaults.message = '<h1>Cargando...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
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
                	<font color="white" style="font-size:25px;"><u>Planificacion Anual</u></font>
                </div>
                <div class="span7" id="contenedor_form_plan_anual">
                	<form class="form-horizontal" role="form">
  						<div class="form-group">
						    <label class="col-lg-2 letras_form_plan_anual">Curso</label>
   							 <div class="col-lg-10">
      							<SELECT class="select_sombra" id="curso_" name="curso_" onchange="cargar_asignaturas(this)" size="1">
									<option>Seleccione Curso</option>
									<?
									foreach ( $ids_cursos_del_profesor as $cursos ){				
										echo $cursos->id_curso;
										$nombre_curso=get_the_title( $cursos->id_curso);		
										//$nombre_curso=get_post_meta($cursos->id_curso,'NombreCurso',true);		
										echo '<OPTION VALUE="'.$cursos->id_curso.'">'.$nombre_curso.'</OPTION>';		
									}
									?>   
								</SELECT>
						    </div>
					  	</div>
					  	<div class="form-group">
					  		<label class="col-lg-2 letras_form_plan_anual">Asignatura</label>
	    					<div class="col-lg-10">
     							<SELECT class="select_sombra" id="asignaturas" name="asignaturas">
  									<option>Seleccione Asignatura</option>
								</SELECT> 
    						</div>
						 </div> 
                         <div class="form-group">
					  		<label class="col-lg-2 letras_form_plan_anual">Año</label>
                            	<?
								$ano_actual=date('Y');
								?>
	    					<div class="col-lg-10">
     							<SELECT class="select_sombra" NAME="ano_" id="ano_" size="1">
								   <OPTION VALUE="<? echo $ano_actual; ?>"><? echo $ano_actual; ?></OPTION>
								   <OPTION VALUE="<? echo $ano_actual+1; ?>"><? echo $ano_actual+1; ?></OPTION>
								</SELECT>
    						</div>
						 </div>  
					</form>
                </div>
            </div>		
		</div>
	</div>
           

	<br>
	<div class="row">
    	<div class="span12">
			<small><font color="#FFFFFF">*Seleccione Curso, Asignatura y Año y luego de click al enlace "Siguiente".</font></small>
    	</div>
	</div>
    <div class="row">	
    	<div class="span12">        
		<br><br>
        	<div class="boton_izquierda">
			<a href="/soluciones-pedagogicas/?page_id=127" class="boton">Volver al menu</a>
            </div>
            <div class="boton_derecha">
			<a href="javascript:irSiguiente()" class="boton">Siguiente</a>
            </div>
        </div>
    </div>
</div> 
<?php get_sidebar(); ?>

<?php get_footer(); ?>
<script>                            
function irSiguiente() {	
	var asignatura=document.getElementById('asignaturas').value;
	var curso=document.getElementById('curso_').value;
	var ano=document.getElementById('ano_').value;	
	if(asignatura=="Seleccione Asignatura" || curso=="Seleccione Curso" || ano==""){
		alert('Debe completar el formulario')
	}else{
		location.href='/soluciones-pedagogicas/planificacion-anual?asignatura='+asignatura+'&cu_so='+curso+'&ano='+ano;
	}
}                            
</script>